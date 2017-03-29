@extends("layouts/main")
@section("content")


    <div ng-app="CaseApp" ng-controller="CaseController">
        <br><h3>บันทึกทะเบียนประวัติบุคคลที่เกี่ยวข้องกับอาชญากรรม:</h3></br>


        <div class="modal fade bs-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคดี</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">เลขคดี:</label>

                                        <div class="col-sm-3">
                                            <input type="text" ng-model="caseFile.number_case" class="form-control" placeholder="เลขคดี">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" ng-model="caseFile.year_number_case" class="form-control" placeholder="ปี">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" ng-model="caseFile.station_number_case" class="form-control" placeholder="สถานนีตำรวจ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">คดี:</label>

                                        <div class="col-sm-7">

                                            <input type="text" ng-model="caseFile.cases_id" class="form-control" id="description" name="description">
                                            <select ng-model="caseFile.cases_id" class="form-control">


                                                <?php foreach($cases as $case) : ?>

                                                <option value="{{$case->id}}">{{$case->name_cases}}</option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">อาวุธที่ใช้กระทำความผิด:</label>
                                        <div class="col-sm-4">
                                            <input ng-model="Weapon.name_weapon" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button"  ng-click="addweapon()" class="btn btn-default" >เพิ่มอาวุธ</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">รายการอาวุธที่ใช้กระทำความผิด:</label>

                                        <div class="col-sm-5">
                                            <ui ng-repeat="dataweapon in caseFile.dataweapon" type=”1″>
                                                <li><label ng-bind="dataweapon.name_weapon"></label><button type="button"  ng-click="delweapon(dataweapon)" >ลบ</button>

                                            </ui>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">พาหนะที่ใช้กระทำความผิด ยี่ห้อ :</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicle_brand" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">รุ่น :</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicle_generation" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">สี :</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicl_color" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">หมายเลขทะเบียน หมวด:</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicle_group" type="text" class="form-control" id="amount" name="amount">
                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px;width:auto">เลข:</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicle_number" type="text" class="form-control" id="amount" name="amount">
                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px;width:auto">จังหวัด:</label>
                                        <div class="col-sm-2">
                                            <input ng-model="Vehicle.vehicle_province" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">
                                            </label>
                                        <div class="col-sm-2">
                                            <button type="button"  ng-click="addvehicle()" class="btn btn-default" >เพิ่มพาหนะ</button>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">รายการพาหนะที่ใช้กระทำความผิด:</label>

                                        <div class="col-sm-7">
                                            <ui ng-repeat="datavehicle in caseFile.datavehicle">
                                                <li><label ng-bind="'ยี่ห้อ : ' + datavehicle.vehicle_brand + ' รุ่น : ' + datavehicle.vehicle_generation
                                                +' สี : ' + datavehicle.vehicl_color + ' ทะเบียน :' + datavehicle.vehicle_group + ' '+ datavehicle.vehicle_number+' ' + datavehicle.vehicle_province">

                                                    </label><button type="button"  ng-click="delvehicle(datavehicle)" >ลบ</button>

                                            </ui>
                                        </div>

                                    </div>









                                    <h4>สถานที่เกิดเหตุ:</h4>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">บ้านเลขที่:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.houseno_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">หมู่บ้านที่:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.villageno_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">ถนน:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.road_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">ตรอก/ซอย:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.lane_alley_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">ตำบล:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.subdistrict_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">อำเภอ:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.disreict_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">จังหวัด:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.province_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">ประเทศ:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.contry_case" class="form-control" id="amount" name="amount" value="ประเทศไทย">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">พฤติการณ์คดี:</label>

                                        <div class="col-sm-7">
                                            <textarea ng-model="caseFile.circumstances_case" class="form-control" rows="7"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">วันที่เกิดเหตุ:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="caseFile.date_case" type="date" class="form-control" id="date" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">ผู้รับเเจ้ง:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.province_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">โทร:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.tel_case" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>






                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"  ng-click="saveCaseFileWrong()" class="btn btn-default" data-dismiss="modal">บันทึก</button>
                        <button type="button" ng-click="cancelCaseFileWrong()" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสถานที่ทำงาน</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">ชื่อที่ทำงาน:</label>

                                        <div class="col-sm-7">
                                            <input  ng-model="addoffice.office" type="text"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="addoffice.office_no" type="text"  class="form-control" >
                                            </left>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">หมู่บ้านที่:</label>

                                        <div class="col-sm-7">
                                            <input  ng-model="addoffice.office_village" type="text"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">ถนน:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_road" type="text"  class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">ซอย/ตรอก:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="addoffice.office_lane" type="text"  class="form-control">
                                            </left>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">ตำบล:</label>

                                        <div class="col-sm-7">
                                            <input  ng-model="addoffice.office_subdistrict" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">อำเภอ:</label>

                                        <div class="col-sm-7">
                                            <left><input  ng-model="addoffice.office_district" type="text"  class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" style="font-size: 11px">จังหวัด:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_province" type="text"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 11px">โทร:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_tel" type="text"  class="form-control">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"  ng-click="saveAddressOffice()" class="btn btn-default" data-dismiss="modal">บันทึก</button>
                        <button type="button" ng-click="cancelAddressOffice()" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลบุตร</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 11px">คำนำหน้า:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_nametitle" type="text" class="form-control" >

                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_name" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อสกุล:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_surname" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 11px">อายุ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_age" type="text" class="form-control" >
                                        </div>


                                        <label class="col-sm-1 control-label" style="font-size: 11px;"></label>

                                        <div class="col-sm-3 radio">
                                            <label>
                                                <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">มีชีวิต
                                            </label>
                                            <label>
                                                <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">เสียชีวิต
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1" style="font-size: 11px">บ้านเลขที่:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="child.child_houseno" type="text" class="form-control" >
                                            </left>
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">หมู่บ้านที่:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="child.child_villageno" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">ถนน:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_road" type="text" class="form-control" >
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1" style="font-size: 11px">ซอย/ตรอก:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="child.child_lane" type="text" class="form-control" >
                                            </left>
                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="child.child_subdistrict" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <left><input  ng-model="child.child_district" type="text" class="form-control" >
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-1 control-label" style="font-size: 11px">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_province" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="child.child_tel" type="text" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1" style="font-size: 11px">อาชีพ:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="child.child_career" type="text" class="form-control" >
                                            </left>
                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px">ที่ทำงาน:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="child.child_nameoffice" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                                        <div class="col-sm-3">
                                            <left><input  ng-model="child.child_tel" type="text" class="form-control" >
                                            </left>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"  ng-click="saveDatachill()" class="btn btn-default" data-dismiss="modal">บันทึก</button>
                        <button type="button" ng-click="cancelDatachill()" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="exampleModal4" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลพาหะนะ</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ยี่ห้อ:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="vehicle.vehicle_brand" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">รุ่น:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="vehicle.vehicle_generation" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">สี:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="vehicle.vehicle_color" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">หมายเลขทะเบียน:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_number" type="text" class="form-control" placeholder="หมวด">

                                        </div>
                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_number" type="text" class="form-control"  placeholder="เลขทะเบียน">

                                        </div>
                                        <div class="col-sm-3">
                                            <input ng-model="vehicle.vehicle_number" type="text" class="form-control"  placeholder="จังหวัด">

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" ng-click="saveDataVehicle()" class="btn btn-default"
                                data-dismiss="modal">บันทึก
                        </button>
                        <button type="button" ng-click="cancelCaseFileWrong()" class="btn btn-primary"
                                data-dismiss="modal">ยกเลิก
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลส่วนตัว</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ประเภทบุคคล:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.typepeople_id" class="form-control">
                            <?php foreach($typecase as $typecase_p) : ?>

                            <option value="{{$typecase_p->id}}">{{$typecase_p->name_type}}</option>

                            <?php endforeach; ?>


                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">คำนำหน้า:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.nametitle" type="text" class="form-control">

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label"  style="font-size: 11px;">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.surname" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px; width: auto">วัน/เดือน/ปีเกิด:</label>

                    <div class="col-sm-1">
                        <select ng-model="person.age" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 30; $age++) {   ?>

                            <option value="{{ $age }} วัน">{{ $age }} วัน</option>


                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-1">
                        <select ng-model="person.age" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 12; $age++) {   ?>

                            <option value="{{ $age }} เดือน">{{ $age }} เดือน</option>


                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-1">
                        <select ng-model="person.age" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 150; $age++) {   ?>

                            <option value="{{ $age }} ปี">{{ $age }}  ปี</option>


                            <?php } ?>
                        </select>

                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px; width: auto">นามเเฝง:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.alias" type="text" class="form-control" >

                    </div>
                </div>





                <div class="form-group">

                    <label class="col-sm-4 control-label" style="font-size: 11px; width: auto">หมายเลขหนังสือเดินทาง/หมายเลขบัตรประชาชน:</label>

                    <div class="col-sm-5">
                        <input ng-model="person.idcard" type="text" class="form-control">
                    </div>
                </div>

            </div>

        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ที่อยู่ปัจจุบัน</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.present_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;"style="font-size: 11px;">หมู่บ้านที่:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.present_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.present_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px;">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.present_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.present_subdistrict" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.present_district" type="text" class="form-control">
                        </left>
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.present_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ประเทศ:</label>
                    <div class="col-sm-3">
                        <input ng-model="person.present_country" type="text" class="form-control" readonly>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.present_tel" type="text" class="form-control">
                    </div>

                </div>

            </div>
        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ภูมิลำเนาเดิม</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.original_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หมู่บ้านที่:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.original_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.original_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px;">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.original_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;" >ตำบล:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.original_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.original_district" type="text" class="form-control">
                        </left>
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.original_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.original_country" type="text" class="form-control" readonly>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.original_tel" type="text" class="form-control">
                    </div>
                </div>


            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">สถานที่ทำงาน
                </h3>

            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <div class="form-group">

                        <label class="col-sm-1 control-label" style="font-size: 11px" >การศึกษา:</label>

                        <div class="col-sm-3">
                            <input type="text"  ng-model="addoffice.education" class="form-control" id="amount" name="amount">
                        </div>
                        <label class="col-sm-1 control-label" style="font-size: 11px" >อาชีพ:</label>

                        <div class="col-sm-3">
                            <input type="text"  ng-model="addoffice.career" class="form-control" id="amount" name="amount">
                        </div>
                    </div>



                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ชื่อสถานที่ทำงาน</th>
                            <th>สถานที่ตั้ง</th>
                            <th>เบอร์โทร</th>
                            <th>#</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr ng-repeat="dataoffice in person.addressoffice ">
                            <td ng-bind="dataoffice.office"></td>
                            <td ng-bind="'เลขที่ : ' + dataoffice.office_no + ' หมู่ที่ : '  +dataoffice.office_village + ' ถนน : '
                        +dataoffice.office_road + ' ซอย/ตรอก : ' +dataoffice.office_lane + ' ตำบล : ' +dataoffice.office_subdistrict +
                        ' อำเภอ : ' +dataoffice.office_district + ' จังหวัด : ' +dataoffice.office_province  + ' ประเทศ : ' +dataoffice.office_country "></td>
                            <td ng-bind="dataoffice.office_tel"></td>


                            <td >
                                <button ng-click="del_addressoffice(dataoffice)" type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button></td>


                        </tr>
                        </tbody>
                    </table>

                    <br>
                    <div align="center">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal2" data-whatever="@mdo">เพิ่มสถานที่ทำงาน
                        </button>

                        </br>
                    </div>
                </div>

            </div>
        </div>





        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลบิดา</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.father_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.father_surname" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;"></label>

                    <div class="col-sm-3 radio">
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">เสียชีวิต
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อายุ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.father_age" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.father_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.father_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.father_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1" style="font-size: 10px;">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.father_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.father_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.father_district" type="text" class="form-control">
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>
                    <div class="col-sm-3">
                        <input ng-model="person.father_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>
                    <div class="col-sm-3">
                        <input ng-model="person.father_tel" type="text" class="form-control">
                    </div>
                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">อาชีพ:</label>
                    <div class="col-sm-3">
                        <left><input  ng-model="person.father_career" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงาน:</label>
                    <div class="col-sm-3">
                        <input  ng-model="person.father_nameoffice" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงานโทร:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.father_tel" type="text" class="form-control">
                        </left>
                    </div>
                </div>

            </div>

        </div>




        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลมารดา</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_surname" type="text" class="form-control">
                    </div>


                    <label class="col-sm-1 control-label" style="font-size: 11px;"></label>

                    <div class="col-sm-3 radio">
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">เสียชีวิต
                        </label>
                    </div>

                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">อายุ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_age" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.mother_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.mother_villageno" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label"  style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1" style="font-size: 10px;">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.mother_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.mother_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.mother_district" type="text" class="form-control" >
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_province" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_tel" type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อาชีพ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.mother_career" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.mother_nameoffice" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงานโทร:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.mother_tel" type="text" class="form-control">
                        </left>
                    </div>
                </div>


            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลสามี/ภรรยา</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">คำนำหน้า:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_nametitle" type="text" class="form-control" >

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_name" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_surname" type="text" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อายุ:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_age" type="text" class="form-control" >
                    </div>


                    <label class="col-sm-1 control-label" style="font-size: 11px;"></label>

                    <div class="col-sm-3 radio">
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">เสียชีวิต
                        </label>
                    </div>
                </div>



                <div class="form-group">

                    <label class="col-sm-1  control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.spouse_houseno" type="text" class="form-control" >
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.spouse_villageno" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_road" type="text" class="form-control" >
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1  control-label"style="font-size: 10px;" >ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.spouse_lane" type="text" class="form-control" >
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.spouse_subdistrict" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.spouse_district" type="text" class="form-control" >
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_province" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.spouse_tel" type="text" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1  control-label" style="font-size: 11px;">อาชีพ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="person.spouse_career" type="text" class="form-control" >
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input  ng-model="person.spouse_nameoffice" type="text" class="form-control" >
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ที่ทำงานโทร:</label>

                    <div class="col-sm-3">
                        <left><input  ng-model="person.spouse_tel" type="text" class="form-control" >
                        </left>
                    </div>

                </div>

            </div>
        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลบุตร</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ชื่อ - สกุล</th>
                        <th>ที่อยู่</th>
                        <th>อาชีพ</th>
                        <th>สถานที่ทำงาน</th>
                        <th>เบอร์โทร</th>
                        <th>#</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="datachild in person.datachild ">
                        <td ng-bind="datachild.child_nametitle + ' ' + datachild.child_name + ' ' + datachild.child_surname + ' อายุ : ' + datachild.child_age + ' ปี (' + datachild.child_live_died +')'"  style="font-size: 12px"></td>
                        <td ng-bind="'เลขที่ : ' + datachild.child_houseno + ' หมู่ที่ : '  +datachild.child_villageno + ' ถนน : '
                        +datachild.child_road + ' ซอย/ตรอก : ' +datachild.child_lane + ' ตำบล : ' +datachild.child_subdistrict +
                        ' อำเภอ : ' +datachild.child_district + ' จังหวัด : ' +datachild.child_province  + ' ประเทศ : ' +datachild.child_country " style="font-size: 12px"></td>
                        <td ng-bind="datachild.child_career"  style="font-size: 12px"></td>
                        <td ng-bind="datachild.child_nameoffice"  style="font-size: 12px"></td>
                        <td ng-bind="datachild.child_tel"  style="font-size: 12px"></td>


                        <td >
                            <button ng-click="del_datachild(datachild)" type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button></td>


                    </tr>
                    </tbody>
                </table>

                <br>
                <div align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal3" data-whatever="@mdo">เพิ่มข้อมูลบุตร
                    </button>

                    </br>
                </div>


            </div>
        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ตำหนิรูปพรรณ</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">รูปร่าง:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.shape" class="form-control">

                            <option value="สันทัด">สันทัด</option>
                            <option value="อ้วน">อ้วน</option>
                            <option value="เตี้ย">เตี้ย</option>
                            <option value="ผอม">ผอม</option>
                            <option value="สูง">สูง</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ฟัน:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.teeth" class="form-control">

                            <option value="ปกติ">ปกติ</option>
                            <option value="เหยิน">เหยิน</option>
                            <option value="หลอ">หลอ</option>
                            <option value="ขาว">ขาว</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">คิ้ว:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.eyebrow" class="form-control">

                            <option value="หนา">หนา</option>
                            <option value="บาง">บาง</option>
                            <option value="คิ้วต่อ">คิ้วต่อ</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ผิว:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.skin" class="form-control">

                            <option value="ดำ">ดำ</option>
                            <option value="ขาว">ขาว</option>
                            <option value="ดำแดง">ดำแดง</option>
                            <option value="ขาวเหลือง">ขาวเหลือง</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ทรงผม:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.hairstyles" class="form-control">

                            <option value="รองทรง">รองทรง</option>
                            <option value="สั้นเกรียน">สั้นเกรียน</option>
                            <option value="แสกซ้าย">แสกซ้าย</option>
                            <option value="หยิกหยักโศก">หยิกหยักโศก</option>
                            <option value="ยาวประป่า">ยาวประป่า</option>
                            <option value="อื่นๆ">อื่นๆ</option>


                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ศีรษะ:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.head" class="form-control">

                            <option value="สามเหลี่ยม">สามเหลี่ยม</option>
                            <option value="สี่เหลี่ยม">สี่เหลี่ยม</option>
                            <option value="กลม">กลม</option>
                            <option value="รูปไข่">รูปไข</option>
                            <option value="หัวล้าน">หัวล้าน</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ใบหน้า:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.face" class="form-control">

                            <option value="รูปไข่">รูปไข่</option>
                            <option value="สี่เหลี่ยม">สี่เหลี่ยม</option>
                            <option value="สามเหลี่ยม">สามเหลี่ยม</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตา:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.eye" class="form-control">

                            <option value="เล็ก">เล็ก</option>
                            <option value="ตี่">ตี่</option>
                            <option value="ตาสองชั้น">ตาสองชั้น</option>
                            <option value="ชั้นเดียว">ชั้นเดียว</option>
                            <option value="ตาเหล่">ตาเหล่</option>
                            <option value="ตาบอด">ตาบอด</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หู:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.ear" class="form-control">

                            <option value="กวง">กาง</option>
                            <option value="บาน">บาน</option>
                            <option value="แหว่ง">แหว่ง</option>
                            <option value="ปกติ">ปกติ</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จมูก:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.nose" class="form-control">

                            <option value="โด่ง">โด่ง</option>
                            <option value="แบน">แบน</option>
                            <option value="โหว่">โหว่</option>
                            <option value="ธรรมดา">ธรรมดา</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ปาก:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.mouth" class="form-control">

                            <option value="หนา">หนา</option>
                            <option value="บาง">บาง</option>
                            <option value="แหว่ง">แหว่ง</option>
                            <option value="กว้าง">กว้าง</option>
                            <option value="กระจับ">กระจับ</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">คาง:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.chin" class="form-control">

                            <option value="สี่เหลี่ยม">สี่เหลี่ยม</option>
                            <option value="สามเหลี่ยม">สามเหลี่ยม</option>
                            <option value="มน">มน</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">หนวด/เครา:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.mirror" class="form-control">

                            <option value="หนวดยาว">หนวดยาว</option>
                            <option value="หนาวสั้น">หนาวสั้น</option>
                            <option value="มีเครา">มีเครา</option>
                            <option value="ไม่มีเครา">ไม่มีเครา</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>

                    </div>
                    <label class="col-sm-1 control-label">ตำหนิ:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.scar" class="form-control">
                            <option value="ไฝ">ไฝ</option>
                            <option value="ปาน">ปาน</option>
                            <option value="รอยเเผลเป็น">รอยเเผลเป็น</option>
                            <option value="อื่นๆ">อื่นๆ</option>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">สำเนียง:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.accent" class="form-control">

                            <option value="ภาคกลาง">ภาคกลาง</option>
                            <option value="ภาคอีสาน">ภาคอีสาน</option>
                            <option value="ภาคเหนือ">ภาคเหนือ</option>
                            <option value="ภาคใต้">ภาคใต้</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ลักษณะเด่น:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.nature" class="form-control">

                            <option value="ตาเหล่">ตาเหล่</option>
                            <option value="ตาบอด">ตาบอด</option>
                            <option value="นิ้วหัวเเม่มืดซ้ายด้วน">นิ้วหัวเเม่มืดซ้ายด้วน</option>
                            <option value="ขาเป้">ขาเป้</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อุนิสัย:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.personality" type="text" class="form-control" id="concept"
                               name="concept">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">สถานที่เที่ยวเตร่:</label>

                    <div class="col-sm-3">
                        <input ng-model="person.location_gallivent" type="text" class="form-control" id="concept"
                               name="concept">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ส่วนสูง:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.height" class="form-control">
                            <?php
                            for ($height = 1; $height<= 200; $height++) {   ?>

                            <option value="{{ $height }}">{{ $height }}  เซนติเมตร</option>


                            <?php } ?>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">น้ำหนัก:</label>

                    <div class="col-sm-3">
                        <select ng-model="person.weight" class="form-control" >
                            <?php
                            for ($weight = 1; $weight <= 250; $weight++) {   ?>

                            <option value="{{ $weight }}">{{ $weight }}  กิโลกรัม</option>


                            <?php } ?>
                        </select>
                    </div>

                </div>


            </div>
        </div>




        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลคดี</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-sm-12">

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>คดี</th>
                                <th>พฤติการณ์คดี</th>
                                <th>สถานที่เกิดเหตุ</th>
                                <th>อาวุธ ที่ใช้ก่อเหตุ</th>
                                <th>#</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="datacase in person.data_casefile ">
                                <td ng-bind="datacase.cases_id" style="font-size: 12px"></td>
                                <td ng-bind="datacase.circumstances_case" style="font-size: 12px"></td>
                                <td ng-bind="' บ้านเลขที่ : ' + datacase.houseno_case + ' หมู่ที่ : '  +datacase.villageno_case + ' ถนน : '
                        +datacase.road_case + ' ซอย/ตรอก : ' +datacase.lane_alley_case + ' ตำบล : ' +datacase.subdistrict_case +
                        ' อำเภอ : ' +datacase.disreict_case + ' จังหวัด : ' +datacase.province_case  + ' ประเทศ : ' +datacase.contry_case " style="font-size: 12px"></td>
                                <td ng-bind="datacase.weapon_case" style="font-size: 12px"></td>
                                <td >
                                    <button ng-click="del_datacase(datacase)" type="button" class="btn btn-default" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button></td>


                            </tr>
                            </tbody>
                        </table>

                        <br>

                        <div align="center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal1" data-whatever="@mdo">เพิ่มคดี
                            </button>

                            </br>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <br>
        <div align="center">
            <button type="button" ng-click="savepreson()" class="btn btn-primary">บันทึก</button>
            <button type="button" ng-click="resetpreson()" class="btn btn-danger">รีเซต</button>
        </div>

    </div>







@stop

@section('javascript')




    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">
        initInputHighlightScript();
        var app = angular.module("CaseApp",[]);



        app.controller("CaseController",function($scope,$http){
            console.log("presonController.start");
//
            $scope.person = {};
            $scope.caseFile = {};
            $scope.child = {};
            $scope.addoffice = {};

            $scope.Weapon = {};
            $scope.Vehicle = {};


            $scope.person.addressoffice = [];
            $scope.person.datachild = [];
            $scope.person.data_casefile = [];

            $scope.caseFile.dataweapon = [];
            $scope.caseFile.datavehicle = [];

            $scope.cases = [];
            $scope.person.original_country = 'ประเทศไทย';
            $scope.person.present_country = 'ประเทศไทย';



            $scope.addvehicle = function(){
                console.log($scope.Vehicle);
                $scope.caseFile.datavehicle.push($scope.Vehicle);
                $scope.Vehicle = {};
            }
            $scope.delvehicle  = function(datavehicle){
                var index = $scope.caseFile.datavehicle.indexOf(datavehicle);
                $scope.caseFile.datavehicle.splice(index,1);
            }



            $scope.addweapon = function(){
                console.log($scope.Weapon);
                $scope.caseFile.dataweapon.push($scope.Weapon);
                $scope.Weapon = {};
            }
            $scope.delweapon  = function(dataweapon){
                var index = $scope.caseFile.dataweapon.indexOf(dataweapon);
                $scope.caseFile.dataweapon.splice(index,1);
            }


            $scope.saveDatachill = function(){
                console.log($scope.child);
                $scope.person.datachild.push($scope.child);
                $scope.child = {};
            }
            $scope.cancelDatachill  = function(){
                $scope.child = {};

            }


            $scope.saveCaseFileWrong = function(){
                console.log($scope.caseFile);
                $scope.person.data_casefile.push($scope.caseFile);
                $scope.caseFile = {};
                $scope.Weapon = {};
                $scope.caseFile.dataweapon = [];
            }
            $scope.cancelCaseFileWrong = function(){
                $scope.caseFile = {};
                $scope.Weapon = {};
                $scope.caseFile.dataweapon = [];
            }


            $scope.saveAddressOffice = function(){
                console.log($scope.addoffice);
                $scope.person.addressoffice.push($scope.addoffice);
                $scope.addoffice = {};
            }
            $scope.cancelAddressOffice = function(){
                $scope.addoffice = {};
            }

            $scope.del_addressoffice = function(dataoffice){
                var index = $scope.person.addressoffice.indexOf(dataoffice);
                $scope.person.addressoffice.splice(index,1);
            }

            $scope.del_datacase = function(datacase){
                var index = $scope.person.data_casefile.indexOf(datacase);
                $scope.person.data_casefile.splice(index,1);
            }
            $scope.del_datachild = function(datachild){
                var index = $scope.person.datachild.indexOf(datachild);
                $scope.person.datachild.splice(index,1);
            }


            $scope.resetpreson = function(){
                $scope.person = {};
                $scope.caseFile = {};
            }

            $scope.savepreson = function(){

                saveCaseFile = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";
                console.log($scope.person);
                if (confirm(saveCaseFile)) {

                   console.log($scope.person);

//                    for(i=0;i<$scope.cases.length;i++){
//                        if ($scope.cases[i].name_cases == $scope.person.data_casefile.cases_id){
//                            $scope.person.data_casefile.cases_id = $scope.cases[i].id;
//                            break;
//                        }
//                    }

                    $http({
                        url : "/api/preson",
                        method : "post",
                        data : $scope.person

                    }).success(function(){
                        //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                        massged = "บันทึกข้อมูลเสร็จแล้ว";
                        alert(massged);



                    })
                }
            }
        });

    </script>





@stop
