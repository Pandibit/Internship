<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return
            [
                'productId' => 'required|exists:products,id',
                'colorId' => 'required|exists:colors,id',
                'sizeId' => 'required|exists:sizes,id',
                'quantity' => 'required|integer|min:1'
            ];
    }


    public function validateShoppingCart(array $shoppingCart): array
    {
        $attributes = $this->validated();
        $itemFound = false;
        foreach ($shoppingCart as &$item) {
            if (
                $item['productId'] === (int)$attributes['productId'] &&
                $item['colorId'] === $attributes['colorId'] &&
                $item['sizeId'] === $attributes['sizeId']
            ) {
                $item['quantity'] += $attributes['quantity'];
                $itemFound = true;
                break;
            }
        }
        if (!$itemFound) {
            $shoppingCart[] = [
                'id' => uuid_create(),
                'productId' => (int)$attributes['productId'],
                'colorId' => $attributes['colorId'],
                'sizeId' => $attributes['sizeId'],
                'quantity' => $attributes['quantity'],
            ];
        }

        return $shoppingCart;
    }


    public function message()
    {
        return
            [
                'productId.required' => 'Product id is required!',
                'colorId.required' => 'Color id is required!',
                'sizeId.required' => 'Size id is required!',
                'quantity.required' => 'Quantity is required'
            ];
    }
}
