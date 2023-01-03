<?php

namespace App\Http\Controllers;

use App\Models\itemdetail;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\usercredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function signIn()
    {
        return view('Login_authentication/signin');
    }
    public function register()
    {
        return view('Login_authentication/register');
    }
    public function Home()
    {
        $itemdetails = itemdetail::paginate(8);
        return view('core_page/home', ['itemdetails' => $itemdetails]);
    }
    public function Search(Request $request)
    {
        $searchquery = $request->searchquery;
        $itemdetails = itemdetail::where('name', 'LIKE', "%$searchquery%")->paginate(8)->appends(['searchquery' => $searchquery]);
        return view('core_page/search')->with(compact('itemdetails'));
    }
    public function Profile()
    {
        return view('core_page/profile');
    }
    public function additem()
    {
        return view('admin_page.additem');
    }

    public function editprofile(Request $request)
    {
        $id = $request->route('user_id');
        $user = usercredential::where('id', $id)->first();
        return view('core_page/editprofile')->with(compact('user'));
    }

    public function editpassword(Request $request)
    {
        // $id = Auth::id();
        $id = $request->route('user_id');
        $user = usercredential::where('id', $id)->first();
        return view('core_page/editpassword')->with(compact('user'));
    }

    public function editcart(Request $request, $product_id)
    {
        $product = itemdetail::where('id', $product_id)->first();
        return view('core_page/editcart')->with(compact('product'));
    }
}
