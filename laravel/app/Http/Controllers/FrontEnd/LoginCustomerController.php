<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCustomerController extends  Controller
{
    public function __construct()
    {

    }
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('');
        } else {
            return view('frontend.login.loginandregister');
        }
    }
    public function postLogin(request $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'status'    =>1,
            'level'=>0
        ];
        if (Auth::attempt($login)) {
            return redirect('')->with('name',Auth::User()->name);
        } else {
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('frontend.login.loginandregister');
    }
}
?>
