(function(){
    'use strict';
    app.controller('UserController',['$location','$scope','$http','$mdDialog',UserController]);
    
    function UserController($location, $scope, $http, $mdDialog) {
        var vm = this;
        var update = false;
        var userId = 0;
        vm.user = {};
        vm.removeRecord = removeRecord;
        
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
                vm.users = response.data.users;
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
                console.log('submitted');   
                init();
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
            console.log(update);
            $scope.submit = function(){
                $http({
                    method:'POST',
                    url: context + ((update) ? '/user/update' : '/user/add_user'),
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
        
        function removeRecord(ev, id) {
            console.log(id);
            $mdDialog.show(
               $mdDialog.confirm()
               .title('Delete')
               .textContent('Are you sure you want to delete this user?')
               .targetEvent(ev)
               .ok('Delete')
               .cancel('Cancel')
            ).then(function() { 
                $http({
                    method:'GET',
                    url: context + '/user/delete/' + id,
                    dataType:'json'
                }). then(
                    function success(response){
                        init();
                    },function error(err){
                        console.log(err);
                    }
                );
            }, function() {
                console.log('canceled');
            });
        }
    }
    
})();
