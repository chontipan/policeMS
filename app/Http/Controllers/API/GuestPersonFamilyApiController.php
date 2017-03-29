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
use App\Models\PersonFamily;
use \Hash;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use \Input;
use Symfony\Component\VarDumper\Cloner\Data;

class GuestPersonFamilyApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($personId)
    {

        return GuestHistory::find($personId)->personfamily()->get();
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

            $personfamily = new PersonFamily();
            $personfamily->fill(Input::all());
            $personfamily->guesthistory()->associate($person);
            $personfamily->save();

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
    public function destroy($personId,$personFamilyId)
    {


        $person = GuestHistory::find($personId);

        if ($personFamilyId) {
            $personFamily = PersonFamily::find($personFamilyId)->delete();
            return $person;
        } else {
            return null;
        }


    }



}
