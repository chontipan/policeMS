@extends("layouts/main")
@section("content")

    <div ng-app="SearchPoliceApp" ng-controller="PoliceController">
        <center>
            <h1>ค้นหาเจ้าหน้าที่ตรวจคนเข้าเมือง</h1></center>
        <div class="col-sm-12">

            <br>
            <br>


            <div class="col-md-4"></div>
        </div>


        <br>
        <br>


        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th><input ng-model="search.username" type="text" class="form-control" placeholder="Username"></th>
                <th><input ng-model="search.position.name_position" type="text" class="form-control" placeholder="ตำแหน่ง "></th>
                <th><input ng-model="search.rank.rank" type="text" class="form-control" placeholder="คำนำหน้า"></th>
                <th><input ng-model="search.name_police" type="text" class="form-control" placeholder="ชื่อ"></th>
                <th><input ng-model="search.surname_police" type="text" class="form-control" placeholder="นามสกุล"></th>
                <th><input ng-model="search.tel_police" type="text" class="form-control" placeholder="เบอร์โทร"></th>
                <th>#</th>

            </tr>
            </thead>
            <tbody>


            <tr ng-repeat="police in datapolices | filter:search">


                <td ng-bind="police.username"></td>
                <td ng-bind="police.position.name_position"></td>
                <td ng-bind="police.rank.rank"></td>
                <td ng-bind="police.name_police"></td>
                <td ng-bind="police.surname_police"></td>
                <td ng-bind="police.tel_police"></td>

                <td>
                    <button ng-click="delete(police)" type="submit" type="button" name="deletepolice"><i
                                class="glyphicon glyphicon-trash"></i></button>
                    <button ng-click="edit(police)" type="button"><i
                                class="glyphicon glyphicon-pencil"></i></button>
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
    </div>

@stop
@section('javascript')

    <!-- Code ด้านล่างต้องอยู่ใต้ Code ของแบบฟอร์ม -->
    <script type="text/javascript">

        var app = angular.module("SearchPoliceApp", []);


        app.controller("PoliceController", function ($scope, $http) {
            console.log("PoliceController.start");

            $http({
                url: "/api/police",
                method: "get"
            }).success(function (response) {
                $scope.datapolices = response;
            });


            $scope.delete = function (police) {
                //alert(police);
                delpolice = "ต้องการลบ [" + police.name_police + " , " + police.surname_police + "]?";
                if (confirm(delpolice)) {
                    console.log(police);

                    $http({
                        url: "/api/police/"+ police.id ,
                        method: "DELETE"
                    }).success(function (response) {
                        console.log(response);
                        massged = "ลบข้อมูลเสร็จสมบูรณ์";
                        alert(massged);
                        window.location = "/search_police";
                    });
                }

            }

            $scope.edit = function (police) {
                //alert(police);
                window.location = "/edit_police/id/"+ police.id;
//              window.location = "/api/police/" + police.id;
            }
        });
    </script>
@stop