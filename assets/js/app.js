
var myApp = angular.module( "myApp", ['ngSanitize','mgcrea.ngStrap'] );

myApp.config(function($datepickerProvider) {
  angular.extend($datepickerProvider.defaults, {
    dateFormat: 'MM/dd/yyyy',
    startWeek: 1
  });
});

myApp.controller('myController', function($scope, $http, getUrl){
    $scope.search;  
    $scope.data_items = [];
    var key = 0;
    
$scope.selectedDate = new Date();
  $scope.selectedDateAsNumber = Date(1986, 1, 22);
  // $scope.fromDate = new Date();
  // $scope.untilDate = new Date();
  $scope.getType = function(key) {
    return Object.prototype.toString.call($scope[key]);
  };

  $scope.clearDates = function() {
    $scope.selectedDate = null;
  };


   $scope.hoverItem = function (){
         $('.d2').contenthover({
            effect:'slide',
            slide_speed:300,
            overlay_background:'#000',
            overlay_opacity:0.8
        });
        
    }

    $scope.datePicker = function(){
        $('.input-daterange').datepicker({
                    todayBtn: "linked"
                });
         $("#datetimepicker9").on("dp.change",function (e) {
               $('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
            });
            $("#datetimepicker10").on("dp.change",function (e) {
               $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
            });
    }

      $scope.getLandingInfo = function (){

        $http({
            method: "POST",
            url: '/rentstreet.ph/accounts/landingPageAngular',
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' } ,
            })
        .success(function(response){
                var data = response;
                $scope.queryResult = response;
                var src;
                for(var x in data.items) {
                    src = data.items[x].item_path.substring(41, data.items[x].item_path.length);
                    $scope.queryResult.items[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                  
                }

                // $scope.data_items.push($scope.queryResult.items);

                //var query = "localhost/" + res[3] + "/" + res[4] + "/" + res[5] + "/" + res[6];
                //$scope.items = $scope.queryResult.items;
                // console.log($scope.data_items);
          

                
            })
            .error(function(response){

        });
    }

    $scope.getNotification = function(userId){

        
        console.log(userId);
        $http.post(getUrl.url + '/items/countNotification', userId)
                    .success(function onSuccess(response){
                        
                      $scope.count = response;

                    });
            
    }

    $scope.getAllInfoRequest = function(userId){
        

        $http.post(getUrl.url + '/items/getNotificationInfo',userId)
                    .success(function onSuccess(response){
                        var data = response;
                        $scope.requestInfo = response;
                        var src;
                        for(var x in data) {
                            src = data[x].img_path.substring(42, data[x].img_path.length);
                            $scope.requestInfo[x].img_path = "http://localhost/rentstreet.ph/assets/profiles/" + src;
                        }
                            console.log($scope.requestInfo);
                        // console.log(response);
                        // $scope.notificationInfo = response;
                        
         });
    }

    $scope.getSingleInfoRequest = function(userId){

       
        $http.post(getUrl.url + '/items/getOtherInfo',userId)
                    .success(function onSuccess(response){
                        var data = response;
                        $scope.requestSingleInfo = response;
                        var src;
                       
                            src = data[0].images.substring(42, data[0].images.length);
                            $scope.requestSingleInfo[0].images = "http://localhost/rentstreet.ph/assets/profiles/" + src;
                    
                            console.log($scope.requestSingleInfo);
                        // console.log(response);
                        // $scope.notificationInfo = response;
                        
         });
    }


    $scope.getMyAds = function (userId){

        

        $http.post(getUrl.url + '/items/getMyAds', userId)
            .success(function onSuccess(response){
                var data = response;
                $scope.myAdsList = response;
                var src;
                for(var x in data) {
                    src = data[x].item_path.substring(41, data[x].item_path.length);
                    $scope.myAdsList[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }
                        
                        
         });
    }

    $scope.getMyRentedItems = function (userId) {

        $http.post(getUrl.url + '/items/getMyRentedAds', userId)
            .success(function onSuccess(response){
                var data = response;
                $scope.myRentedAdsList = response;
                var src;
                for(var x in data) {
                    src = data[x].item_path.substring(41, data[x].item_path.length);
                    $scope.myRentedAdsList[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }

                console.log($scope.myRentedAdsList);
                        
                        
         });

    }


    $scope.submitSearch = function ( query ) {
     
        console.log($scope.search);
     
        $http({
            method: "POST",
            url: '/rentstreet.ph/items/searchOutput',
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' } ,
            data: $.param($scope.search)
            })
            .success(function(response){
                var data = response;
                $scope.queryResult = response;
                var src;
                for(var x in data) {
                    src = data[x].item_path.substring(41, data[x].item_path.length);
                    $scope.queryResult[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }

           
            })
            .error(function(response){

        });
    }

    $scope.userInit = function( query ) {

        $http({
            method: "POST",
            url: '/rentstreet.ph/items/searchOutput',
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' } ,
            data: $.param({"search_item" : query})
            })
            .success(function(response){
                var data = response;
                $scope.queryResult = response;
                var src;
                for(var x in data) {
                    src = data[x].item_path.substring(41, data[x].item_path.length);
                    $scope.queryResult[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }
             
            })
            .error(function(response){

        });


     // $scope.user = uid;
     // $scope.role = role;
     // // Get a list of projects for user
     // $scope.projectList($scope.user);
    }

    $scope.date = {};


    $scope.submitRequest = function (userId, clientId, itemId){

        if (key == 0) {
            $scope.date2 = new Date();
        
            console.log($scope.date2);

            $scope.dataRequest = {owners_id: clientId,  borrowers_id: userId, items_id : itemId, date_from: $scope.date.date_from, date_to: $scope.date.date_to, request_date: $scope.date2 };

            console.log($scope.dataRequest);

            $http.post(getUrl.url + '/accounts/itemRequestRent',$scope.dataRequest)
                        .success(function onSuccess(response){
                            
                            $scope.requestBorrow = response;
                            
             });

            key = 1;
        }
        else{
            $scope.dataRequest = {borrowers_id: userId, items_id : itemId};
            
            $http.post(getUrl.url + '/accounts/cancelRequest', $scope.dataRequest)
                        .success(function onSuccess(response){
                            
                            $scope.requestBorrow = response;
                           
             });

            key = 0;
          
        }

        
          
    }

    $scope.getCatOnly = function (){
        $http.post(getUrl.url + '/items/getCatOnly',$scope.dataRequest)
                    .success(function onSuccess(response){
                        console.log(response);
                        $scope.getCategories = response;
                        
         });

        
    }

    $scope.acceptButton = function ( borrowersId, userId, itemsId ) {
        
         $scope.dataRequest = {borrowers_id: borrowersId, items_id : itemsId};

         console.log($scope.dataRequest);

        // console.log(borrowers_id, items_id);
        $http.post(getUrl.url + '/items/acceptRequest', $scope.dataRequest)
                    .success(function onSuccess(response){
                       
                       $scope.getAllInfoRequest(userId);
                       $scope.getNotification(userId);

                        console.log(response);
         });

    }

});

