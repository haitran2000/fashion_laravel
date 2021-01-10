<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCustomerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            if ($user->status==1 )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect()->route('getLoginCus');
            }
        } else
            return redirect('login');
    }
}
