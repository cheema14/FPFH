<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Captcha\Facades\Captcha;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (empty($user->approved_at)) {
            Auth::logout();

            return redirect()
                ->route('login')
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Please verify your email to continue creating your application.']);
        }

        return redirect()->intended($this->redirectTo);
    }

    protected function validateLogin(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // Only validate CAPTCHA if the app is NOT in local environment
        if (! app()->environment('local')) {
            $rules['captcha'] = 'required|captcha';
        }

        $request->validate($rules, [
            'captcha.required' => 'Please enter the CAPTCHA code.',
            'captcha.captcha' => 'The CAPTCHA code you entered is incorrect. Please try again.',
        ]);
    }
}
