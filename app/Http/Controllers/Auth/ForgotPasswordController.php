<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * The proper Guard for this controller
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     */
    public function guard()
    {
        return Auth::guard('front');
    }

    /** @inheritdoc */
    public function broker()
    {
        return Password::broker('front');
    }

    /** @inheritdoc */
    protected function sendResetLinkResponse($response)
    {
        return response()->json(['status' => trans($response)], 200);
    }

    /** @inheritdoc */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['errors' => ['email' => trans($response)]], 422);
    }
}
