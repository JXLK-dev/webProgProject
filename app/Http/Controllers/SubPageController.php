<?php

namespace App\Http\Controllers;

use App\Models\Item_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubPageController extends Controller
{
    //
<<<<<<< HEAD
    public function itemdetails(Request $request)
=======
    public function item_details($product_id)
>>>>>>> d0a0a86ee0d6f74327a001e913484c6a7acb5f19
    {
        $id = $request->route('product_id');
        $item = Item_Details::where('id', $id)->first();
        return view('core_page/subhomecontent/itemdetails')->with(compact('item'));
    }
}
