<?php

namespace App\Http\Requests;

use App\Models\Attributes\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can(config('permission.access.categories.publish'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $brandId = $this->route( 'brand' )->id;
        return [
            'name' => ['required', 'string', 'min:2', 'max:50', Rule::unique( Brand::class, 'name' )->ignore( $brandId )],
            'description' => ['nullable', 'string'],
            'country' => ['required'],
        ];
    }
}
