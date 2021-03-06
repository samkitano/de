<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'first_name' => 'required|string|min:1|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nick_name' => $this->createNickName($data),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createNickName($data)
    {
        $full = $data['first_name'].' '.$data['last_name'];
        $names = explode(' ', $full);
        $try = '';

        for ($i = 0; $i < sizeof($names) - 1; $i++) {
            $try .= $names[$i][0];
        }

        $try .= end($names);

        $found = User::whereNickName($try)->count();

        if (! $found) {
            return $try;
        }

        $try = $names[0];

        for ($i = 1; $i < sizeof($names); $i++) {
            $try .= $names[$i][0];
        }

        $found = User::whereNickName($try)->count();

        if (! $found) {
            return $try;
        }

        return $try.'-'.str_random(6);
    }
}
