<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cases;
use App\Models\Sex;
use App\Models\Status;
use App\Models\Type;
use App\Models\TypePeople;
use \Input;
class CaseController extends Controller {



    public function index()
    {

        return View('datacase.main');
    }





}
