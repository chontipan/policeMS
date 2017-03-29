<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cases;
use App\Models\Sex;
use App\Models\Status;
use App\Models\Type;
use App\Models\TypePeople;
use \Input;
class PersonOneController extends Controller {

    public function indexInsertPreson1()
    {
        $status = Status::all();

        return View('/insert_preson1')->with('status',$status);
    }
    public function indexInsertPreson()
    {
        $typecase = TypePeople::all();
        $case = Cases::all();
        return View('/insert_preson')->with('typecase',$typecase)->with('cases',$case);
    }
    public function indexSearchPreson()
    {
        return View('/search_preson');
    }

    public function indexShowPreson($id)
    {
        return View('/show_preson')->with('id',$id);
    }
    public function generatedPdf($id)
    {
        return View('/show_preson')->with('id',$id);
    }

    public function index()
    {

        return View('person_crime.main');
    }








}
