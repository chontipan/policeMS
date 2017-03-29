var app = angular.module("PlaceGeneral", ['ui.router', 'flow', 'ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/place_general/_home.html",
            controller: "HomeController",

        })
        .state('form_add', {
            url: "/form_add",
            templateUrl: "/app/place_general/_add_place_general/_form_add.html",
            controller: "AddController",

        })
        .state('form_add.add', {
            url: '/add',
            templateUrl: '/app/place_general/_add_place_general/_add.html'

        })

        .state('form_add.comfirm', {
            url: '/comfirm',
            templateUrl: '/app/place_general/_add_place_general/_comfirm_place_general/_comfirm_place.html'
        })
        .state('form_add.photo', {
            url: '/photo',
            templateUrl: '/app/place_general/_add_place_general/_photo_place_general/_photo_place_genral.html'
        })

        .state('form_add.complete', {
            url: '/complete/:id',
            templateUrl: '/app/place_general/_add_place_general/_complete_place_general/_complete_place.html',
            controller: 'CompleteController',
        })
        .state('preview_place_general', {
            url: "/preview_place_general/:id",
            templateUrl: "/app/place_general/_preview_place_general.html",
            controller: "PreviewPlaceController",
        })


        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/place_general/_edit_place_general/_edit.html",
            controller: "EditController",


        })
        .state('add_photo', {
            url: "/add_photo/:id",
            templateUrl: "/app/place_general/_photo_place_geneal.html",
            controller: "AddPhotoPlaceController",


        })


});


app.controller("HomeController", function ($scope, $window, $http, $stateParams, place_generals, $rootScope) {
    console.log("HomeController.start");
    $scope.data_place_generals = place_generals.data
   // $scope.nametitles = nametitle.data;
    $rootScope.current_role = current_role;
    console.log($rootScope.current_role);

    $scope.printPlace = function (place_general) {

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/place_general/' + place_general.id + '/generated_pdf_case', '_blank');


    }
    $scope.delete_place = function (place_general) {
        console.log(place_general);
        saveCaseFile = "ต้องการลบประวัตินี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            var index = $scope.data_place_generals.indexOf(place_general);
            $scope.data_place_generals.splice(index, 1);
            $http({
                url: "/api/place_general/" + place_general.id,
                method: "DELETE",
                data: place_general
            }).success(function (response) {
                //console.log(response);
                massged = "ลบประวัติเสร็จสมบูรณ์";
                alert(massged);
                //$state.go("home");
            })
        }

    }
    $scope.print_Photoplace = function (place_general) {

        console.log(place_general.id);

        // window.location= "/api/place/"+ $scope.place.id +"/print_photo_place, '_blank'";
        $window.open('/api/place_general/' + place_general.id + '/print_photo_place', '_blank');


    }


});

app.controller("AddController", function ($scope, $http, $state, $timeout) {
    console.log("AddController.start");


    //$scope.nametitles = nametitle.data;


    $scope.showTab = function (tab) {
        var x = '#' + tab + ' a';
        var myElement = $(x)[0];
        $timeout(function() {
            angular.element(myElement).triggerHandler('click');
        }, 0);

    }


});
