var app = angular.module("MyLog", ['ui.router', 'flow','ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/mylog/_home.html",
            controller: "HomeController",
            resolve: {
                mylog : function ($http) {
                    return $http.get('/police/getmylog');
                }
            }
        })


});

app.controller("HomeController", function ($scope, $http,$stateParams,mylog ) {
    console.log("HomeController.start");

    $scope.mylogs = mylog.data.data;
    $scope.pagination = mylog.data;

    $scope.next = function() {
        $http.get($scope.pagination.next_page_url)
            .success(function(r){
                $scope.mylogs = r.data;
                $scope.pagination = r;
            })

    }

    $scope.prev = function() {
        $http.get($scope.pagination.prev_page_url)
            .success(function(r){
                $scope.mylogs = r.data;
                $scope.pagination = r;
            })
    }

});
