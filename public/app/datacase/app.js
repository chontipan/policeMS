
var app = angular.module("DataCase",['ui.router', 'flow','ui.bootstrap'],function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');


});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/datacase/_home.html",
            controller: "HomeController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/');
                }

            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/datacase/_add.html",
            controller: "AddCaseController",
            resolve: {

            }
        })
        .state('add_person', {
            url: "/_add_person/:id",
            templateUrl: "/app/datacase/_add_person.html",
            controller: "AddPersonController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('preview', {
            url: "/preview/:id",
            templateUrl: "/app/datacase/_add_preview.html",
            controller: "PreviewPersonController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('edit_case', {
            url: "/edit_case/:id",
            templateUrl: "/app/datacase/_edit_case.html",
            controller: "EditCaseController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('add_file', {
            url: "/add_file/:id",
            templateUrl: "/app/datacase/_add_file.html",
            controller: "AddFileController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('upload_file', {
            url: "/upload_file/:id",
            templateUrl: "/app/datacase/_upload_file.html",
            controller: "UploadFileController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('add_print', {
            url: "/add_print/:id",
            templateUrl: "/app/datacase/_add_print.html",
            controller: "PrintController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })



        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/datacase/_edit.html",
            controller: "EditController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('view', {
            url: "/view/:id",
            templateUrl: "/app/datacase/_view_case.html",
            controller: "ViewController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                },
                caseperson: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id + '/person/');
                }

            }
        })
        .state('input_number_case', {
            url: "/input_number_case/:id",
            templateUrl: "/app/datacase/_edit_number_case.html",
            controller: "NumberCaseController",
            resolve: {
                datacase: function ($http,$stateParams) {
                    return $http.get('/api/case/' + $stateParams.id);
                }
            }
        })
});



app.controller("HomeController",function($scope,$window,$http,datacase,$timeout,$rootScope){
    console.log("HomeController.start");
    $scope.datacase = datacase.data;

    $rootScope.current_role = current_role;
    console.log( $rootScope.current_role );

    $scope.keyword = {};
    $scope.tempFilterTextName = '';
    $scope.filterTextTimeout;
    $scope.searchCase = function ($keyword) {
        if ($scope.filterTextTimeout) $timeout.cancel($scope.filterTextTimeout);

        $scope.tempFilterTextName = $keyword;
        $scope.filterTextTimeout = $timeout(function () {
            $scope.filterTextName = $scope.tempFilterTextName;

            console.log($scope.filterTextName);



        }, 250); // delay 250 ms
    }
    $scope.delete_case = function(datacases){

        saveCaseFile = "ต้องการลบคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            var index = $scope.datacase.indexOf(datacases);
            $scope.datacase.splice(index,1);
            $http({
                url : "/api/case/delete/"+ datacases.id+ "/person",
                method : "post",
                data : $scope.casePerson
            }).success(function(){

            })
        }

    }

    $scope.print_case = function(datacases){

        $window.open('/api/case/'+ datacases.id +'/generated_pdf_case', '_blank');

    }



});


app.controller("AddPersonController",function($scope,$http,$stateParams,$timeout,$state,$window,
                                              datacase,caseperson){
    console.log("AddPersonController.start");

    function init(){
        $scope.caseFile = datacase.data;
        $scope.casePerson = caseperson.data;
       // $searchPerson({"name":""});
        //$scope.searchPerson({"name":""});
        $scope.today = new Date();

        console.log($scope.caseFile);
        console.log($scope.casePerson);


    }

    init();


    $scope.cancelCase = function(){
        cancel = "คุณต้องการยกเลิก การเพิ่มข้อมูลนี้ ใช่หรือไม่";
        if (confirm(cancel)) {
            console.log($scope.caseFile)
        }
    }


    $scope.del_person = function(case_person){
        delperson = "ต้องการลบ [" + case_person.name + " , " + case_person.surname + "]?";

        if (confirm(delperson)) {
            var index = $scope.casePerson.indexOf(case_person);
            $scope.casePerson.splice(index,1);
            $http({
                url: "/api/case/"+ $scope.caseFile.id +"/person/"+ case_person.id,
                method: "DELETE"
            }).success(function (response) {
                console.log(response);
            });
        }
    }

    $scope.edit_person = function(person){
        console.log(person);

    }

    $scope.add_person = function(person){
        console.log(person.id);
        console.log($scope.caseFile.id);
        saveCaseFile = "ต้องการเพิ่มทะเบียนประวัตินี้ ใช่หรือ ไม่";

        if (confirm(saveCaseFile)) {
            $http({
                url : "/api/case/"+$scope.caseFile.id+"/person",
                method : "post",
                data : person

            }).success(function(){
                //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                $scope.casePerson.push(person);

            }).error(function(response){
                alert(response.message);
            })
        }
    }

    $scope.view_person = function(person){
        console.log(person.id);

        $window.open('person_crime#/preview_person/'+ person.id, '_blank');
    }


    $scope.keyword = {};

    $scope.tempFilterTextName = '';

    $scope.filterTextTimeout;

    $scope.searchPerson = function ($keyword) {
        if ($scope.filterTextTimeout) $timeout.cancel($scope.filterTextTimeout);

        $scope.tempFilterTextName = $keyword;
        $scope.filterTextTimeout = $timeout(function () {
            $scope.filterTextName = $scope.tempFilterTextName;

            console.log($scope.filterTextName);

            if ($scope.filterTextName.length == 0) {

            } else {

                $http({
                    url : "/api/person_crime/case/search",
                    method : "post",
                    data : $keyword

                }).success(function(response){
                    $scope.dataPerson = response;
                })

            }

        }, 250); // delay 250 ms
    }

    $scope.cancel_case = function(){
        console.log($scope.caseFile.id);
        console.log($scope.casePerson);
        saveCaseFile = "ต้องการยกเลิกการบันทึกคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            $http({
                url : "/api/case/delete/"+ $scope.caseFile.id+ "/person",
                method : "post",
                data : $scope.casePerson
            }).success(function(){
                massged = "ลบข้อมูลคดีเสร็จสมบูรณ์";
                alert(massged);
                $state.go("home");
            })
        }

    }


});



app.controller("PreviewPersonController",function($scope,$http,$stateParams
                                                ,datacase,caseperson,$state){
    console.log("PreviewPersonController.start");
    $scope.caseFile = datacase.data;
    $scope.casePerson = caseperson.data;
    // $scope.dataperson = dataperson.data;
    console.log($scope.casePerson);
    console.log($scope.caseFile);


    $scope.cancel_case = function(){
        saveCaseFile = "ต้องการยกเลิกการบันทึกคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            $http({
                url : "/api/case/delete/"+ $scope.caseFile.id+ "/person",
                method : "post",
                data : $scope.casePerson
            }).success(function(){
                massged = "ลบข้อมูลคดีเสร็จสมบูรณ์";
                alert(massged);
                $state.go("home");
            })
        }

    }


    $scope.confirm_case = function(){

        saveCaseFile = "ต้องการบันทึกข้อมูลคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {

            $scope.caseFile.status = "complete";

            $http({
                url : "/api/case/"+$scope.caseFile.id,
                method : "PUT",
                data : $scope.caseFile
            }).success(function(){
                massged = "การบันทึกข้อมูลเสร็จสมบูรณ์";
                alert(massged);
                $state.go("add_print",{id:$scope.caseFile.id})


            })
        }


    }



});

app.controller("EditCaseController",function($scope,$http,$stateParams,$state,datacase,caseperson){
    console.log("EditCaseController.start");

    $scope.clear = function () {
        $scope.dt = null;
    };

    $scope.open_start = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_start = true;
    };

    $scope.open_end = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_end = true;
    };

    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];



    $scope.caseFile = {};
    $scope.Vehicle = {};
    $scope.Weapon = {};


    $scope.caseFile.weapon = [];
    $scope.caseFile.vehicle = [];

    $scope.addvehicle = function(){
        console.log($scope.Vehicle);
        $http({
            url : "/api/case/"+$scope.caseFile.id+"/vehicle",
            method : "post",
            data : $scope.Vehicle

        }).success(function(){
            console.log($scope.Vehicle);
            $scope.caseFile.vehicle.push($scope.Vehicle);
            $scope.Vehicle = {};

        })

    }

    $scope.delvehicle  = function(datavehicle){
        var index = $scope.caseFile.vehicle.indexOf(datavehicle);
        $scope.caseFile.vehicle.splice(index,1);

        $http({
            url: "/api/case/"+ $scope.caseFile.id +"/vehicle/"+ datavehicle.id,
            method: "DELETE"
        }).success(function (response) {
            console.log(response);

        });

    }


    $scope.addweapon = function(){

        console.log($scope.Weapon);
        $http({
            url : "/api/case/"+$scope.caseFile.id+"/weapon",
            method : "post",
            data : $scope.Weapon

        }).success(function(){

            $scope.caseFile.weapon.push($scope.Weapon);
            $scope.Weapon = {};

        })
    }
    $scope.delweapon  = function(dataweapon){
        var index = $scope.caseFile.weapon.indexOf(dataweapon);
        $scope.caseFile.weapon.splice(index,1);

        $http({
            url: "/api/case/"+ $scope.caseFile.id +"/weapon/"+ dataweapon.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    function init(){
        $scope.caseFile = datacase.data;
        $scope.casePerson = caseperson.data;
        //$scope.searchPerson({"name":""});

        console.log($scope.caseFile);
        console.log($scope.casePerson);


    }

    init();

    $scope.edit_case = function(){
        console.log($scope.caseFile.id);
        $http({
            url : "/api/case/"+$scope.caseFile.id,
            method : "PUT",
            data : $scope.caseFile
        }).success(function(response){
            $state.go("add_person",{id:response.id});

        })
    }

    $scope.cancel_case = function(){
        console.log($scope.caseFile.id);
        console.log($scope.casePerson);
        saveCaseFile = "ต้องการยกเลิกการบันทึกคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            $http({
                url : "/api/case/delete/"+ $scope.caseFile.id+ "/person",
                method : "post",
                data : $scope.casePerson
            }).success(function(response){
                console.log(response);
                massged = "ลบข้อมูลคดีเสร็จสมบูรณ์";
                alert(massged);
                $state.go("home");
            })
        }

    }


});


app.controller("ViewController",function($scope,$http,$stateParams,$window
                                    ,datacase,caseperson){
    console.log("ViewController.start");
    $scope.caseFile = datacase.data;
    $scope.casePerson = caseperson.data;
    console.log( $scope.caseFile);


    $scope.view_person = function(person){
        $window.open('person_crime#/preview_person/'+person.id, '_blank');
    }



    $scope.printCaseFile = function(){
        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/case/'+ $scope.caseFile.id +'/generated_pdf_case', '_blank');
    }


});

app.controller("NumberCaseController",function($scope,$http,$stateParams,$window,$state
    ,datacase){
    console.log("NumberCaseController.start");
    $scope.caseFile = datacase.data;


    $scope.save_number_case = function(){

        saveCaseFile = "ต้องการเพิ่มเลขคดีนี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {

            $http({
                url : "/api/case/save_number_case/"+ $scope.caseFile.id,
                method : "post",
                data :  $scope.caseFile
            }).success(function(){
                massged = "การบันทึกข้อมูลเสร็จสมบูรณ์";
                alert(massged);
                $state.go("home")


            })
        }


    }




});

app.controller("PrintController",function($scope,$http,$stateParams,$window
    ,datacase,caseperson){
    console.log("PrintController.start");
    $scope.caseFile = datacase.data;
    $scope.casePerson = caseperson.data;
    // $scope.dataperson = dataperson.data;

    console.log($scope.casePerson);

    function init(){
        $scope.caseFile.status = "complete";

        $http({
            url : "/api/case/"+$scope.caseFile.id,
            method : "PUT",
            data : $scope.caseFile
        })

    }



    $scope.printCaseFile = function(){
        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/case/'+ $scope.caseFile.id +'/generated_pdf_case', '_blank');
    }

});



app.controller("UploadFileController",function($scope,$http,$stateParams,$state,datacase,caseperson){
    console.log("UploadFileController.start");

    function init(){
        $scope.caseFile = datacase.data;
        $scope.casePerson = caseperson.data;

    }


    init();



    $scope.myFlow = new Flow({
        target: '/api/case/'+ $scope.caseFile.id +'/file',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    $scope.uploadFile = function(){
        $scope.myFlow.upload();
        massged = "อัพโหลดไฟล์เสร็จสมบูรณ์";
        alert(massged);
        $state.go("home");
    }
    $scope.cancelFile = function (file){

        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);


    }




});


app.controller("AddFileController",function($scope,$http,$stateParams,$state,datacase,caseperson){
    console.log("AddFileController.start");
    $scope.caseFile = datacase.data;
    $scope.casePerson = caseperson.data;

    $scope.caseFile = {};
    $scope.Vehicle = {};
    $scope.Weapon = {};


    $scope.caseFile.weapon = [];
    $scope.caseFile.vehicle = [];



    function init(){
        $scope.caseFile = datacase.data;
        $scope.casePerson = caseperson.data;
        console.log($scope.caseFile);
        console.log($scope.casePerson);
    }


    init();



    $scope.myFlow = new Flow({
        target: '/api/case/'+ $scope.caseFile.id +'/file',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    $scope.uploadFile = function(){
        $scope.myFlow.upload();
        $state.go("preview",{id:$scope.caseFile.id});
    }
    $scope.cancelFile = function (file){

        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);


    }




});



app.controller("EditController",function($scope,$http,$stateParams,$state,datacase,caseperson){
    console.log("EditController.start");
    $scope.caseFile = datacase.data;
    $scope.casePerson = caseperson.data;
    // $scope.dataperson = dataperson.data;
    console.log($scope.casePerson);

    $scope.clear = function () {
        $scope.dt = null;
    };


    $scope.open_start = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_start = true;
    };

    $scope.open_end = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_end = true;
    };


    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];

    $scope.caseFile = {};
    $scope.Vehicle = {};
    $scope.Weapon = {};


    $scope.caseFile.weapon = [];
    $scope.caseFile.vehicle = [];

    $scope.addvehicle = function(){
        console.log($scope.Vehicle);
        $http({
            url : "/api/case/"+$scope.caseFile.id+"/vehicle",
            method : "post",
            data : $scope.Vehicle

        }).success(function(){
            console.log($scope.Vehicle);
            $scope.caseFile.vehicle.push($scope.Vehicle);
            $scope.Vehicle = {};

        })

    }

    $scope.delvehicle  = function(datavehicle){
        var index = $scope.caseFile.vehicle.indexOf(datavehicle);
        $scope.caseFile.vehicle.splice(index,1);

        $http({
            url: "/api/case/"+ $scope.caseFile.id +"/vehicle/"+ datavehicle.id,
            method: "DELETE"
        }).success(function (response) {
            console.log(response);

        });

    }


    $scope.addweapon = function(){

        console.log($scope.Weapon);
        $http({
            url : "/api/case/"+$scope.caseFile.id+"/weapon",
            method : "post",
            data : $scope.Weapon

        }).success(function(){

            $scope.caseFile.weapon.push($scope.Weapon);
            $scope.Weapon = {};

        })
    }
    $scope.delweapon  = function(dataweapon){
        var index = $scope.caseFile.weapon.indexOf(dataweapon);
        $scope.caseFile.weapon.splice(index,1);

        $http({
            url: "/api/case/"+ $scope.caseFile.id +"/weapon/"+ dataweapon.id,
            method: "DELETE"
        }).success(function () {

        });
    }


    function init(){
        $scope.caseFile = datacase.data;
        $scope.casePerson = caseperson.data;
        console.log($scope.caseFile);
        console.log($scope.casePerson);
    }

    init();

    $scope.edit_case = function(){
        console.log($scope.caseFile.id);
        $http({
            url : "/api/case/"+$scope.caseFile.id,
            method : "PUT",
            data : $scope.caseFile
        }).success(function(response){
            $state.go("home");

        })
    }


});




app.controller("AddCaseController",function($scope,$http,$state){
    console.log("AddCaseController.start");

    $scope.clear = function () {
        $scope.dt = null;
    };

    $scope.open_start = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_start = true;
    };

    $scope.open_end = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened_end = true;
    };


    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];


    $scope.caseFile = {};
    $scope.Vehicle = {};
    $scope.Weapon = {};


    $scope.caseFile.weapon = [];
    $scope.caseFile.vehicle = [];

    $scope.addvehicle = function(){
        console.log($scope.Vehicle);
        $scope.caseFile.vehicle.push($scope.Vehicle);
        $scope.Vehicle = {};
    }
    $scope.delvehicle  = function(datavehicle){
        var index = $scope.caseFile.vehicle.indexOf(vehicle);
        $scope.caseFile.vehicle.splice(index,1);
    }


    $scope.addweapon = function(){
        console.log($scope.Weapon);
        $scope.caseFile.weapon.push($scope.Weapon);
        $scope.Weapon = {};
    }
    $scope.delweapon  = function(dataweapon){
        var index = $scope.caseFile.weapon.indexOf(weapon);
        $scope.caseFile.weapon.splice(index,1);
    }


    $scope.saveCaseFileWrong = function(){


        console.log($scope.caseFile);


            console.log($scope.caseFile);
            $http({
                url : "/api/case",
                method : "post",
                data : $scope.caseFile

            }).success(function(response){
                $state.go("add_person",{id:response.id});

            })

    }
});

app.controller("PersonController",function($scope,$http,$state,$timeout){
    console.log("PersonController.start");
    var self = this;



    self.del_person = function(case_person){
            delperson = "ต้องการลบ [" + case_person.name + " , " + case_person.surname + "]?";

            if (confirm(delperson)) {
                var index = $scope.casePerson.indexOf(case_person);
                $scope.casePerson.splice(index,1);
                $http({
                    url: "/api/case/"+ $scope.caseFile.id +"/person/"+ case_person.id,
                    method: "DELETE"
                }).success(function (response) {

                });
            }
    }

    self.edit_person = function(person){
        console.log(person);

    }

    self.add_person = function(person){
        console.log(person.id);
        console.log($scope.caseFile.id);
        saveCaseFile = "ต้องการเพิ่มทะเบียนประวัตินี้ ใช่หรือ ไม่";

        if (confirm(saveCaseFile)) {
            $http({
                url : "/api/case/"+$scope.caseFile.id+"/person",
                method : "post",
                data : person

            }).success(function(){
                //เสร็จแล้วทำอะไรต่อ ก็ใส่ตรงนี้
                $scope.casePerson.push(person);

                massged = "เพิ่มข้อมูลเสร็จแล้ว";
                alert(massged)

            }).error(function(response){
                alert(response.message);
            })
        }
    }

    self.view_person = function(person){
        console.log(person.id);

       $window.open('/api/person/'+ person.id +'/view_person', '_blank');
    }


    self.keyword = {};

    self.tempFilterTextName = '';

    self.filterTextTimeout;

    self.searchPerson = function ($keyword) {
        if (self.filterTextTimeout) $timeout.cancel(self.filterTextTimeout);

        self.tempFilterTextName = $keyword;
        self.filterTextTimeout = $timeout(function () {
            self.filterTextName = self.tempFilterTextName;

            console.log(self.filterTextName);

            if (self.filterTextName.length == 0) {

            } else {

                $http({
                    url : "/api/person_crime/case/search",
                    method : "post",
                    data : $keyword

                }).success(function(response){
                    self.dataPerson = response;
                })

            }

        }, 250); // delay 250 ms
    }






});


app.controller("CaseFileController", function ($scope, $state) {
    console.log("CaseFileController Start...");
    var self = this;
    console.log($scope.caseFile);
    self.datacase = $scope.caseFile;

    self.myFlow = new Flow({
        target: '/api/case/'+ self.datacase.id +'/file',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    self.uploadFile = function(){
        self.myFlow.upload();
        massged = "อัพโหลดไฟล์เสร็จสมบูรณ์";
        alert(massged);
        $state.go("home")

        //console.log($scope.myFlow);
    }
    self.cancelFile = function (file){
        var index = self.myFlow.files.indexOf(file)
        self.myFlow.files.splice(index,1);

    }

});


app.controller("PrintCaseController", function ($scope, $state,$window) {
    console.log("PrintCaseController Start...");
    var self = this;

    self.printCaseFile = function(){
        console.log($scope.caseFile.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/case/'+ $scope.caseFile.id +'/generated_pdf_case', '_blank');
    }
});