<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyCartItemRequest;
use App\Http\Requests\ShoppingCartStoreRequest;
use App\Http\Requests\ValidateCheckout;
use App\Mail\OrderMail;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class ShoppingCart extends Controller
{
    use \App\Traits\ShoppingCart;

    public function index()
    {
        return view(
            'shoppingCart',
            [
                'shoppingCart' => $this->getShoppingCart()
            ]
        );
    }

    public function store(ShoppingCartStoreRequest $request)
    {
        $shoppingCart = $this->prepareCookie($request->validateShoppingCart($this->getShoppingCart()));
        return response()->json([
            'message' => 'Product added successfully',
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function destroy(DestroyCartItemRequest $request)
    {
        $id = $request->get('id');
        $shoppingCart = $this->getShoppingCart();
        $shoppingCart = array_filter($shoppingCart, function ($item) use ($id) {
            return $item['id'] !== $id;
        });
        $this->prepareCookie($shoppingCart);
        return response()->json([
            'success' => true,
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function checkout(Request $req)
    {
        $errors = [];
        $shoppingCart = $this->getShoppingCart();
        $validItems = [];
        foreach ($shoppingCart as &$item) {
            $inventory_item = Inventory::with(['product', 'color', 'size'])
                ->where('product_id', $item['productId'])
                ->where('color_id', (int)$item['colorId'])
                ->where('size_id', (int)$item['sizeId'])
                ->first();

            $quantity = $inventory_item->quantity;
            if ($quantity < (int)$item['quantity']) {
                $errors[] = $item['id'];
                continue;
            }

            (int)$quantity -= (int)$item['quantity'];
            $inventory_item->quantity = (string)$quantity;
            $inventory_item->save();

            $validItems[] = [
                'product_id' => $item['productId'],
                'color_id' => $item['colorId'],
                'size_id' => $item['sizeId'],
                'quantity' => $item['quantity']
            ];
        }
        if (count($errors) > 0) {
            return response()->json([
                'message' => 'Quantity mismatch',
                'errors' => $errors,
            ], 422);
        } else {
            $order = Order::create([
                'order_id' => uuid_create(),
            ]);

            foreach ($validItems as $itemValid) {
                Order_item::create([
                    'order_id' => $order->id,
                    'product_id' => $itemValid['product_id'],
                    'color_id' => $itemValid['color_id'],
                    'size_id' => $itemValid['size_id'],
                    'quantity' => $itemValid['quantity']
                ]);
            }

            $this->sendEmail($order);
            $this->forgetCookie();
            return response()->json([
                'message' => 'Order and order items have been successfully saved.',
                'order' => $order,
            ]);
        }

    }
}
