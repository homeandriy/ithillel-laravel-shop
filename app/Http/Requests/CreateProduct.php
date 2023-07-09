<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest {
    protected string $className = Product::class;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return auth()->user()->can( config( 'permission.access.products.publish' ) );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'title'       => [ 'required', 'string', 'min:2', 'max:255', "unique:{$this->className}" ],
            'description' => [ 'nullable', 'string' ],
            'price'       => [ 'nullable', "numeric", "min:1" ],
            'discount'    => [ 'nullable', "numeric", "min:1", "max:100" ],
            'quantity'    => [ 'nullable', "numeric", "min:1" ],
            'categories'  => [ 'required', "exists:App\Models\Category,id" ],
        ];
    }
}
