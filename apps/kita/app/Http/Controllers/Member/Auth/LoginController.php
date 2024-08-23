<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
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

    use AuthenticatesUsers, ThrottlesLogins;

    protected $maxAttempts = 3;

    //ロックアウト時間
    protected $decayMinutes = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Redirect the user after authentication.
     *
     * @param \Illuminate\Http\Request $request The current request instance.
     *
     * @return \Illuminate\Http\RedirectResponse Redirects to the intended URL or '/articles'.
     */
    protected function authenticated(Request $request)
    {
        return redirect('/articles');
    }

    /**
     * Handle an incoming login request.
     *
     * Validates the login request, checks for throttling, attempts authentication,
     * and handles successful or failed login responses. Manages session and lockout logic.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing login credentials.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *         Redirects on success or returns a response for lockout or failure.
     *
     * @throws \Illuminate\Validation\ValidationException If validation fails.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        //maxAttempts直後からロックアウト開始
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the throttle key for login attempts.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     *
     * @return string The throttle key, the client's IP address.
     */
    protected function throttleKey(Request $request)
    {
        return $request->ip();
    }

    /**
     * Log the user out and redirect or return a JSON response.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        //遷移先は/login
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }
}
