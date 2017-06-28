(function(){
    'use strict';
    app.controller('LoginController',['$scope','$http', '$location',LoginController]);
    
    function LoginController($scope, $http, $location){
        var vm = this;
        vm.user = {};
        vm.submit = submit;
        vm.reset = reset;
        
        console.log('login info');
        function submit() {
            //console.log(vm.user);
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