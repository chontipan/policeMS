@extends("layouts/main")
@section("content")

    <div ng-app="CaseApp" ng-controller="CaseController">
        <br><h3>แสดงข้อมูลทะเบียนประวัติ :</h3></br>



        <div class="row">

        <div class="form-group" >
            <div class="col-sm-6">
            <label class="col-sm-4 control-label">ประเภท : </label>
                <label ng-bind="person.type" class="control-label"
                        ng-options="opt as opt.name_type for opt in types">

                </label>
            </div>
            <div class="col-sm-6">
            <label class="col-sm-4 control-label">สถานะ : </label>
                <label ng-bind="person.status" class="control-label"
                        ng-options="opt as opt.name_status for opt in statuss">
                </label>
            </div>


        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">เลขบัตร/เลขPassport  : </label>

            <div class="col-sm-3">
                <label ng-bind="person.number_passport" type="text" class="control-label" disabled="disabled"></label>
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.name_title" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.name" type="text" class="form-control"  disabled="disabled" id="concept"
                        name="concept">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input  ng-model="person.surname" type="text" class="form-control" disabled="disabled">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">นามแฝง/ชื่อเล่น:</label>

            <div class="col-sm-3">
                <input  ng-model="person.nickname" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">วันเกิด:</label>

            <div class="col-sm-3">
                <input  ng-model="person.birth" type="text" class="form-control" disabled="disabled">
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.nationality" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.racet" type="text" class="form-control" disabled="disabled">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สีผิว:</label>

            <div class="col-sm-3">
                <input  ng-model="person.skin_color" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ผมศรีษะ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.head" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">รูปหน้า:</label>

            <div class="col-sm-3">
                <input  ng-model="person.face" type="text" class="form-control" disabled="disabled">
            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">น้ำหนัก</label>

            <div class="col-sm-3">
                <select ng-model="person.weight" class="form-control" disabled="disabled">
                    <?php
                    for ($weight = 0; $weight <= 250; $weight++) {   ?>

                    <option value="{{ $weight }}">{{ $weight }}  กิโลกรัม</option>


                    <?php } ?>
                </select>
            </div>
            <label class="col-sm-1 control-label">ส่วนสูง:</label>

            <div class="col-sm-3">
                <select ng-model="person.height" class="form-control" disabled="disabled">
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
                <input  ng-model="person.blame" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ลายสัก:</label>

            <div class="col-sm-3">
                <input ng-model="person.tattoo"  type="text" class="form-control" disabled="disabled">
            </div>
        </div>

        <br><h4>สถานที่เกิด</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <input ng-model="person.subdistrict_birth" type="text" class="form-control" disabled="disabled">

            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <input ng-model="person.district_birth" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input ng-model="person.province_birth" type="text" class="form-control" disabled="disabled">
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">ประเทศ:</label>

            <div class="col-sm-3">
                <input ng-model="person.contry_birth" type="text" class="form-control" disabled="disabled">
            </div>
        </div>

        <br><h4>ข้อมูลที่อยู่คนเข้ามาประเทศไทย</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <left><input  ng-model="person.subdistrict_in_foreign" type="text" class="form-control" disabled="disabled">
                </left>
            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <input ng-model="person.district_in_foreign" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input  ng-model="person.province_in_foreign" type="text" class="form-control" disabled="disabled">
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">ประเทศ:</label>

            <div class="col-sm-3">
                <input ng-model="person.contry_in_foreign" type="text" class="form-control" disabled="disabled">
            </div>
        </div>


        <br><h4>ข้อมูลที่อยู่ในประเทศไทย</h4></br>
        <div class="form-group">
            <label class="col-sm-1">บ้านเลขที่:</label>

            <div class="col-sm-3">
                <left><input ng-model="person.houseno_in_thai" type="text" class="form-control" disabled="disabled">
                </left>
            </div>
            <label class="col-sm-1 control-label">หมู่บ้านที่:</label>

            <div class="col-sm-3">
                <input  ng-model="person.villageno_in_thai" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ถนน:</label>

            <div class="col-sm-3">
                <input ng-model="person.road_in_thai" type="text" class="form-control" disabled="disabled">
            </div>


        </div>
        <div class="form-group">
            <label class="col-sm-1">ซอย/ตรอก:</label>

            <div class="col-sm-3">
                <left><input ng-model="person.lane_alley_in_thai" type="text" class="form-control" disabled="disabled">
                </left>
            </div>

            <label class="col-sm-1 control-label">ตำบล:</label>

            <div class="col-sm-3">
                <input  ng-model="person.subdistrict_in_thai" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">อำเภอ:</label>

            <div class="col-sm-3">
                <left><input  ng-model="person.district_in_thai" type="text" class="form-control" disabled="disabled">
                </left>
            </div>

        </div>


        <div class="form-group">

            <label class="col-sm-1 control-label">จังหวัด:</label>

            <div class="col-sm-3">
                <input ng-model="person.province_in_thai" type="text" class="form-control" disabled="disabled">
            </div>
        </div>


        <br><h4>ข้อมูลบิดา</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input  ng-model="person.father_title" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input  ng-model="person.father_name" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input ng-model="person.father_surname"  type="text" class="form-control" disabled="disabled">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.father_nationality" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.father_race" type="text" class="form-control" disabled="disabled">
            </div>
        </div>


        <br><h4>ข้อมูลมารดา</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.mother_title" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">ชื่อ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_name" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_surname" type="text" class="form-control" disabled="disabled">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_nationality" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">เชื้อชาติ:</label>
            <div class="col-sm-3">
                <input ng-model="person.mother_race" type="text" class="form-control" disabled="disabled">
            </div>

        </div>

        <br><h4>ข้อมูลคู่สมรส</h4></br>
        <div class="form-group">
            <label class="col-sm-1 control-label">คำนำหน้า:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_title" type="text" class="form-control" disabled="disabled">
            </div>

            <label class="col-sm-1 control-label">ชื่อ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_name" type="text" class="form-control" disabled="disabled">
            </div>
            <label class="col-sm-1 control-label">นามสกุล:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_surname" type="text" class="form-control" disabled="disabled">
            </div>


        </div>


        <div class="form-group">
            <label class="col-sm-1 control-label">สัญชาติ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_nationality" type="text" class="form-control" disabled="disabled">

            </div>

            <label class="col-sm-1 control-label">เชื้อชาติ:</label>

            <div class="col-sm-3">
                <input ng-model="person.spouse_race" type="text" class="form-control" disabled="disabled">


            </div>


        </div>
        </div>


        <div ng-repeat="datacase in person.datacase">
            <h3 align="center">>>>>ข้อมูลคดี<<<<</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">เลขคด ี:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.number_case" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">ชื่อคดี :</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.cases.name_cases" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">ประเภทคดี :</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.cases.typecase.name_type" class="form-control" disabled="disabled">
                </div>
            </div>

            <h4>สถานที่เกิดเหตุ:</h4>
            <div class="form-group">


                <label class="col-sm-3 control-label">บ้านเลขที่:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.houseno" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">หมู่บ้านที่:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.villageno" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">ถนน:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.road" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">ตรอก/ซอย:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.lane_alley" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">ตำบล:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.subdistrict" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">อำเภอ:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.disreict" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">จังหวัด:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.province" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">ประเทศ:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.contry" class="form-control" disabled="disabled">
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-3 control-label">พฤติการณ์คดี:</label>

                <div class="col-sm-7">
                    <textarea ng-model="datacase.circumstances_of_case" class="form-control" rows="7" disabled="disabled">></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">วันที่เกิดเหตุ:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.case_date" class="form-control" disabled="disabled">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">ชื่อ เจ้าของคดี:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.name_police_of_case" class="form-control" disabled="disabled">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">นามสกุล เจ้าของคดี:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.surname_of_case" class="form-control" disabled="disabled">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">เบอร์โทรศัพท์:</label>

                <div class="col-sm-7">
                    <input  ng-model="datacase.tel_of_case" class="form-control" disabled="disabled">
                </div>
            </div>
        </div>
        <div ng-repeat="datasuspect in person.datasuspect">
            <h3 align="center">>>>>ข้อมูลคดี<<<<</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">ชื่อคดี :</label>

                <div class="col-sm-7">
                    <input  ng-model="datasuspect.cases.name_cases" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">ประเภทคดี :</label>

                <div class="col-sm-7">
                    <input  ng-model="datasuspect.cases.typecase.name_type" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">เบาะแส :</label>

                <div class="col-sm-7">
                    <textarea ng-model="datasuspect.clue_suspect" class="form-control" rows="7"></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">วันที่แจ้งเบาะแส :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.date_notice" type="date" class="form-control" id="date" name="date">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">ชื่อผู้แจ้งเบาะแส :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.name_clue_suspect" type="text" class="form-control" id="amount" name="amount">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">นามสกุลผู้แจ้งเบาะแส :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.surname_clue_suspect" type="text" class="form-control" id="amount" name="amount">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">เบอร์โทรผู้แจ้งเบาะแส :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.tel_clue_suspect" type="text" class="form-control" id="amount" name="amount">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">ชื่อตำรวจผู้รับแจ้ง :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.name_police_received" type="text" class="form-control" id="amount" name="amount">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">นามสกุลตำรวจผู้รับแจ้ง :</label>

                <div class="col-sm-7">
                    <input ng-model="datasuspect.surname_police_received" type="text" class="form-control" id="amount" name="amount">
                </div>
            </div>
        </div>






        <br>
        <div align="center">
            <button type="button" ng-click="editCaseFile()" class="btn btn-primary" disabled="disabled">แก้ไชประวัติ
                <i class="glyphicon glyphicon-pencil"></i></button>
            <button type="button" ng-click="printCaseFile()" class="btn btn-primary"">สั่งพิมพ์ประวัติ
            <i class="glyphicon glyphicon-print"></i></button>
            <button type="button" ng-click="deleteCaseFile()" class="btn btn-danger" disabled="disabled">ลบประวัติ
                <i class="glyphicon glyphicon-trash"></i></button>

        </div>

    </div>

@stop

@section('javascript')

    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">

        var app = angular.module("CaseApp",[]);



        app.controller("CaseController",function($scope,$http){
            console.log("presonController.start");
//
            $scope.person = {};
            $scope.caseFile = {};
            $scope.types =[];
            $scope.statuss =[];


            function init(){
                $http({
                    url : "/status",
                    method : "get"
                }).success(function(response){
                        $scope.types = response;
                        $http({
                            url : "/api/case/<?php echo $id; ?>",
                            method : "get"

                        }).success(function(response) {
                            $scope.person = response;
                            console.log($scope.person);
                            for(i=0;i<$scope.statuss.length;i++){
                                if ($scope.statuss[i].id == $scope.person.type_id ){

                                    $scope.person.status = $scope.statuss[i].name_status;

                                    console.log($scope.person.status);
                                    break;
                                }
                            }
                        })
                })



            }

            init();

            $scope.printCaseFile = function(){
                console.log($scope.person.id);

                    window.location= "/api/case/<?php echo $id; ?>/generatedpdf";
            }



        });

    </script>





@stop
