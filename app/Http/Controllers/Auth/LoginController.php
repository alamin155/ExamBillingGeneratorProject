<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Default redirect (not used since we override login)
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login
        if (auth()->attempt($credentials)) {

            $user = auth()->user();

            // Admin check
            if ($user->is_admin == 1) {
                return redirect()->route('admin.home'); // Admin route
            }

            // Regular user verification check
            if ($user->status == 0) {
                auth()->logout();
                return redirect()->route('login')
                    ->with('error', 'Verification Pending!');
            }

            // Verified regular user
            return redirect()->route('login'); // Regular user home

        } else {
            // Login failed
            return redirect()->route('login')
                ->with('error', 'Email and Password are Wrong!');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
