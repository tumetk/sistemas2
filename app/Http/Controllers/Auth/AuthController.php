<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Request; 
use App\Services\AuthService;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->service = new AuthService();
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin() {
        $data = [
            'email'    => Request::input('email'),
            'password' => Request::input('password')
        ];
        if ($this->service->authenticate($data))
            return redirect()->route('productos');
        else 
            return redirect()->back()->with('status', trans('messages.login'));
    }
}
