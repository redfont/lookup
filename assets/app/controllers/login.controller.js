(function(){
    'use strict';
    app.controller('LoginController',['$scope','$http', '$location',LoginController]);
    
    function LoginController($scope, $http, $location){
        var vm = this;
        vm.user = {};
        vm.submit = submit;
        vm.reset = reset;
        
        init();
        
        function init() {
             $http({
                method:'GET',
                url:context + '/login/check_session'
             }).then(function success(response){
                 console.log(response);
                 if(response.data.in_session){
                     $location.path('/homepage');
                     $scope.$parent.in_session_style = {'display':'block'};
                 }
             }, function error(message){
                 console.log(message);
             });
        }
        
        console.log('login info');
        function submit() {
            $http({
               method   : 'POST',
               url      : context + '/login/authenticate',
               data     : {"user" : vm.user},
               dataType : 'json'
            }).then(
               function success(response) {
                   console.log(response);
                   if(response.data == 'ok') {
                       $scope.$parent.in_session_style = {'display':'block'};
                       $scope.$parent.in_session = true;
                       console.log(response.data);
                       $location.path('/homepage');
                   }
               },
               function error(response) {
                   console.log(response);
               }
            );
        }
        
        function reset(){
            vm.user = {};
        }
    }
})();