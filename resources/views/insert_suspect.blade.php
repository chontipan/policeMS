@extends("layouts/main")
@section("content")

    <div ng-app="CaseApp" ng-controller="CaseController">
    <br><h3>บันทึกเบาะแสผู้ต้องสงสัย:</h3></br>


        <div class="modal fade bs-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">เพิ่มผู้ต้องสงสัย</h4>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="modal-body">
                                <div class="col-sm-12">


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ประเภท:</label>

                                        <div class="col-sm-4">
                                            <select ng-model="suspects.type_id" class="form-control">


                                                <?php foreach($type as $type_s) : ?>

                                                <option value="{{$type_s->id}}">{{$type_s->name_type}}</option>

                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label">สถานะ:</label>

                                        <div class="col-sm-4">
                                            <select ng-model="suspects.status_id" class="form-control">

                                                <option value=""></option>
                                                <?php foreach($status as $status_s) : ?>

                                                <option value="{{$status_s->id}}">{{$status_s->name_status}}</option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">เลขบัตรประชาชน / เลข Passport:</label>

                                        <div class="col-sm-8">
                                            <input ng-model="suspects.number_passport" type="text" class="form-control" id="concept"
                                                   name="concept" maxlength="17" onkeyup="autoTab(this)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">คำนำหน้า:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.name_title" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.name" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">นามสกุล:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.surname" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ชื่อเล่น/นามแฝง:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.nickname" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">วันเกิด:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.birth" type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <label class="col-sm-1 control-label">เพศ:</label>

                                        <div class="col-sm-3">
                                            <select ng-model="person.status_id" class="form-control">

                                                <option value=""></option>
                                                <?php foreach($sex as $sex_s) : ?>

                                                <option value="{{$sex_s->id}}">{{$sex_s->name_sex}}</option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">สัญชาติ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.nationality" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">เชื้อชาติ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.racet" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">สีผิว:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.skin_color" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">ผมศรีษะ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.head" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">รูปหน้า:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.face" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">น้ำหนัก</label>

                                        <div class="col-sm-3">
                                            <select ng-model="suspects.weight" class="form-control">

                                                <?php
                                                for ($weight = 0; $weight <= 250; $weight++) {   ?>

                                                <option value="{{ $weight }}">{{ $weight }}  กิโลกรัม</option>


                                                <?php } ?>


                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label">ส่วนสูง:</label>

                                        <div class="col-sm-3">
                                            <select  ng-model="suspects.height" class="form-control">
                                                <?php
                                                for ($height = 0; $height <= 200; $height++) {   ?>

                                                <option value="{{ $height }}">{{ $height }}  เซนติเมตร</option>


                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ตำหนิ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.blame" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">ลายสัก:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.tattoo" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                    </div>

                                    <br><h4>สถานที่เกิด</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.subdistrict_birth" type="text" class="form-control" id="concept"
                                                    name="concept">

                                        </div>
                                        <label class="col-sm-1 control-label">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.district_birth" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.province_birth" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ประเทศ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.contry_birth" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                    </div>

                                    <br><h4>ข้อมูลที่อยู่คนเข้ามาประเทศไทย</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <left><input  ng-model="suspects.subdistrict_in_foreign" type="text" class="form-control" id="concept"
                                                          name="concept">
                                            </left>
                                        </div>
                                        <label class="col-sm-1 control-label">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.district_in_foreign" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.province_in_foreign" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ประเทศ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.contry_in_foreign" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                    </div>


                                    <br><h4>ข้อมูลที่อยู่ในประเทศไทย</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1">บ้านเลขที่:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.houseno_in_thai" type="text" class="form-control" id="concept"
                                                   name="concept">

                                        </div>
                                        <label class="col-sm-1 control-label">หมู่บ้านที่:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.villageno_in_thai" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>

                                        <label class="col-sm-1 control-label">ถนน:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.road_in_thai" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>



                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">ซอย/ตรอก:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.lane_alley_in_thai" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">ตำบล:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.subdistrict_in_thai" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>

                                        <label class="col-sm-1 control-label">อำเภอ:</label>

                                        <div class="col-sm-3">
                                            <left><input ng-model="suspects.district_in_thai"  type="text" class="form-control" id="concept"
                                                         name="concept">
                                            </left>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class="col-sm-1 control-label">จังหวัด:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.province_in_thai" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                    </div>


                                    <br><h4>ข้อมูลบิดา</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">คำนำหน้า:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.father_title" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.father_name" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">นามสกุล:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.father_surname" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">สัญชาติ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.father_nationality" type="text" class="form-control" id="concept"
                                                    name="concept">

                                        </div>

                                        <label class="col-sm-1 control-label">เชื้อชาติ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.father_race" type="text" class="form-control" id="concept"
                                                   name="concept">


                                        </div>

                                    </div>


                                    <br><h4>ข้อมูลมารดา</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">คำนำหน้า:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.mother_title" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>

                                        <label class="col-sm-1 control-label">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.mother_name" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">นามสกุล:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.mother_surname" type="text" class="form-control" id="concept"
                                                    name="concept">
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">สัญชาติ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.mother_nationality" type="text" class="form-control" id="concept"
                                                    name="concept">

                                        </div>

                                        <label class="col-sm-1 control-label">เชื้อชาติ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.mother_race" type="text" class="form-control" id="concept"
                                                    name="concept">

                                        </div>

                                    </div>

                                    <br><h4>ข้อมูลคู่สมรส</h4></br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">คำนำหน้า:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.spouse_title" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                        <label class="col-sm-1 control-label">ชื่อ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.spouse_name" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>
                                        <label class="col-sm-1 control-label">นามสกุล:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.spouse_surname" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">สัญชาติ:</label>

                                        <div class="col-sm-3">
                                            <input  ng-model="suspects.spouse_nationality" type="text" class="form-control" id="concept"
                                                    name="concept">

                                        </div>

                                        <label class="col-sm-1 control-label">เชื้อชาติ:</label>

                                        <div class="col-sm-3">
                                            <input ng-model="suspects.spouse_race" type="text" class="form-control" id="concept"
                                                   name="concept">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="saveSupectsWrong()" data-dismiss="modal" >บันทึก</button>
                        <button type="button" class="btn btn-primary" ng-click="cancelSupectsWrong()" data-dismiss="modal">ยกเลิก</button>
                    </div>

                </div>
            </div>
        </div>




    <div class="form-group">
        <label class="col-sm-3 control-label">คดี:</label>

        <div class="col-sm-7">
            <input type="text" ng-model="caseSuspect.cases_id" class="form-control" id="description" name="description">
        </div>
    </div>




        <div class="form-group">
        <label class="col-sm-3 control-label">เบาะแส :</label>

        <div class="col-sm-7">
            <textarea ng-model="caseSuspect.clue_suspect" class="form-control" rows="7"></textarea>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label">วันที่แจ้งเบาะแส :</label>

        <div class="col-sm-7">
            <input ng-model="caseSuspect.date_notice" type="date" class="form-control" id="date" name="date">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label">ชื่อผู้แจ้งเบาะแส :</label>

        <div class="col-sm-7">
            <input ng-model="caseSuspect.name_clue_suspect" type="text" class="form-control" id="amount" name="amount">
        </div>
    </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">นามสกุลผู้แจ้งเบาะแส :</label>

            <div class="col-sm-7">
                <input ng-model="caseSuspect.surname_clue_suspect" type="text" class="form-control" id="amount" name="amount">
            </div>
        </div>


    <div class="form-group">
        <label class="col-sm-3 control-label">เบอร์โทรผู้แจ้งเบาะแส :</label>

        <div class="col-sm-7">
            <input ng-model="caseSuspect.tel_clue_suspect" type="text" class="form-control" id="amount" name="amount">
        </div>
    </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">ชื่อตำรวจผู้รับแจ้ง :</label>

            <div class="col-sm-7">
                <input ng-model="caseSuspect.name_police_received" type="text" class="form-control" id="amount" name="amount">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">นามสกุลตำรวจผู้รับแจ้ง :</label>

            <div class="col-sm-7">
                <input ng-model="caseSuspect.surname_police_received" type="text" class="form-control" id="amount" name="amount">
            </div>
        </div>

    <div class="form-group">
        <div class="col-sm-12">

            <h5>ประวัติผู้ต้องสงสัย :</h5>
            
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>เลขบัตร</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>สัญชาติ</th>
                    <th>เชื้อชาติ</th>
                    <th>น้ำหนัก</th>
                    <th>ส่วนสูง</th>
                    <th>สีผิว</th>
                    <th>สีผม</th>
                    <th>#</th>
                </tr>
                </thead>
                
                <tbody>
                <tr ng-repeat="suspects in caseSuspect.people_suspects">
                    <td ng-bind="suspects.number_passport"></td>
                    <td ng-bind="suspects.name_title + ' ' + suspects.name + ' ' + suspects.surname"></td>
                    <td ng-bind="suspects.nationality"></td>
                    <td ng-bind="suspects.racet"></td>
                    <td ng-bind="suspects.weight +' กิโลกรัม'"></td>
                    <td ng-bind="suspects.height+' เซนติเมตร'"></td>
                    <td ng-bind="suspects.skin_color"></td>
                    <td ng-bind="suspects.head"></td>
                    <td >
                        <button ng-click="del_person(suspects)" type="button" class="btn btn-default" aria-label="Left Align">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button></td>


                </tr>
                </tbody>
            </table>

            <br>
            <div align="center">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal1" data-whatever="@mdo">เพิ่มประวัติผู้ต้องสงสัย
                </button>

                </br>
            </div>
        </div>

    </div>


    <br>
    <div align="center">
        <button type="button" ng-click="saveCaseSuspect()" class="btn btn-primary">บันทึก</button>
        <button type="button" ng-click="resetCaseSuspect()" class="btn btn-danger">รีเซต</button>
    </div>

    </div>



@stop

@section('javascript')

    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">
        initInputHighlightScript();

        var app = angular.module("CaseApp",[]);



        app.controller("CaseController",function($scope,$http){
            console.log("CaseController.start");

            $scope.suspects = {};
            $scope.caseSuspect = {};


            $scope.caseSuspect.people_suspects = [];

            $scope.saveSupectsWrong = function(){
                console.log($scope.suspects);

                $scope.caseSuspect.people_suspects.push($scope.suspects);
                $scope.suspects = {};
            }
            $scope.cancelSupectsWrong = function(){
                $scope.suspects = {};
            }

            $scope.resetCaseSuspect = function(){
                $scope.suspects = {};
                $scope.caseSuspect = {};
            }

            $scope.del_supects = function(suspects){
                var index = $scope.caseSuspect.people_suspects.indexOf(suspects);
                $scope.caseSuspect.people_suspects.splice(index,1);
            }

            $scope.saveCaseSuspect = function(){
                saveCaseSuspect = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";

                if (confirm(saveCaseSuspect)) {
                    console.log($scope.caseSuspect);

                    $http({
                        url : "/api/suspect",
                        method : "post",
                        data : $scope.caseSuspect
                    }).success(function(){
                        //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                        massged = "บันทึกข้อมูลเสร็จแล้ว";
                        alert(massged);

//                        $scope.person = {};
//                        $scope.supects = {};
//                        $scope.caseFile = {};
////                        window.location= "insert_preson1";
                    });
                }




            }




        });

    </script>





@stop
