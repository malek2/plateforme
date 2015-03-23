<div ng-controller="FaqsController">
  
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
                <a href="#/faq">
                    Gestion des FAQ
                </a>
            </li>
        </ul>

  </div>
        
        <h3>FAQ</h3>
        <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Reponse</th>     
                    <th style="width: 13%;">action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="f in faqs">
                    <td>{{ f.Faq.question}}</td>
                    <td style="word-break: break-all">{{ f.Faq.reponse}}</td>     
                    <td>
                        <button style="border:none ; color: red"  title="modifier" class="btn" ng-click="edit(f.Faq.id)">
                            <span class="fa fa-pencil-square-o"></span>
                        </button>
                        <button style="border:none  ; color: orangered"  title="supprimer" class="btn" ng-click="delete(f.Faq.id)">
                            <span class="fa fa-trash-o"></span>
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>

        <hr>
        <button class="btn btn-primary"  ng-click="create()">
            <span class="fa fa-question-circle"></span>  FAQ
        </button>
 
        <div class="modal fade" id="confirmModal"  tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: #45B6AF">
                        <h4 class="modal-title" id="myModalLabel" style="color: white">FAQ</h4>
                    </div>
                    <div>
                        <div class="modal-body">
                            <form class="form-horizontal" ng-submit="submit()"  >
                                <div>
                                    <input type="hidden" ng-model="id">
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-sm pull-left control-label" >Question:</label>
                                        <input type="text" ng-model="question" placeholder="Question" required class="form-control" >
                                    </div> 
                                    <div class="form-group">
                                        <label style="text-align: left;"  class="col-lg pull-left control-label">Reponse:</label>
                                        <textarea ng-model="reponse" placeholder="Reponse" required class="form-control"></textarea>
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
                        <h4 class="modal-title" id="myModalLabel" style="color: white">supprimer</h4>
                    </div>
                    <div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer ?
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" title="Non"> 
                                <span class="fa fa-times"></span>
                            </button>
                            <button ng-click="deleteFaq()" title="Oui"> 
                                <span class="fa fa-check"></span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

 
</div>

