@extends("layouts/main")
@section("content")

    <div ng-app="CaseApp" ng-controller="CaseController">
        <br>

        <h3>บันทึกทะเบียนประวัติบุคคลทั่วไป :</h3></br>


        <div class="modal fade bs-example-modal-lg" id="exampleModal6" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคนรับใช้-ลูกจ้าง</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">


                                    <div class="form-group">

                                        <label class="col-md-1 control-label " style="font-size: 11px;width: auto">หนังสือเดินทาง/เลขบัตรประชาชน:</label>

                                        <div class="col-sm-6">
                                            <left><input ng-model="employee.employee_idnumber" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class="col-md-1 control-label" style="font-size: 11px">คำนำหน้า:</label>

                                        <div class="col-sm-2">
                                            <left><input ng-model="employee.employee_nametitle" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_name" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">ชื่อสกุล:</label>

                                        <div class="col-sm-2">
                                            <left><input ng-model="employee.employee_surname" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">อายุ:</label>

                                        <div class="col-sm-1">
                                            <left><input ng-model="employee.employee_age" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-md-1 control-label" style="font-size: 11px">อาชีพ:</label>

                                        <div class="col-sm-2">
                                            <left><input ng-model="employee.employee_career" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px;width: auto">ที่ทำงาน:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_nameoffice" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px;width: auto">เบอร์โทรที่ทำงาน:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_tel" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <h4>ที่อยู่ตามภูมิลำเนาเดิม</h4>
                                    <div class="form-group">

                                        <label class="col-md-1 control-label" style="font-size: 11px">บ้านเลขที่:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_houseno" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">หมู่ที่:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_villageno" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">ถนน:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_road" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-1 control-label" style="font-size: 10px">ซอย/ตรอก:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_land" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>

                                        <label class="col-md-1 control-label" style="font-size: 11px">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_subdistrict" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_district" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-1 control-label" style="font-size: 11px">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_province" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>


                                        <label class="col-md-1 control-label" style="font-size: 11px">โทร:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="employee.employee_tel" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                </div>

                                </div>

                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" ng-click="saveDataEmployee()" class="btn btn-default"
                                    data-dismiss="modal">บันทึก
                            </button>
                            <button type="button" ng-click="cancelDataEmployee()" class="btn btn-primary"
                                    data-dismiss="modal">ยกเลิก
                            </button>
                        </div>

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
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลพาหนะ</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ยี่ห้อ:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_brand" type="text" class="form-control">

                                        </div>
                                        <label class="col-sm-1 control-label" style="width: auto">รุ่น:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_generation" type="text" class="form-control">

                                        </div>
                                        <label class="col-sm-1 control-label" style="width: auto">สี:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_color" type="text" class="form-control">

                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">หมายเลขทะเบียน หมวด:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_group" type="text" class="form-control" placeholder="หมวด">

                                        </div>
                                        <label class="col-sm-1 control-label" style="width: auto">เลข:</label>
                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_number" type="text" class="form-control" placeholder="หมายเลข">

                                        </div>
                                        <label class="col-sm-1 control-label" style="width: auto">จังหวัด:</label>
                                        <div class="col-sm-2">
                                            <input ng-model="vehicle.vehicle_province" type="text" class="form-control" placeholder="จังหวัด">

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
                        <button type="button" ng-click="cancelDataVehicle()" class="btn btn-primary"
                                data-dismiss="modal">ยกเลิก
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg" id="exampleModal5" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลบุคคลที่อยู่ร่วมกันในครอบครัว</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">หนังสือเดินทาง/เลขบัตรประชาชน:</label>

                                        <div class="col-sm-5">
                                            <input ng-model="family.personfamily_age" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 10px;width: auto">คำนำหน้า:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="family.nametitle_id" type="text" class="form-control">
                                        </div>


                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_name" type="text" class="form-control">

                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ชื่อสกุล:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="family.personfamily_surname" type="text" class="form-control">

                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อายุ:</label>

                                        <div class="col-sm-1">
                                            <input ng-model="family.personfamily_age" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"style="font-size: 11px">อาชีพ:</label>

                                        <div class="col-sm-2">
                                            <input ng-model="family.personfamily_career" type="text" class="form-control">

                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ที่ทำงาน:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_nameoffice" type="text" class="form-control">

                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">เบอร์โทรที่ทำงาน:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_nameoffice_tel" type="text" class="form-control">

                                        </div>
                                    </div>

                                    <h4>ที่อยู่ตามภูมิลำเนาเดิม</h4>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 10px;">บ้านเลขที่:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="family.personfamily_houseno" type="text" class="form-control">
                                            </left>
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 10px;"style="font-size: 11px;">หมู่ที่:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="family.personfamily_villageno" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_road" type="text" class="form-control">
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" style="font-size: 9px;">ซอย/ตรอก:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="family.personfamily_lane" type="text" class="form-control">
                                            </left>
                                        </div>

                                        <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="family.personfamily_subdistrict" type="text" class="form-control" >
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <left><input  ng-model="family.personfamily_district" type="text" class="form-control">
                                            </left>
                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_province" type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="family.personfamily_tel" type="text" class="form-control">
                                        </div>
                                    </div>



                                </div>


                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" ng-click="saveDataFamily()" class="btn btn-default"
                                    data-dismiss="modal">บันทึก
                            </button>
                            <button type="button" ng-click="cancelDataFamily()" class="btn btn-primary"
                                    data-dismiss="modal">ยกเลิก
                            </button>
                        </div>

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
                                        <label class="col-sm-3 control-label">ชื่อที่ทำงาน:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">เลขที่:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_no" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">หมู่ที่:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_village" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ถนน:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_road" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ซอย/ตรอก:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_lane" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ตำบล:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_subdistrict" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">อำเภอ:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_district" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">จังหวัด:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_province" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ประเทศ:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_country" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">โทร:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="addoffice.office_tel" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" ng-click="saveDataOffice()" class="btn btn-default"
                                data-dismiss="modal">บันทึก
                        </button>
                        <button type="button" ng-click="cancelDataOffice()" class="btn btn-primary"
                                data-dismiss="modal">ยกเลิก
                        </button>
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
                                        <label class="col-sm-3 control-label">คำนำหน้า:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.nametitle_id" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ชื่อ:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_name" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ชื่อสกุล:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_surname" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">อายุ:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_age" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">อาชีพ:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_career" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ที่ทำงาน:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_nameoffice" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">โทร:</label>

                                        <div class="col-sm-7">
                                            <left><input ng-model="child.child_tel" type="text"
                                                         class="form-control">
                                            </left>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" ng-click="saveCaseFileWrong()" class="btn btn-default"
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
                        <select ng-model="guest.typepeople_id" type="text" class="form-control">
                            <?php foreach($typepeple as $typepeple_g) : ?>

                            <option value="{{$typepeple_g->id}}">{{$typepeple_g->name_type}}</option>

                            <?php endforeach; ?>

                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">หนังสือเดินทาง/เลขประจำตัวประชาชาน:</label>

                    <div class="col-sm-5">
                        <input ng-model="guest.idcard" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">คำนำหน้า:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.nametitle" type="text" class="form-control">

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.surname" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px; width: auto">วัน/เดือน/ปีเกิด:</label>

                    <div class="col-sm-1">
                        <select ng-model="person.day_birth" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 30; $age++) {   ?>

                            <option value="{{ $age }} วัน">{{ $age }} วัน</option>


                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-1">
                        <select ng-model="person.month_birth" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 12; $age++) {   ?>

                            <option value="{{ $age }} เดือน">{{ $age }} เดือน</option>


                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-1">
                        <select ng-model="person.year_birth" class="form-control" >
                            <?php
                            for ($age = 1; $age <= 150; $age++) {   ?>

                            <option value="{{ $age }} ปี">{{ $age }}  ปี</option>


                            <?php } ?>
                        </select>

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อายุ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.age" type="text" class="form-control">

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
                        <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อาชีพ:</label>

                        <div class="col-sm-3">
                            <input ng-model="guest.career" type="text" class="form-control">
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
                        <tr ng-repeat="dataoffice in guest.addoffice ">
                            <td ng-bind="dataoffice.office"></td>
                            <td ng-bind=""></td>
                            <td ng-bind="dataoffice.office_tel"></td>


                            <td>
                                <button ng-click="del_dataoffice(dataoffice)" type="button" class="btn btn-default"
                                        aria-label="Left Align">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </td>


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
                <h3 class="panel-title">ที่อยู่ปัจจุบัน</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">เลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.present_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.present_villageno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.present_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.present_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px">ตำบล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.present_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.present_district" type="text" class="form-control">
                        </left>
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.present_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.present_country" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.present_tel" type="text" class="form-control">
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
                    <label class="col-sm-1 control-label" style="font-size: 11px">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.original_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">หมู่บ้านที่:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.original_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px">ตำบล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.original_district" type="text" class="form-control">
                        </left>
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_country" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.original_tel" type="text" class="form-control">
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
                        <input ng-model="guest.father_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_surname" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อายุ:</label>

                    <div class="col-sm-1">
                        <input ng-model="guest.father_age" type="text" class="form-control">
                    </div>

                    <div class="col-sm-2 radio">
                        <label>
                            <input ng-model="guest.father_live_died" type="radio" name="blankRadio" id="blankRadio1" value="มีชีวิต" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input ng-model="guest.father_live_died" type="radio" name="blankRadio" id="blankRadio1" value="เสียชีวิค" aria-label="...">เสียชีวิต
                        </label>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.father_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px;">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.father_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px;">ตำบล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.father_district" type="text" class="form-control">
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px;">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_country" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_tel" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px;">อาชีพ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_career" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 9px;">ที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_nameoffice" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;">เบอร์โทรที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.father_nameoffice_tel" type="text" class="form-control">
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
                    <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ชื่อสกุล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อายุ:</label>

                    <div class="col-sm-1">
                        <input ng-model="guest.mother_age" type="text" class="form-control">
                    </div>

                    <div class="col-sm-2 radio">
                        <label>
                            <input ng-model="guest.mother_live_died" type="radio" name="blankRadio" id="blankRadio1" value="มีชีวิต" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input ng-model="guest.mother_live_died" type="radio" name="blankRadio" id="blankRadio1" value="เสียชีวิต" aria-label="...">เสียชีวิต
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.mother_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_road" type="text" class="form-control">
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.mother_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px">ตำบล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.mother_district" type="text" class="form-control">
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_country" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_tel" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">อาชีพ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_career" type="text" class="form-control">
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px">ที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.mother_nameoffice" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">เบอร์โทรที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.mother_nameoffice_tel" type="text" class="form-control">
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
                    <label class="col-sm-1 control-label" style="font-size: 11px">คำนำหน้า:</label>

                    <div class="col-sm-2">
                        <input ng-model="guest.nametitle_id" type="text" class="form-control">

                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ชื่อ:</label>

                    <div class="col-sm-2">
                        <input ng-model="guest.spouse_name" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">ชื่อสกุล:</label>

                    <div class="col-sm-2">
                        <input ng-model="guest.spouse_surname" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px;width: auto">อายุ:</label>

                    <div class="col-sm-1">
                        <input ng-model="guest.spouse_age" type="text" class="form-control">
                    </div>
                    <div class="col-sm-3 radio" style="width: auto">
                        <label>
                            <input ng-model="guest.spouse_live_died" type="radio" name="blankRadio" id="blankRadio1" value="มีชีวิต" aria-label="...">มีชีวิต
                        </label>
                        <label>
                            <input ng-model="guest.spouse_live_died" type="radio" name="blankRadio" id="blankRadio1" value="เสียชีวิต" aria-label="...">เสียชีวิต
                        </label>
                    </div>


                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">บ้านเลขที่:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.spouse_houseno" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">หมู่ที่:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_villageno" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ถนน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_road" type="text" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 10px">ซอย/ตรอก:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.spouse_lane" type="text" class="form-control">
                        </left>
                    </div>

                    <label class="col-sm-1 control-label" style="font-size: 11px">ตำบล:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_subdistrict" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">อำเภอ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.spouse_district" type="text" class="form-control">
                        </left>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label" style="font-size: 11px">จังหวัด:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_province" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ประเทศ:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_country" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">โทร:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_tel" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="font-size: 11px">อาชีพ:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="spouse.spouse_career" type="text" class="form-control">
                        </left>
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">ที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <input ng-model="guest.spouse_nameoffice" type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" style="font-size: 11px">เบอร์โทรที่ทำงาน:</label>

                    <div class="col-sm-3">
                        <left><input ng-model="guest.spouse_nameoffice_tel" type="text" class="form-control">
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
                        <th style="width: 30%">ชื่อ-สกุล</th>
                        <th style="width: 10%">อายุ</th>
                        <th style="width: 30%">ที่ทำงาน</th>
                        <th style="width: 20%">เบอร์โทร</th>
                        <th style="width: 5%">#</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="datacase in person.data_casefile ">
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>


                        <td>
                            <button ng-click="del_datacase(datacase)" type="button" class="btn btn-default"
                                    aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>


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
                <h3 class="panel-title">ยานพาหนะ</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th style="width: 20%">ยี่ห้อ</th>
                        <th style="width: 20%">รุ่น</th>
                        <th style="width: 5%">สี</th>
                        <th style="width: 40%">หมายเลขทะเบียน</th>
                        <th style="width: 5%">#</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="datavehicle in guest.vehicle ">
                        <td ng-bind="datavehicle.vehicle_brand"></td>
                        <td ng-bind="datavehicle.vehicle_generation"></td>
                        <td ng-bind="datavehicle.vehicl_color"></td>
                        <td ng-bind="datavehicle.vehicle_group + ' ' +datavehicle.vehicle_number+ ' ' +datavehicle.vehicle_province"></td>


                        <td>
                            <button ng-click="del_datavehicle(datavehicle)" type="button" class="btn btn-default"
                                    aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>


                    </tr>
                    </tbody>
                </table>

                <br>

                <div align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal4" data-whatever="@mdo">เพิ่มยานพาหะนะ
                    </button>

                    </br>
                </div>

            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">บุคคลที่อยู่ร่วมในครอบครัว</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>ชื่อสกุล</th>
                        <th>อายุ</th>
                        <th>หมายเลขบัตร</th>
                        <th>อาชีพ</th>
                        <th>#</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="datacase in person.data_casefile ">
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>


                        <td>
                            <button ng-click="del_datacase(datacase)" type="button" class="btn btn-default"
                                    aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>


                    </tr>
                    </tbody>
                </table>

                <br>

                <div align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal5" data-whatever="@mdo">เพิ่มบุคคลที่อยู่ร่วมในครอบครัว
                    </button>

                    </br>
                </div>

            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">คนรับใช้-ลูกจ้าง</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>ชื่อสกุล</th>
                        <th>อายุ</th>
                        <th>หมายเลขบัตร</th>
                        <th>#</th>
                    </tr>
                    </thead>

                    <tbody >
                    <tr ng-repeat="datacase in person.data_casefile ">
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>
                        <td ng-bind=""></td>


                        <td>
                            <button ng-click="del_datacase(datacase)" type="button" class="btn btn-default"
                                    aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>


                    </tr>
                    </tbody>
                </table>

                <br>

                <div align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal6" data-whatever="@mdo">เพิ่มคนรับใช้/ลูกจ้าง
                    </button>

                    </br>
                </div>

            </div>
        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">อื่นๆที่น่าสนใจ</h3>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-1" style="font-size: 11px;width: auto">อื่นๆที่น่าสนใจ:</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>


            </div>
        </div>

        <br>

        <div align="center">
            <button type="button" ng-click="saveDataGuest()" class="btn btn-primary">บันทึก</button>
            <button type="button" ng-click="resetDataGuest()" class="btn btn-danger">รีเซต</button>
        </div>

    </div>




@stop

@section('javascript')




    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">
        initInputHighlightScript();
        var app = angular.module("CaseApp", []);


        app.controller("CaseController", function ($scope, $http) {
            console.log("presonController.start");

            $scope.person = {};
            $scope.caseFile = {};

            $scope.guest = {};


            $scope.family = {};
            $scope.addoffice = {};
            $scope.child = {};
            $scope.employee = {};
            $scope.vehicle = {};


            $scope.guest.family = [];
            $scope.guest.addoffice = [];
            $scope.guest.child = [];
            $scope.guest.vehicle = [];
            $scope.guest.employee = [];

            $scope.cases = [];
            //$scope.test = [$scope.person.data_casefile];

            $scope.saveDataFamily = function () {
                console.log($scope.family);
                $scope.guest.family.push($scope.family);
                $scope.family = {};
            }
            $scope.cancelDataFamily = function () {
                $scope.family = {};
            }




            $scope.saveDataOffice = function () {
                console.log($scope.addoffice);
                $scope.guest.addoffice.push($scope.addoffice);
                $scope.addoffice = {};
            }
            $scope.cancelDataOffice = function () {
                $scope.addoffice = {};
            }




            $scope.saveDataChild = function () {
                console.log($scope.child);
                $scope.guest.child.push($scope.child);
                $scope.child = {};
            }
            $scope.cancelDataChild = function () {
                $scope.child = {};
            }


            $scope.saveDataEmployee = function () {
                console.log($scope.employee);
                $scope.guest.employee.push($scope.employee);
                $scope.employee = {};
            }
            $scope.cancelDataEmployee = function () {
                $scope.employee = {};
            }


            $scope.saveDataVehicle = function () {
                console.log($scope.vehicle);
                $scope.guest.vehicle.push($scope.vehicle);
                $scope.vehicle = {};
            }
            $scope.cancelDataVehicle = function () {
                $scope.vehicle = {};
            }





            $scope.resetDataGuest = function () {
                $scope.person = {};
                $scope.caseFile = {};
            }


            $scope.del_datacase = function (datacase) {
                var index = $scope.person.data_casefile.indexOf(datacase);
                $scope.person.data_casefile.splice(index, 1);
            }


            $scope.saveDataGuest = function () {

                console.log($scope.guest);
                saveCaseFile = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";


                if (confirm(saveCaseFile)) {


                    $http({
                        url: "/api/guesthistory",
                        method: "post",
                        data: $scope.guest
                    }).success(function () {
                        //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                        massged = "บันทึกข้อมูลเสร็จแล้ว";
                        alert(massged);

//                        $scope.person = {};
//                        $scope.supects = {};
//                        $scope.caseFile = {};

                    })
                }
            }
        });

    </script>





@stop
