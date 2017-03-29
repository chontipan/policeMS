var app = angular.module("UserProfilePolice", ['ui.router', 'flow','ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('profile', {
            url: "/",
            templateUrl: "/app/profile_police/_profile.html",
            controller: "ProfileController",
            resolve: {
                profilePolice : function ($http) {
                    return $http.get('/police/getprofile');
                }
            }

        })
        .state('edit_profile', {
            url: "/edit_profile",
            templateUrl: "/app/profile_police/_editProfile.html",
            controller: "EditProfileController",
            resolve: {
                profilePolice : function ($http) {
                    return $http.get('/police/getprofile');
                }
            }

        })

});


app.controller("ProfileController", function ($scope,$state, $http,$stateParams,profilePolice) {
    console.log("ProfileController.start");


    $scope.police = profilePolice.data;
    console.log($scope.police);


});

app.controller("EditProfileController", function ($scope,$state, $http,$stateParams,profilePolice) {
    console.log("EditProfileController.start");


    $scope.police = profilePolice.data;
    console.log($scope.police);

    $scope.myFlow = new Flow({
        target: '/api/police/'+ $scope.police.id+'/photo',
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
        saveEditPolice = "ต้องการบันทึกทะเบียนประวัตินี้?";
        if (confirm(saveEditPolice)) {
            console.log($scope.police);

            $http({
                url: "/api/police/"+ $scope.police.id,
                method: "PUT",
                data: $scope.police
            }).success(function () {
                massged = "แก้ไขข้อมูลเรียบร้อย";
                alert(massged);
                $state.go("profile");
            }).error(function (response) {
                $scope.error = response;
            });
        }
    }

});

