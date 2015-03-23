
<div ng-controller="SessionController">
    <div ng-controller="ClientsController">

        <div class="content">
            <div class="breadcrumb">
                <li>
                    <a href="#/">
                        Accueil
                    </a>
                </li>  
                <li>
                    >>
                </li>
                <li>
                    <a href="">
                        Gestion des clients
                    </a>
                </li>
            </div>
        </div>
        <h1> Liste des Clients</h1>
        <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nom de Domain</th>
                    <th>mot de passe</th>
                    <th>raison social</th>
                    <th>matricule fiscale</th>
                    <th>email</th>
                    <th>adress</th>
                    <th>télephone</th>
                    <th>fax</th>
                    <th style="width: 13%;">action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="u in users">
                    <td>{{ u.Client.username}}</td>
                    <td>{{ u.Domain.name}}</td>
                    <td>{{ u.Client.password}}</td>
                    <td>{{ u.Client.rc}}</td>
                    <td>{{ u.Client.mf}}</td>
                    <td>{{ u.Client.email}}</td>
                    <td>{{ u.Client.adress}}</td>
                    <td>{{ u.Client.phone}}</td>
                    <td>{{ u.Client.fax}}</td>
                    <td>
                        <button style="border:none ; color: red"  title="modifier" class="btn" ng-click="editClient(u.Client.id)">
                            <span class="fa fa-pencil-square-o"></span>
                        </button>
                        <button style="border:none  ; color: orangered"  title="supprimer" class="btn" ng-click="delete_Client(u.Client.id)">
                            <span class="fa fa-trash-o"></span>
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>
        <hr>
        <button class="btn btn-primary"  ng-click="create()">
            <span class="fa fa-user"></span>  Ajouter client
        </button>
        <hr>

        <div class="modal fade" id="confirmModal"  tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: #45B6AF">
                        <h4 class="modal-title" id="myModalLabel" style="color: white"> Client</h4>
                    </div>
                    <div>
                        <div class="modal-body">
                            <form class="form-horizontal" ng-submit="submit()" style="-webkit-column-count: 2;column-count: 2;" >
                                <div>
                                    <input type="hidden" ng-model="id">
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-sm pull-left control-label" >Name:</label>
                                        <input type="text" ng-model="username" placeholder="Username" required class="form-control" >
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">raison social:</label>
                                        <input type="text" ng-model="rc" placeholder="raison social" required="" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">mot de passe:</label>
                                        <input type="text" ng-model="password" placeholder="mot de passe" required="" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">matricule fiscale:</label>
                                        <input type="text" ng-model="mf" placeholder="matricule fiscale" required="" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">e mail:</label>
                                        <input type="email" ng-model="email" placeholder="e mail" required="" class="form-control">
                                    </div> 
                                </div>
                                <div style="margin-top: 40px;">
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label" style="margin-top: -26px;">télephone:</label>
                                        <input type="number" ng-model="phone" placeholder="télephone" required="" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">fax:</label>
                                        <input type="number" ng-model="fax" placeholder="fax" required="" class="form-control">
                                    </div> 

                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg control-label">Domain Name:</label>
                                        <input type="text" ng-model="domain" placeholder="Domain Name" required="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">addresse:</label>
                                        <input type="text" ng-model="adress" placeholder="adresse" required="" class="form-control">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" value="Submit" >
                                        <span class="glyphicon glyphicon-ok"></span> Save
                                    </button>
                                    <button type=button" class="btn btn-success" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-minus-sign"></span> Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="deleteModal"  tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: #d9534f">
                        <h4 class="modal-title" id="myModalLabel" style="color: white">Supprimer client</h4>
                    </div>
                    <div>
                        <div class="modal-body">
                            Êtes-vous sûr que vous voulez supprimer ?
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" title="Non"> 
                                <span class="fa fa-times"></span>
                            </button>
                            <button ng-click="deleteF()" title="Oui"> 
                                <span class="fa fa-check"></span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>