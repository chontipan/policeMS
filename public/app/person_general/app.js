var app = angular.module("PersonGeneral", ['ui.router', 'flow', 'ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/person_general/_home.html",
            controller: "HomeController",
            resolve: {
                person_generals: function ($http, $stateParams) {
                    return $http.get('/api/guesthistory/');
                }

            }
        })
        .state('form_add', {
            url: "/form_add",
            templateUrl: "/app/person_general/_add_person_general/_form_add.html",
            controller: "AddController"

        })
        .state('form_add.add', {
            url: '/add',
            templateUrl: '/app/person_general/_add_person_general/_add.html'

        })

        .state('form_add.comfirm', {
            url: '/comfirm',
            templateUrl: '/app/person_general/_add_person_general/_comfirm_person_general/_comfirm_person.html'
        })
        .state('form_add.photo', {
            url: '/photo',
            templateUrl: '/app/person_general/_add_person_general/_photo_person_general/_photo_person_genral.html'
        })

        .state('form_add.complete', {
            url: '/complete/:id',
            templateUrl: '/app/person_general/_add_person_general/_complete_person_general/_complete_person.html',
            controller: 'CompleteController',
            resolve: {
                person_general: function ($http, $stateParams) {
                    return $http.get('/api/guesthistory/' + $stateParams.id);
                }
            }
        })
        .state('preview_person_general', {
            url: "/preview_person_general/:id",
            templateUrl: "/app/person_general/_preview_person_general.html",
            controller: "PreviewPersonController",
            resolve: {
                person_general: function ($http, $stateParams) {
                    return $http.get('/api/guesthistory/' + $stateParams.id);
                }
            }
        })


        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/person_general/_edit_person_general/_edit.html",
            controller: "EditController",
            resolve: {
                person_general: function ($http, $stateParams) {
                    return $http.get('/api/guesthistory/' + $stateParams.id);
                }

            }

        })
        .state('add_photo', {
            url: "/add_photo/:id",
            templateUrl: "/app/person_general/_photo_person_geneal.html",
            controller: "AddPhotoPersonController",
            resolve: {
                person_general: function ($http, $stateParams) {
                    return $http.get('/api/guesthistory/' + $stateParams.id);
                }
            }

        })


});

app.controller("AddPhotoPersonController", function ($scope, $http, $stateParams, $rootScope, $timeout
    , $state, person_general) {
    console.log("AddPhotoPersonController.start");

    $scope.data_person_generals = person_general.data;
    console.log($scope.data_person_generals);


    $scope.myFlow = new Flow({
        target: '/api/guesthistory/' + $scope.data_person_generals.id + '/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    $scope.uploadFile = function () {

        saveCaseFile = "ต้องการอัพโหลดรูปนี้ใช่ หรือไม่";

        if (confirm(saveCaseFile)) {
            $scope.myFlow.upload();
            massged = "อัพโหลดรูปเสร็จสมบูรณ์";
            alert(massged);
            $state.go('home');


        }
        //console.log($scope.myFlow);
    }
    $scope.cancelFile = function (file) {
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index, 1);

    }


});
app.controller("HomeController", function ($scope, $window, $http, $stateParams, person_generals, $rootScope) {
    console.log("HomeController.start");
    $scope.data_person_generals = person_generals.data

    $rootScope.current_role = current_role;
    console.log($rootScope.current_role);

    $scope.printPerson = function (person_general) {

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/guesthistory/' + person_general.id + '/generated_pdf_case', '_blank');


    }
    $scope.delete_person = function (person_general) {
        console.log(person_general);
        saveCaseFile = "ลบทะเบียนประวัตินี้?";

        if (confirm(saveCaseFile)) {
            var index = $scope.data_person_generals.indexOf(person_general);
            $scope.data_person_generals.splice(index, 1);
            $http({
                url: "/api/guesthistory/" + person_general.id,
                method: "DELETE",
                data: person_general
            }).success(function (response) {
                //console.log(response);
                massged = "ลบทะเบียนประวัติแล้ว";
                alert(massged);
                //$state.go("home");
            })
        }

    }
    $scope.print_Photoperson = function (person_general) {

        console.log(person_general.id);

        // window.location= "/api/person/"+ $scope.person.id +"/print_photo_person, '_blank'";
        $window.open('/api/guesthistory/' + person_general.id + '/print_photo_person', '_blank');


    }


});

app.controller("AddController", function ($scope, $http, $state, $timeout) {
    console.log("AddController.start");

    $scope.guest = {};
    $scope.personfamily = {};
    $scope.addoffice = {};
    $scope.child = {};
    $scope.employee = {};
    $scope.vehicle = {};


    $scope.guest.personfamily = [];
    $scope.guest.addressoffice = [];
    $scope.guest.datachild = [];
    $scope.guest.vehicle = [];
    $scope.guest.employee = [];
    //$scope.guest.date =   Date();




    $scope.showTab = function (tab) {
        var x = '#' + tab + ' a';
        var myElement = $(x)[0];
        $timeout(function() {
            angular.element(myElement).triggerHandler('click');
        }, 0);

    }

    $scope.clear = function () {
        $scope.dt = null;
    };

    $scope.open_start = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_start = true;
    };

    $scope.open_end = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_end = true;
    };


    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[1];

    $scope.keyword = {};
    $scope.tempFilterTextName = '';
    $scope.filterTextTimeout;
    $scope.searchDataPerson = function ($guest) {
        if ($scope.filterTextTimeout) $timeout.cancel($scope.filterTextTimeout);

        $scope.tempFilterTextName = $guest;
        $scope.filterTextTimeout = $timeout(function () {
            $scope.filterTextName = $scope.tempFilterTextName;
            console.log($scope.filterTextName);

            if ($scope.filterTextName.length == 0) {

            } else {

                $http({
                    url: "/api/person_crime/search/person_crime",
                    method: "post",
                    data: $guest

                }).success(function (response) {
                    $scope.dataperson_crime = response;
                    $http({
                        url: "/api/person_crime/search/person_general",
                        method: "post",
                        data: $guest

                    }).success(function (response) {
                        $scope.dataperson_general = response;
                    })
                })

            }

        }, 250); // delay 250 ms
    }

    $scope.saveDataPersonFamily = function () {
        console.log($scope.personfamily);
        $scope.guest.personfamily.push($scope.personfamily);
        $scope.personfamily = {};
    }

    $scope.DeleteDataPersonFamily = function (personfamily) {
        var index = $scope.guest.personfamily.indexOf(personfamily);
        $scope.guest.personfamily.splice(index, 1);
    }


    $scope.saveDataOffice = function () {
        console.log($scope.addoffice);
        $scope.guest.addressoffice.push($scope.addoffice);
        $scope.addoffice = {};
    }

    $scope.DeleteDataOffice = function (dataoffice) {
        var index = $scope.guest.addressoffice.indexOf(dataoffice);
        $scope.guest.addressoffice.splice(index, 1);
    }


    $scope.saveDataChild = function () {
        console.log($scope.child);
        $scope.guest.datachild.push($scope.child);
        $scope.child = {};
    }

    $scope.DeleteDataChild = function (datachild) {
        var index = $scope.guest.datachild.indexOf(datachild);
        $scope.guest.datachild.splice(index, 1);
    }


    $scope.saveDataEmployee = function () {
        console.log($scope.employee);
        $scope.guest.employee.push($scope.employee);
        $scope.employee = {};
    }

    $scope.DeleteDataEmployee = function (employee) {
        var index = $scope.guest.employee.indexOf(employee);
        $scope.guest.employee.splice(index, 1);
    }


    $scope.saveDataVehicle = function () {
        console.log($scope.vehicle);
        $scope.guest.vehicle.push($scope.vehicle);
        $scope.vehicle = {};
    }

    $scope.DeleteDataVehicle = function (datavehicle) {
        var index = $scope.guest.vehicle.indexOf(datavehicle);
        $scope.guest.vehicle.splice(index, 1);
    }


    $scope.myFlow = new Flow({
        //  target: '/api/guesthistory/'+ $scope.guest.id +'/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })


    $scope.cancelFile = function (file) {
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index, 1);

    }


    $scope.saveDataGuest = function () {
        if ($scope.guest.birth) {
            var dayBirth = $scope.guest.birth;
           // var getdayBirth = dayBirth.split("-");
           // var YB = getdayBirth[2] - 543;
           // var MB = getdayBirth[1];
           // var DB = getdayBirth[0];
/*
            var setdayBirth = moment(YB + "-" + MB + "-" + DB);
            var setNowDate = moment();
            var yearData = setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม
            var yearFinal = Math.round(setNowDate.diff(setdayBirth, 'years', true), 0); // ปีเต็ม
            var yearReal = setNowDate.diff(setdayBirth, 'years'); // ปีจริง
            var monthDiff = Math.floor((yearData - yearReal) * 12); // เดือน
            var str_year_month = yearReal + " ปี " + monthDiff + " เดือน"; // ต่อวันเดือนปี

            $scope.guest.age = str_year_month;*/
           // var setdayBirth = moment(YB + "-" + MB + "-" + DB);
           // var setNowDate = moment();
            //$scope.guest.age = str_year_month
        }
        console.log($scope.guest.age);
        saveCaseFile = "บันทึกทะเบียนประวัติ?";


        if (confirm(saveCaseFile)) {
            if ($scope.guest.name) {
                $scope.guest.status = "complete";

                $http({
                    url: "/api/guesthistory",
                    method: "post",
                    data: $scope.guest
                }).success(function (response) {
                    $scope.myFlow.opts.target = '/api/guesthistory/' + response.id + '/photo';
                    $scope.myFlow.upload();
                    $state.go("form_add.complete", {id: response.id})

                })

            } else {
                massged = "กรุณา กรอก ชื่อ ของบุคคล";
                alert(massged);
            }


        }


    }

});


app.controller("PreviewPersonController", function ($scope, $window, $http, $stateParams,
                                                    $rootScope, $timeout, $state, person_general) {
    console.log("PreviewPersonController.start");
    $scope.guest = person_general.data;
    console.log($scope.guest);
    $scope.printPerson = function () {

        console.log($scope.guest.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/guesthistory/' + $scope.guest.id + '/generated_pdf_case', '_blank');


    }


});


app.controller("EditController", function ($scope, $http, $stateParams, $state, person_general, $timeout) {
    console.log("EditController.start");

    $scope.guest = {};
    $scope.personfamily = {};
    $scope.addoffice = {};
    $scope.child = {};
    $scope.employee = {};
    $scope.vehicle = {};
    $scope.dataspouse = {};

    $scope.guest.personfamily = [];
    $scope.guest.addressoffice = [];
    $scope.guest.datachild = [];
    $scope.guest.vehicle = [];
    $scope.guest.employee = [];

    $scope.guest = person_general.data;



    function init() {
    }

    init();
    $scope.showTab = function (tab) {
        var x = '#' + tab + ' a';
        var myElement = $(x)[0];
        $timeout(function() {
            angular.element(myElement).triggerHandler('click');
        }, 0);

    }

    $scope.saveDataOffice = function () {

        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/address_office",
            method: "post",
            data: $scope.addoffice

        }).success(function () {
            $scope.guest.addressoffice.push($scope.addoffice);
            $scope.addoffice = {};

        })
    }

    $scope.DeleteDataOffice = function (dataoffice) {
        var index = $scope.guest.addressoffice.indexOf(dataoffice);
        $scope.guest.addressoffice.splice(index, 1);
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/address_office/" + dataoffice.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    $scope.saveDataPersonFamily = function () {
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/person_family",
            method: "post",
            data: $scope.personfamily

        }).success(function () {
            $scope.guest.personfamily.push($scope.personfamily);
            $scope.personfamily = {};

        })
    }

    $scope.DeleteDataPersonFamily = function (datacpersonfamily) {
        var index = $scope.guest.personfamily.indexOf(datacpersonfamily);
        $scope.guest.personfamily.splice(index, 1);
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/person_family/" + datacpersonfamily.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    $scope.saveDataChild = function () {

        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/child",
            method: "post",
            data: $scope.child

        }).success(function () {
            $scope.guest.datachild.push($scope.child);
            $scope.child = {};

        })
    }

    $scope.DeleteDataChild = function (datachild) {
        var index = $scope.guest.datachild.indexOf(datachild);
        $scope.guest.datachild.splice(index, 1);
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/child/" + datachild.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    $scope.saveDataEmployee = function () {

        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/employee",
            method: "post",
            data: $scope.employee

        }).success(function () {
            $scope.guest.employee.push($scope.employee);
            $scope.employee = {};

        })
    }

    $scope.DeleteDataEmployee = function (employee) {
        var index = $scope.guest.employee.indexOf(employee);
        $scope.guest.employee.splice(index, 1);
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/employee/" + employee.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    $scope.saveDataVehicle = function () {

        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/vehicle",
            method: "post",
            data: $scope.vehicle

        }).success(function () {
            $scope.guest.vehicle.push($scope.vehicle);
            $scope.vehicle = {};

        })
    }

    $scope.DeleteDataVehicle = function (datavehicle) {
        var index = $scope.guest.vehicle.indexOf(datavehicle);
        $scope.guest.vehicle.splice(index, 1);
        $http({
            url: "/api/guesthistory/" + $scope.guest.id + "/vehicle/" + datavehicle.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    $scope.editpreson = function () {


        saveCaseFile = "บันทึกทะเบียนประวัติ?";
        if (confirm(saveCaseFile)) {
            $http({
                url: "/api/guesthistory/" + $scope.guest.id,
                method: "PUT",
                data: $scope.guest
            }).success(function (response) {
                $state.go("home")
            })
        }
    }

});


app.controller("CompleteController", function ($scope, $window, $http, $stateParams, $rootScope,
                                               $timeout, $state, person_general) {
    console.log("CompleteController.start");

    $scope.guest = person_general.data;
    console.log($scope.guest);

    $scope.printPerson = function () {

        console.log($scope.guest.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/guesthistory/' + $scope.guest.id + '/generated_pdf_case', '_blank');


    }

});


app.controller("PhotoController", function ($scope, $http) {
    console.log("PhotoController.start");
    var self = this;
    self.guest = $scope.guest;

    $scope.myFlow = new Flow({
        target: '/api/guesthistory/' + self.guest.id + '/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    self.uploadFile = function () {
        $scope.myFlow.upload();
        //console.log($scope.myFlow);
    }
    self.cancelFile = function (file) {
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index, 1);

    }

});