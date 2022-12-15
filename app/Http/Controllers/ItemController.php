<?php

namespace App\Http\Controllers;

use App\Models\itemdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            'CImage' => 'Photo'
        );
        $rules = array(
            'CName' => 'required|min: 5|max: 20|unique:itemdetails,name',
            'CDesc' => 'required|min: 5',
            'CPrice' => 'required|integer|min: 1000',
            'CStock' => 'required|integer|min: 1',
            'CImage' => 'required|mimes: jpeg,jpg,png'
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
            $ext = $request->file('CImage')->extension();
            Storage::putFileAs('/public/images', $request->CImage, $request->CName . "_image_." . $ext);
            $itemdetails = new itemdetail;
            $itemdetails->name = $request->CName;
            $itemdetails->description = $request->CDesc;
            $itemdetails->price = $request->CPrice;
            $itemdetails->stock = $request->CStock;
            $itemdetails->image = 'storage/images/'  . $request->CName . '_image_.' . $ext;
            $itemdetails->save();
            return redirect()->back();
        }
    }
}
