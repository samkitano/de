<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    /** @var Request */
    protected $request;

    /**
     * MyProfileController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @throws \App\Exceptions\UndeterminedUserException
     */
    public function update($id)
    {
        // just in case
        if ($id != __user()->id) {
            return response()->json('unauthorized', 401);
        }

        $this->validateRequest();

        return response()->json(['user' => $this->saveUser()]);
    }

    /**
     * Validate current request
     *
     * @return $this
     * @throws \App\Exceptions\UndeterminedUserException
     */
    protected function validateRequest()
    {
        $inputs = array_except($this->request->input(), ['_method', '_token']);
        $rules = [];

        foreach ($inputs as $input => $val) {
            // exclude bio, if empty
            if (! ($input == 'bio' && is_null($val))) {
                $rules[$input] = $this->getRules($input);
            }
        }

        $this->validate($this->request, $rules);

        return $this;
    }

    /**
     * Validation rules for current request
     *
     * @param $field
     * @return mixed
     * @throws \App\Exceptions\UndeterminedUserException
     */
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
            'nick_name'  => [
                'required',
                'min:1',
                'max:40',
                'regex:/^[\pL\s-]+$/u',
                Rule::unique('users')->ignore(__user()->id),
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

    /**
     * Persist updated user
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null|static|static[]
     * @throws \App\Exceptions\UndeterminedUserException
     */
    protected function saveUser()
    {
        $user = User::find(__user()->id);
        $req = array_except(
            $this->request->input(),
            [
                '_method',
                '_token',
                'old_email',
                'email_confirmation',
                'old_password',
                'password_confirmation',
            ]
        );

        if ($this->request->has('password')) {
            $user->password = bcrypt($req['password']);
        } else {
            $user[key($req)] = $this->request->input(key($req));
        }

        $user->save();

        return $user;
    }
}
