<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /** @inheritdoc */
    protected function sendResetResponse($response)
    {
        return response()->json(__user(), 200);
    }

    /** @inheritdoc */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['errors' => ['email' => trans($response)]], 422);
    }
}
