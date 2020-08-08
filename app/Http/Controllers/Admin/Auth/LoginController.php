<?php

namespace App\Http\Controllers\Admin\Auth;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\Admin\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * {@inheritDoc}
     */
    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->route('admin.dashboard');
    }

    /**
     * {@inheritdoc}
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('admin.login');
    }

    /**
     * {@inheritdoc}
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Get the path the user should be redirected to after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('admin.dashboard');
    }

    /**
     * {@inheritDoc}
     */
    protected function validateLogin(Request $request)
    {
        Validator::make($this->credentials($request), $this->rules(), $this->messages())->validate();
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    private function messages()
    {
        return [
            'email.required' => __('validation.required', [
                'attribute' => __('attributes.email'),
            ]),
            'password.required' => __('validation.required', [
                'attribute' => __('attributes.password'),
            ]),
        ];
    }
}
