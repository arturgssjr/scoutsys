<?php

namespace scoutsys\Http\Controllers\Auth;

use Auth;
use Exception;
use scoutsys\Interfaces\UserRepository;
use Illuminate\Http\Request;
use scoutsys\Http\Controllers\Controller;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('guest')->except('logout');
        $this->repository = $repository;
    }

    public function login(Request $request)
    {
        $data = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ];

        try {
            if (env('PASSWORD_HASH')) {
                Auth::attempt($data);
            } else {
                $user = $this->repository->findWhere($data)->first();
                if (!$user)
                    throw new Exception("Credenciais inválidas!!");
                Auth::login($user);
            }

            return redirect()->route('home');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
