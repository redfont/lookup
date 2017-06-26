<html ng-app="lookup">
    <head>
        
        <link rel="stylesheet" href="<?php echo asset_url();?>/css/main.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>/css/override.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/menu.css">
        
        <link rel="stylesheet" href="<?php echo asset_url();?>js/ng-material/angular-material.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>js/ng-material/ng-material-icon.css">
        
        <script type="text/javascript">
            
            var context = '/lookup';
            
            function endsWith(str, suffix) {
                return str.indexOf(suffix, str.length - suffix.length) !== -1;
            }

            if (endsWith(window.location.href, "/lookup")) {
                window.location.href += "/";
            }
        </script>
    </head>
    
    <body>
        <div ng-controller="RootController as vm">
            <div style="height: 80px;color:gray;">
                This is the header
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="#/homepage">Home</a>
                    </li>
                    <li>
                        <a href="#/homepage">Admin</a>
                        <ul>
                            <li><a href="#/user">Users</a></li>
                            <li><a href="#/category">Categories</a></li>
                            <li><a href="#/expense_type">Expense Types</a></li>
                            <li><a href="#/contact_type">Contact Types</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div ng-view></div>
            footer
        </div>
        
    </body>
    
    <!--angular set up-->
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng/angular.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng/angular-route.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng/angular-animate.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng/angular-aria.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng/angular-messages.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>js/ng-material/angular-material.js"></script>

    <script type="text/javascript" src="<?php echo asset_url();?>app/app.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/routing.js"></script>

    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/root.controller.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/login.controller.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/user.controller.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/category.controller.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/expenseType.controller.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>app/controllers/contactType.controller.js"></script>
</html>