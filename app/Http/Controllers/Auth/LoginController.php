<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        $data = $request->validate([
        'email'=>'required|email',
        'password'=>'required',
        ]);
        if(FacadesAuth::attempt($data, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect(RouteServiceProvider::HOME)->with([
            'status'=>'credenciais inválidas'
        ]);

    }
    public function destroy(Request $request){

        $request->session()->invalidate();
        FacadesAuth::logout();
        return back();
    }
}
