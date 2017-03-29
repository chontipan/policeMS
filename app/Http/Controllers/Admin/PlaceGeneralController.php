<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Cases;
use App\Models\Sex;
use App\Models\TypePeople;
use \Input;
class PlaceGeneralController extends Controller {



    public function index()
    {
              return View('place_general.main');
    }



}
