<?php

namespace App\Http\Controllers;

use App\Models\usercredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/signin');
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
            Cookie::queue('emailCookie', $request->email, 5);
            Cookie::queue('passwordCookie', $request->password, 5);
        }

        $validated = Validator::make($request->all(), $rules, $messages);
        if ($validated->fails()) {
            usleep(1000 * 1000 - 100000);
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $cred = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (Auth::attempt($cred)) {
                Session::put('session', $cred);
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
            'username' => 'required|max:20|min:5|unique:usercredentials,username',
            'email' => 'required|email:rfc,dns|unique:usercredentials,email',
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
            usleep(1000 * 1000 - 100000);
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $credential = new usercredential;
            $credential->username = $request->username;
            $credential->email = $request->email;
            $credential->password = bcrypt($request->password);
            $credential->phone_number = $request->phone_number;
            $credential->address = $request->address;
            $credential->save();
            sleep(0.2);
            return redirect('/signin');
            // sleep(1);
        }
    }

    public function editprofile(Request $request)
    {
        $attributes = array(
            'username' => 'Username',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address'
        );
        $rules = array(
            'username' => 'required|min: 5|max: 20|unique:usercredentials,username',
            'email' => 'required|min: 5|email|unique:usercredentials,email',
            'phone_number' => 'required|numeric|digits_between:10,13',
            'address' => 'required|min: 5'
        );
        $message = [
            'min' => 'minimum 5 characters',
            'max' => 'maximum 20 characters',
            'required' => ':attribute could not be empty',
            'unique' => ':attribute is already taken'
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $update = usercredential::where('id', Auth::id())->update([
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ]);
            return redirect('profile');
        }
    }

    public function editpassword(Request $request)
    {
        $attributes = array(
            'oldpassword' => 'Old password',
            'newpassword' => 'New Password'
        );
        $rules = array(
            'oldpassword' => 'required|min: 5|max: 20',
            'newpassword' => 'required|min: 5|max: 20',
        );
        $message = [
            'min' => 'minimum 5 characters',
            'max' => 'maximum 20 characters',
            'required' => ':attribute could not be empty',
        ];
        $validated = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            if (Hash::check($request->oldpassword, Auth::user()->password, [])) {
                $update = usercredential::find(Auth::id());
                $update->password = bcrypt($request->newpassword);
                $update->save();
            } else {
                return Redirect::back()->withErrors([
                    'unauthorized' => 'Password does not match'
                ]);
            }
            return redirect('profile');
        }
        // return redirect()->back();
    }
}
