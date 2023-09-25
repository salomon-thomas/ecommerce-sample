<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Auth\AuthenticatesUsers;

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

    public function login(Request $request)
    {
        $session_id = request()->session()->getId();
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();

            // Retrieve cart items associated with the session ID
            $sessionCartItems = Carts::where('session_id', $session_id)->get();

            // Update the user ID for each cart item and remove the session ID
            foreach ($sessionCartItems as $cartItem) {
                $existingEntry = Carts::where('user_id', $user->id)->where('product_variant_id', $cartItem->product_variant_id)->exists();
                if ($existingEntry) {
                    $existing = Carts::where('user_id', $user->id)->where('product_variant_id', $cartItem->product_variant_id)->get()->first();
                    $cartItem->units = $cartItem->units + $existing->units;
                    $existing->destroy();
                }
                $cartItem->user_id = $user->id;
                $cartItem->session_id = null; // Remove the session ID
                $cartItem->save();
            }


            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        Auth::logout();
        return redirect('/');
    }
}
