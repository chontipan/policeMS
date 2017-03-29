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
use Illuminate\Http\Request;
use \Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;
use Servit\Mpdf\Facades\Pdf;

class StatisticsApiController extends Controller {

    public function searchDataCase()
    {


        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');

       // return $start_date;
        $datacase = DataCase::with('criminalhistory','criminalhistory.nametitle')
            ->whereBetween('date_case', [$start_date, $end_date])
            ->get();

        $person = CriminalHistory::with('datacase','nametitle')
            ->whereBetween('date', [$start_date, $end_date])
            ->get();


        $person_general = GuestHistory::with('nametitle')
        ->whereBetween('date', [$start_date, $end_date])
            ->get();



        $data = [$person,$person_general,$datacase];






        return $data;



    }
    public function printDataCase()
    {
        return "asdasdasdasd";





    }





}
