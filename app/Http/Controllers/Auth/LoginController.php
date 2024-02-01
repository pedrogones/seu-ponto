<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{

    public function _construct(){
        $this->middleware('auth')->only('destroy');
        $this->middleware('guest')->only(['index', 'store']);
    }

    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        $mensagens = [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];
        $data = $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:4',
        ], $mensagens);
        if(FacadesAuth::attempt($data, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return back()->with('errorLogin', 'Credenciais inválidas!');
        }

    }
    public function destroy(Request $request){

        $request->session()->invalidate();
        FacadesAuth::logout();
        return redirect('/');
    }
}
