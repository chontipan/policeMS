<?php namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use \Input;
class SuspectController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

    public function postInsertSuspect()
    {
        print_r(Input::all());
//       // $new = Input::all();
//
//        $model_police = new PoliceImmigration();
//        $model_police->fill(Input::except(['_token']));
//        $model_police->save();

    }


}
