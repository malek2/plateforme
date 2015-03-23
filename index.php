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
    <body class="login" ng-controller="VerifSessionController"  >
        <img src="img/logo.png" style="width:302px;height:100%;margin-left: 444px;margin-top: 106px;" hidden="true">
        <div class="content" ng-controller="LoginController"  >
            <!-- BEGIN LOGIN FORM -->
            <div class="panel-default">
                <div class="panel-heading" style="height: 54px;">
                    <h3 class="form-title" style="margin-top: 4px;margin-left: -9px;">Connexion</h3>
                </div>
                <div class="panel-body">
                    <form class="login-form" action="index.html" method="post" >

                        <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <div class="input-icon">
                                <i class="glyphicon glyphicon-user"></i>
                                <input class="form-control placeholder-no-fix" ng-model="username" type="text" autocomplete="off" placeholder="Nom d'utilisateur" name="username"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="glyphicon glyphicon-lock"></i>
                                <input class="form-control placeholder-no-fix" ng-model="password" type="password" autocomplete="off" placeholder="Mot de passe" name="password"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a ng-click="login()" class="btn btn-success btn-block"><i class="fa fa-arrow-right"></i></a>
                            <div id="alert" style="display: none;text-align: center;margin-top: 15px;color: #e74c3c; font-weight: bold;">
                                <!-- Ne pa supprimer contient le msg d'erreur -->
                            </div>
                        </div>
                    </form>

                </div>
                <div class="panel-footer">
                    <div class="copyright" style="margin-top: -8px;">
                        2015 &copy; Largestinfo - Tunisie.
                    </div>
                </div>
            </div>  
        </div>
        <script src= "js/angular.min.js"></script>
        <script src= "js/angular-route.min.js"></script>
        <script src= "js/angular-animate.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
