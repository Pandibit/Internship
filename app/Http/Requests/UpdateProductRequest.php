<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateProductRequest extends FormRequest
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
        $product = $this->route('product');
        $exists = Product::where('name', $this->name)
            ->where('id', '=', $product->id)->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'exists' => 'You can not update a product with the same name',
            ]);
        }
        return [
            'name' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|numeric|exists:categories,id'
        ];
    }
}
