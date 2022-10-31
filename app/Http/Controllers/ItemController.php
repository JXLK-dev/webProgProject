<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    //
    public function setAttributeNames(array $attributes)
    {
        $this->customAttributes = $attributes;

        return $this;
    }
    public function addItem(Request $request)
    {
        $attributes = array(
            'CName' => 'Name',
            'CDesc' => 'Description',
            'CPrice' => 'Price',
            'CStock' => 'Stock',
        );
        $rules = array(
            'CName' => 'required|min: 5|max: 20',
            'CDesc' => 'required|min: 5',
            'CPrice' => 'required|integer|min: 1000',
            'CStock' => 'required|integer|min: 1',
        );
        $message = [
            'min' => 'minimum 5 characters',
            'max' => 'maximum 20 characters',
            'required' => ':attribute could not be empty',
            'integer' => 'Field must be filled with numeric',
            'CPrice.min' => 'Price must be at least 1000',
            'CStock.min' => 'Price must be at least 1',
            'CImage.required' => 'Image required'
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            DB::table('item_details')->insert([
                'name' => $request->CName,
                'description' => $request->CDesc,
                'price' => $request->CPrice,
                'stock' => $request->CStock,
            ]);
        }
    }
}
