<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    public function history()
    {
        // $transactions = Auth::user()->find(Auth::id())->transaction->all();
        // $transactiondetails = TransactionDetail::where('id', $transactions->id);
        // return view('core_page/history')->with(compact('transactiondetails'));
        return view('core_page.history');
    }
}
