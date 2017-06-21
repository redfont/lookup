/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
    'use strict',
    app.config(['$routeProvider',config]);
    
    function config($routeProvider){
        $routeProvider
            .when('/homepage',{
                controller  : 'RootController as vm',
                templateUrl : 'assets/app/partials/homepage.php'
            })
            .when('/user', {
               controller  : 'UserController as vm',
               templateUrl : 'assets/app/partials/admin/user.php' 
            })
            .when('/category', {
                controller : 'CategoryController as vm',
                templateUrl: 'assets/app/partials/admin/category.php'
            })
            .when('/', {
                controller : 'LoginController as vm',
                templateUrl: 'assets/app/partials/login.php'
            });
    }
})();

