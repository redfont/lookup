(function(){
    'use strict';
    app.controller('CategoryController',['$scope','$http','$location','$mdDialog',CategoryController]);
    
    function CategoryController($scope, $http, $location, $mdDialog){
        var vm = this;
        var update = false;
        var code = null;
        vm.showDialog = showDialog;
        vm.removeRecord = removeRecord;
        
        init();
        console.log('category controller');
        
        function init(){
            $http({
               method:'GET',
               url: context + '/category/get_all'
            }).then(
                function success(response){
                    console.log(response.data);
                    if(!response.data.in_session){
                        $location.path('/');
                    }
                    vm.categories = response.data.categories;
                    
                }, function error(message){
                    console.log(message);
                }
            );
        }
        
        function showDialog(ev, id) {
            code = id;
            if(id == null) {
                update = false;
            } else {
                update = true;
            }
            
            $mdDialog.show({
               templateUrl:'assets/app/partials/templates/category.dialog.template.html',
               controller : Dialog,
               targetEvent : ev,
               clickOutsideToClose : false,
               parent: angular.element(document.body)
            }).then(function (response) {
                console.log(response);
                console.log('submitted');
                init();
            },function () {
                console.log('cancelled');
            });
        }
        
        function Dialog($scope, $http, $mdDialog) {
            $scope.category = {};
            $scope.update = update;
            
            $scope.hide = function(){
                $mdDialog.cancel();
            };
            
            if(update) {
                console.log(code);
                $http({
                   method:'GET', 
                   url: context + '/category/get_by_key/' + code,
                   dataType:'json'
                }).then (function success(response){
                    console.log(response);
                    $scope.category = response.data[0];
                }, function error(message){
                    
                });
            };
            
            $scope.submit = function(){
                $http({
                    method:'POST',
                    url: context + ((update) ? '/category/update' : '/category/add'),
                    data : {'category': $scope.category},
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
            };
        }
        
        function removeRecord(ev, code) {
            console.log(code);
            $mdDialog.show(
               $mdDialog.confirm()
               .title('Delete')
               .textContent('Are you sure you want to delete this category?')
               .targetEvent(ev)
               .ok('Delete')
               .cancel('Cancel')
            ).then(function() { 
                $http({
                    method:'GET',
                    url: context + '/category/delete/' + code,
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