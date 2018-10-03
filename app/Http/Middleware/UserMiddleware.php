<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $id_level)
    {

        //logika pertama //hanya satu role atau satu level akses
        /*if (auth()->guard('user')->check() && !auth()->guard('user')->user()->role($id_level))
        {
            return redirect()->route('login');
        }
        return $next($request);*/

        if (!auth()->guard('user')->check()){ //untuk mengecek auth dengan guard user
            return redirect('login');// jika auth tidak benar makan kel login //value true
        }
        $user = auth()->guard('user')->user();// deklarasi auth dengan guard user

       if($user->role())//jika role benar hanya satu
           return $next($request);//lajut request

        foreach($id_level as $role) { //perulangan jika role banyak atau lebih dari satu
            if($user->role($role))
                return $next($request);//lajut request
        }
        return redirect('login');
    }
}
