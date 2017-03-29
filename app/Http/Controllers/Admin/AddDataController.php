<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cases;
use App\Models\Rank;
use \Input;
class AddDataController extends Controller {

    public function AddCase()
    {
        $case = new Cases();
        $case->fill(Input::except(['_token']));

        $case->save();
        return $case;

    }



}
