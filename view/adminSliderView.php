<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var slider = '<?php echo json_encode($slider); ?>';
			var JSON_slider = JSON.parse(slider);
			var PATH_SLIDES = "<?php echo PATH_SLIDES;?>";
		</script>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 "><?php echo TITLE_SLIDER?></h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url(CONTROLADOR_ADMIN_SLIDER,ACTION_DELETE); ?>" style="display:none;">
						<input type="hidden" class="hdnIdSlider_delete" name="hdnIdSlider_delete" value=""/>
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
                                                    <div class="row mb-4">
                                                		<div class="col-12">
															<button type="button" class="btn btn-primary btnModalPaquetes" data-toggle="modal" data-target="#exampleModal7">
																Nueva imagen
															</button>
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
                                                           								<th>Titulo</th>
                                                            							<th>Información</th>
                                                            							<th>Imagen</th>
                                                            							<th></th>
                                                        							</tr>
                                                    							</thead>
                                                    							<tbody>
                                                                                <?php foreach($slider as $info) {?>
																					<tr>
																						<td><?php echo $info->vSlider;?></td>
																						<td><?php echo $info->vInformation;?></td>
																						<td>
																							<img src="<?php echo PATH_SLIDES.$info->vImage; ?>" style="<?php echo STYLE_MAX_LOGO;?>">
																						</td>
																						
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $info->idSlider;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="Delete(<?php echo $info->idSlider;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																					</tr>
                                                                                <?php } ?>
                                                    							</tbody>
                                                    							<tfoot>
                                                        							<tr>
                                                           								<th>Titulo</th>
                                                            							<th>Información</th>
                                                            							<th>Imagen</th>
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
                                                    <!---Boton elimina product-->
                                                    <button type="button" class="btn btn-primary btnDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información de esta imagen?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
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
																<form method="post" action="<?php echo $helper->url(CONTROLADOR_ADMIN_SLIDER,ACTION_UPDATE); ?>" enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3" style="text-align: center;">
																				<img src="" class="modalImg">
																			</div>
																			<div class="col-12 mb-3">
																				Titulo
																				<input id="title_edit" class="form-control" name="title_edit" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descripción
																				<input id="description_edit" class="form-control" name="description_edit" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 1600x595)
																				<input type="file" class="form-control-file" id="image_edit" name="image_edit">
																			</div>

																			<input type="hidden" class="hdnIdSlider_update" 	name="hdnIdSlider_update" value=""/>

																			<input type="hidden" class="hdnImage" name="hdnImage" value=""/>
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
                									<!---Boton new -->
                    								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal7" style="display:none;">Nuevo</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																<form method="post" action="<?php echo $helper->url(CONTROLADOR_ADMIN_SLIDER,ACTION_CREATE); ?>" enctype="multipart/form-data">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Titulo
																				<input id="title_new" class="form-control" name="title_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descripción
																				<input id="description_new" class="form-control" name="description_new" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Imagen (medidas recomendadas 1600x595)
																				<input type="file" class="form-control-file" id="image_new" name="image_new">
																			</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valNew()">Agregar</span>
																		<button type="submit" class="btn-link btn_create" name="btn_create" style="display:none;">Nuevo</button>
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