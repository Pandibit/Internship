<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateInventoryItem;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function sales()
    {
        return view('admin.sales');
    }

    public function salesData()
    {

        $orders = Order::with('items')->get();
        $sales = [
            'totalOrders' => count($orders),
            'totalQuantity' => 0,
            'totalPrice' => 0,
            'years' => [],
        ];

        foreach ($orders as $order) {
            $orderCreation = strtotime($order->created_at);
            $year = date('Y', $orderCreation);
            $month = date('Y-m', $orderCreation);
            $day = date('Y-m-d', $orderCreation);

            foreach ($order->items as $item) {
                preg_match_all('/\d+/', $item->product->price, $matches);
                $pricePerOrderItem = implode('', $matches[0]);

                $sales['orders'][$order->order_id]['orderItems']
                [$item->id] = [
                    'item_id' => $item->id,
                    'product_name' => $item->product->name,
                    'color_name' => $item->color->name,
                    'size_name' => $item->size->size_name,
                    'category_name' => $item->product->category->name,
                    'quantity' => (int)$item->quantity,
                    'price' => $pricePerOrderItem,
                ];

                $totalQuantityPerOrderItem = $item->quantity;
                $totalPricePerOrderItem = $totalQuantityPerOrderItem * $pricePerOrderItem;


                @$sales['orders'][$order->order_id]['orderId'] = $order->order_id;
                @$sales['orders'][$order->order_id]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['orders'][$order->order_id]['totalPrice'] += $totalPricePerOrderItem;


                $sales['totalQuantity'] += $totalQuantityPerOrderItem;
                $sales['totalPrice'] += $totalPricePerOrderItem;

                @$sales['years'][$year]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['days'][$day]['totalQuantity'] += $totalQuantityPerOrderItem;

                @$sales['years'][$year]['totalPrice'] += $totalPricePerOrderItem;
                @$sales['years'][$year]['months'][$month]['totalPrice'] += $totalPricePerOrderItem;
                @$sales['years'][$year]['months'][$month]['days'][$day]['totalPrice'] += $totalPricePerOrderItem;


                @$sales['products'][$item->product->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['products'][$item->product->name]['productName'] = $item->product->name;

                @$sales['sizes'][$item->size->size_name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['sizes'][$item->size->size_name]['sizeName'] = $item->size->size_name;

                @$sales['colors'][$item->color->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['colors'][$item->color->name]['colorName'] = $item->color->name;

                @$sales['categories'][$item->product->category->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['categories'][$item->product->category->name]['categoryName'] = $item->product->category->name;


                @$sales['years'][$year]['products'][$item->product->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['products'][$item->product->name]['productName'] = $item->product->name;
                @$sales['years'][$year]['bestSellingProduct'] = max($sales['years'][$year]['products'])['productName'];

                @$sales['years'][$year]['months'][$month]['products'][$item->product->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['products'][$item->product->name]['productName'] = $item->product->name;
                @$sales['years'][$year]['months'][$month]['bestSellingProduct'] = max($sales['years'][$year]['months'][$month]['products'])['productName'];

                @$sales['years'][$year]['months'][$month]['days'][$day]['products'][$item->product->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['days'][$day]['products'][$item->product->name]['productName'] = $item->product->name;
                @$sales['years'][$year]['months'][$month]['days'][$day]['bestSellingProduct'] = max($sales['years'][$year]['months'][$month]['days'][$day]['products'])['productName'];


                @$sales['years'][$year]['colors'][$item->color->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['colors'][$item->color->name]['colorName'] = $item->color->name;
                @$sales['years'][$year]['bestSellingColor'] = max($sales['years'][$year]['colors'])['colorName'];

                @$sales['years'][$year]['months'][$month]['colors'][$item->color->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['colors'][$item->color->name]['colorName'] = $item->color->name;
                @$sales['years'][$year]['months'][$month]['bestSellingColor'] = max($sales['years'][$year]['months'][$month]['colors'])['colorName'];

                @$sales['years'][$year]['months'][$month]['days'][$day]['colors'][$item->color->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['days'][$day]['colors'][$item->color->name]['colorName'] = $item->color->name;
                @$sales['years'][$year]['months'][$month]['days'][$day]['bestSellingColor'] = max($sales['years'][$year]['months'][$month]['days'][$day]['colors'])['colorName'];


                @$sales['years'][$year]['sizes'][$item->color->name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['sizes'][$item->color->name]['sizeName'] = $item->size->size_name;
                @$sales['years'][$year]['bestSellingSize'] = max($sales['years'][$year]['sizes'])['sizeName'];

                @$sales['years'][$year]['months'][$month]['sizes'][$item->size->size_name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['sizes'][$item->size->size_name]['sizeName'] = $item->size->size_name;
                @$sales['years'][$year]['months'][$month]['bestSellingSize'] = max($sales['years'][$year]['months'][$month]['sizes'])['sizeName'];

                @$sales['years'][$year]['months'][$month]['days'][$day]['sizes'][$item->size->size_name]['totalQuantity'] += $totalQuantityPerOrderItem;
                @$sales['years'][$year]['months'][$month]['days'][$day]['sizes'][$item->size->size_name]['sizeName'] = $item->size->size_name;
                @$sales['years'][$year]['months'][$month]['days'][$day]['bestSellingSize'] = max($sales['years'][$year]['months'][$month]['days'][$day]['sizes'])['sizeName'];


                @$sales['bestSellingProduct'] = max($sales['products'])['productName'];
                @$sales['bestSellingSize'] = max($sales['sizes'])['sizeName'];
                @$sales['bestSellingColor'] = max($sales['colors'])['colorName'];
                @$sales['bestSellingCategory'] = max($sales['categories'])['categoryName'];

            }
        }


        $salesTotalQuantity = $sales['totalQuantity'];
        $salesTotalPrice = $sales['totalPrice'];
        foreach ($sales['years'] as $year => &$yearData) {
            $yearQuantity = ($yearData['totalQuantity'] ?? 0);
            $yearPrice = ($yearData['totalPrice'] ?? 0);
            $yearData['percentageTotalQuantityOverTotal'] = round(($yearQuantity / $salesTotalQuantity) * 100, 2);
            $yearData['percentageTotalPriceOverTotal'] = round(($yearPrice / $salesTotalPrice) * 100, 2);
            foreach ($yearData['months'] as $month => &$monthData) {
                $monthQuantity = $monthData['totalQuantity'] ?? 0;
                $monthPrice = ($monthData['totalPrice'] ?? 0);

                $monthData['percentageTotalQuantityOverTotal'] = round(($monthQuantity / $salesTotalQuantity) * 100, 2);
                $monthData['percentageTotalQuantityOverYearTotal'] = round(($monthQuantity / $yearQuantity) * 100, 2);

                $monthData['percentageTotalPriceOverTotal'] = round(($monthPrice / $salesTotalPrice) * 100, 2);
                $monthData['percentageTotalPriceOverYearTotal'] = round(($monthPrice / $yearPrice) * 100, 2);
                foreach ($monthData['days'] as $day => &$dayData) {
                    $dayQuantity = $dayData['totalQuantity'] ?? 0;
                    $dayPrice = $dayData['totalPrice'] ?? 0;

                    $dayData['percentageTotalQuantityOverTotal'] = round(($dayQuantity / $salesTotalQuantity) * 100, 2);
                    $dayData['percentageTotalPriceOverTotal'] = round(($dayPrice / $salesTotalPrice) * 100, 2);

                    $dayData['percentageTotalQuantityOverYearTotal'] = round(($dayQuantity / $yearQuantity) * 100, 2);
                    $dayData['percentageTotalPriceOverYearTotal'] = round(($dayPrice / $yearPrice) * 100, 2);

                    $dayData['percentageTotalQuantityOverMonthTotal'] = round(($dayQuantity / $monthQuantity) * 100, 2);
                    $dayData['percentageTotalPriceOverMonthTotal'] = round(($dayPrice / $monthPrice * 100), 2);
                }
            }
        }

        return DataTables::of($sales['orders'])->addIndexColumn()->make(true);

    }

    public function users()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.users', [
            'roles' => $roles
        ]);
    }

    public function addUser(CreateUser $req)
    {
        Gate::authorize('addUser');
        $user = User::create($req->except('userRole'));
        $user->syncRoles([$req->userRole]);
        return response()->json(
            [
                'message' => 'Created successfully'
            ],
        );
    }

    public function destroyUser(User $user)
    {
        Gate::authorize('deleteUser');
        $user->delete();


        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }

    public function updateUser(User $user, UpdateUserRequest $req)
    {
        if (!$user->hasRole('admin')) {
            if (isset($req->name)) {
                $user->name = $req->name;
            }
            if (isset($req->email)) {
                $user->email = $req->email;
            }
            if (isset($req->role)) {
                $user->syncRoles([$req->role]);
            }
            $user->save();
        }

        return response()->json([
            'message' => 'User updated successfully'
        ]);
    }

    public function usersData()
    {
        $users = User::all();
        $usersData = [];
        foreach ($users as $user) {
            $usersData[$user->id] = [
                'userId' => $user->id,
                'userName' => $user->name,
                'userEmail' => $user->email,
                'userRole' => $user->roles->pluck('name')->implode(', ') ?: 'user',
            ];
        }

        return DataTables::of($usersData)->addIndexColumn()
            ->addColumn('userData', function ($item) {
                return $item['userId'];
            })->make(true);

    }

    public function products()
    {
        return view('admin.products', [
            'categories' => Category::all()
        ]);
    }

    public function getDataForProducts()
    {
        $products = Product::all();
        $productsData = [];

        foreach ($products as $product) {
            $productsData[$product->id] = [
                'productId' => $product->id,
                'productName' => $product->name,
                'productPrice' => $product->price,
                'categoryId' => $product->category->id,
                'categoryName' => $product->category->name
            ];
        }
        return DataTables::of($productsData)
            ->addIndexColumn()
            ->addColumn('productData', function ($item) {
                return $item['productId'];
            })
            ->make(true);
    }

    public function addProduct(AddProductRequest $req)
    {
        $price = '$' . number_format($req->price, 0) . " USD";
        $req->merge([
            'price' => $price
        ]);
        Product::create($req->all());

        return response()->json([
            'message' => 'Product created successfully',
        ]);
    }

    public function destroyProduct(Product $product, Request $req)
    {
        Gate::authorize('delete', $product);
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    public function updateProduct(Product $product, UpdateProductRequest $req)
    {

        if (isset($req->name)) {
            $product->name = $req->name;
        }
        if (isset($req->price)) {
            $product->price = '$' . $req->price . ' ' . 'USD';
        }
        if (isset($req->category_id)) {
            $product->category_id = $req->category_id;
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully'
        ]);
    }

    public function inventory()
    {
        $prices = array_unique(Product::all()->pluck('price')->toArray());
        return view('admin.inventory',
            [
                'products' => Product::all(),
                'colors' => Color::all(),
                'sizes' => Size::all(),
                'prices' => $prices,

            ]);
    }

    public function getDataForInventory(Request $req)
    {
        $filters = $req->filters;
        $query = Inventory::with('product', 'size', 'color');
        if (isset($filters['string'])) {
            foreach ($filters['string'] as $key => $value) {
                if (isset($filters['string'][$key])) {
                    $query = $query->where($key, $value);
                }
            }
        }

        if (isset($filters['custom'])) {
            $price = $filters['custom']['price'];
            if (isset($price)) {
                $query = $query->whereHas('product', function ($query) use ($price) {
                    $query->where('price', $price);
                });
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('product_name', function ($item) {
                return $item->product->name;
            })
            ->addColumn('size', function ($item) {
                return $item->size->size_name;
            })
            ->addColumn('color', function ($item) {
                return $item->color->name;
            })
            ->addColumn('quantity', function ($item) {
                return $item->quantity;
            })
            ->addColumn('price', function ($item) {
                return $item->product->price;
            })
            ->addColumn('inventory', function ($item) {
                return $item->id;
            })
            ->make(true);
    }

    public function inventoryDeleteItem(Inventory $inventory)
    {
        $inventory->delete();
    }

    public function inventoryUpdateItem(UpdateInventoryItem $req, Inventory $inventory)
    {

        if ($inventory->product) {
            $inventory->product->name = $req->product_name;
            $inventory->product->price = $req->price;
            $inventory->product->save();
        }

        $inventory->size_id = $req->size;
        $inventory->color_id = $req->color;
        $inventory->quantity = (string)$req->quantity;
        $inventory->save();

        return response()->json(['message' => 'Item updated successfully']);

    }


}
