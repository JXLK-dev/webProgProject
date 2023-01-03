<?php

namespace App\Http\Controllers;

use App\Models\Item_Details;
use App\Models\Itemdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubPageController extends Controller
{
    //
    public function item_details(Request $request)
    {
        $id = $request->route('product_id');
        $item = Itemdetail::where('id', $id)->first();
        return view('core_page/subhomecontent/itemdetails')->with(compact('item'));
    }
}
