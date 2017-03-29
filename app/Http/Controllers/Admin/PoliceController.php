<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Position;
use App\Models\Rank;
use \Input;
class PoliceController extends Controller {


    public function index()
    {
        return View('police.main');
    }



}
