<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AddressOffice;
use App\Models\AddressOriginal;
use App\Models\AddressPresent;
use App\Models\CriminalHistory;
use App\Models\DataCase;
use App\Models\DataChild;
use App\Models\DataFather;
use App\Models\DataMother;
use App\Models\DataSpouse;
use App\Models\GuestHistory;
use App\Models\Profile;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use \Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;

class CaseVehicleApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($caseId)
	{


        $case = DataCase::find($caseId);

        if ($case) {

            $vechicle = new Vehicle();
            $vechicle->fill(Input::all());
            $vechicle->datacase()->associate($case);
            $vechicle->save();

        } else {
            return null;
        }



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($caseId,$vehicleId)
	{


        $datacase = DataCase::find($caseId);

        if ($vehicleId) {
            $vehicle = Vehicle::find($vehicleId)->delete();
            return $datacase;
        } else {
            return null;
        }



    }






}
