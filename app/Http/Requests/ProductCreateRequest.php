<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:5|max:20',
            'category' => 'required|min:5|max:50',
            'price' => 'required|integer',
            'brand' => 'required|min:5|max:25',
            'description_title' => 'required|min:5|max:255',
            'description_product' => 'required|min:5',
            'quantity' => 'required|integer',
            'color' => 'required|min:4|max:20',
        ];
    }
}
