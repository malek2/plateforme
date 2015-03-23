<div class="page-header navbar navbar-fixed-top" style=" background-color: #354C67" >
    <div class="page-logo">
        <a href="#/">
            <img src="/dashboardnews/img/logo_header.png" alt="logo" class="logo-dash">
        </a>
    </div>
    <div class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="" class="dropdown-toggle" style="padding-top: 7px;padding-bottom: 17px;" data-toggle="dropdown"  >
                <span class="username username-hide-on-mobile" style="color: white">Hello {{name}}</span>
                <img alt="logo user" class="img-circle" src="/dashboardnews/img/admin.jpg">
            </a>
            <ul id="menu-logout" class="dropdown-menu dropdown-menu-default">
                <li class="dropdown dropdown-user dropdown-dark">
                    <a ng-controller="LogoutController" ng-click="logout()" style="background-color:  #3B3F51; color: white">
                        <i class="fa fa-sign-out"></i> se Déconnecter 
                    </a>
                </li>
            </ul>
        </li>
    </div>
</div>