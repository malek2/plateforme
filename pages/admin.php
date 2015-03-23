

    <div ng-controller="AdminsController">
        
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
                                Gestion des utilisateurs
                            </a>
                        </li>
                        
        
                    </div>
                </div>
        <h1>Liste des utilisateurs</h1>
       
                    <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>mot de passe</th>
                                <th>email</th>
                                <th>role</th>
                                <th style="width: 13%;">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="u in admins">
                                <td>{{ u.Admin.username}}</td>
                                <td>{{ u.Admin.password}}</td>
                                <td>{{ u.Admin.email}}</td>
                                <td>{{ u.Admin.role}}</td>
                               
                                <td>
                                    <button style="border:none ; color: red"  title="modifier" class="btn" ng-click="edit(u.Admin.id)">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button style="border:none  ; color: orangered"  title="supprimer" class="btn" ng-click="delete(u.Admin.id)">
                                        <span class="fa fa-trash-o"></span>
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary"  ng-click="createR()">
                        <span class="fa fa-user"></span>  Ajouter user
                    </button>
                    <hr>
        <div class="modal fade" id="confModal"  tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: #45B6AF">
                        <h4 class="modal-title" id="myModalLabel" style="color: white"> Users</h4>
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
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">mot de passe:</label>
                                        <input type="text" ng-model="password" placeholder="mot de passe" required="" class="form-control">
                                    </div> 
                                     <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">email:</label>
                                        <input type="email" ng-model="email" placeholder="email" required="" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">Role:</label>
                                        <select ng-model="role" style="margin-top: 26px;margin-left: -33px;height: 19px;">
                                        <option value="">selectionner le groupe</option>
                                        <option value="Super-admin">Super-admin</option>
                                        <option value="Responsable">Responsable</option>   
                                        </select>
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
                            <button ng-click="deleteR()" title="Oui"> 
                                <span class="fa fa-check"></span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


