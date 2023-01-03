<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\itemdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ItemDetails;

use function PHPUnit\Framework\isNull;

class ItemController extends Controller
{
    //
    // public function setAttributeNames(array $attributes)
    // {
    //     $this->customAttributes = $attributes;

    //     return $this;
    // }
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
            'CStock.min' => 'Stock must be at least 1',
            'CImage.required' => 'Image required'
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $ext = $request->file('CImage')->extension();
            Storage::putFileAs('/public/images', $request->CImage, str_replace(' ', '', $request->CName) . "_image_" . $ext);
            $itemdetails = new itemdetail;
            $itemdetails->name = $request->CName;
            $itemdetails->description = $request->CDesc;
            $itemdetails->price = $request->CPrice;
            $itemdetails->stock = $request->CStock;
            $itemdetails->image = 'storage/images/'  . str_replace(' ', '', $request->CName) . '_image_' . $ext;
            $itemdetails->save();
            return redirect()->back();
        }
    }

    public function viewCart(Request $request)
    {
        $user = $request->user();
        $cart_details = $user::find($user->id)->cart->cart_details->all();
        // $item = itemdetail::whereBelongsTo($cart_details)->get();
        $items = array();
        foreach ($cart_details as $cd) {
            array_push($items,itemdetail::where('id', $cd->item_id)->first());
        }
        // $itemsvariable = $items;
        return view('core_page/viewcart')->with(compact('cart_details'))->with(compact('items'));
    }

    public function addToCart(Request $request)
    {
        $id = $request->route('product_id');
        $qty = $request->quantity;
        $product = itemdetail::where('id', $id)->first();
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->where('item_id', $id)->first();
        if (isNull($cart)) {
            Cart::insert([
                'user_id' => $user_id,
                'item_id' => $id,
                'quantity' => $qty
            ]);
        } else {
            Cart::where('user_id', $user_id)->where('item_id', $id)->first()->update([
                'quantity' => $cart->quantity + $qty
            ]);
        }
        return redirect()->back()->with('success', 'Added to cart');
    }

    public function delete(Request $request)
    {
        $id = $request->route('item_id');

        itemdetail::where('id', '=', $id)->delete();

        return redirect('/home');
    }
}
