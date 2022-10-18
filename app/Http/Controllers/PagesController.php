<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
        return view('core_page/home');
    }
    public function loginCredential(Request $request)
    {
        // $data = $request->safe()->only(['email', 'password']);
        $rules = array(
            'email' => 'required',
            'password' => 'required|max:20|min:5'
        );
        $messages = [
            'required' => ':attribute could not be empty',
            'min' => 'size must be more than 5',
            'max' => 'size must be less than 20'
        ];
        // $validated =
        $validated = Validator::make($request->all(), $rules, $messages);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            if (Auth::attempt()) {
            }
        }
        sleep(2);
        echo "<script>window.location.href = '/home';</script>";
    }
}
