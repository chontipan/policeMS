<?php namespace App\Http\Controllers\Admin;
use \Auth;
use App\Http\Controllers\Controller;


use App\Models\Policeimmigration;
use App\Models\Position;
use App\Models\Rank;
use \Input;
class ProfilePoliceController extends Controller {


    public function index()
    {
        return View('police.profilePolice');
    }

    public function getProfile(){
        $id = Auth::user()->id;
        $user = Policeimmigration::with('rank','position','role')->where('id',$id)->first();
        if($user) {
            return $user;
        }
        return response()->json([
            'error' => true,
            'message' =>'ข้อมูลไม่ถูกต้อง!!'
        ],401);

    }

}
