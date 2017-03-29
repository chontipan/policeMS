<?php namespace App\Http\Controllers\API;

use App\Events\AddDataPersonCrimeEvent;
use App\Events\DeleteDataPersonCrimeEvent;
use App\Events\EditDataPersonCrimeEvent;
use App\Events\PrintPdfDataPersonCrimeEvent;
use App\Events\PrintPhotoDataPersonCrimeEvent;
use App\Events\TestAddEvent;
use App\Events\ViewDataPersonCrimeEvent;
use App\Models\GuestHistory;
use Carbon\Carbon;
use \Event;
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
use App\Models\Vehicle;
use App\Models\Weapon;
use Illuminate\Http\Request;
use \Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;
use Symfony\Component\VarDumper\Cloner\Data;

class PersonOneApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse', 'datachild', 'addressoffice', 'datacase.vehicle', 'datacase.weapon')->get();
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

        $caseFile = Input::get('caseFile');
        $person = Input::get('person');


        $name_father = Input::get('person.datafather.father_name');
        $surname_father = Input::get('person.datafather.father_surname');
        $name_mother = Input::get('person.datamother.mother_name');
        $surname_mother = Input::get('person.datamother.mother_surname');
        $name_spouse = Input::get('person.dataspouse.spouse_name');
        $surname_spouse = Input::get('person.dataspouse.spouse_surname');
        $present_address = Input::get('person.addresspresent.present_address');
        $original_address = Input::get('person.addressoriginal.original_address');


        if ($present_address != null) {
            $addresspresent = new AddressPresent();
            $addresspresent->fill(Input::get('person.addresspresent'));
            $addresspresent->save();
        }
        if ($original_address != null) {
            $addressoriginal = new AddressOriginal();
            $addressoriginal->fill(Input::get('person.addressoriginal'));
            $addressoriginal->save();
        }

        if ($name_mother != null || $surname_mother != null) {
            $datamother = new DataMother();
            $datamother->fill(Input::get('person.datamother'));
            $datamother->save();
        }

        if ($name_father != null || $surname_father != null) {
            $datafather = new DataFather();
            $datafather->fill(Input::get('person.datafather'));
            $datafather->save();
        }

        if ($name_spouse != null || $surname_spouse != null) {
            $dataspouse = new DataSpouse();
            $dataspouse->fill(Input::get('person.dataspouse'));
            $dataspouse->save();

        }


        $criminalhistory = new CriminalHistory();
        //$criminalhistory->fill(Input::except(["person.data_casefile","person.addressoffice","person.datachild"]));
        $criminalhistory->fill($person);

        if ($datamother != null) {
            $criminalhistory->datamother()->associate($datamother);
        }

        if ($datafather != null) {
            $criminalhistory->datafather()->associate($datafather);
        }

        if ($dataspouse != null) {
            $criminalhistory->dataspouse()->associate($dataspouse);
        }
        if ($addressoriginal != null) {
            $criminalhistory->addressoriginal()->associate($addressoriginal);
        }
        if ($addresspresent != null) {
            $criminalhistory->addresspresent()->associate($addresspresent);
        }

        $criminalhistory->save();


        $addressoffice = Input::get('person.addressoffice');
        $datachild = Input::get('person.datachild');

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

        $name_case = Input::get('caseFile.name_case');
        $circumstances_case = Input::get('caseFile.circumstances_case');


        if ($name_case != null || $circumstances_case != null) {


            $datacase = new DataCase();
            $datacase->fill($caseFile);
            $datacase->save();
            $datacase->criminalhistory()->attach($criminalhistory);

            $data_vehicle = Input::get('caseFile.vehicle');
            $data_weapon = Input::get('caseFile.weapon');


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


        }

        Event::fire(new AddDataPersonCrimeEvent($criminalhistory));
        return $criminalhistory;

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {


        $criminalhistory = CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse',  'datachild'
            , 'addressoffice', 'datacase.vehicle', 'datacase.weapon')->find($id);


        Event::fire(new ViewDataPersonCrimeEvent($criminalhistory));


        return $criminalhistory;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {


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


        if (!$id_present_address) {
            if ($present_address != null) {
                $addresspresent = new AddressPresent();
                $addresspresent->fill($presentaddress);
                $addresspresent->save();
            }
        } else {
            $addresspresent1 = AddressPresent::find($id_present_address);
            $addresspresent1->fill($presentaddress);
            $addresspresent1->save();
        }


        if (!$id_original_address) {
            if ($original_address != null) {
                $addressoriginal = new AddressOriginal();
                $addressoriginal->fill($originaladdress);
                $addressoriginal->save();
            }
        } else {
            $addressoriginal1 = AddressOriginal::find($id_original_address);
            $addressoriginal1->fill($originaladdress);
            $addressoriginal1->save();
        }

        if (!$id_mother) {
            if ($name_mother != null || $surname_mother != null) {
                $datamother = new DataMother();
                $datamother->fill($mother);
                $datamother->save();
            }
        } else {
            $datamother1 = DataMother::find($id_mother);
            $datamother1->fill($mother);
            $datamother1->save();
        }

        if (!$id_father) {
            if ($name_father != null || $surname_father != null) {
                $datafather = new DataFather();
                $datafather->fill($father);
                $datafather->save();
            }
        } else {
            $datafather1 = DataFather::find($id_father);
            $datafather1->fill($father);
            $datafather1->save();
        }

        if (!$id_spouse) {
            if ($name_spouse != null || $surname_spouse != null) {
                $dataspouse = new DataSpouse();
                $dataspouse->fill($spouse);
                $dataspouse->save();
            }
        } else {
            $dataspouse1 = DataSpouse::find($id_spouse);
            $dataspouse1->fill($spouse);

            $dataspouse1->save();
        }


        $criminalhistory = CriminalHistory::find($id);
        $criminalhistory->fill(Input::except(["datacase", "addressoffice", "addressoriginal", "addresspresent"
            , "datachild", "datafather", "datamother", "dataspouse"]));

        if ($datamother != null) {
            $criminalhistory->datamother()->associate($datamother);
        }

        if ($datafather != null) {
            $criminalhistory->datafather()->associate($datafather);
        }

        if ($dataspouse != null) {
            $criminalhistory->dataspouse()->associate($dataspouse);
        }
        if ($addressoriginal != null) {
            $criminalhistory->addressoriginal()->associate($addressoriginal);
        }
        if ($addresspresent != null) {
            $criminalhistory->addresspresent()->associate($addresspresent);
        }
        $criminalhistory->save();


        Event::fire(new EditDataPersonCrimeEvent($criminalhistory));
        return $criminalhistory;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {


        $criminalhistory = CriminalHistory::find($id);


        Event::fire(new DeleteDataPersonCrimeEvent($criminalhistory));


        $dataspouse = $criminalhistory->dataspouse;
        $datamother = $criminalhistory->datamother;
        $datafather = $criminalhistory->datafather;
        $datapresentaddress = $criminalhistory->addresspresent;
        $dataoriginaladdress = $criminalhistory->addressoriginal;

        foreach ($criminalhistory->datacase as $datacase) {
            $caseId = $datacase->id;
            DataCase::find($caseId)->delete();
        }
        foreach ($criminalhistory->addressoffice as $addressoffice) {
            $addressofficeId = $addressoffice->id;
            AddressOffice::find($addressofficeId)->delete();
        }

        foreach ($criminalhistory->datachild as $datachild) {
            $datachildId = $datachild->id;
            DataChild::find($datachildId)->delete();
        }

        if ($criminalhistory) {

            CriminalHistory::find($id)->delete();
        }


        if ($dataspouse) {
            $spouseId = $dataspouse->id;
            DataSpouse::find($spouseId)->delete();
        }

        if ($datamother) {
            $motherId = $datamother->id;
            DataMother::find($motherId)->delete();
        }

        if ($datafather) {
            $fatherId = $datafather->id;
            DataFather::find($fatherId)->delete();
        }
        if ($datapresentaddress) {
            $presentId = $datapresentaddress->id;
            AddressPresent::find($presentId)->delete();
        }
        if ($dataoriginaladdress) {
            $original = $dataoriginaladdress->id;
            AddressOriginal::find($original)->delete();
        }


        return $criminalhistory;


    }


    public function savePhotoPerson($id)
    {
        // return $id;
        $photo = CriminalHistory::find($id);

        $uuid = Uuid::uuid4();
        $public_path = "photo/person_crime/$id/";
        $destination_path = public_path($public_path);

        //$jpg = ".jpg";
        $ext = Input::file('file')->getClientOriginalExtension();

        Input::file('file')->move($destination_path, "$uuid.$ext");


        $photo->photo = "/photo/person_crime/$id/$uuid.$ext";
        $photo->save();
        return $photo;

    }


    public function searchCasePerson()
    {
        //return Input::all();
        //$idcard_keyword = Input::get('idcard');

        $name_keyword = Input::get('name');
        //$surname_keyword = Input::get('surname');

//        $person = DB::table('criminalhistory')
//            ->orderBy('idcard', 'desc')
//            ->distinct()
//            ->get();
        $person = CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse', 'datachild', 'addressoffice',
            'datacase.vehicle', 'datacase.weapon')
            ->whereBetween('created_at',
                array(Carbon::today()->toDateTimeString(),
                    Carbon::tomorrow()->toDateTimeString())
            )
            //->where(function ($q) use ($idcard_keyword, $name_keyword, $surname_keyword) {
            ->where(function ($q) use ($name_keyword) {
                return $q->where('name', 'LIKE', "%$name_keyword%");
            })
            ->orderBy('created_at','desc')
            ->get();

        return $person;


    }

    public function searchIdCardPersonCrime()
    {

        $idcard_keyword = Input::get('idcard');


        $person_crime = CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse', 'datachild', 'addressoffice',
            'datacase.vehicle', 'datacase.weapon')
            ->where(function ($q) use ($idcard_keyword) {
                return $q->where('idcard', '=', "$idcard_keyword");
            })
            ->get();


//        $dataperson = CriminalHistory::with('addresspresent',
//            'addressoriginal','datafather','datamother','dataspouse','dataspouse.nametitle','datachild','datachild.nametitle'
//            ,'addressoffice')->find($person_crime);

        return $person_crime;


    }

    public function searchIdCardPersonGeneral()
    {

        $idcard_keyword = Input::get('idcard');

        $person_general = GuestHistory::with('datachild',  'employee',
            'personfamily',  'addresspresent', 'vehicle', 'addressoriginal',
            'datafather', 'datamother', 'dataspouse'
            ,  'addressoffice')
            ->where(function ($q) use ($idcard_keyword) {
                return $q->where('idcard', '=', "$idcard_keyword");
            })
            ->get();

        return $person_general;


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
            ->where(function ($q) use ($idcard_keyword, $typepeople_keyword, $name_keyword, $surname_keyword) {
                return $q->where('idcard', 'LIKE', "%$idcard_keyword%")->where('name', 'LIKE', "%$name_keyword%")
                    ->where('typepeople', 'LIKE', "%$typepeople_keyword%")->where('surname', 'LIKE', "%$surname_keyword%");

            })
            ->get();


        return $person;


    }

    public function printPhotoPerson($id)
    {
        //return $id;
        $criminalhistory = CriminalHistory::find($id);
        Event::fire(new PrintPhotoDataPersonCrimeEvent($criminalhistory));
        //   return $criminalhistory;

//$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);
        $pdf = \App::make('mpdf.wrapper', ['th', 'A4', '', '', 20, 15, 20, 25, 10, 10,]);
        $pdf->setTitle("export_photo_criminal");

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

        $html = view('PDF.photo_person')->with('criminalhistory', $criminalhistory)->render();
        // return $html;

        $pdf->WriteHTML($html);

        $pdf->stream();


    }

    public function generatedPdfPerson($id)
    {

        $criminalhistory = CriminalHistory::find($id);

        $idcard = $criminalhistory->idcard;


        $datacasesPerson = CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse', 'datachild'
            , 'addressoffice', 'datacase.vehicle', 'datacase.weapon')
            ->where(function ($q) use ($idcard) {
                return $q->where('idcard', '=', "$idcard");
            })
            ->get();

        $criminalhistory = CriminalHistory::with('datacase',  'addresspresent',
            'addressoriginal', 'datafather', 'datamother', 'dataspouse', 'datachild'
            , 'addressoffice', 'datacase.vehicle', 'datacase.weapon')->find($id);

        Event::fire(new PrintPdfDataPersonCrimeEvent($criminalhistory));
        //return $dataperson;
        //$pdf = \App::make('mpdf.wrapper',['ภาษา','ขนาดการดาษ-L=แนวนอน ไม่- แนวตั้ง','','',ขอบซ้ายกระดาษ,ขอบขวากระดาษ,ขอบขนกระดาษ,ขอบล่างกระดาษ,ระยะ title,ระยะ footter]);

        //return $datacase;
        $pdf = \App::make('mpdf.wrapper', ['th', 'A4', '', '', 20, 15, 20, 25, 10, 10,]);
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


        $html = view('PDF.personOne')->with('dataperson', $criminalhistory)->with('datacases', $datacasesPerson)->render();
        //return $html;
        $pdf->WriteHTML($html);

        $pdf->stream();

    }


}
