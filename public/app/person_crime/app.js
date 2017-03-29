


var app = angular.module("Person", ['ui.router','flow','ui.bootstrap'], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');



});

app.config(function ($stateProvider, $urlRouterProvider) {


    $urlRouterProvider.otherwise("/");
    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/person_crime/_home.html",
            controller: "HomeController",
            resolve: {
                person_crime: function ($http,$stateParams) {
                    return $http.get('/api/person_crime/');
                }
            }
        })

        .state('form_add', {
            url: '/form_add',
            templateUrl: '/app/person_crime/_add_person/_from_add.html',
            controller: 'AddController',

        })
        // route to show our basic form (/form)
        .state('form_add.add', {
            url: '/add',
            templateUrl: '/app/person_crime/_add_person/_add.html'

        })

        // nested states
        // each of these sections will have their own view
        // url will be nested (/form/profile)
        .state('form_add.comfirm', {
            url: '/comfirm',
            templateUrl: '/app/person_crime/_add_person/_comfirm_person/_comfirm_person.html'
        })
        .state('form_add.photo', {
            url: '/photo',
            templateUrl: '/app/person_crime/_add_person/_upload_photo/_photo.html'
        })

        .state('form_add.complete', {
            url: '/complete/:id',
            templateUrl: '/app/person_crime/_add_person/_complete_person/_complete_person.html',
            controller: 'CompleteController',
            resolve: {
                person: function ($http,$stateParams) {
                    return $http.get('/api/person_crime/' + $stateParams.id);
                }
            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/person_crime/_edit_person/_edit.html",
            controller: "EditController",
            resolve: {
                person: function ($http,$stateParams) {
                    return $http.get('/api/person_crime/' + $stateParams.id);
                }

            }

        })
        .state('preview_person', {
            url: "/preview_person/:id",
            templateUrl: "/app/person_crime/_preview_person.html",
            controller: "PreviewPersonController",
            resolve: {
                person: function ($http,$stateParams) {
                    return $http.get('/api/person_crime/' + $stateParams.id);
                }
            }
        })
        .state('add_photo', {
            url: "/add_photo/:id",
            templateUrl: "/app/person_crime/_photo_person.html",
            controller: "AddPhotoPersonController",
            resolve: {
                person: function ($http,$stateParams) {
                    return $http.get('/api/person_crime/' + $stateParams.id);
                }
            }

        })


})

app.controller("AddPhotoPersonController", function ($scope, $http,$stateParams,$rootScope,$timeout
                                            ,$state,person) {
    console.log("AddPhotoPersonController.start");

    $scope.person = person.data;
    console.log($scope.person );



    $scope.myFlow = new Flow({
        target: '/api/person_crime/'+ $scope.person.id +'/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    $scope.uploadFile = function(){

        saveCaseFile = "ต้องการอัพโหลดรูปนี้ใช่ หรือไม่";

        if (confirm(saveCaseFile)) {
            $scope.myFlow.upload();
            massged = "อัพโหลดรูปเสร็จสมบูรณ์";
            alert(massged);
            $state.go('home');


        }
        //console.log($scope.myFlow);
    }
    $scope.cancelFile = function (file){
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);

    }


});

app.controller("PreviewPersonController", function ($scope,$window, $http,$stateParams,$rootScope,$timeout,$state,person ) {
    console.log("PreviewPersonController.start");
    $scope.person = person.data;
    console.log($scope.person);

    $scope.printPerson = function(){

        console.log($scope.person.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/person_crime/'+ $scope.person.id +'/generated_pdf_person', '_blank');


    }


});

app.controller("HomeController", function ($scope, $http,$stateParams,$rootScope,$timeout,$window,person_crime ) {
    console.log("HomeController.start");

    $scope.dataperson = person_crime.data;


    $rootScope.current_role = current_role;
    console.log( $rootScope.current_role );

    //
    //
    //$scope.keyword = {};
    //$scope.tempFilterTextName = '';
    //$scope.filterTextTimeout;
    //$scope.searchPerson = function ($keyword) {
    //    if ($scope.filterTextTimeout) $timeout.cancel($scope.filterTextTimeout);
    //
    //    $scope.tempFilterTextName = $keyword;
    //    $scope.filterTextTimeout = $timeout(function () {
    //        $scope.filterTextName = $scope.tempFilterTextName;
    //
    //        console.log($scope.filterTextName);
    //
    //        if ($scope.filterTextName.length == 0) {
    //
    //        } else {
    //
    //            $http({
    //                url : "/api/person_crime/data/search",
    //                method : "post",
    //                data : $keyword
    //
    //            }).success(function(response){
    //                $scope.dataperson = response;
    //            })
    //
    //        }
    //
    //
    //    }, 250); // delay 250 ms
    //}

    $scope.delete_person = function(person){
        console.log(person);
        saveCaseFile = "ต้องการลบประวัตินี้ใช่ หรือ ไม่";

        if (confirm(saveCaseFile)) {
            var index = $scope.dataperson.indexOf(person);
            $scope.dataperson.splice(index,1);
            $http({
                url : "/api/person_crime/"+ person.id,
                method : "DELETE",
                data : person
            }).success(function(response){
                //console.log(response);
                massged = "ลบประวัติเสร็จสมบูรณ์";
                alert(massged);
                //$state.go("home");
            })
        }

    }
    $scope.print_person = function(person){

        console.log(person.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/person_crime/'+ person.id+'/generated_pdf_person', '_blank');


    }
    $scope.print_Photoperson = function(person){

        console.log(person.id);

        // window.location= "/api/person/"+ $scope.person.id +"/print_photo_person, '_blank'";
        $window.open('/api/person_crime/'+ person.id +'/print_photo_person', '_blank');


    }



});



app.controller("AddController", function ($scope, $http,$state,$modal,$window,$timeout) {
    console.log("AddController.start");

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



    var numbers = [];
    for(var i=1;i<=300;i++) {
        numbers.push(i);
    }

    var ages = [];
    for(var i=1;i<=120;i++) {
        ages.push(i);
    }
    $scope.age = ages;
    //console.log($scope.age);



    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];


    $scope.person = {};
    $scope.child = {};
    $scope.addoffice = {};

    $scope.person.addressoffice = [];
    $scope.person.datachild = [];

    $scope.caseFile = {};
    $scope.Vehicle = {};
    $scope.Weapon = {};


    $scope.caseFile.weapon = [];
    $scope.caseFile.vehicle = [];




    $scope.showTab = function (tab) {
        var x = '#' + tab + ' a';
        var myElement = $(x)[0];
        $timeout(function() {
            angular.element(myElement).triggerHandler('click');
        }, 0);

    }

    $scope.addvehicle = function(){
        console.log($scope.Vehicle);
        $scope.caseFile.vehicle.push($scope.Vehicle);
        $scope.Vehicle = {};
    }
    $scope.delvehicle  = function(datavehicle){
        var index = $scope.caseFile.vehicle.indexOf(datavehicle);
        $scope.caseFile.vehicle.splice(index,1);
    }


    $scope.addweapon = function(){
        console.log($scope.Weapon);
        $scope.caseFile.weapon.push($scope.Weapon);
        $scope.Weapon = {};
    }
    $scope.delweapon  = function(dataweapon){
        var index = $scope.caseFile.weapon.indexOf(dataweapon);
        $scope.caseFile.weapon.splice(index,1);
    }


    $scope.saveDatachill = function(){
        console.log( $scope.child);
        $scope.person.datachild.push( $scope.child);
        $scope.child = {};
    }
    $scope.cancelDatachill  = function(){
        $scope.child = {};

    }


    $scope.saveAddressOffice = function(){
        console.log( $scope.addoffice);
        $scope.person.addressoffice.push( $scope.addoffice);
        $scope.addoffice = {};
    }
    $scope.cancelAddressOffice = function(){
        $scope.addoffice = {};
    }

    $scope.del_addressoffice = function(dataoffice){
        var index =  $scope.person.addressoffice.indexOf(dataoffice);
        $scope.person.addressoffice.splice(index,1);
    }


    $scope.del_datachild = function(datachild){
        var index =  $scope.person.datachild.indexOf(datachild);
        $scope.person.datachild.splice(index,1);
    }



    $scope.resetpreson = function(){
        $scope.person = {};
        $scope.caseFile = {};
    }


    $scope.keyword = {};
    $scope.tempFilterTextName = '';
    $scope.filterTextTimeout;
    $scope.searchDataPerson = function ($person) {
        if ($scope.filterTextTimeout) $timeout.cancel($scope.filterTextTimeout);

        $scope.tempFilterTextName = $person;
        $scope.filterTextTimeout = $timeout(function () {
            $scope.filterTextName = $scope.tempFilterTextName;
            console.log( $scope.filterTextName);

            if ($scope.filterTextName.length == 0) {

            } else {

                $http({
                    url : "/api/person_crime/search/person_crime",
                    method : "post",
                    data : $person

                }).success(function(response){
                    $scope.dataperson_crime = response;
                    $http({
                        url : "/api/person_crime/search/person_general",
                        method : "post",
                        data : $person

                    }).success(function(response){
                        $scope.dataperson_general = response;
                    })
                })

            }

        }, 250); // delay 250 ms
    }




    $scope.inputPersonCrime = function(person){
        console.log(person);
        $scope.person = person;


    }

    $scope.viewCase = function(datacase){

        console.log(datacase.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/police/case#/view/'+datacase.id, '_blank');


    }


    $scope.cancelPersonCrime = function(person){

        $scope.person = {};
        $state.go("home");

    }


    $scope.savepreson = function(){
        //console.log($scope.person.date);
        //console.log($scope.person.birth);

        if($scope.person.birth){
            var dayBirth=$scope.person.birth;
            var getdayBirth=dayBirth.split("-");
            var YB=getdayBirth[2]-543;
            var MB=getdayBirth[1];
            var DB=getdayBirth[0];

            var setdayBirth=moment(YB+"-"+MB+"-"+DB);
            var setNowDate=moment();
            var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม
            var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม
            var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง
            var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน
            var str_year_month=yearReal+" ปี "+monthDiff+" เดือน"; // ต่อวันเดือนปี
            $scope.person.age = str_year_month;
        }



        //if($scope.person.typeidcard && $scope.person.idcard1){
        //    $scope.person.idcard = $scope.person.typeidcard +" : "+ $scope.person.idcard1;
        //
        //}
        //console.log($scope.person.age);
        //console.log($scope.person.idcard);
        console.log("Type IDCARD = " + $scope.person.typeidcard);

        saveCaseFile = "ต้องการบันทึกทะเบียนประวัตินี้ ใช่หรือ ไม่";

        if (confirm(saveCaseFile)) {
            if($scope.person.name && $scope.person.date){
                $scope.person.status = "complete";
                $scope.caseFile.status = "complete";

                sendObj ={
                    person : $scope.person,
                    caseFile : $scope.caseFile
                }

                $http({
                    url : "/api/person_crime",
                    method : "post",
                    data : sendObj

                }).success(function(response){
                    $scope.myFlow.opts.target = '/api/person_crime/'+ response.id +'/photo';

                    $scope.myFlow.upload();
                    $state.go("form_add.complete",{id:response.id})

                })

            }else{
                massged = "กรุณา กรอก อย่างน้อย 2 ช่องนี้ ชื่อ , วันที่จับกุม";
                alert(massged);
            }



        }

    }



    $scope.myFlow = new Flow({
       // target: '/api/person_crime/'+ response.id +'/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })




    $scope.cancelFile = function (file){
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);

    }





});

app.controller("CompleteController", function ($scope,$window, $http,$stateParams,$rootScope,
                                                  $timeout,$state,person ) {
    console.log("CompleteController.start");

    $scope.person = person.data;
    $scope.datacase =  $scope.person.datacase[0];
    console.log($scope.datacase);

    $scope.uploadfile = function(){

        console.log($scope.datacase.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/police/case#/upload_file/'+ $scope.datacase.id, '_blank');


    }

    $scope.printPerson = function(){

        console.log($scope.person.id);

        //window.location= "/api/case/"+ $scope.caseFile.id +"/generated_pdf_case";
        $window.open('/api/person_crime/'+ $scope.person.id +'/generated_pdf_person', '_blank');


    }

});

app.controller("EditController", function ($scope, $http,$stateParams,$state,$rootScope,
                                           person,$timeout) {
    console.log("EditController.start");

    $rootScope.current_role = current_role;
    console.log( $rootScope.current_role );

    $scope.person = {};
    $scope.child = {};
    $scope.addoffice = {};
    $scope.dataspouse = {};

    $scope.person.addressoffice = [];
    $scope.person.datachild = [];


    $scope.person = person.data;
    console.log($scope.person );


    var numbers = [];
    for(var i=1;i<=300;i++) {
        numbers.push(i);
    }
    $scope.number = numbers;
    //console.log($scope.number);


    var ages = [];
    for(var i=1;i<=120;i++) {
        ages.push(i);
    }
    $scope.age = ages;
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
    $scope.saveDatachill = function(){
        console.log( $scope.child);
        $http({
            url : "/api/person_crime/"+$scope.person.id+"/child",
            method : "post",
            data : $scope.child

        }).success(function(){
            $scope.person.datachild.push( $scope.child);
            $scope.child = {};

        })
    }

    $scope.del_datachild = function(datachild){
        var index =  $scope.person.datachild.indexOf(datachild);
        $scope.person.datachild.splice(index,1);

        $http({
            url: "/api/person_crime/"+ $scope.person.id +"/child/"+ datachild.id,
            method: "DELETE"
        }).success(function (response) {

        });
    }



    $scope.saveAddressOffice = function(){
        console.log( $scope.addoffice);



        $http({
            url : "/api/person_crime/"+$scope.person.id+"/address_office",
            method : "post",
            data : $scope.addoffice

        }).success(function(){
            $scope.person.addressoffice.push( $scope.addoffice);
            $scope.addoffice = {};

        })

    }

    $scope.del_addressoffice = function(dataoffice){
        var index =  $scope.person.addressoffice.indexOf(dataoffice);
        $scope.person.addressoffice.splice(index,1);

        $http({
            url: "/api/person_crime/"+ $scope.person.id +"/address_office/"+ dataoffice.id,
            method: "DELETE"
        }).success(function (response) {

        });
    }


    $scope.editpreson = function(){
        //console.log( $scope.person);
        saveCaseFile = "ต้องการแก้ไขประวัตินี้ ใช่หรือไม่";

        if(confirm(saveCaseFile)){
            $http({
                url : "/api/person_crime/"+$scope.person.id,
                method : "PUT",
                data : $scope.person
            }).success(function(response){
                console.log( response);
                //console.log(response);
                massged = "แก้ไขข้อมูลเสร็จสมบูรณ์";
                alert(massged);
                $state.go("home")
            })

        }



    }



});

app.controller("PhotoController", function ($scope, $http,$window,$state) {
    console.log("PhotoController.start");
    var self = this;
    self.person = $scope.person;

    $scope.myFlow = new Flow({
        target: '/api/person_crime/'+ self.person.id +'/photo',
        singleFile: true,
        method: 'post',
        testChunks: false
    })

    self.uploadFile = function(){
        $scope.myFlow.upload();
        massged = "อัพโหลดรูปภาพเสร็จสมบูรณ์";
        alert(massged);
        $state.go("home")
        //console.log($scope.myFlow);
    }
    self.cancelFile = function (file){
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);

    }
    self.printphoto = function() {

        console.log($scope.person.id);

        // window.location= "/api/person/"+ $scope.person.id +"/print_photo_person, '_blank'";
        $window.open('/api/person_crime/'+ $scope.person.id +'/print_photo_person', '_blank');

    }

});