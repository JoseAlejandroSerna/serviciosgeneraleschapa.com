<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var choose = '<?php echo json_encode($choose); ?>';
			var JSON_choose = JSON.parse(choose);

			var PATH_SERVICE_WE_PROVIDE = "<?php echo PATH_SERVICE_WE_PROVIDE;?>";
		</script>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 "><?php echo TITLE_CHOOSE?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url(CONTROLADOR_ADMIN_CHOOSE,ACTION_DELETE); ?>" style="display:none;">
						<input type="hidden" class="hdnId_delete" name="hdnId_delete" value=""/>
						<button type="submit" class="btn-link btn_delete" name="btn_delete" style="display:none;">Eliminar</button>
					</form>

                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">
                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
                                            	<div class="card-body">

                                                    <div class="row">
                                                    	<div class="col-12">
                                							<div class="bottompadding50" id="dTables3">
                                    							<div class="card shadow">
                                        							<div class="card-body">
                                            							<div class="table-responsive">
                                                							<table id="export1234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    							<thead>
                                                        							<tr>
                                                           								<th>Tiempo</th>
                                                            							<th>Equipo</th>
                                                            							<th>Satisfacción</th>
                                                            							<th>Cotización</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php foreach($choose as $info) {?>
																					<tr>
																						<td><?php echo $info->vTime;?></td>
																						<td><?php echo $info->vTeam;?></td>
																						<td><?php echo $info->vSatisfaction;?></td>
																						<td><?php echo $info->vEstimate;?></td>
																						
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $info->idChoose;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Tiempo</th>
                                                            							<th>Equipo</th>
                                                            							<th>Satisfacción</th>
                                                            							<th>Cotización</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</tfoot>
                                                							</table>
                                            							</div>
                                        							</div>
                                    							</div>
                                							</div>
                                                    	</div>
                                                    </div>
                									<!---Boton edit-->
                    								<button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Editar</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url(CONTROLADOR_ADMIN_CHOOSE,ACTION_UPDATE); ?>" enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">

																			<div class="col-6 mb-3">
																				Tiempo
																				<input id="vTime_edit" class="form-control" name="vTime_edit" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-6 mb-3">
																				Descripción de tiempo
																				<input id="vTimeInfo_edit" class="form-control" name="vTimeInfo_edit" type="text" value="" maxlength="50">
																			</div>

																			<div class="col-6 mb-3">
																				Equipo
																				<input id="vTeam_edit" class="form-control" name="vTeam_edit" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-6 mb-3">
																				Descripción de equipo
																				<input id="vTeamInfo_edit" class="form-control" name="vTeamInfo_edit" type="text" value="" maxlength="50">
																			</div>

																			<div class="col-6 mb-3">
																				Satisfacción
																				<input id="vSatisfaction_edit" class="form-control" name="vSatisfaction_edit" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-6 mb-3">
																				Descripción de satisfacción
																				<input id="vSatisfactionInfo_edit" class="form-control" name="vSatisfactionInfo_edit" type="text" value="" maxlength="50">
																			</div>

																			<div class="col-6 mb-3">
																				Estimación
																				<input id="vEstimate_edit" class="form-control" name="vEstimate_edit" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-6 mb-3">
																				Descripción de estimación
																				<input id="vEstimateInfo_edit" class="form-control" name="vEstimateInfo_edit" type="text" value="" maxlength="50">
																			</div>

																			<input type="hidden" class="hdnId_update" 	name="hdnId_update" value=""/>

																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<button type="button" class="btn btn-primary" onclick="valEdit()">Actualizar</button>
																		<button type="submit" class="btn-link btn_update" name="btn_update" style="display:none;">Editar</button>
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>
                									<!---->

                                                </div>
                                        	</div>
                                    	</div>
                            		</div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>

	</body>
</html>