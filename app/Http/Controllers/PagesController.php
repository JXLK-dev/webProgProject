<?php

namespace App\Http\Controllers;

use App\Models\itemdetail;
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
        $itemdetails = itemdetail::all();
        return view('core_page/home', ['itemdetails' => $itemdetails]);
    }
    public function Search()
    {
        return view('core_page/search');
    }
    public function Cart()
    {
        return view('core_page/cart');
    }
    public function History()
    {
        return view('core_page/history');
    }
    public function Profile()
    {
        return view('core_page/profile');
    }
    public function additem()
    {
        return view('admin_page.additem');
    }
}
