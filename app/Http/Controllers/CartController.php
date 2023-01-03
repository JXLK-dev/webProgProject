<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\cart_detail;
use App\Models\CartDetail;
use App\Models\itemdetail;
use App\Models\Transaction;
use App\Models\usercredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    //


    public function addItem(Request $request, $product_id)
    {
        $product = itemdetail::where('id', $product_id)->first();
        $attributes = array(
            'quantity' => 'Quantity'
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
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            if (CartDetail::where('user_id', Auth::id())->first() == null) {
                $insert = new CartDetail;
                $insert->user_id = Auth::id();
                $insert->transaction_id = Auth::user()->number_of_transaction + 1;
                $insert->item_id = $product_id;
                $insert->quantity = $request->quantity;
                $insert->save();
            } else {
                $qty = CartDetail::where(
                    'user_id',
                    Auth::id()
                )->where(
                    'transaction_id',
                    Auth::user()->number_of_transaction + 1
                )->get();

                $insertExist = CartDetail::where(
                    'user_id',
                    Auth::id()
                )->where('transaction_id', Auth::user()->number_of_transaction + 1)->update([
                    'quantity' => $qty[0]->quantity + $request->quantity
                ]);
            }
            return redirect()->to('home');
        }
    }
    public function fetchData()
    {
        $cart = CartDetail::where('id', Auth::id())->where(
            'transaction_id',
            Auth::user()->number_of_transaction + 1
        )->get()[0];
        dd($cart);
        return view('core_page.viewcart')->with(compact('cart'));
    }
}
