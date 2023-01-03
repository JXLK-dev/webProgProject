<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    // public function fetchData()
    // {
    //     $cart = CartDetail::where('user_id', Auth::id())->where(
    //         'transaction_id',
    //         Auth::user()->number_of_transaction + 1
    //     )->get();
    //     return view('core_page.historyt')->with(compact('cart'));
    // }
    public function history()
    {
        // $transactions = Auth::user()->find(Auth::id())->transaction->all();
        // $transactiondetails = TransactionDetail::where('id', $transactions->id);
        // return view('core_page/history')->with(compact('transactiondetails'));
        $tran = TransactionDetail::where('user_id', Auth::id())->get();
        return view('core_page.history')->with(compact('tran'));
    }


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
}
