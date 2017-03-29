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
use \Hash;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use \Input;
use Symfony\Component\VarDumper\Cloner\Data;

class GuestChildApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($personId)
    {

        return GuestHistory::find($personId)->datachild()->get();
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

        $person_guest = GuestHistory::find($personId);

        if ($person_guest) {

            $datachild = new DataChild();
            $datachild->fill(Input::all());
            $datachild->guesthistory()->associate($person_guest);
            $datachild->save();

        } else {
            return null;
        }

        return $person_guest;





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
    public function destroy($personId,$childId)
    {


        $person = GuestHistory::find($personId);

        if ($childId) {
            $datachild = DataChild::find($childId)->delete();
            return $person;
        } else {
            return null;
        }


    }



}
