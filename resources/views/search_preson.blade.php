<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">


    <title>CHIANG RAI IMMIGRATION</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-3.3.2/css/bootstrap.min.css') }}">
    <link href="{{ asset('bootstrap-3.3.2/css/hicss.css') }}" rel="stylesheet" media="screen">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('bootstrap-3.3.2/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-3.3.2/css/dashboard.css') }}">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('bootstrap-3.3.2/css/plugins/morris.css') }}" rel="stylesheet">



</head>

<body>
    <div ng-app="SearchPresonApp" ng-controller="PresonController">
            <h1 align="center">ประวัติบุคคลที่เกี่ยวข้องกับอาชญากรรม</h1>
            <br>
        <br>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ค้นหาบุคคลที่เกี่ยวข้องกับอาชญากรรม</h3>
            </div>
            <div class="panel-body">

                <form class="form-horizontal">
                    <div class="form-group">

                        <label class="col-sm-2 control-label">เลขบัตร/หนังสือเดินทาง :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  placeholder="เลขบัตร/หนังสือเดินทาง">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" >ชื่อ :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  placeholder="ชื่อ" ng-model="search.name">
                        </div>
                        <label class="col-sm-2 control-label" style="width: auto" >นามสกุล :</label>
                        <div class="col-sm-4" >
                            <input type="text" class="form-control"  placeholder="นามสกุล" ng-model="search.surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">เพศ :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  placeholder="เพศ">
                        </div>
                        <label class="col-sm-1 control-label" style="width: auto">อายุ :</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control">
                        </div>
                        <label class="col-sm-1 control-label" style="width: auto">ถึง</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control">
                        </div>
                        <label class="col-sm-1 control-label" style="width: auto">ปี</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ยานพาหนะ ยี่ห้อ:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control"  placeholder="ยี่ห้อ">
                        </div>
                        <label class="col-sm-2 control-label" style="width: auto" >รุ่น :</label>
                        <div class="col-sm-2" >
                            <input type="text" class="form-control"  placeholder="รุ่น">
                        </div>
                        <label class="col-sm-2 control-label" style="width: auto" >สี :</label>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="สี">
                        </div>
                        <label class="col-sm-1 control-label" style="width: auto" >เลขทะเบียน:</label>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="หมวด">
                        </div>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="เลขทะเบียน">
                        </div>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="จังหวัด">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label ">ข้อมูลคดี ชื่อคดี :</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control"  placeholder="คดี">
                        </div>
                        <label class="col-sm-2 control-label" style="width: auto">ประเภทคดี :</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control"  placeholder="ประเภทคดี">
                        </div>
                        <label class="col-sm-2 control-label" style="width: auto" >เลขคดี :</label>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="เลขคดี">
                        </div>
                        <div class="col-sm-1" >
                            <input type="text" class="form-control"  placeholder="ปี">
                        </div>
                        <div class="col-sm-2" >
                            <input type="text" class="form-control"  placeholder="สถานีตำรวจ">
                        </div>
                    </div>

                </form>



            </div>
        </div>





        <h4><u>ผลลัพธ์ในการค้นหา</u></h4>
        <table class="table table-striped table-hover table table-bordered" width="100%">
            <thead>
            <tr>
                <th width="15%" class="info">ประเภทบุคคล</th>
                <th width="15%" class="warning">เลขบัตร/หนังสือเดินทาง</th>
                <th width="15%" class="danger">ชื่อ - นามสกุล</th>
                <th width="5%" class="success">เพศ</th>
                <th width="5%" class="active">อายุ</th>
                <th width="19%"  class="warning">ยานพาหนะที่ใช้</th>
                <th width="15%">ข้อมูลคดี</th>
                <th width="5%">#</th>


            </tr>


            </thead>
            <tbody>


            <tr ng-repeat="preson in datapreson | filter:search" >
                <td ng-bind="preson.typepeople.name_type"></td>

                <td ng-bind="preson.idcard"></td>
                <td ng-bind="preson.nametitle.name_title +' '+preson.name + ' ' + preson.surname" ></td>
                <td ng-bind=""></td>
                <td ng-bind=""></td>
                <td ng-bind=""></td>

                <td>
                    <table>
                        <tbody>
                        <?///แสดงคดีของ ผู้ต้องหา ?>
                        <tr ng-repeat="datacase in preson.datacase" bgcolor="red">
                            <td ng-bind="'-> '+datacase.cases.name_cases"></td>
                        </tr>
                        <?///แสดงคดีของ ผู้ต้องสงสัย ?>
                        <tr ng-repeat="datasuspect in preson.datasuspect" bgcolor="aqua" >
                            <td ng-bind="'-> '+datasuspect.cases.name_cases"></td>
                        </tr>
                        </tbody>
                    </table>

                </td>

                <td>
                    <button ng-click="show(preson)" type="submit" type="button">
                        <i class="glyphicon glyphicon-search"></i></button>
                </td>

            </tr>


            </tbody>
        </table>

        <center>
            <nav>
                <ul class="pagination">
                    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                    </li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>

                    <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
            </nav>

        </center>

    </div>



</body>

<!-- jQuery -->

<script  type="text/javascript" src="{{ asset('bootstrap-3.3.2/js/hi.js') }}"></script>
<script  type="text/javascript" src="{{ asset('bootstrap-3.3.2/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('flow.js/dist/flow.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script  type="text/javascript"  src="{{ asset('bootstrap-3.3.2/js/bootstrap.min.js') }}"></script>

<script  type="text/javascript" src="{{ asset('packages/angular/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ng-flow/dist/ng-flow.min.js') }}"></script>


<!-- Morris Charts JavaScript -->
<script  type="text/javascript" src="{{ asset('bootstrap-3.3.2/js/plugins/morris/raphael.min.js') }}"></script>
<script  type="text/javascript" src="{{ asset('bootstrap-3.3.2/js/plugins/morris/morris.min.js') }}"></script>




<!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
<script type="text/javascript">

    var app = angular.module("SearchPresonApp", []);


    app.controller("PresonController", function ($scope, $http) {
        console.log("PresonController.start");

        $http({
            url: "/api/case",
            method: "get"
        }).success(function (response) {
            $scope.datapreson = response;
        });

        $scope.show = function (preson) {

            window.location = "show_preson/id/"+ preson.id;
//
        }
        $scope.printCaseFile = function(){
            console.log($scope.person.id);

            window.location= "/api/case/"+ person.id+ "/generatedpdf";
        }

    });
</script>



</html>

