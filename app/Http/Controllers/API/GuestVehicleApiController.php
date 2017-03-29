<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\AddressOriginal;
use App\Models\AddressPresent;
use App\Models\CriminalHistory;
use App\Models\DataCase;
use App\Models\DataChild;
use App\Models\DataFather;
use App\Models\DataMother;
use App\Models\DataSpouse;
use App\Models\GuestHistory;
use App\Models\Vehicle;
use \Hash;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use \Input;
use Symfony\Component\VarDumper\Cloner\Data;

class GuestVehicleApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($personId)
    {

        return GuestHistory::find($personId)->vehicle()->get();
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
    public function store($personId)
    {

        $person = GuestHistory::find($personId);

        if ($person) {

            $vehicle = new Vehicle();
            $vehicle->fill(Input::all());
            $vehicle->guesthistory()->associate($person);
            $vehicle->save();

        } else {
            return null;
        }

        return $person;





    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return GuestHistory::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return GuestHistory::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($personId,$vehicleId)
    {


        $person = GuestHistory::find($personId);

        if ($vehicleId) {
            $vehicle = Vehicle::find($vehicleId)->delete();
            return $person;
        } else {
            return null;
        }


    }



}
