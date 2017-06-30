/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
   'use strict';
   app.controller('LogoutController',['$scope', '$http', '$location',LogoutController]);
   
   function LogoutController($scope, $http, $location) {
        $scope.logout = function(){
            $http({
               method:'GET',
               url: context + '/logout/logout'
            }).then(
                function success(response){
                    console.log(response);
                    if(response.data.success) {
                        $scope.$parent.in_session_style = {'display':'none'};
                        $location.path('/');
                    }
                }, 
                function error(message){
                    console.log(message);
                }
            );
        };
   };
})();

