<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
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

        if ($request->remember) {
            Cookie::queue('emailCookie', $request->email, 10);
        }

        $validated = Validator::make($request->all(), $rules, $messages);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $cred = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (Auth::attempt($cred)) {
                sleep(2);
                echo "<script>window.location.href = '/home';</script>";
            } else {
                return Redirect::back()->withErrors([
                    'unauthorized' => 'Email may not exist or wrong password'
                ]);
            }
        }
    }
    public function registerCredential(Request $request)
    {
        $rules = array(
            'username' => 'required|max:20|min:5|unique:mai_boutiques,username',
            'email' => 'required|email:rfc,dns|unique:mai_boutiques,email',
            'password' => 'required|max:20|min:5',
            'phone_number' => 'required|min:10|max:13',
            'address' => 'required|min:5'

        );
        // for email:rfc,dns requires internet to work
        $messages = [
            'phone_number.min' => 'The phone number must be at least 10 digits',
            'phone_number.max' => 'The phone number must be less than 14 digits',
            'required' => 'The :attribute could not be empty',
            'min' => 'The size must be more than 5',
            'max' => 'The size must be less than 20'
        ];
        $validated = Validator::make($request->all(), $rules, $messages);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            DB::insert(
                'insert into mai_boutiques (username,email,password,phone_number,address, admin) values (?, ?, ?, ?, ?, ?)',
                [$request->username, $request->email, bcrypt($request->password), $request->phone_number, $request->address, false]
            );
        }
    }
}
