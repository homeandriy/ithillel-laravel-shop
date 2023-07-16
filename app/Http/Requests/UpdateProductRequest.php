<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    protected string $className = Product::class;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can(config('permission.access.products.edit'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $productId = $this->route( 'product' )->id;

        return [
            'title'       => [ 'required', 'string', 'min:2', 'max:255', Rule::unique( Product::class, 'title' )->ignore( $productId ) ],
            'SKU'         => [ 'required', 'string', 'min:1', 'max:35', Rule::unique( Product::class, 'SKU' )->ignore( $productId )],
            'description' => [ 'nullable', 'string' ],
            'price'       => [ 'nullable', "numeric", "min:1" ],
            'discount'    => [ 'nullable', "numeric", "min:1", "max:100" ],
            'quantity'    => [ 'nullable', "numeric", "min:1" ],
            'thumbnail'   => [ 'nullable', 'image:jpeg,png'],
            'images.*'    => [ 'nullable', 'image:jpeg,png'],
            'categories.*'  => [ 'required', "exists:App\Models\Category,id" ],
        ];
    }
}
