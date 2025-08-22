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
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {

        //var_dump(auth()->user()->status);die(0);
        if (auth()->user()->status == 0) 
        {
           auth()->logout();
           //print(5);die(0);
            return redirect()->route('login')
            ->with('error', 'Verification Pendingl!');
        }
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login');  // redirect to the regular user home
        }
    } else {
        return redirect()->route('login')
            ->with('error', 'Email and Password are Wrong!');
    }
}

}
