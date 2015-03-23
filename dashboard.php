<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta charset="UTF-8">
        <title>LargestNews</title>
        <link rel="icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/login3.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/components.css" />
        <link rel="stylesheet" href="css/select2.css" />
        <link rel="stylesheet" href="css/layout.css" />
        <link rel="stylesheet" href="css/plugins.css" />
        <link rel="stylesheet" href="css/default.css" />
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo ppage-sidebar-closed-hide-logo">
        <div ng-controller="SessionController">
            
            <?php require './pages/header.php'; ?>
            <div class="page-container" >
                <div class="col-lg-3" style="padding-right: 81px;margin-right: -70px;">
                    <?php require './pages/sidebar.php'; ?>
                </div>
                <div class="col-lg-9" style="margin-left: 20px ;margin-top: -16px;">
                    <div ng-view>
                        <div class="breadcrumb">
                            <li>
                                <a href="#/">
                                    Accueil
                                </a>
                            </li> 
                        </div>
                        <h1>Accueil</h1>
                    </div>                  
                </div>
            </div>
            <script src="js/jquery.js"></script>
            <script src= "js/angular.min.js"></script>
            <script src= "js/angular-route.min.js"></script>
            <script src= "js/angular-animate.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/app.js"></script>
            <script>
                        jQuery().ready(function () {
                            $('.dash-dropdown').click(function (e) {
                                e.preventDefault();
                                if ($('.dash-dropdown-menu').is(':hidden')) {
                                    $('.dash-dropdown .fa-angle-left').css('transform', 'rotate(-90deg)').css('-webkit-transform', 'rotate(-90deg)').css('-ms-transform', 'rotate(-90deg)');
                                    $('.dash-dropdown-menu').slideDown();
                                } else {
                                    $('.dash-dropdown .fa-angle-left').css('transform', 'rotate(0)').css('-webkit-transform', 'rotate(0)').css('-ms-transform', 'rotate(0)');
                                    $('.dash-dropdown-menu').slideUp();
                                }
                            });
                        });
            </script>
    </body>
</html>
