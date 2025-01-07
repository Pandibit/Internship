<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateInventoryItem extends FormRequest
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
        $inventory = $this->route('inventory');
        $exists = Inventory::whereHas('product', function ($query) {
            $query->where('name', $this->product_name)
                ->where('price', $this->price);
        })->where('color_id', $this->color)
            ->where('size_id', $this->size)
            ->where('id', '!=', $inventory->id)->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'exists' => 'This product has already been added to inventory.',
            ]);
        }

        return [
            'product_name' => 'required|string',
            'color' => 'required|exists:colors,id|numeric',
            'size' => 'required|exists:sizes,id|numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|string',

        ];
    }
}
