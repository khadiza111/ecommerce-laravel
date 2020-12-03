<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use App\Models\User;
use Auth;
use Socialite;
use Exception;

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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Find User by this email
        $user = User::where('email', $request->email)->first();
        
        if ($user->status == 1) {
            //login this user
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                //log in
                return redirect()->intended(route('index'));
            } else {
                session()->flash('sticky_errors', 'Invalid Login');
                return redirect()->route('login');
            }
        } else {
                //send user a token again
                if (!is_null($user)) {
                    $user->notify(new VerifyRegistration($user));
                    session()->flash('success', 'A new confirmation email has been sent to you!');
                    return redirect('/');
                } else {
                    session()->flash('sticky_errors', 'Please login your account first!');
                    return redirect('login');
                }
        }
    }


    /* For Google Login */
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {   
    
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {

        $user = Socialite::driver('google')->user();

        /*
        * It will try to find a user on database (table users).
        * If it founds out, it will log in automatically.
        * Otherwise, it registers the user and then logs in. 
        */
        $myUser = User::where('email', $user->email)->first();

        if (!$myUser) {
            $myUser = User::create(['email' => $user->email]);
        }

        Auth::login($myUser, true);
        return redirect($this->redirectPath());
    }
}
