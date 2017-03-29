@extends("layouts/main")
@section("content")






    <div ng-app="PoliceApp" ng-controller="PoliceController">
        <form id="form">
            <fieldset>
                <div id="legend">
                    <legend class="">แก้ไขข้อมูลสมาชิก</legend>
                </div>


                <div class="field" flow-init flow-object="myFlow"
                     flow-file-success="$file.msg = $message"
                     flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
                     flow-file-success="flowSuccess($file,$message)" align="center">

                    <div flow-drop class="ui bordered medium" style="border: 1px dotted;">

                        <input type="file" flow-btn/>

                        <table>
                            <tr ng-repeat="file in $flow.files">
                                <td><% $index+1 %></td>
                                <td><% file.name %></td>
                                <td><% file.msg %></td>
                            </tr>
                        </table>






                        <div ng-if="$flow.files.length==0 &&  !police.photo" class="">
                            <img src="/img/square-image.png" width="128" height="128"/>
                        </div>


                        <div ng-if="$flow.files.length==0 && police.photo" class="">
                            <img ng-src="<% police.photo %>" width="128" height="128"/>
                        </div>


                        <div ng-repeat="file in myFlow.files">
                            <div class="">
                                    <a ng-if="file.isComplete()" href="#" class="">
                                        <i class=""></i>
                                    </a>
                                <img flow-img="file"/>
                                    <div class="" ng-if="file.isUploading()">
                                        <div class="" data-percent="<% file.progress() %>"></div>
                                    </div>
                            </div>

                            <br/>

                            <button ng-if="!file.isComplete()" ng-click="uploadFile()" type="button" class="ui positive submit button">
                                Apply Image
                            </button>

                            <button ng-if="!file.isComplete()" ng-click="cancelFile(file)" type="button" class="ui default submit button">
                                Remove
                            </button>

                        </div>


                    </div>




                </div>



                <div class="form-group">
                    <!-- Username -->
                    <label class="col-sm-3 control-label" for="username">Username</label>

                    <div class="col-sm-5">
                        <div class="form-group has-feedback">
                            <input ng-model="police.username" type="text" disabled="disabled" class="form-control css-require"
                                   placeholder="Username">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <!-- Password-->
                    <label class="col-sm-3 control-label" for="password">Password</label>

                    <div class="col-sm-5">

                        <div class="form-group has-feedback">
                            <input ng-model="police.password" type="password" id="password" name="password"
                                   class="form-control css-require" disabled="disabled"  placeholder="Password">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <!-- Password-->
                    <label class="col-sm-3 control-label" for="password">Confirm Password</label>

                    <div class="col-sm-5">

                        <div class="form-group has-feedback">
                            <input ng-model="police.vpassword" type="password" id="vpassword" name="vpassword" class="form-control css-require"
                                   placeholder="Confirm Password" disabled="disabled">
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
                            <select ng-model="police.name_position" class="form-control css-require" ng-options="opt as opt.name_position for opt in positions">


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
                            <select ng-model="police.rank" class="form-control css-require" ng-options="opt as opt.rank for opt in ranks">


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
                    <div class="col-sm-8" align="center">

                            <button  class="btn btn-success" type="submit" name="submit"
                                     ng-click="editPolice()" >แก้ไข
                            </button>
                        <button  class="btn btn-success" type="submit" name="submit"
                                 ng-click="cancelPolice()" >ยกเลิก
                        </button>

                    </div>
                </div>


            </fieldset>
        </form>
    </div>








@stop


@section('javascript')

    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">

        var app = angular.module("PoliceApp", ['flow'],function($interpolateProvider){

            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');


        });


        app.controller("PoliceController", function ($scope, $http) {
            console.log("PoliceController.start");
            $scope.police = {};
            $scope.ranks = [];
            $scope.positions = [];
            function init(){

                $http({
                    url : "/rank",
                    method : "get"
                }).success(function(response){
                    $scope.ranks = response;
                    $http({
                        url : "/position",
                        method : "get"
                    }).success(function(response){
                        $scope.positions = response;
                            $http({
                                url : "/api/police/<?php echo $id; ?>",
                                method : "get"
                            }).success(function(response){
                                $scope.police = response;

                                for(a=0;a<$scope.positions.length;a++) {
                                    if ($scope.positions[a].id == $scope.police.position_id) {
                                        $scope.police.name_position = $scope.positions[a];
                                        console.log($scope.positions);
                                        break;
                                    }
                                }
                                for(i=0;i<$scope.ranks.length;i++){

                                        if ($scope.ranks[i].id == $scope.police.rank_id) {
                                               $scope.police.rank = $scope.ranks[i];

                                                break;
                                        }

                                }
                            })
                    })
                })
            }

            init();


            $scope.myFlow = new Flow({
                target: '/api/police/<?php echo $id; ?>/photo',
                singleFile: true,
                method: 'post',
                testChunks: false
            })

            $scope.uploadFile = function(){
                $scope.myFlow.upload();
                //console.log($scope.myFlow);
            }
            $scope.cancelFile = function (file){
                var index = $scope.myFlow.files.indexOf(file)
                $scope.myFlow.files.splice(index,1);

            }

            $scope.editPolice = function () {
                saveEditPolice = "ต้องการบันทึกทะเบียร์ประวัตินี้ ใช่หรือ ไม่";
                if (confirm(saveEditPolice)) {
                    console.log($scope.police);

                    $http({
                        url : "/api/police/<?php echo $id; ?>",
                        method : "PUT",
                        data : $scope.police
                    }).success(function(){
                        //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
//                        massged = "แก้ไขข้อมูลเสร็จแล้ว";
//                        alert(massged);
//                        window.location= "/search_police";
                    }).error(function(response){
                        $scope.error = response;
                    });
                }
            }
        });

    </script>
@stop