<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Policeimmigration;
use \Auth;
use Illuminate\Http\Response;
use \Input;
use Symfony\Component\HttpFoundation\Request;

class AuthApiController extends Controller {

    public function getIndex(){
        if(Auth::check()){
            return redirect('/admin/index');
        }else{
            return view('admin.login');
        }
    }

    public function authenticate(LoginRequest $request){

        $username = Input::get('username');
        $password = Input::get('password');

        $credentials = [
            'username' => $username,
            'password' => $password
        ];

        if (Auth::attempt($credentials))
        {
            $user = Auth::user();
            $user->roles;
            return redirect('/police/index');

        }else{
            return redirect()->back()->with('message',"ชื่อผู้ใช้ หรือ รหัสผ่านผิด. \nกรุณาลองอีกครั้ง.");;
        }
    }

    public function unAuthenticate(){
        Auth::logout();
        return redirect('/auth/login');
    }


}
