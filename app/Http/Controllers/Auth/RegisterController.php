<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'digits:10' ],
            'address' => ['required', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg', 'max:4096'],
            'hindi_name' => ['required', 'string', 'max:300'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $profileUpload = request()->file('image');
        $profilePicName = time() . '.' . $profileUpload->getClientOriginalExtension();
        $avatarPath = public_path('/images/');
        $profileUpload->move($avatarPath, $profilePicName);
        Session::flash('success', 'Registration Successful, you are ready to rock !');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'image' => '/images/' . $profilePicName,
            'hindi_name' => $data['hindi_name'],
            'password' => Hash::make($data['password']),
        ]);

    }

    public function refreshCaptcha()
    {
        return captcha_img('flat');
    }

}


