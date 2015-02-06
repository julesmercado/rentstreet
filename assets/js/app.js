
var myApp = angular.module( "myApp", ['ngSanitize','mgcrea.ngStrap']);




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
    


$scope.rate = 7;
  $scope.max = 10;
  $scope.isReadonly = false;

  $scope.hoveringOver = function(value) {
    $scope.overStar = value;
    $scope.percent = 100 * (value / $scope.max);
  };

  $scope.ratingStates = [
    {stateOn: 'glyphicon-ok-sign', stateOff: 'glyphicon-ok-circle'},
    {stateOn: 'glyphicon-star', stateOff: 'glyphicon-star-empty'},
    {stateOn: 'glyphicon-heart', stateOff: 'glyphicon-ban-circle'},
    {stateOn: 'glyphicon-heart'},
    {stateOff: 'glyphicon-off'}
  ];
    
    
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
                    
                       
                         console.log(response);
                        // $scope.notificationInfo = response;
                        
         });
    }

    // $scope.getClientInfoOnly = function (id){
    //     console.log(id);
    // }


    $scope.getMyAds = function (userId){

        

        $http.post(getUrl.url + '/items/getMyAds', userId)
            .success(function onSuccess(response){
                // console.log(response);
                var data = response;
                $scope.myAdsList = response;
                var src;
                for(var x in data) {
                    src = data[x].item_path.substring(41, data[x].item_path.length);
                    $scope.myAdsList[x].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }
                console.log($scope.myAdsList);
                        
         });
    }

    $scope.getMyRentedItems = function (userId) {

        //console.log(userId);
        $http.post(getUrl.url + '/items/getMyRentedAds', userId)
            .success(function onSuccess(response){
                var data = response;
                $scope.myRentedAdsList = response;
                var src;
                for(var x in data) {
                    src = data[x].items_path.substring(41, data[x].items_path.length);
                    $scope.myRentedAdsList[x].items_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }
                console.log($scope.myRentedAdsList);
                        
                        
         });

        
    }

    $scope.getRateAfterReturnIfo = function (rentedId) {
       $http.post(getUrl.url + '/items/getRateAfterReturnInfo', rentedId)
            .success(function onSuccess(response){
              
                $scope.rateAfterReturn = response;
                var src;
                var data = response;
                var src2;
                var data2 = response;
                
                    src = data[0].item_path.substring(41, data[0].item_path.length);
                    $scope.rateAfterReturn[0].item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;

                    src2 = data2[0].img_path.substring(42, data2[0].img_path.length);
                    $scope.rateAfterReturn[0].img_path = "http://localhost/rentstreet.ph/assets/profiles/" + src2;
                
                console.log($scope.rateAfterReturn);
                        
                        
         });
    }

    $scope.getBorrowedFromOther = function (userId) {
        $http.post(getUrl.url + '/items/getBorrowedFromOther', userId)
            .success(function onSuccess(response){
                var data = response;
                $scope.borrowOther = response;
                var src;
                
                    src = data[0].items_path.substring(41, data[0].items_path.length);
                    $scope.borrowOther[0].items_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                
                console.log($scope.borrowOther);
                        
                        
         });

    }

    $scope.getMyReturnedItems = function (userId) {

        console.log(userId);
        $http.post(getUrl.url + '/items/getMyReturnedAds', userId)
            .success(function onSuccess(response){
                var data = response;
                $scope.myReturnedList = response;
                var src;
                for(var x in data) {
                    src = data[x].items_path.substring(41, data[x].items_path.length);
                    $scope.myReturnedList[x].items_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
                }
                //console.log($scope.myReturnedList);
                        
                        
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
                            
                        $scope.getCategories = response;
                        
         });

        
    }

    $scope.getModePayment = function(){


        $http.post(getUrl.url + '/items/getMode',$scope.dataRequest)
                    .success(function onSuccess(response){
                      
                        $scope.getModePay = response;
                        
         });
    }

    $scope.acceptButton = function ( borrowersId, userId, itemsId ) {
        
         $scope.dataRequest = {borrowers_id: borrowersId, items_id : itemsId};

      

        // console.log(borrowers_id, items_id);
        $http.post(getUrl.url + '/items/acceptRequest', $scope.dataRequest)
                    .success(function onSuccess(response){
                       
                       $scope.getAllInfoRequest(userId);
                       $scope.getNotification(userId);

                        console.log(response);
         });

    }

    $scope.returnedAds = function (itemsId, userId) {

   //      console.log(itemsId);

       // $http.post(getUrl.url + '/accounts/rateIfReturn', itemsId);
            
        // $http.post(getUrl.url + '/items/returnItems', itemsId)
        //             .success(function onSuccess(response){
                      
        //               $scope.getMyRentedItems(userId);
        //  });
    }

    $scope.declineButton = function ( userId, clientId, itemId ) {
        $scope.dataRequest = {borrowers_id: userId, items_id : itemId};
            
            console.log($scope.dataRequest);

            $http.post(getUrl.url + '/accounts/declineRequest', $scope.dataRequest)
                        .success(function onSuccess(response){
                            
                             $scope.test = response;
                              $scope.getNotification(clientId);
                             $scope.getAllInfoRequest(clientId);
                            
                            
             });
    }

    $scope.getSingleItem= function (itemsId) {
        
      

        $http.post(getUrl.url + '/items/getSingleItem', itemsId)
                .success(function onSuccess(response){
             
                    var data = response;
                    $scope.itemDetails = response;
                
                    
                       var src = data.item_path.substring(41, data.item_path.length);
                       $scope.itemDetails.item_path = "http://localhost/rentstreet.ph/assets/uploads/" + src;
              

                    // console.log($scope.itemDetails.item_path);          
             });
    }



});

