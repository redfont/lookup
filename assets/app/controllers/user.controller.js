(function(){
    'use strict';
    app.controller('UserController',['$location','$scope','$http','$mdDialog',UserController]);
    
    function UserController($location, $scope, $http, $mdDialog) {
        var vm = this;
        var update = false;
        var userId = 0;
        vm.user = {};
        console.log('user controller');
        
        vm.showDialog = showDialog;
        
        init();
        
        function init() {
            $http({
                method:'GET',
                url: context + '/user/get_users'
            }).then(function success(response){
                console.log(response.data);
                if(!response.data.in_session){
                    $location.path('/');
                } else {
                    $scope.$parent.in_session_style = {'display':'block'};
                }
                vm.users = response.data;
            }, function error(message){
                
            });
        }
        
        
        function showDialog(ev, id) {
            userId = id;
            if(userId > 0) {
                update = true;
            } else {
                update = false;
            }
            
            $mdDialog.show({
               templateUrl:'assets/app/partials/templates/user.dialog.template.html',
               controller : Dialog,
               targetEvent : ev,
               clickOutsideToClose : false,
               parent: angular.element(document.body)
            }).then(function (response) {
                conslog.log(response);
                console.log('submitted');   
            },function () {
                console.log('cancelled');
            });
        }
        
        function Dialog($scope, $http, $mdDialog) {
            $scope.user = {};
            $scope.update = update;
            
            $scope.hide = function(){
                $mdDialog.cancel();
            }
            
            if(update) {
                $http({
                   method:'GET', 
                   url: context + '/user/get_user/' + userId,
                   dataType:'json'
                }).then (function success(response){
                    console.log(response);
                    $scope.user = response.data.user;
                }, function error(message){
                    
                });
            }
            
            $scope.submit = function(){
                $http({
                    method:'POST',
                    url: context + '/user/add_user',
                    data : {'user': $scope.user},
                    dataType : 'json'
                }).then(
                    function success(response) {
                        $mdDialog.hide(response);
                        console.log(response);
                    },
                    function error(err) {
                        console.log(err);
                    }
                );
            }
        }
    }
    
})();
