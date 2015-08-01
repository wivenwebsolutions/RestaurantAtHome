<?php
/**
 * Restaurant At Home
 *
 * Contact page for restaurants
 *
 * @package	RestoAtHome
 * @author	A collaboration of: WiVen Web Solutions - IneTh - Shout!
 * @copyright	Copyright (c) 2014 - 2015
 * @copyright
 * @license	*
 * @link	http://restaurantathome.be
 * @since	Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo (isset($pretty_page_title) ? $pretty_page_title : '') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-xs-12 text-right" id="col_new_action">
            <a href="#" data-toggle="modal" data-target="#newActionModal" data-backdrop="static" class="btn btn-primary btn-lg" id="btn_new_action">
                <span class="fa fa-plus"></span>
                Nieuwe actie
            </a>
        </div>
    </div>

    <div class="row">
        <!-- START LOPENDE ACTIES -->
        <div class="col-lg-6">
            <div class="panel panel-default panel-green">
                <div class="panel-heading">
                    Lopende acties
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Naam actie</th>
                                <th>Looptijd</th>
                                <th># gebruikt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>OP = OP</td>
                                <td><span class="hidden-xs">T.e.m. </span>31/12/2015</td>
                                <td>
                                    31
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Weg is pech</td>
                                <td><span class="hidden-xs">T.e.m. </span>30/09/2015</td>
                                <td>
                                    23
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Suggestie van de chef</td>
                                <td><span class="hidden-xs">T.e.m. </span>15/10/2015</td>
                                <td>
                                    7
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-default load_more_actions_btn">
                            <span class="fa fa-plus-square"></span>
                            Meer acties weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END LOPENDE ACTIES -->

        <!-- START AANKOMENDE ACTIES -->
        <div class="col-lg-6">
            <div class="panel panel-default panel-yellow">
                <div class="panel-heading">
                    Aankomende acties
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Naam actie</th>
                                <th>Looptijd</th>
                                <th># gebruikt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>OP = OP</td>
                                <td><span class="hidden-xs">Start </span>31/10/2015</td>
                                <td>
                                    31
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Weg is pech</td>
                                <td><span class="hidden-xs">Start </span>30/09/2015</td>
                                <td>
                                    23
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Suggestie van de chef</td>
                                <td><span class="hidden-xs">Start </span>15/10/2015</td>
                                <td>
                                    7
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-default load_more_actions_btn">
                            <span class="fa fa-plus-square"></span>
                            Meer acties weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END AANKOMENDE ACTIES -->
    </div>

    <div class="row">
        <!-- START VERLOPEN ACTIES -->
        <div class="col-lg-12">
            <div class="panel panel-default panel-red">
                <div class="panel-heading">
                    Verlopen acties
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Naam actie</th>
                                <th>Looptijd</th>
                                <th># gebruikt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>OP = OP</td>
                                <td><span class="hidden-xs"><span class="hidden-xs">T.e.m. </span></span>31/12/2014</td>
                                <td>
                                    31
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Weg is pech</td>
                                <td><span class="hidden-xs"><span class="hidden-xs">T.e.m. </span></span>30/06/2015</td>
                                <td>
                                    23
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Suggestie van de chef</td>
                                <td><span class="hidden-xs"><span class="hidden-xs">T.e.m. </span></span>15/02/2015</td>
                                <td>
                                    7
                                    <a href="" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-default load_more_actions_btn">
                            <span class="fa fa-plus-square"></span>
                            Meer acties weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END VERLOPEN ACTIES -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal new action -->
<div class="modal fade" id="newActionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nieuwe actie aanmaken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <form class="form-horizontal">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam actie</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Naam actie">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Lijkt op</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="">Voorgerechten</option>
                                    <option value="">Hoofdgerechten</option>
                                    <option value="">Desserts</option>
                                    <option value="">Dranken</option>
                                    <option value="">Extra's</option>
                                </select>
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Datum geldig</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Datum geldig">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Type korting</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Type korting">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">
                                # stempels
                                <a href="#">?</a>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" step="1" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="Aantal stempels">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Beschrijving</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5"></textarea>
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Foto's</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Foto's">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Actieproducten</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Actieproducten">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                <a href="#" class="btn btn-primary btn-sm">Producten selecteren</a>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Capaciteit</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="test"></div>
            <div class="test"></div>
            <div class="test"></div>
            <div class="test"></div>
            <div class="test"></div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary btn-lg">Actie cre&euml;eren</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>