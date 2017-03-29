var app = angular.module("UserPolice", ['ui.router', 'flow','ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/police/_home.html",
            controller: "HomeController",
            resolve: {
                police: function ($http,$stateParams) {
                    return $http.get('/api/police/');
                },
                ranks: function ($http) {
                    return $http.get('/rank');
                },
                positions: function ($http) {
                    return $http.get('/position');
                },
                role: function ($http) {
                    return $http.get('/role');
                }

            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/police/_add.html",
            controller: "AddController",
            resolve: {
                ranks: function ($http) {
                    return $http.get('/rank');
                },
                positions: function ($http) {
                    return $http.get('/position');
                },
                role: function ($http) {
                    return $http.get('/role');
                }
            }

        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/police/_edit.html",
            controller: "EditController",
            resolve: {
                police: function ($http,$stateParams) {
                    return $http.get('/api/police/' + $stateParams.id);
                },
                ranks: function ($http) {
                    return $http.get('/rank');
                },
                positions: function ($http) {
                    return $http.get('/position');
                },
                role: function ($http) {
                    return $http.get('/role');
                }
            }

        })

});

app.controller("HomeController", function ($scope,$state, $rootScope,$http,$stateParams,police,positions,ranks,role ) {
    console.log("HomeController.start");
    $scope.datapolices = police.data
    $scope.ranks = ranks.data;
    $scope.positions = positions.data;
    $scope.roles = role.data;

    $rootScope.current_role = current_role;
    console.log( $rootScope.current_role );


    $scope.deletePolice = function (police) {
        savePolice = "ต้องการลบสมาชิกคนนี้?";
        if (confirm(savePolice)) {
            var index = $scope.datapolices.indexOf(police);
            $scope.datapolices.splice(index,1);

            $http({
                url: "/api/police/"+police.id,
                method: "DELETE"
            }).success(function () {

                massged = "ลบประวัติเรียบร้อย";
                alert(massged);

                $state.go("home");
            })
        }
    }


});

app.controller("AddController", function ($scope, $http,$state,positions,ranks,role) {
    console.log("AddController.start");
    $scope.police = {};
    $scope.ranks = ranks.data;
    $scope.positions = positions.data;
    $scope.roles = role.data;

    $scope.savePolice = function () {

        savePolice = "ต้องการบันทึกทะเบียนประวัตินี้?";

        if (confirm(savePolice)) {
            console.log($scope.police);

            $http({
                url: "/api/police",
                method: "post",
                data: $scope.police
            }).success(function () {
                $scope.police = {};
                massged = "บันทึกข้อมูลเสร็จแล้ว";
                alert(massged);
                $state.go("home");
            }).error(function (response) {
                $scope.error = response;
            });
        }
    }

});

app.controller("EditController", function ($scope, $http,$stateParams,$state,
                                           police, ranks, positions,role) {
    console.log("EditController.start");

    $scope.police = police.data;
    $scope.ranks = ranks.data;
    $scope.positions = positions.data;
    $scope.roles = role.data;
    function init() {


        for (a = 0; a < $scope.positions.length; a++) {
            if ($scope.positions[a].id == $scope.police.position.id) {
                $scope.police.position = $scope.positions[a];
                break;
            }
        }
        for (i = 0; i < $scope.ranks.length; i++) {

            if ($scope.ranks[i].id == $scope.police.rank.id) {
                $scope.police.rank = $scope.ranks[i];

                break;
            }
        }
        for (c = 0; c < $scope.roles.length; c++) {

            if ($scope.roles[c].id == $scope.police.role.id) {
                $scope.police.role = $scope.roles[c];

                break;
            }
        }

    }

    init();


    $scope.myFlow = new Flow({
        target: '/api/police/'+$stateParams.id+'/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    $scope.uploadFile = function () {
        $scope.myFlow.upload();
        //console.log($scope.myFlow);
    }
    $scope.cancelFile = function (file) {
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index, 1);

    }


    $scope.editPolice = function () {
        saveEditPolice = "ต้องการบันทึกทะเบียนประวัตินี้?่";
        if (confirm(saveEditPolice)) {
            console.log($scope.police);

            $http({
                url: "/api/police/"+$stateParams.id,
                method: "PUT",
                data: $scope.police
            }).success(function () {
                massged = "แก้ไขข้อมูลเรียบร้อย";
                alert(massged);
                $state.go("home");
            }).error(function (response) {
                $scope.error = response;
            });
        }
    }

});