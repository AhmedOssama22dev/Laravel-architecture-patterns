<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class OrderRequest extends Request
{
    public function rules()
    {
        return [
            'customerId' => 'required|integer',
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'customerId.required' => 'Customer ID is required',
            'customerId.integer' => 'Customer ID must be an integer',
            'products.required' => 'Products are required',
            'products.array' => 'Products must be an array',
            'products.*.id.required' => 'Product ID is required',
            'products.*.id.integer' => 'Product ID must be an integer',
            'products.*.quantity.required' => 'Product quantity is required',
            'products.*.quantity.integer' => 'Product quantity must be an integer',
        ];
    }
}