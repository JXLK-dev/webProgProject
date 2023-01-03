<?php

namespace App\Http\Controllers;

use App\Models\Item_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ItemDetails;

use function PHPUnit\Framework\isNull;

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
            'CName' => 'required|min: 5|max: 20|unique:item_details,name',
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
            'CStock.min' => 'Stock must be at least 1',
            'CImage.required' => 'Image required'
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $ext = $request->file('CImage')->extension();
            Storage::putFileAs('/public/images', $request->CImage, $request->CName . "_image_" . $ext);
            Item_Details::insert([
                'name' => $request->CName,
                'description' => $request->CDesc,
                'price' =>  $request->CPrice,
                'stock' => $request->CStock,
                'image' => 'storage/images/' . $request->CName . '_image_' . $ext
            ]);
            return redirect()->back()->with('success', 'Item added successfully.');
        }
    }

    public function viewcart(){
        return view('core_page.viewcart');
    }

    public function addToCart(Request $request){
        $id = $request->route('product_id');
        $qty = $request->quantity;
        $product = Item_Details::where('id', $id)->first();
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->where('item_id', $id)->first();
        if(isNull($cart)){
            Cart::insert([
                'user_id' => $user_id,
                'item_id' => $id,
                'quantity' => $qty
            ]);
        }
        else{
            Cart::where('user_id', $user_id)->where('item_id', $id)->first()->update([
                'quantity' => $cart->quantity+$qty
            ]);
        }
        return redirect()->back()->with('success', 'Added to cart');
    }

    public function delete(Request $request){
        $id = $request->route('item_id');

        Item_Details::where('id', '=', $id)->delete();

        return redirect('/home');
    }
}
