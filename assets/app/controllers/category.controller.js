(function(){
    'use strict';
    app.controller('CategoryController',['$scope','$http','$mdDialog',CategoryController]);
    
    function CategoryController($scope, $http, $mdDialog){
        var vm = this;
        var update = false;
        vm.showDialog = showDialog;
        init();
        console.log('category controller');
        
        function init(){
            $http({
               method:'GET',
               url: context + '/category/get_categories'
            }).then(
                function success(response){
                    console.log(response.data);
                    vm.categories = response.data;
                }, function error(message){
                    console.log(message);
                }
            );
        }
        
        function showDialog(ev, id) {
            $mdDialog.show({
               templateUrl:'assets/app/partials/templates/category.dialog.template.html',
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
                /*$http({
                   method:'GET', 
                   url: context + '/user/get_user/' + userId,
                   dataType:'json'
                }).then (function success(response){
                    console.log(response);
                    $scope.user = response.data.user;
                }, function error(message){
                    
                });*/
            }
            
            $scope.submit = function(){
                /*$http({
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
                );*/
            }
        }
    }
})();