@extends("layouts/main")
@section("content")

    <div ng-app="PoliceApp" ng-controller="PoliceController">
        <form id="form">
        <fieldset>
            <div id="legend">
                <legend class="">เพิ่มสมาชิกตำรวจ</legend>
            </div>

            <div class="alert alert-danger" role="alert" ng-if="error" ng-repeat="m in error" >
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" ng-bind="' '+ m" ></span>
                <span class="sr-only"></span>

            </div>



            <div class="form-group">
                <!-- Username -->
                <label class="col-sm-3 control-label" for="username">Username</label>

                <div class="col-sm-5">
                    <div class="form-group has-feedback">
                        <input ng-model="police.username" type="text" id="username" name="username" class="form-control css-require"
                               placeholder="Username">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <!-- Password-->
                <label class="col-sm-3 control-label" for="password">Password</label>

                <div class="col-sm-5">

                    <div class="form-group has-feedback">
                        <input ng-model="police.password" type="password" id="password" name="password" class="form-control css-require"
                               placeholder="Password">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block"></p>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <!-- Password-->
                <label class="col-sm-3 control-label" for="password">Confirm Password</label>

                <div class="col-sm-5">

                    <div class="form-group has-feedback">
                        <input ng-model="police.vpassword" type="password" id="vpassword" name="vpassword" class="form-control css-require"
                               placeholder="Confirm Password">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block"></p>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <!-- E-mail -->
                <label class="col-sm-3 control-label" for="nametitle_id">ตำแหน่ง</label>

                <div class="col-sm-5">

                    <div class="form-group has-feedback">
                        <select ng-model="police.position_id" type="text" id="nametitle_id" name="nametitle_id" class="form-control css-require">


                            <option value=""></option>
                            <?php foreach($position as $position) : ?>

                            <option value="{{$position->id}}">{{$position->name_position}}</option>

                            <?php endforeach; ?>

                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block">..</p>

                    </div>


                </div>
            </div>

            <div class="form-group">
                <!-- E-mail -->
                <label class="col-sm-3 control-label" for="nametitle_id">คำนำหน้าชื่อ</label>

                <div class="col-sm-5">

                    <div class="form-group has-feedback">
                        <select ng-model="police.rank_id" type="text" id="nametitle_id" name="nametitle_id" class="form-control css-require">


                            <option value=""></option>
                            <?php foreach($rank as $rank) : ?>



                            <option value="{{$rank->id}}">{{$rank->rank}}</option>

                            <?php endforeach; ?>

                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block">..</p>

                    </div>


                </div>
            </div>


            <div class="form-group">
                <!-- E-mail -->

                <label class="col-sm-3 control-label" for="name_police">ชื่อ</label>

                <div class="col-sm-5">
                    <div class="form-group has-feedback">
                        <input ng-model="police.name_police" type="text" id="name_police" name="name_police" class="form-control css-require"
                               placeholder="NamePolice">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block">กรอกชื่อเจ้าหน้าที่</p>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <!-- E-mail -->
                <label class="col-sm-3 control-label" for="surname_police">นามสกุล</label>

                <div class="col-sm-5">

                    <div class="form-group has-feedback">
                        <input ng-model="police.surname_police" type="text" id="surname_police" name="surname_police" class="form-control css-require"
                               placeholder="SurnamePolice">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                        <p class="help-block">กรอกนามสกุลเจ้าหน้าที่</p>
                    </div>

                </div>
            </div>


            <div class="form-group">
                <!-- E-mail -->
                <label class="col-sm-3 control-label" for="email">เบอร์โทร</label>

                <div class="col-sm-5 ">
                    <div class="form-group has-feedback">
                        <input ng-model="police.tel_police" class="form-control  css-require" name="tel_police" id="tel_police" type="text"
                               placeholder="Tel."/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <!-- Button -->
                <div class="col-sm-8">
                    <center>
                        <button  class="btn btn-success" type="submit" name="submit"
                                 ng-click="savePolice()" >เพิ่ม
                        </button>
                    </center>
                </div>
            </div>


        </fieldset>
        </form>
    </div>




@stop


@section('javascript')

    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">

        var app = angular.module("PoliceApp", []);


        app.controller("PoliceController", function ($scope, $http) {
            console.log("PoliceController.start");
            $scope.police = {};

            $scope.savePolice = function () {
                savePolice = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";

                if (confirm(savePolice)) {
                    console.log($scope.police);

                    $http({
                        url : "/api/police",
                        method : "post",
                        data : $scope.police
                    }).success(function(){
//                        เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                        $scope.police = {};
                        massged = "บันทึกข้อมูลเสร็จแล้ว";
                        alert(massged);
                        window.location= "/insert_police";
                    }).error(function(response){
                        $scope.error = response;

                    });
                }
            }
        });

    </script>
@stop