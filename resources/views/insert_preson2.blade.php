@extends("layouts/main")
@section("content")

    <div ng-app="CaseApp" ng-controller="CaseController">
        <br><h3>บันทึกทะเบียนประวัติ :</h3></br>


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
                                        <label class="col-sm-3 control-label">เลขคดี:</label>

                                        <div class="col-sm-7">
                                            <input type="text" ng-model="caseFile.number_case" class="form-control" id="concept" name="concept">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">คดี:</label>

                                        <div class="col-sm-7">

                                            <input type="text" ng-model="caseFile.cases_id" class="form-control" id="description" name="description">
                                            <select ng-model="caseFile.cases_id" class="form-control">


                                                <?php foreach($cases as $case) : ?>

                                                <option value="{{$case->id}}">{{$case->name_cases}}</option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>
                                    </div>

                                    <h4>สถานที่เกิดเหตุ:</h4>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">บ้านเลขที่:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.houseno" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">หมู่บ้านที่:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.villageno" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">ถนน:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.road" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">ตรอก/ซอย:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.lane_alley" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">ตำบล:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.subdistrict" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">อำเภอ:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.disreict" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">จังหวัด:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.province" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label">ประเทศ:</label>

                                        <div class="col-sm-7">
                                            <input type="text"  ng-model="caseFile.contry" class="form-control" id="amount" name="amount" value="ประเทศไทย">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">พฤติการณ์คดี:</label>

                                        <div class="col-sm-7">
                                            <textarea ng-model="caseFile.circumstances_of_case" class="form-control" rows="7"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">วันที่เกิดเหตุ:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="caseFile.case_date" type="date" class="form-control" id="date" name="date">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">ชื่อ เจ้าของคดี:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="caseFile.name_police_of_case" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">นามสกุล เจ้าของคดี:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="caseFile.surname_of_case" type="text" class="form-control" id="amount" name="amount">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">เบอร์โทรศัพท์:</label>

                                        <div class="col-sm-7">
                                            <input ng-model="caseFile.tel_of_case" type="text" class="form-control" id="amount" name="amount">
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



        <div class="row">

        <div class="form-group">
            <label class="col-sm-1 control-label">ประเภท:</label>

            <div class="col-sm-5">
                <select ng-model="person.type_id" class="form-control">


                    <?php foreach($type as $type_p) : ?>

                    <option value="{{$type_p->id}}">{{$type_p->name_type}}</option>

                    <?php endforeach; ?>

                </select>
            </div>
            <label class="col-sm-1 control-label">สถานะ:</label>

            <div class="col-sm-5">
                <select ng-model="person.status_id" class="form-control">

                    <option value=""></option>
                    <?php foreach($status as $status_p) : ?>

                    <option value="{{$status_p->id}}">{{$status_p->name_status}}</option>

                    <?php endforeach; ?>
                </select>
            </div>


        </div>


        <div class="form-group">

            <label class="col-sm-3">เลขบัตร / เลข Passport : </label>
            <div class="col-sm-5">
                <input  ng-model="person.number_passport" type="text" class="form-control" id="concept"
                        name="concept" maxlength="17" onkeyup="autoTab(this)">
            </div>


        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.name_title" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.name" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input  ng-model="person.surname" type="text" class="form-control" id="concept"
                        name="concept">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">นามแผง/ชื่อเล่น :</label>

            <div class="col-sm-3">
                <input  ng-model="person.nickname" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">วันเกิด:</label>

            <div class="col-sm-3">
                <input  ng-model="person.birth" type="date" class="form-control" id="date" name="date">
            </div>
            <label class="col-sm-1 control-label">เพศ:</label>

            <div class="col-sm-3">
                <select ng-model="person.sex_id" class="form-control">

                    <option value=""></option>
                    <?php foreach($sex as $sex_p) : ?>

                    <option value="{{$sex_p->id}}">{{$sex_p->name_sex}}</option>

                    <?php endforeach; ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.nationality" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.racet" type="text" class="form-control" id="concept"
                        name="concept">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สีผิว:</label>

            <div class="col-sm-3">
                <input  ng-model="person.skin_color" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">ผมศรีษะ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.head" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">รูปหน้า:</label>

            <div class="col-sm-3">
                <input  ng-model="person.face" type="text" class="form-control" id="concept"
                        name="concept">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">น้ำหนัก</label>

            <div class="col-sm-3">
                <select ng-model="person.weight" class="form-control" >
                    <?php
                    for ($weight = 0; $weight <= 250; $weight++) {   ?>

                    <option value="{{ $weight }}">{{ $weight }}  กิโลกรัม</option>


                    <?php } ?>
                </select>
            </div>
            <label class="col-sm-1 control-label">ส่วนสูง:</label>

            <div class="col-sm-3">
                <select ng-model="person.height" class="form-control">
                    <?php
                    for ($height = 0; $height<= 200; $height++) {   ?>

                    <option value="{{ $height }}">{{ $height }}  เซนติเมตร</option>


                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">ตำหนิ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.blame" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">ลายสัก:</label>

            <div class="col-sm-3">
                <input ng-model="person.tattoo"  type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>

        <br><h4>สถานที่เกิด</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <input ng-model="person.subdistrict_birth" type="text" class="form-control" id="concept"
                       name="concept">

            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <input ng-model="person.district_birth" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input ng-model="person.province_birth" type="text" class="form-control" id="concept"
                       name="concept">
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">ประเทศ:</label>

            <div class="col-sm-3">
                <input ng-model="person.contry_birth" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>

        <br><h4>ข้อมูลที่อยู่คนเข้ามาประเทศไทย</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <left><input  ng-model="person.subdistrict_in_foreign" type="text" class="form-control" id="concept"
                              name="concept">
                </left>
            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <input ng-model="person.district_in_foreign" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input  ng-model="person.province_in_foreign" type="text" class="form-control" id="concept"
                        name="concept">
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">ประเทศ:</label>

            <div class="col-sm-3">
                <input ng-model="person.contry_in_foreign" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>


        <br><h4>ข้อมูลที่อยู่ในประเทศไทย</h4></br>
        <div class="form-group">
            <label class="col-sm-1">บ้านเลขที่:</label>

            <div class="col-sm-3">
                <left><input ng-model="person.houseno_in_thai" type="text" class="form-control" id="concept"
                             name="concept">
                </left>
            </div>
            <label class="col-sm-1 control-label">หมู่บ้านที่:</label>

            <div class="col-sm-3">
                <input  ng-model="person.villageno_in_thai" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">ถนน:</label>

            <div class="col-sm-3">
                <input ng-model="person.road_in_thai" type="text" class="form-control" id="concept"
                       name="concept">
            </div>


        </div>
        <div class="form-group">
            <label class="col-sm-1">ซอย/ตรอก:</label>

            <div class="col-sm-3">
                <left><input ng-model="person.lane_alley_in_thai" type="text" class="form-control" id="concept"
                             name="concept">
                </left>
            </div>

            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <input  ng-model="person.subdistrict_in_thai" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <left><input  ng-model="person.district_in_thai" type="text" class="form-control" id="concept"
                              name="concept">
                </left>
            </div>

        </div>


        <div class="form-group">

            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input ng-model="person.province_in_thai" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>


        <br><h4>ข้อมูลบิดา</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input  ng-model="person.father_title" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.father_name" type="text" class="form-control" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input ng-model="person.father_surname"  type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.father_nationality" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.father_race" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>


        <br><h4>ข้อมูลมารดา</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.mother_title" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_name" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_surname" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_nationality" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_race" type="text" class="form-control" id="concept"
                       name="concept">
            </div>

        </div>

        <br><h4>ข้อมูลคู่สมรส</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_title" type="text" class="form-control" id="concept"
                       name="concept">
            </div>

            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_name" type="text" class="form-control" id="concept"
                       name="concept">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_surname" type="text" class="form-control" id="concept"
                       name="concept">
            </div>


        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_nationality" type="text" class="form-control" id="concept"
                       name="concept">

            </div>

            <label class="col-sm-1 control-label">เชื้อชาติ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_race" type="text" class="form-control" id="concept"
                       name="concept">


            </div>

        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-sm-12">

                <h5>ข้อมูลคดี:</h5>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>คดี</th>
                        <th>พฤติการณ์คดี</th>
                        <th>สถานที่เกิดเหตุ</th>
                        <th>#</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="datacase in person.data_casefile ">
                        <td ng-bind="datacase.cases_id"></td>
                        <td ng-bind="datacase.circumstances_of_case"></td>
                        <td ng-bind="' บ้านเลขที่ : ' + datacase.houseno + ' หมู่ที่ : '  +datacase.villageno + ' ถนน : '
                        +datacase.road + ' ซอย/ตรอก : ' +datacase.lane_alley + ' ตำบล : ' +datacase.subdistrict +
                        ' อำเภอ : ' +datacase.disreict + ' จังหวัด : ' +datacase.province  + ' ประเทศ : ' +datacase.contry "></td>


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

        <br>
        <div align="center">
            <button type="button" ng-click="saveCaseFile()" class="btn btn-primary">บันทึก</button>
            <button type="button" ng-click="resetCaseFile()" class="btn btn-danger">รีเซต</button>
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


            $scope.person.data_casefile = [];
            $scope.cases = [];
            //$scope.test = [$scope.person.data_casefile];

            $scope.saveCaseFileWrong = function(){
                console.log($scope.caseFile);
//                $http({
//                    url : "/case",
//                    method : "get"
//                }).success(function(response) {
//
//                    $scope.cases = response;
//                    for(i=0;i<$scope.cases.length;i++){
//                        if ($scope.cases[i].id == $scope.caseFile.cases_id){
//                            $scope.caseFile.cases_id = $scope.cases[i].name_cases;
//                            break;
//                        }
//                    }
                    $scope.person.data_casefile.push($scope.caseFile);
                    $scope.caseFile = {};
//                })



            }


            $scope.cancelCaseFileWrong = function(){
                $scope.caseFile = {};
            }


            $scope.resetCaseFile = function(){
                $scope.person = {};
                $scope.caseFile = {};
            }

            $scope.del_datacase = function(datacase){
                var index = $scope.person.data_casefile.indexOf(datacase);
                $scope.person.data_casefile.splice(index,1);
            }





            $scope.saveCaseFile = function(){

//                $http({
//                    url : "/case",
//                    method : "get"
//                }).success(function(response) {
//                    console.log($scope.caseFile);
//                    $scope.cases = response;
//                    for (i = 0; i < $scope.cases.length; i++) {
//                        if ($scope.cases[i].id == $scope.caseFile.cases_id ) {
//                            $scope.caseFile.cases_id = $scope.cases[i].id;
//                            break;
//                        }
//                    }
//                })

                saveCaseFile = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";




                if (confirm(saveCaseFile)) {

                    console.log($scope.person);

                    for(i=0;i<$scope.cases.length;i++){
                        if ($scope.cases[i].name_cases == $scope.person.data_casefile.cases_id){
                            $scope.person.data_casefile.cases_id = $scope.cases[i].id;
                            break;
                        }
                    }

                    $http({
                        url : "/api/case",
                        method : "post",
                        data : $scope.person
                    }).success(function(){
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
