<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id)->load('profile');

        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // just in case
        if ($id !== __user()->id) {
            return response()->json('unauthorized', 401);
        }

        $data = array_except($request->all(), ['_method']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateRequest()
    {
        $inputs = array_except(request()->input(), ['_method', '_token']);
        $rules = [];

        foreach ($inputs as $input => $val) {
            if (! ($input == 'bio' && is_null($val))) {
                $rules[$input] = $this->getRules($input);
            }
        }

        $this->validate($this->request, $rules);

        return $this;
    }

    protected function getRules($field)
    {
        $rules = [
            'first_name'  => [
                'required',
                'min:1',
                'max:30',
                'regex:/^[\pL\s.-]+$/u',
            ],
            'last_name'  => [
                'required',
                'min:1',
                'max:30',
                'regex:/^[\pL\s.-]+$/u',
            ],
            'old_email' => [
                'required',
                'email',
                "exists:users,email",
                'different:email',
            ],
            'email_confirmation' => [
                'same:email'
            ],
            'email' => [
                'required',
                'confirmed',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6',
            ],
            'old_password' => [
                'required',
                'min:6',
                'hash:' . __user()->password
            ],
            'password_confirmation' => [
                'same:password'
            ],
            'bio'   => [
                'max:255',
                'regex:/^[\pL\pN\s"_.,#:;@?!\/*+-]+$/u',
            ],
        ];
        return $rules[$field];
    }
}
