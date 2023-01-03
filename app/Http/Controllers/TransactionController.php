<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Itemdetail;
use App\Models\TransactionDetail;
use App\Models\usercredential;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //

    public function history()
    {
        $tran = TransactionDetail::where('user_id', Auth::id())->get();
        $cart = CartDetail::where('user_id', Auth::id())->get();
        return view('core_page.history')->with(compact('tran'))->with(compact('cart'));
    }
    public function saveData()
    {
        $cart = CartDetail::where('user_id', Auth::id())->where(
            'transaction_id',
            Auth::user()->number_of_transaction + 1
        )->get();
        $total = 0;
        foreach ($cart as $clothes) {
            $total = $total + ($clothes->quantity * $clothes->item->price);
        }
        $insert = new TransactionDetail();
        $insert->user_id = Auth::id();
        $insert->transaction_id = Auth::user()->number_of_transaction + 1;
        $insert->date = Carbon::now()->format('d-m-Y');
        $insert->total = $total;
        $insert->save();
        $checkTransaction = usercredential::find(Auth::id())->get()[0]->number_of_transaction;
        $update = usercredential::find(Auth::id());
        $update->number_of_transaction = $checkTransaction + 1;
        $update->save();
        return redirect('/history');
    }
}
