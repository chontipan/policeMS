<?php namespace App\Http\Controllers\API;

use App\Events\AddDataPersonGeneralEvent;
use App\Events\DeleteDataPersonCrimeEvent;
use App\Events\DeleteDataPersonGeneralEvent;
use App\Events\EditDataPersonGeneralEvent;
use App\Events\PrintPdfDataPersonCrimeEvent;
use App\Events\PrintPdfDataPersonGeneralEvent;
use App\Events\PrintPhotoDataPersonGeneralEvent;
use App\Handlers\Events\ViewDataPersonGeneralHandler;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AddressOffice;
use App\Models\AddressOriginal;
use App\Models\AddressPresent;
use App\Models\DataChild;
use App\Models\DataFather;
use App\Models\DataMother;
use App\Models\DataSpouse;
use App\Models\DataSuspects;
use App\Models\Employee;
use App\Models\GuestHistory;
use App\Models\PersonFamily;
use App\Models\Policeimmigration;
use App\Models\Profile;
use App\Models\Vehicle;
use App\Models\Weapon;
use Illuminate\Http\Request;
use \Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;
class GuestHistoryApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return GuestHistory::with('datachild','datachild','employee','employee',
            'personfamily','personfamily','addresspresent','vehicle','addressoriginal',
            'datafather','datamother','dataspouse','dataspouse'
            ,'addressoffice')->get();
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
       // return Input::all();
        $name_father = Input::get('datafather.father_name');
        $surname_father = Input::get('datafather.father_surname');
        $name_mother = Input::get('datamother.mother_name');
        $surname_mother = Input::get('datamother.mother_surname');
        $name_spouse = Input::get('dataspouse.spouse_name');
        $surname_spouse = Input::get('dataspouse.spouse_surname');
        $present_address = Input::get('addresspresent.present_address');
        $original_address = Input::get('addressoriginal.original_address');
        if (Auth::check()){
            $IdPolice = Auth::user()->id;
        }




        if($present_address!=null){
            $addresspresent = new AddressPresent();
            $addresspresent->fill(Input::get('addresspresent'));
            $addresspresent->save();
        }
        if($original_address!=null){
            $addressoriginal = new AddressOriginal();
            $addressoriginal->fill(Input::get('addressoriginal'));
            $addressoriginal->save();
        }


        if($name_mother!=null || $surname_mother!=null){
            $datamother = new DataMother();
            $datamother->fill(Input::get('datamother'));
            $datamother->save();
        }

        if($name_father!=null || $surname_father!=null){

            $datafather = new DataFather();
            $datafather->fill(Input::get('datafather'));
            $datafather->save();

        }

        if($name_spouse!=null || $surname_spouse!=null){
            $dataspouse = new DataSpouse();
            $dataspouse->fill(Input::get('dataspouse'));
            $dataspouse->save();
        }




        $guesthistory = new GuestHistory();
        $guesthistory->fill(Input::except(["addressoffice","child","employee","family","vehicle"
            ,"datamother","dataspouse","addressoriginal","addresspresent","datafather"]));

        if($datamother!=null){
            $guesthistory->datamother()->associate($datamother);
        }

        if($datafather!=null){
            $guesthistory->datafather()->associate($datafather);
        }

        if($dataspouse!=null){
            $guesthistory->dataspouse()->associate($dataspouse);
        }
        if($addressoriginal!=null){
            $guesthistory->addressoriginal()->associate($addressoriginal);
        }
        if($addresspresent!=null){
            $guesthistory->addresspresent()->associate($addresspresent);
        }
        if($IdPolice!=null){
            $police = Policeimmigration::find($IdPolice);
            $guesthistory->policeimmigration()->associate($police);
        }


        $guesthistory->save();




        $address_office = Input::get('addressoffice');
        $data_child = Input::get('datachild');
        $data_employee = Input::get('employee');
        $person_family = Input::get('personfamily');
        $data_vehicle = Input::get('vehicle');

        foreach ( $data_employee as $dataemployee) {
            $employee = new \App\Models\Employee();
            $employee->fill($dataemployee);

            $employee->guesthistory()->associate($guesthistory);
            $employee->save();
        }

        foreach ( $person_family as $datafamily) {
            $personfamily = new PersonFamily();
            $personfamily->fill($datafamily);
            $personfamily->guesthistory()->associate($guesthistory);

            $personfamily->save();
        }

        foreach ( $data_vehicle as $datavehicle) {
            $vechicle = new \App\Models\Vehicle();
            $vechicle->fill($datavehicle);
            $vechicle->guesthistory()->associate($guesthistory);
            $vechicle->save();
        }

        foreach ( $data_child as $child) {
            $datachild = new DataChild();
            $datachild->fill($child);
            $datachild->guesthistory()->associate($guesthistory);

            $datachild->save();
        }

        foreach ( $address_office as $data_office) {
            $addressoffice = new AddressOffice();
            $addressoffice->fill($data_office);
            $addressoffice->guesthistory()->associate($guesthistory);
            $addressoffice->save();
        }
        Event::fire(new AddDataPersonGeneralEvent($guesthistory));

        return $guesthistory;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $guesthistory = GuestHistory::with('datachild','datachild','employee','employee',
            'personfamily','personfamily','addresspresent','vehicle','addressoriginal',
            'datafather','datamother','dataspouse','dataspouse'
            ,'addressoffice')->find($id);

        Event::fire(new ViewDataPersonGeneralHandler($guesthistory));

        return $guesthistory;
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

        //return Input::all();
        $id_father = Input::get('datafather.id');
        $id_mother = Input::get('datamother.id');
        $id_spouse = Input::get('dataspouse.id');
        $id_present_address = Input::get('addresspresent.id');
        $id_original_address = Input::get('addressoriginal.id');

        $father = Input::get('datafather');
        $mother = Input::get('datamother');
        $spouse = Input::get('dataspouse');
        $presentaddress = Input::get('addresspresent');
        $originaladdress = Input::get('addressoriginal');



        $name_father = Input::get('datafather.father_name');
        $surname_father = Input::get('datafather.father_surname');
        $name_mother = Input::get('datamother.mother_name');
        $surname_mother = Input::get('datamother.mother_surname');
        $name_spouse = Input::get('dataspouse.spouse_name');
        $surname_spouse = Input::get('dataspouse.spouse_surname');
        $present_address = Input::get('addresspresent.present_address');
        $original_address = Input::get('addressoriginal.original_address');



        if(!$id_present_address){
            if($present_address!=null){
                $addresspresent = new AddressPresent();
                $addresspresent->fill($presentaddress);
                $addresspresent->save();
            }
        }else{
            $addresspresent1 = AddressPresent::find($id_present_address);
            $addresspresent1->fill($presentaddress);
            $addresspresent1->save();
        }


        if(!$id_original_address){
            if($original_address!=null){
                $addressoriginal = new AddressOriginal();
                $addressoriginal->fill($originaladdress);
                $addressoriginal->save();
            }
        }else{
            $addressoriginal1 = AddressOriginal::find($id_original_address);
            $addressoriginal1->fill($originaladdress);
            $addressoriginal1->save();
        }

        if(!$id_mother){
            if($name_mother!=null || $surname_mother!=null){
                $datamother = new DataMother();
                $datamother->fill($mother);
                $datamother->save();
            }
        }else{
            $datamother1 = DataMother::find($id_mother);
            $datamother1->fill($mother);
            $datamother1->save();
        }

        if(!$id_father){
            if($name_father!=null || $surname_father!=null){
                $datafather = new DataFather();
                $datafather->fill($father);
                $datafather->save();
            }
        }else{
            $datafather1 = DataFather::find($id_father);
            $datafather1->fill($father);
            $datafather1->save();
        }

        if(!$id_spouse){
            if($name_spouse!=null || $surname_spouse!=null){
                $dataspouse = new DataSpouse();
                $dataspouse->fill($spouse);


                $dataspouse->save();
            }
        }else{
            $dataspouse1 = DataSpouse::find($id_spouse);
            $dataspouse1->fill($spouse);


            $dataspouse1->save();
        }


        $guesthistory = GuestHistory::find($id);
        $guesthistory->fill(Input::except(["addoffice","child","employee","family","vehicle"]));



        if($datamother!=null){
            $guesthistory->datamother()->associate($datamother);
        }

        if($datafather!=null){
            $guesthistory->datafather()->associate($datafather);
        }

        if($dataspouse!=null){
            $guesthistory->dataspouse()->associate($dataspouse);
        }
        if($addressoriginal!=null){
            $guesthistory->addressoriginal()->associate($addressoriginal);
        }
        if($addresspresent!=null){
            $guesthistory->addresspresent()->associate($addresspresent);
        }

        $guesthistory->save();

        Event::fire(new EditDataPersonGeneralEvent($guesthistory));



        return $guesthistory;
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{


        $guesthistory = GuestHistory::find($id);;
        Event::fire(new DeleteDataPersonGeneralEvent($guesthistory));

        $dataspouse = $guesthistory->dataspouse;
        $datamother = $guesthistory->datamother;
        $datafather = $guesthistory->datafather;
        $datapresentaddress = $guesthistory->addresspresent;
        $dataoriginaladdress = $guesthistory->addressoriginal;


        foreach ($guesthistory->vehicle as $vehicle) {
            $vehicleId = $vehicle->id;
            Vehicle::find($vehicleId)->delete();
        }

        foreach ($guesthistory->datachild as $datachild) {
            $datachildId = $datachild->id;
            DataChild::find($datachildId)->delete();
        }
        foreach ($guesthistory->employee as $employee) {
            $employeeId = $employee->id;
            Employee::find($employeeId)->delete();
        }
        foreach ($guesthistory->personfamily as $personfamily) {
            $personfamilyId = $personfamily->id;
            PersonFamily::find($personfamilyId)->delete();
        }

        if($guesthistory){

            GuestHistory::find($id)->delete();
        }


        if($dataspouse){
            $spouseId = $dataspouse->id;
            DataSpouse::find($spouseId)->delete();
        }

        if($datamother){
            $motherId = $datamother->id;
            DataMother::find($motherId)->delete();
        }

        if($datafather){
            $fatherId = $datafather->id;
            DataFather::find($fatherId)->delete();
        }
        if($datapresentaddress){
            $presentId = $datapresentaddress->id;
            AddressPresent::find($presentId)->delete();
        }
        if($dataoriginaladdress){
            $original = $dataoriginaladdress->id;
            AddressOriginal::find($original)->delete();
        }


        return $guesthistory;

    }

    public function savePhotoGuest($id)
    {

        $photo = GuestHistory::find($id);
        $uuid = Uuid::uuid4();
        $public_path= "photo/person_general/$id/";
        $destination_path = public_path($public_path);
        $ext = Input::file('file')->getClientOriginalExtension();
        //$jpg = ".jpg";
        Input::file('file')->move($destination_path,"$uuid.$ext");
        $photo->photo = "/photo/person_general/$id/$uuid.$ext";
        $photo->save();
        return $photo;

    }
    public function generatedPdfCase($id)
    {
        $guesthistory = GuestHistory::with('datachild','datachild','employee','employee',
            'personfamily','personfamily','addresspresent','vehicle','addressoriginal',
            'datafather','datamother','dataspouse','dataspouse'
            ,'addressoffice')->find($id);

        Event::fire(new PrintPdfDataPersonGeneralEvent($guesthistory));

        //return $dataperson;
//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);

        //return $datacase;
        $pdf = \App::make('mpdf.wrapper',['th','A4','','',20,15,20,25,10,10,]);
        $pdf->setTitle("export_profile");

        //$pdf->SetHeader('|{PAGENO}/{nbpg}|สำนักงานตำรวจตรวจคนเข้าเมือง จังหวัด เชียงราย');

        // $pdf->SetFooter('พิมพ์เมื่อ วัน {DATE D} ที่ {DATE j-m-Y} เวลา {DATE H:i:s}  ');

        $pdf->SetHeader('
        <table width="100%" style="vertical-align: bottom; font-family: TH SarabunPSK; font-size: 14pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
        <td width="20%"></td>
        <td width="30%" style="text-align: right; ">{PAGENO}</td>
        <td width="55%" style="text-align: right; "> ตรวจคนเข้าเมืองจังหวัดเชียงราย</td>
        </tr></table>
        ');

        $user = Auth::user();
        $rank = $user->rank->rank;
        \Carbon\Carbon::setLocale('th');
        setlocale(LC_TIME,'th_TH');
        $date = \Carbon\Carbon::now();
        $daymonth = $date->formatLocalized('%d/%m/');
        $year = $date->year+543;

        $pdf->SetFooter("
        <table width='100%' style='vertical-align: bottom; font-family: garuda; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;'><tr>
      
        <td width='45%'>พิมพ์โดย $rank $user->name_police $user->surname_police</td>
        <td width='55%' style='text-align: right; '>พิมพ์เมื่อ $daymonth$year</td>
        </tr></table>
        ");


        $pdf->SetWatermarkText("");

        $pdf->SetDisplayMode('fullpage');



//
//        $pdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">My document</div>');
//
//        $pdf->SetHTMLFooter('
//        <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
//        <td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
//        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
//        <td width="33%" style="text-align: right; ">My document</td>
//        </tr></table>
//


        $html = view('PDF.person_general')->with('dataperson',$guesthistory)->render();
        //return $html;
        $pdf->WriteHTML($html);

        $pdf->stream();

        //dd(Auth::user()->name_police);
    }

    public function printPhotoPerson($id)
    {
        //return $id;
        $guesthistory = GuestHistory::with('datachild','datachild','employee','employee',
            'personfamily','personfamily','addresspresent','vehicle','addressoriginal',
            'datafather','datamother','dataspouse','dataspouse'
            ,'addressoffice')->find($id);

        Event::fire(new PrintPhotoDataPersonGeneralEvent($guesthistory));
        //   return $criminalhistory;

//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);
        $pdf = \App::make('mpdf.wrapper',['th','A4','','',20,15,20,25,10,10,]);

        $pdf->setTitle("export_annoucement");

        $pdf->SetHeader('
        <table width="100%" style="vertical-align: bottom; font-family: TH SarabunPSK; font-size: 14pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
        <td width="20%"></td>
        <td width="30%" style="text-align: right; "></td>
        <td width="55%" style="text-align: right; "> ตรวจคนเข้าเมืองจังหวัดเชียงราย</td>
        </tr></table>
        ');

        $user = Auth::user();
        $rank = $user->rank->rank;
        \Carbon\Carbon::setLocale('th');
        setlocale(LC_TIME,'th_TH');
        $date = \Carbon\Carbon::now();
        $daymonth = $date->formatLocalized('%d/%m/');
        $year = $date->year+543;

        $pdf->SetFooter("
        <table width='100%' style='vertical-align: bottom; font-family: garuda; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;'><tr>
      
        <td width='45%'>พิมพ์โดย $rank $user->name_police $user->surname_police</td>
        <td width='55%' style='text-align: right; '>พิมพ์เมื่อ $daymonth$year</td>
        </tr></table>
        ");


        $pdf->SetWatermarkText("");

        $pdf->SetDisplayMode('fullpage');

        $html = view('PDF.photo_person_general')->with('guesthistory',$guesthistory)->render();
        // return $html;

        $pdf->WriteHTML($html);

        $pdf->stream();


    }

}
