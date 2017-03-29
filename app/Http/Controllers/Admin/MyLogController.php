<?php namespace App\Http\Controllers\Admin;
use App\Models\MyLog;
use \Auth;
use App\Http\Controllers\Controller;


use App\Models\Policeimmigration;
use App\Models\Position;
use App\Models\Rank;
use Illuminate\Support\Facades\DB;
use \Input;
class MyLogController extends Controller {


    public function index()
    {
        return View('mylog.main');
    }

    public function getMyLog(){


        $users = DB::table('mylog')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return $users;

    }

}
