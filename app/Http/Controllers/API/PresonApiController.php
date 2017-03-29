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
use App\Models\Profile;
use Illuminate\Http\Request;
use \Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;

class PresonApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return CriminalHistory::with('datacase','nametitle','addresspresent',
            'addressoriginal','datafather','datamother','dataspouse','datachild','addressoffice','datacase.vehicle','datacase.weapon')->get();
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

        $name_father = Input::get('father_name');
        $surname_father = Input::get('father_surname');
        $name_mother = Input::get('mother_name');
        $surname_mother = Input::get('mother_surname');
        $name_spouse = Input::get('spouse_name');
        $surname_spouse = Input::get('spouse_surname');

        $present_address = Input::get('present_address');

        $original_address = Input::get('original_address');



        if($present_address!=null){
            $addresspresent = new AddressPresent();
            $addresspresent->fill(Input::except(["data_casefile","addressoffice","datachild"]));
            $addresspresent->save();
        }
        if($original_address!=null){
            $addressoriginal = new AddressOriginal();
            $addressoriginal->fill(Input::except(["data_casefile","addressoffice","datachild"]));
            $addressoriginal->save();
        }

        if($name_mother!=null || $surname_mother!=null){
            $datamother = new DataMother();
            $datamother->fill(Input::except(["data_casefile","addressoffice","datachild"]));
            $datamother->save();
        }

        if($name_father!=null || $surname_father!=null){
            $datafather = new DataFather();
            $datafather->fill(Input::except(["data_casefile","addressoffice","datachild"]));
            $datafather->save();
        }

        if($name_spouse!=null || $surname_spouse!=null){
            $dataspouse = new DataSpouse();
            $dataspouse->fill(Input::except(["data_casefile","addressoffice","datachild"]));
            $dataspouse->save();
        }



        $criminalhistory = new CriminalHistory();
        $criminalhistory->fill(Input::except(["data_casefile","addressoffice","datachild"]));

        if($datamother!=null){
            $criminalhistory->datamother()->associate($datamother);
        }

        if($datafather!=null){
            $criminalhistory->datafather()->associate($datafather);
        }

        if($dataspouse!=null){
            $criminalhistory->dataspouse()->associate($dataspouse);
        }
        if($addressoriginal!=null){
            $criminalhistory->addressoriginal()->associate($addressoriginal);
        }
        if($addresspresent!=null){
            $criminalhistory->addresspresent()->associate($addresspresent);
        }
        $criminalhistory->save();


        $addressoffice = Input::get('addressoffice');
        $datachild = Input::get('datachild');

        foreach ($addressoffice as $data_office) {
            $office = new AddressOffice();
            $office->fill($data_office);
            $office->criminalhistory()->associate($criminalhistory);
            $office->save();
        }

        foreach ($datachild as $data_child) {
            $child = new DataChild();
            $child->fill($data_child);

            $child->criminalhistory()->associate($criminalhistory);
            $child->save();
        }
        return $criminalhistory;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return CriminalHistory::with('datacase','nametitle','addresspresent',
            'addressoriginal','datafather','datamother','dataspouse','datachild','addressoffice','datacase.vehicle','datacase.weapon')->find($id);
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
	public function destroy($id)
	{
        CriminalHistory::find($id)->delete();
        return View('search_police');
	}



    public function savePhotoPerson($id)
    {

        $photo = CriminalHistory::find($id);
        $uuid = Uuid::uuid4();
        $public_path= "photo/person/$id/";
        $destination_path = public_path($public_path);

        //$jpg = ".jpg";
        Input::file('file')->move($destination_path,$uuid);


        $photo->photo = "/photo/person/$id/$uuid";
        $photo->save();
        return $photo;

    }

    public function viewPreson($id)
    {

          $criminalhistory = CriminalHistory::with('datacase','nametitle','addresspresent',
              'addressoriginal','datafather','datamother','dataspouse','datachild','addressoffice','datacase.vehicle','datacase.weapon')->find($id);

       // return $criminalhistory;

//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);
        $pdf = \App::make('mpdf.wrapper',['th','A4','','',20,15,20,25,10,10,]);
        $pdf->setTitle("export");
        $pdf->SetWatermarkText("TEST");

        $pdf->SetDisplayMode('fullpage');

        $html = view('test3')->with('criminalhistory',$criminalhistory)->render();

        $pdf->WriteHTML($html);

        $pdf->stream();


    }
    public function searchCasePerson()
    {
        //return Input::all();
        $idcard_keyword = Input::get('idcard');

        $name_keyword = Input::get('name');
        $surname_keyword = Input::get('surname');
        $date_keyword = Input::get('date');

       $person = CriminalHistory::with('datacase','nametitle','addresspresent',
            'addressoriginal','datafather','datamother','dataspouse','datachild','addressoffice',
            'datacase.vehicle','datacase.weapon')
            ->where(function($q) use ($idcard_keyword,$name_keyword,$surname_keyword,$date_keyword){
                return $q->where('idcard','LIKE',"%$idcard_keyword%")->where('name','LIKE',"%$name_keyword%")
                    ->where('surname','LIKE',"%$surname_keyword%")->where('date','LIKE',"%$date_keyword%");
            })
           ->take(10)
           ->get();
        return $person;


    }


    public function searchDataPerson()

    {
        //return Input::all();
        $idcard_keyword = Input::get('idcard');
        $typepeople_keyword = Input::get('typepeople');
        $name_keyword = Input::get('name');
        $surname_keyword = Input::get('surname');
        $date_keyword = Input::get('date');

        $person = CriminalHistory::with('datacase')

            ->where(function($q) use ($idcard_keyword,$typepeople_keyword,$name_keyword,$surname_keyword,$date_keyword){
                return $q->where('idcard','LIKE',"%$idcard_keyword%")->where('name','LIKE',"%$name_keyword%")
                    ->where('typepeople','LIKE',"%$typepeople_keyword%")->where('surname','LIKE',"%$surname_keyword%")
                    ->where('date','LIKE',"%$date_keyword%");
            })
            ->get();


        return $person;


    }

    public function printPhotoPerson($id)
    {
        //return $id;
        $criminalhistory = CriminalHistory::with('nametitle')->find($id);

     //   return $criminalhistory;

//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);
        $pdf = \App::make('mpdf.wrapper',['th','A4','','',20,15,20,25,10,10,]);
        $pdf->setTitle("export");
        $pdf->SetWatermarkText("TEST");

        $pdf->SetDisplayMode('fullpage');

        $html = view('PDF.photo_person')->with('criminalhistory',$criminalhistory)->render();
       // return $html;

        $pdf->WriteHTML($html);

        $pdf->stream();


    }





}
