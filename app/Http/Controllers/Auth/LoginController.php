<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MaskHelper;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

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
     * Definindo o username do login para CPF
     * @return string
     */
    public function username()
    {
        return 'cpf';
    }

    /**
     * Handle a login request to the application.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('cpf', 'password');
        $credentials['cpf'] = MaskHelper::onlyDigitsField($credentials['cpf']);

        if (Auth::attempt(['cpf' => $credentials['cpf'], 'password' => $credentials['password'], 'ativo' => true])) {
            # Salvando informações na session
            $generalSlug = Auth::user()->papel->general_slug;
            session([
                'general_slug' => $generalSlug,
            ]);

            return redirect()->to('/');

        } else {
            return redirect()->route('login')->withErrors('Credenciais incorretas!');
        }
    }
}
