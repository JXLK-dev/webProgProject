<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\itemdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    //


    public function addItem(Request $request)
    {
        $id = $request->route('product_id');
        if (isNull($id)) {
            return redirect()->back()->withErrors($id);
        }
        $product = itemdetail::where('id', $id)->first();
        $attributes = array(
            'CQuantity' => 'quantity'
        );
        $rules = array(
            'quantity' => 'required|min: 1|max: ' . $product->stock
        );
        $message = [
            'min' => 'Quantity must be more than 0',
            'max' => 'Quantity can not exceed the available stock',
            'required' => 'Quantity must be filled'
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            usleep(1000 * 1000 - 100000);
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            if(isNull(Auth::user()->cart)){
                $cart = new Cart;
                $cart->user_id = Auth::id();
            }
            if(isNull(Auth::user()))
            return redirect()->back()->withErrors($request->quantity)->withInput();
        }
        $request->validate([
            'quantity' => 'required'
        ]);
        $validate = Validator::make(
            $request->all(),
            [
                'quantity' => 'required|min:1|max:' . $product->stock,
            ],
            [
                'quantity.required' => 'Quantity must be filled.',
                'quantity.min' => 'Quantity must at least one.',
                'quantity.max' => 'Quantity must not exceed available stock'
            ]
        );
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
    }
}
