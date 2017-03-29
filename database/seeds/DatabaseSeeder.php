<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('vehicle')->delete();
        DB::table('weapon')->delete();
        DB::table('criminalhistory_datacase')->delete();
        DB::table('datacase')->delete();

        DB::table('addressoffice')->delete();
        DB::table('datachild')->delete();

        DB::table('personfamily')->delete();
        DB::table('employee')->delete();

        DB::table('criminalhistory')->delete();
        DB::table('guesthistory')->delete();
        DB::table('datafather')->delete();
        DB::table('dataspouse')->delete();
        DB::table('datamother')->delete();
        DB::table('addressoriginal')->delete();
        DB::table('addresspresent')->delete();


        DB::table('policeimmigration')->delete();
        DB::table('rank')->delete();
        DB::table('role')->delete();
        DB::table('position')->delete();
        DB::table('nametitle')->delete();
        DB::table('mylog')->delete();




        ///////// เพิ่มข้อมูลในตาราง nametitle /////////
        $nametitle = new \App\Models\NameTitle();
        $nametitle->name_title = ('นาย');
        $nametitle->save();

        $nametitle1 = new \App\Models\NameTitle();
        $nametitle1->name_title = ('นาง');
        $nametitle1->save();

        $nametitle2 = new \App\Models\NameTitle();
        $nametitle2->name_title = ('นางสาว');
        $nametitle2->save();

        $nametitle3 = new \App\Models\NameTitle();
        $nametitle3->name_title = ('เด็กชาย');
        $nametitle3->save();

        $nametitle4 = new \App\Models\NameTitle();
        $nametitle4->name_title = ('เด็กหญิง');
        $nametitle4->save();

        $nametitle5 = new \App\Models\NameTitle();
        $nametitle5->name_title = ('Mr.');
        $nametitle5->save();

        $nametitle6 = new \App\Models\NameTitle();
        $nametitle6->name_title = ('Miss');
        $nametitle6->save();




        $position = new \App\Models\Position();
        $position->name_position = ('ลูกแถว');
        $position->save();


        $position1 = new \App\Models\Position();
        $position1->name_position = ('ผู้บังคับหมู่');
        $position1->save();


        $position2 = new \App\Models\Position();
        $position2->name_position = ('รองสารวัตร');
        $position2->save();


        $position3 = new \App\Models\Position();
        $position3->name_position = ('สารวัตร');
        $position3->save();


        $position4 = new \App\Models\Position();
        $position4->name_position = ('สารวัตรแผนก');
        $position4->save();


        $position5 = new \App\Models\Position();
        $position5->name_position = ('สารวัตรงาน');
        $position5->save();


        $position6 = new \App\Models\Position();
        $position6->name_position = ('สารวัตรอำนวยการ');
        $position6->save();


        $position7 = new \App\Models\Position();
        $position7->name_position = ('สารวัตรสืบสวนสอบสวน');
        $position7->save();


        $position8 = new \App\Models\Position();
        $position8->name_position = ('สารวัตรป้องกันปราบปราม');
        $position8->save();


        $position9 = new \App\Models\Position();
        $position9->name_position = ('สารวัตรจราจร');
        $position9->save();


        $position10 = new \App\Models\Position();
        $position10->name_position = ('สารวัตรใหญ่');
        $position10->save();

        $position11 = new \App\Models\Position();
        $position11->name_position = ('รองผู้กำกับการ');
        $position11->save();

        $position12 = new \App\Models\Position();
        $position12->name_position = ('ผู้กำกับการ');
        $position12->save();

        $position13 = new \App\Models\Position();
        $position13->name_position = ('รองผู้บังคับการ');
        $position13->save();

        $position14 = new \App\Models\Position();
        $position14->name_position = ('ผู้บังคับการ');
        $position14->save();

        $position15 = new \App\Models\Position();
        $position15->name_position = ('ผู้ช่วยผู้บัญชาการ');
        $position15->save();

        $position16 = new \App\Models\Position();
        $position16->name_position = ('รองผู้บัญชาการ');
        $position16->save();

        $position17 = new \App\Models\Position();
        $position17->name_position = ('ผู้บัญชาการ');
        $position17->save();

        $position18 = new \App\Models\Position();
        $position18->name_position = ('ผู้ช่วยผู้บัญชาการ ตำรวจแห่งชาติ');
        $position18->save();

        $position19 = new \App\Models\Position();
        $position19->name_position = ('รองผู้บัญชาการ ตำรวจแห่งชาติ');
        $position19->save();

        $position20 = new \App\Models\Position();
        $position20->name_position = ('ผู้บัญชาการ ตำรวจแห่งชาติ');
        $position20->save();

        $role = new \App\Models\Role();
        $role->key = ('admin');
        $role->name = ('Administrator');
        $role->description = ('Administrator');
        $role->save();

        $role1 = new \App\Models\Role();
        $role1->key = ('Member_Commissioned_Officers');
        $role1->name = ('สิทธิการเข้าใช้งาน ตำรวจชั้นสัญญาบัตร');
        $role1->description = ('ตำรวจชั้นสัญญาบัตร');
        $role1->save();

        $role2 = new \App\Models\Role();
        $role2->key = ('Member_Non-Commissioned_Officer');
        $role2->name = ('สิทธิการเข้าใช้งาน ตำรวจชั้นประทวน');
        $role2->description = ('ตำรวจชั้นประทวน');
        $role2->save();

        $rank1 = new \App\Models\Rank();
        $rank1->rank = ('พลตำรวจ');
        $rank1->save();

        $rank2 = new \App\Models\Rank();
        $rank2->rank = ('สิบตำรวจตรี');
        $rank2->save();


        $rank3 = new \App\Models\Rank();
        $rank3->rank = ('สิบตำรวจโท');
        $rank3->save();


        $rank4 = new \App\Models\Rank();
        $rank4->rank = ('สิบตำรวจเอก');
        $rank4->save();


        $rank5 = new \App\Models\Rank();
        $rank5->rank = ('จ่าสิบตำรวจ');
        $rank5->save();


        $rank6 = new \App\Models\Rank();
        $rank6->rank = ('นายดาบตำรวจ');
        $rank6->save();


        $rank7 = new \App\Models\Rank();
        $rank7->rank = ('ร้อยตำรวจตรี');
        $rank7->save();

        $rank8 = new \App\Models\Rank();
        $rank8->rank = ('ร้อยตำรวจโท');
        $rank8->save();

        $rank9 = new \App\Models\Rank();
        $rank9->rank = ('ร้อยตำรวจเอก');
        $rank9->save();

        $rank10 = new \App\Models\Rank();
        $rank10->rank = ('พันตำรวจตรี');
        $rank10->save();

        $rank11 = new \App\Models\Rank();
        $rank11->rank = ('พันตำรวจโท');
        $rank11->save();

        $rank12 = new \App\Models\Rank();
        $rank12->rank = ('พันตำรวจเอก');
        $rank12->save();

        $rank13 = new \App\Models\Rank();
        $rank13->rank = ('พลตำรวจจัตวา');
        $rank13->save();

        $rank14 = new \App\Models\Rank();
        $rank14->rank = ('พลตำรวจตรี');
        $rank14->save();

        $rank15 = new \App\Models\Rank();
        $rank15->rank = ('พลตำรวจโท');
        $rank15->save();

        $rank16 = new \App\Models\Rank();
        $rank16->rank = ('พลตำรวจเอก');
        $rank16->save();



        $policeimmigration = new \App\Models\Policeimmigration();
        $policeimmigration->name_police = ('NemeAdmin');
        $policeimmigration->surname_police = ('SurnameAdmin');
        $policeimmigration->tel_police = ('08x-xxxxxxx');
        $policeimmigration->username = ('admin');
        $policeimmigration->password = Hash::make('admin');
        $policeimmigration->rank()->associate($rank9);
        $policeimmigration->role()->associate($role);
        $policeimmigration->position()->associate($position);
        $policeimmigration->save();


        ///ประทวน
        $policeimmigration1 = new \App\Models\Policeimmigration();
        $policeimmigration1->name_police = ('ประทวน');
        $policeimmigration1->surname_police = ('ประทวน');
        $policeimmigration1->tel_police = ('08x-xxxxxxx');
        $policeimmigration1->username = ('member1');
        $policeimmigration1->password = Hash::make('member1');
        $policeimmigration1->rank()->associate($rank2);
        $policeimmigration1->role()->associate($role2);
        $policeimmigration1->position()->associate($position);
        $policeimmigration1->save();


        //สัญบัตร
        $policeimmigration1 = new \App\Models\Policeimmigration();
        $policeimmigration1->name_police = ('สัญญาบัตร');
        $policeimmigration1->surname_police = ('สัญญาบัตร');
        $policeimmigration1->tel_police = ('08x-xxxxxxx');
        $policeimmigration1->username = ('member2');
        $policeimmigration1->password = Hash::make('member2');
        $policeimmigration1->rank()->associate($rank9);
        $policeimmigration1->role()->associate($role1);
        $policeimmigration1->position()->associate($position);
        $policeimmigration1->save();



        ///////// เพิ่มข้อมูลในตาราง AddressPresent /////////
        $addresspresent = new \App\Models\AddressPresent();
        $addresspresent->present_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $addresspresent->present_tel = ('0861898197');
        $addresspresent->save();

        $addresspresent1 = new \App\Models\AddressPresent();
        $addresspresent1->present_address = ('บ้านเลขที่ 9 หมู่ 11 ต.แม่กา อ.เมือง จ.พะเยา');
        $addresspresent1->present_tel = ('0861898197');
        $addresspresent1->save();


        ///////// เพิ่มข้อมูลในตาราง AddressOriginal /////////
        $addressoriginal = new \App\Models\AddressOriginal();
        $addressoriginal->original_address = ('บ้านเลขที่ 9 หมู่ 11 ต.แม่กา อ.เมือง จ.พะเยา');
        $addressoriginal->original_tel = ('054444444');

        $addressoriginal->save();

        $addressoriginal1 = new \App\Models\AddressOriginal();
        $addressoriginal1->original_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $addressoriginal1->original_tel = ('054444444');
        $addressoriginal1->save();


/////////////////////////////////////////////////////////
        $datamother = new \App\Models\DataMother();
        $datamother->mother_name = ('ซาร่า');
        $datamother->mother_surname = ('โมเลกุล');
        $datamother->mother_age = ('45');
        $datamother->mother_live_died = ('มีชีวิต');
        $datamother->mother_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $datamother->mother_career = ('รับจ้างทั้วไป');
        $datamother->mother_nameoffice = ('บ้าน');
        $datamother->mother_tel = ('088-9898989');
        $datamother->save();

        $datamother1 = new \App\Models\DataMother();
        $datamother1->mother_name = ('เหมิยหลิง');
        $datamother1->mother_surname = ('ชิงโชค');
        $datamother1->mother_age = ('55');
        $datamother1->mother_live_died = ('มีชีวิต');
        $datamother1->mother_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $datamother1->mother_career = ('รับจ้างทั้วไป');
        $datamother1->mother_nameoffice = ('บ้าน');
        $datamother1->mother_tel = ('088-9898989');
        $datamother1->save();


        $dataspouse = new \App\Models\DataSpouse();
        $dataspouse->spouse_name = ('ซูซี่');
        $dataspouse->spouse_surname = ('มีโชค');
        $dataspouse->spouse_age = ('55');
        $dataspouse->spouse_live_died = ('มีชีวิต');
        $dataspouse->spouse_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $dataspouse->spouse_career = ('รับจ้างทั้วไป');
        $dataspouse->spouse_nameoffice = ('บ้าน');
        $dataspouse->spouse_tel = ('088-9898989');
        $dataspouse->nametitle()->associate($nametitle2);
        $dataspouse->save();

        $dataspouse1 = new \App\Models\DataSpouse();
        $dataspouse1->spouse_name = ('มิมุ');
        $dataspouse1->spouse_surname = ('คิคุ');
        $dataspouse1->spouse_age = ('29');
        $dataspouse1->spouse_live_died = ('มีชีวิต');
        $dataspouse1->spouse_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $dataspouse1->spouse_career = ('รับจ้างทั้วไป');
        $dataspouse1->spouse_nameoffice = ('บ้าน');
        $dataspouse1->spouse_tel = ('088-9898989');
        $dataspouse1->nametitle()->associate($nametitle1);
        $dataspouse1->save();


        $datafather = new \App\Models\DataFather();
        $datafather->father_name = ('ชาติชาย');
        $datafather->father_surname = ('หมายปอง');
        $datafather->father_age = ('59');
        $datafather->father_live_died = ('มีชีวิต');
        $datafather->father_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $datafather->father_career = ('รับจ้างทั้วไป');
        $datafather->father_nameoffice = ('บ้าน');
        $datafather->father_tel = ('088-9898989');
        $datafather->save();

        $datafather1 = new \App\Models\DataFather();
        $datafather1->father_name = ('ชาติชาย');
        $datafather1->father_surname = ('หมายปอง');
        $datafather1->father_age = ('59');
        $datafather1->father_live_died = ('มีชีวิต');
        $datafather1->father_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $datafather1->father_career = ('รับจ้างทั้วไป');
        $datafather1->father_nameoffice = ('บ้าน');
        $datafather1->father_tel = ('088-9898989');
        $datafather1->save();

        $guesthistory = new \App\Models\GuestHistory();
        $guesthistory->idcard = ('1560300222222');
        $guesthistory->typepeople = ('บุคคลทั่วไป');
        $guesthistory->name = ('สมรัก');
        $guesthistory->surname = ('นาดี');
        $guesthistory->birth =('26-9-2537');
        $guesthistory->date = ('วันที่ 22 เดือน สิงหาคม พ.ศ. 2558');
        $guesthistory->age = ('21 ปี');
        $guesthistory->career=('โปรแกรมเมอร์');
        $guesthistory->other = ('ต้องสงสัย....!@@##$^');
        $guesthistory->status = ('complete');
        $guesthistory->nametitle()->associate($nametitle);
        $guesthistory->dataspouse()->associate($dataspouse);
        $guesthistory->datamother()->associate($datamother);
        $guesthistory->datafather()->associate($datafather);
        $guesthistory->addressoriginal()->associate($addressoriginal);
        $guesthistory->addresspresent()->associate($addresspresent);
        $guesthistory->save();


        $criminalhistory = new \App\Models\CriminalHistory();
        $criminalhistory->typepeople = ('ผู้ต้องหา');
        $criminalhistory->name = ('อยู่ดี');
        $criminalhistory->surname = ('มีสุข');
        $criminalhistory->alias = ('เสือใหญ่');
        $criminalhistory->idcard = ('1560300222222');
        $criminalhistory->birth =('26-9-2537');
        $criminalhistory->age = ('21 ปี');
        $criminalhistory->date = ('วันที่ 22 เดือน สิงหาคม พ.ศ. 2558 เวลาประมาณ 23:43 นาฬิกา');
        $criminalhistory->education = ('ประถมศึษา');
        $criminalhistory->career=('โปรแกรมเมอร์');
        $criminalhistory->height = ('177');
        $criminalhistory->weight = ('65');
        $criminalhistory->shape = ('อ้วน');
        $criminalhistory->teeth = ('ขาว');
        $criminalhistory->skin = ('ดำ');
        $criminalhistory->hairstyles = ('รองทรง');
        $criminalhistory->head = ('รูปไข่');
        $criminalhistory->face = ('รูปไข่');
        $criminalhistory->eyebrow = ('หนา');
        $criminalhistory->eye = ('ตาสองชั้น');
        $criminalhistory->ear = ('กาง');
        $criminalhistory->nose = ('โด่ง');
        $criminalhistory->mouth = ('หนา');
        $criminalhistory->chin = ('สี่เหลี่ยม');
        $criminalhistory->mirror = ('ไม่มีเครา');
        $criminalhistory->scar = ('รอยแผลเป็น');
        $criminalhistory->accent = ('ใต้');
        $criminalhistory->nature = ('ขาเป้');
        $criminalhistory->personality = ('ใจร้อน');
        $criminalhistory->location_gallivent = ('ผับ/ร้านเหล้า');
        $criminalhistory->other = ('ไม่มีหนังสือเดินทาง ใช้บัตรผ่านแดน(บอร์เดอร์พาส) เดินทางเข้ามาและหลบหนีอยู่ในราชอาณาจักร');
        $criminalhistory->status = ('complete');
        $criminalhistory->dataspouse()->associate($dataspouse);
        $criminalhistory->datamother()->associate($datamother);
        $criminalhistory->datafather()->associate($datafather);
        $criminalhistory->addressoriginal()->associate($addressoriginal1);
        $criminalhistory->addresspresent()->associate($addresspresent1);
        $criminalhistory->nametitle()->associate($nametitle);
        $criminalhistory->save();

        //////// เพิ่มข้อมูลลงในตาราง Employee /////////////////
        $employee = new \App\Models\Employee();
        $employee->employee_idnumber = ('1234567890000');
        $employee->employee_name = ('บรา');
        $employee->employee_surname = ('ซิล');
        $employee->employee_age = ('23');
        $employee->employee_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $employee->guesthistory()->associate($guesthistory);
        $employee->nametitle()->associate($nametitle);
        $employee->save();

        $personfamily = new \App\Models\PersonFamily();
        $personfamily->personfamily_idnumber =('2345678998745');
        $personfamily->personfamily_name =('สุดสวย');
        $personfamily->personfamily_surname =('รวยเสมอ');
        $personfamily->personfamily_age =('45');
        $personfamily->personfamily_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $personfamily->personfamily_career = ('ทำนา');
        $personfamily->personfamily_nameoffice_tel = ('05555555555');
        $personfamily->personfamily_nameoffice=('นา');
        $personfamily->personfamily_tel=('0856365494');
        $personfamily->guesthistory()->associate($guesthistory);
        $personfamily->nametitle()->associate($nametitle2);
        $personfamily->save();




        $datachild = new \App\Models\DataChild();
        $datachild->child_name=('ดวง');
        $datachild->child_surname=('');
        $datachild->child_age=('45');
        $datachild->child_live_died=('live');
        $datachild->child_address =('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $datachild->child_career =('ทำไร่');
        $datachild->child_nameoffice=('ไร่');
        $datachild->child_nameoffice_tel=('05555555');
        $datachild->child_tel=('0874236599');
        $datachild->guesthistory()->associate($guesthistory);
        $datachild->criminalhistory()->associate($criminalhistory);
        $datachild->nametitle()->associate($nametitle);
        $datachild->save();


        $addressoffice = new \App\Models\AddressOffice();
        $addressoffice->office=('ซอฟต์สเเควร์');
        $addressoffice->office_address = ('บ้านเลขที่ 2 หมู่ 8 ต.ภูซาง อ.ภูซาง จ.พะเยา');
        $addressoffice->office_tel=('02365879644');
        $addressoffice->guesthistory()->associate($guesthistory);
        $addressoffice->criminalhistory()->associate($criminalhistory);
        $addressoffice->save();




        $datacase = new \App\Models\DataCase();
        $datacase->file_case=('222');
        $datacase->number_case=('120');
        $datacase->name_case =('เป็นคนต่างด้าวเข้ามาและอยู่ในราชอาณาจักรโดยไม่ได้รับอนุญาต');
        $datacase->circumstances_case=('ตามวันเวลาเกิดเหตุ เจ้าหน้าที่ชุดจับกุมได้ออกตรวจพื้นที่ พบบุคคลต้องสงสัย ทราบชื่อภายหลังคือ นายโล๊ะ ฮอคเส็ง (ทราบภายหลัง) มีลักษณะคล้ายคนต่างด้าว จึงได้ขอตรวจหนังสือเดินทาง ซึ่งผู้ถูกจับนี้รับว่าไม่มีหนังสือเดินทาง ได้หลบหนีเข้าเมืองมาทางด่านปาดังเบซาร์ และหลบหนีอยู่ในราชอาณาจักร จนถูกจับกุมได้ดังกล่าว');
        $datacase->number_case = ('1234');
        $datacase->year_number_case = ('2556');
        $datacase->station_number_case = ('สภ.แม่สาย');
        $datacase->date_case=('วันที่ 22 เดือน สิงหาคม พ.ศ. 2558 เวลาประมาณ 23:43 นาฬิกา');
        $datacase->houseno_case=('4');
        $datacase->villageno_case=('5');
        $datacase->road_case=('อาราย');
        $datacase->lane_alley_case=('สวยยงาม');
        $datacase->subdistrict_case=('ดูดีด่า');
        $datacase->disreict_case=('บ้านนา');
        $datacase->province_case=('อุทัย');
        $datacase->status=('complete');
        $datacase->save();

        $vechicle1 = new \App\Models\Vehicle();
        $vechicle1->vehicle_brand=('ฟีโน่');
        $vechicle1->vehicle_generation=('คลาสิก');
        $vechicle1->vehicle_number=('233');
        $vechicle1->vehicle_group=('งสก');
        $vechicle1->vehicle_province=('พะเยา');
        $vechicle1->datacase()->associate($datacase);
        $vechicle1->save();

        $weapon = new \App\Models\Weapon();
        $weapon->name_weapon = ('ปืนพก .38');
        $weapon->datacase()->associate($datacase);
        $weapon->save();

        $vechicle = new \App\Models\Vehicle();
        $vechicle->vehicle_brand=('ฮอนด้า');
        $vechicle->vehicle_generation=('ยานม่า');
        $vechicle->vehicle_number=('123');
        $vechicle->vehicle_group=('กขค');
        $vechicle->vehicle_province=('พะเยา');
        $vechicle->guesthistory()->associate($guesthistory);
        $vechicle->save();


        $criminalhistory->datacase()->attach($datacase);

    }

}
