/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
   'use strict';
   app.controller('LogoutController',['$scope', '$location',LogoutController]);
   
   function LogoutController($scope, $location) {
        $scope.logout = function(){
            $scope.$parent.in_session_style = {'display':'none'};
            $location.path('/');
        };
   };
})();

