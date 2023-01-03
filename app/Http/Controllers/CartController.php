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
            'quantity' => 'required|numeric|min: 1|max: ' . $product->stock
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
                if (CartDetail::where(
                    'user_id',
                    Auth::id()
                )->where(
                    'transaction_id',
                    Auth::user()->number_of_transaction + 1
                )->get()[0]->item_id == $product_id) {
                    $qty = CartDetail::where(
                        'user_id',
                        Auth::id()
                    )->where(
                        'transaction_id',
                        Auth::user()->number_of_transaction + 1
                    )->get();

                    CartDetail::where(
                        'user_id',
                        Auth::id()
                    )->where('transaction_id', Auth::user()->number_of_transaction + 1)->update([
                        'quantity' => $qty[0]->quantity + $request->quantity
                    ]);
                } else {
                    $insert = new CartDetail;
                    $insert->user_id = Auth::id();
                    $insert->transaction_id = Auth::user()->number_of_transaction + 1;
                    $insert->item_id = $product_id;
                    $insert->quantity = $request->quantity;
                    $insert->save();
                }
            }
            return redirect()->to('home');
        }
    }

    public function fetchData()
    {
        $cart = CartDetail::where('user_id', Auth::id())->where(
            'transaction_id',
            Auth::user()->number_of_transaction + 1
        )->get();
        $count = CartDetail::where('user_id', Auth::id())->where(
            'transaction_id',
            Auth::user()->number_of_transaction + 1
        )->sum('quantity');
        $total = 0;
        foreach ($cart as $clothes) {
            $total = $total + ($clothes->quantity * $clothes->item->price);
        }
        return view('core_page.viewcart')->with(compact('cart'))->with(compact('total'))->with(compact('count'));
    }

    public function updatecart(Request $request, $product_id){
        $product = itemdetail::where('id', $product_id)->first();
        $attributes = array(
            'quantity' => 'Quantity'
        );
        $rules = array(
            'quantity' => 'required|numeric|min: 1|max: ' . $product->stock
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
            $cart = CartDetail::where(
                'user_id',
                Auth::id()
            )->where(
                'transaction_id',
                Auth::user()->number_of_transaction + 1
            )->where(
                'item_id',
                $product_id
            )->update([
                'quantity' => $request->quantity
            ]);
            return redirect()->to('viewcart');
        }
    }

    public function deletecart(Request $request, $product_id){
        CartDetail::where('item_id', $product_id)->delete();
        return redirect('/viewcart');
    }

    // public function eraseData()
    // {
    //     CartDetail::where('user_id', Auth::id())->where(
    //         'transaction_id',
    //         Auth::user()->number_of_transaction + 1
    //     )->delete();
    //     return redirect()->to('/history');
    // }
}
