<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //
    public function viewCart(Request $request){
        $user = $request->user();
        $cart = Cart::where('user_id', $user->id)->first;
        return view('viewcart')->with(compact($cart));
    }

    public function addItem(Request $request)
    {
        $product = Item_Details::where('id', $request->route('product_id'))->first();
        // $attributes = array(
        //     'CQuantity' => 'quantity'
        // );
        // $rules = array(
        //     'quantity' => 'required|min: 1|max: '.$product->stock
        // );
        // $message = [
        //     'min' => 'Quantity must be more than 0',
        //     'max' => 'Quantity can not exceed the available stock',
        //     'required' => 'Quantity must be filled'
        // ];
        // $validated = Validator::make($request->all(), $rules, $message, $attributes);
        // if ($validated->fails()) {
        //     usleep(1000 * 1000 - 100000);
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }
        // else {
            // DB::insert(
            //     'insert into carts (user_id) values (?)',
            //     [
            //         Auth::user()->id
            //     ]
            // );
            // DB::insert(
            //     'insert into cart_details (item_id, quantity) values (?)',
            //     [
            //         $product->id,
            //         $request->quantity
            //     ]
            // );
            // return redirect()->back()->withErrors($request->quantity)->withInput();
        // }
        $request->validate([
            'quantity'=>'required'
        ]);
        $validate = Validator::make($request->all(),[
            'quantity'=>'required|min:1|max:'.$product->id,
        ],
        [
            'quantity.required'=> 'Quantity must be filled.',
            'quantity.min' => 'Quantity must at least one.',
            'quantity.max' => 'Quantity must not exceed available stock'
        ]
        );
        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }
    }
}
