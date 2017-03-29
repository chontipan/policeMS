<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\AddressOriginal;
use App\Models\AddressPresent;
use App\Models\CriminalHistory;
use App\Models\DataCase;
use App\Models\DataFather;
use App\Models\DataMother;
use App\Models\DataSpouse;
use \Hash;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use \Input;

class CasePersonApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($caseId)
    {

        return DataCase::find($caseId)->criminalhistory()->get();
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


        $Idperson = Input::get('id');
        $case = DataCase::find($caseId);
        $person = CriminalHistory::find($Idperson);

        if ($case) {
            try{
                $case->criminalhistory()->attach($person->id);
                return $case;
            }catch (\Exception $ex){
                return response()->json([
                    'error' => true,
                    'message' =>'You add same person.'
                    ],400);
            }

        } else {
            return null;
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return DataCase::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return DataCase::find($id);
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
    public function destroy($caseId,$personId)
    {

        /* @var Datacase $case */
        $case = DataCase::find($caseId);
        $person = CriminalHistory::find($personId);

        if ($person) {
            $case->criminalhistory()->detach($person->id);
            return $case;
        } else {
            return null;
        }

    }



}
