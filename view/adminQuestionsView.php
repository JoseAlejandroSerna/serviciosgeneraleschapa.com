<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_questions = '<?php echo json_encode($info_questions); ?>';
			var JSON_questions = JSON.parse(info_questions);
		</script>
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 "><?php echo $vQuiz; ?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"create"); ?>" style="display:none;">

						<input type="hidden" class="hdn_vQuestions_create" 		name="hdn_vQuestions_create" value=""/>
						<input type="hidden" class="hdn_idQuiz_create" 			name="hdn_idQuiz_create" value="<?php echo $idQuiz; ?>"/>
						<input type="hidden" class="hdn_iOrder_create" 			name="hdn_iOrder_create" value="1"/>

						<button type="submit" class="btn_create" name="btn_create" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">

						<input type="hidden" class="hdn_id_delete" 	name="hdn_id_delete" value=""/>

						<button type="submit" class="btn_delete" name="btn_delete" style="display:none;">User</button>
					</form>
					<form method="post" class="row" action="<?php echo $helper->url($view,"update"); ?>" style="display:none;">

						<input type="hidden" class="hdn_vQuestions_update" 	name="hdn_vQuestions_update" value=""/>
						<input type="hidden" class="hdn_idQuiz_update" 		name="hdn_idQuiz_update" value="<?php echo $idQuiz; ?>"/>
						<input type="hidden" class="hdn_idQuestions_update"	name="hdn_idQuestions_update" value=""/>
						<input type="hidden" class="hdn_iOrder_update" 		name="hdn_iOrder_update" value="1"/>

						<button type="submit" class="btn_update" name="btn_update" style="display:none;">update</button>
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
                                                        <div class="col-12 mb-3">
                                                        	<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" style="color: #997c00 !important;" onclick="$('.btn_modalNew').click();">Agregar</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    	<div class="col-12">
															<div class="bottompadding50" id="dTables3">
                                    							<div class="card shadow">
                                        							<div class="card-body">
                                            							<div class="table-responsive">
                                                							<table id="export1234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    							<thead>
																					<tr>
																						<th>Pregunta</th>
																						<th></th>
																					</tr>
																				</thead>
																				<tbody>
																				<?php foreach($info_questions as $questions) {?>
																					<tr>
																						<td><?php echo $questions->vQuestions;?></td>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $questions->idQuestions;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="Delete(<?php echo $questions->idQuestions;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th>Pregunta</th>
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
                                                    <!---elimina-->
                                                    <button type="button" class="btn btn-primary btn_modalDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de esta pregunta? <br>Se eliminaran todos los comentarios realizados por los socios.</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Edita-->
                    								<button type="button" class="btn btn-primary btn_modalEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								<div class="modal-body">
                                									<div class="row">
                                                            			<div class="col-12 mb-3">
                                                                			Pregunta
                                            								<input id="name_edit" class="form-control" name="name_edit" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
                                                            			</div>
                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valEdit()">Actualizar</button>
                                								</div>
                            								</div>
                        								</div>
                    								</div>
                									<!--Nuevo-->
													<button type="button" class="btn btn-primary btn_modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">New</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								<div class="modal-body">
                                									<div class="row">
                                                            			<div class="col-12 mb-3">
                                                                			Pregunta
                                            								<input id="name_new" class="form-control" name="name_new" type="text" value="" maxlength="500">
                                                            			</div>
                                									</div>
                                								</div>

																<div class="forgot-password">
																	<p class="messageError"></p>
																</div>

                               			 						<div class="modal-footer">
                                									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    								<button type="button" class="btn btn-primary" onclick="valNew()">Guardar</button>
                                								</div>
                            								</div>
                        								</div>
                    								</div>

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