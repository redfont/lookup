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
               templateUrl : 'assets/app/partials/user.php' 
            })
            .when('/', {
                controller : 'LoginController as vm',
                templateUrl: 'assets/app/partials/login.php'
            });
    }
})();

