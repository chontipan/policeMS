<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CaseDeleteRequest;


use App\Models\DataCase;
use App\Models\Vehicle;
use App\Models\Weapon;
use \Hash;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;

class CaseApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return DataCase::with('vehicle','weapon','criminalhistory')->get();
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
    public function store()
    {
        //  return Input::all();
        $datacase = new DataCase();
        $datacase->fill(Input::except(["weapon", "vehicle"]));
        $datacase->save();


        $data_vehicle = Input::get('vehicle');
        $data_weapon = Input::get('weapon');


        foreach ($data_vehicle as $datavehicle) {
            $vechicle = new Vehicle();
            $vechicle->fill($datavehicle);
            $vechicle->datacase()->associate($datacase);
            $vechicle->save();
        }

        foreach ($data_weapon as $dataweapon) {
            $weapom = new Weapon();
            $weapom->fill($dataweapon);
            $weapom->datacase()->associate($datacase);
            $weapom->save();
        }

        return $datacase;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return DataCase::with('vehicle','weapon','criminalhistory','criminalhistory.dataspouse','criminalhistory.dataspouse'
            ,'criminalhistory.addresspresent','criminalhistory.addressoriginal'
            ,'criminalhistory.datamother' ,'criminalhistory.addressoffice','criminalhistory.datafather'
            ,'criminalhistory.datachild','criminalhistory.datacase')->find($id);

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
        $datacase = DataCase::find($id);
        $datacase->fill(Input::except(["weapon", "vehicle"]));
        $datacase->save();
        return $datacase;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        return $id;

    }

    public function saveNumberCase($id)
    {
        $number_case = Input::get('number_case');
        $year_number_case = Input::get('year_number_case');
        $station_number_case = Input::get('station_number_case');
        $datacase = DataCase::find($id);
        $datacase->number_case = $number_case;
        $datacase->year_number_case = $year_number_case;
        $datacase->station_number_case = $station_number_case;
        $datacase->save();
        return $datacase;


    }




    public function generatedPdfCase($id)
    {
        $datacase = DataCase::with('vehicle','weapon','criminalhistory','criminalhistory.dataspouse','criminalhistory.dataspouse'
           ,'criminalhistory.addresspresent','criminalhistory.addressoriginal'
            ,'criminalhistory.datamother' ,'criminalhistory.addressoffice','criminalhistory.datafather'
            ,'criminalhistory.datachild','criminalhistory.datacase')->find($id);
        //return $datacase;
        $dataperson =  DataCase::find($id)->criminalhistory()->with('datacase')->get();




       //return $dataperson;
//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดกระดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);

        //return $datacase;
        $pdf = \App::make('mpdf.wrapper',['th','A4-L','','',20,15,20,25,10,10,]);
        $pdf->setTitle("export");

       //$pdf->SetHeader('|{PAGENO}/{nbpg}|สำนักงานตำรวจตรวจคนเข้าเมือง จังหวัด เชียงราย');

       // $pdf->SetFooter('พิมพ์เมื่อ วัน {DATE D} ที่ {DATE j-m-Y} เวลา {DATE H:i:s}  ');

        $pdf->SetHeader('
        <table width="100%" style="vertical-align: bottom; font-family: TH SarabunPSK; font-size: 14pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
        <td width="20%"></td>
        <td width="30%" style="text-align: right; ">{PAGENO}</td>
        <td width="55%" style="text-align: right; "> ตรวจคนเข้าเมืองจังหวัดเชียงราย</td>
        </tr></table>
        ');
        $pdf->SetFooter('
        <table width="100%" style="vertical-align: bottom; font-family: garuda; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
        <td width="33%"></td>
        <td width="33%"></td>
        <td width="55%" style="text-align: right; ">พิมพ์เมื่อ {DATE D} ที่ {DATE j-m-Y} เวลา {DATE H:i:s}  </td>
        </tr></table>
        ');


        $pdf->SetWatermarkText("");

        $pdf->SetDisplayMode('fullpage');

        $html1 = view('PDF.summary')->with('datacase',$datacase)->render();
        $pdf->WriteHTML($html1);

//
//        $pdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">My document</div>');
//
//        $pdf->SetHTMLFooter('
//        <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
//        <td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
//        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
//        <td width="33%" style="text-align: right; ">My document</td>
//        </tr></table>
//        ');

        foreach ($dataperson as $person) {

            $pdf->AddPage('P');
            $html = view('PDF.person')->with('datacase',$datacase)->with('dataperson',$person)->render();

            $pdf->WriteHTML($html);
        }
        $pdf->stream();

    }


    public function saveCaseFile($id)
    {

        $file = DataCase::find($id);
        $uuid = Uuid::uuid4();
        $public_path= "/file/case/$id/";
        $destination_path = public_path($public_path);

        //$jpg = ".jpg";
        $ext = Input::file('file')->getClientOriginalExtension();



        Input::file('file')->move($destination_path,"$uuid.$ext");


        $file->file_case = "/file/case/$id/$uuid.$ext";
        $file->save();
        return $file;

    }


    public function deleteCasePerson($caseId)
    {

        $data_person = Input::all();
        $case = DataCase::find($caseId);

        if($data_person){
            foreach ($data_person as $person) {
                if ($person) {
                    $case->criminalhistory()->detach($person->id);
                    if($caseId){
                        DataCase::find($caseId)->delete();
                        return $case;
                    }

                } else {
                    return null;
                }

            }
        }else{
            if($caseId){
                DataCase::find($caseId)->delete();
                return $case;
            }
        }



    }


}
