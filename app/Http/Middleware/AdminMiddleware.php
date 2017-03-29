<?php namespace App\Http\Middleware;

use App\Models\Policeimmigration;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\AssignedRoles;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware {

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
            if(Auth::user()->role->key == 'admin'){
                return $next($request);
            }
            return redirect()->guest('auth/login')->with('message',"ไม่มีสิทธในการใช้งานส่วนนี้ กรุณาเข้าสู่ระบบใหม่!!!");
        }
        return redirect()->guest('auth/login')->with('message',"กรุณาเข้าสู่ระบบ!!!");

    }
}
