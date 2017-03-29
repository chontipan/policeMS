<?php namespace App\Http\Middleware;

use App\Models\Policeimmigration;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\AssignedRoles;
use Illuminate\Support\Facades\Auth;


class MemberMiddleware {

    protected $auth;
    protected $response;

    public function __construct(Guard $auth, ResponseFactory $response){
        $this->auth = $auth;
        $this->response = $response;
    }



    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
    public function handle($request, Closure $next){
        if ($this->auth->check()){
           // return Auth::user()->role->key;
            if( Auth::user()->role->key == 'Member_Commissioned_Officers'
            || Auth::user()->role->key == 'Member_Non-Commissioned_Officer'){
                return $next($request);
            }
            return redirect()->guest('auth/login');
        }
        return redirect()->guest('auth/login')->with('message',"กรุณาเข้าสู่ระบบ");

    }
}
