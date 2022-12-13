<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		<script>
			var info_promotion = '<?php echo json_encode($info_promotion); ?>';
			var JSON_promotion = JSON.parse(info_promotion);

			var info_typePromotion = '<?php echo json_encode($info_typePromotion); ?>';
			var JSON_typePromotion = JSON.parse(info_typePromotion);
		</script>
		<?php 
			$permissions_edit = false;
			if ($_SESSION['idPermissions'] == "2" || $_SESSION['idPermissions'] == "3") { $permissions_edit = true;}
		?>
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Promociones</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
					<form method="post" class="row" action="<?php echo $helper->url($view,"delete"); ?>" style="display:none;">
						<input type="hidden" class="hdn_idPromotion_delete" 	name="hdn_idPromotion_delete" value=""/>
						<button type="submit" class="btn_delete" name="btn_delete" style="display:none;">User</button>
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
                                                        	<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" style="color: #997c00 !important;" onclick="$('.modalNew').click();">Agregar</span>
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
																						<th>Nombre</th>
																						<th>Descuento</th>
																						<th>Tipo</th>
																						<th>Compras minimas</th>
																						<th>Total de compras</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
																					</tr>
																				</thead>
																				<tbody>
																				<?php foreach($info_promotion as $promotion) {
																					$vTypePromotion = "";
																					foreach($info_typePromotion as $typePromotion) {
																						if($promotion->idTypePromotion == $typePromotion->idTypePromotion)
																						{
																							$vTypePromotion = $typePromotion->vTypePromotion;
																						}
																					}
																				?>
																					<tr <?php if($promotion->iStatus == 0){ echo "class='blackList'"; }?>>
																						<td><?php echo $promotion->vPromotion;?></td>
																						<td><?php echo $promotion->vDiscount;?></td>
																						<td><?php echo $vTypePromotion;?></td>
																						<td><?php echo $promotion->iCountPurchase;?></td>
																						<td> $<?php echo $promotion->iTotalPurchase;?></td>
																						<?php if ($permissions_edit) {?>
																						<td>
																							<span class="waves-effect waves-dark btn btn-outline-light text-success float-left" onclick="Edit(<?php echo $promotion->idPromotion;?>)"><i data-feather="edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></span>
																						
																							<span class="waves-effect waves-dark btn btn-outline-light text-danger float-left" onclick="Delete(<?php echo $promotion->idPromotion;?>)"><i data-feather="trash-2" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></span>
																						</td>
																						<?php }?>
																					</tr>
                                                                                <?php } ?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th>Nombre</th>
																						<th>Descuento</th>
																						<th>Tipo</th>
																						<th>Compras minimas</th>
																						<th>Total de compras</th>
                                                            							<?php if ($permissions_edit) {?>
                                                            							<th></th>
																						<?php }?>
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
                                                    <button type="button" class="btn btn-primary modalDelete" data-toggle="modal" data-target="#exampleModal4" style="display:none;">Delete</button>
                                                    
                                                	<div class="modal animated zoomIn" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    	<div class="modal-dialog" role="document">
                                                        	<div class="modal-content">
                                                            	<div class="modal-header">
                                                                	<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    	<span aria-hidden="true">&times;</span>
                                                                	</button>
                                                            	</div>
                                                            	<div class="modal-body">¿Seguro que desea eliminar toda la información?</div>
                                                            	<div class="modal-footer">
                                                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                	<button type="button" class="btn btn-primary" onclick="$('.btn_delete').click();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                									<!---Edita-->
                    								<button type="button" class="btn btn-primary modalEdit" data-toggle="modal" data-target="#exampleModal6" style="display:none;">Edit</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
                                								
																<form method="post" action="<?php echo $helper->url($view,"update"); ?>">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="vPromotion" class="form-control" name="vPromotion" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descuento
																				<input id="vDiscount" class="form-control" name="vDiscount" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Tipo de promoción
																				<select id="idTypePromotion" name="idTypePromotion" class="form-control">
																					<option value="0" data-description="">Selecciona el tipo de promoción</option>
																					<?php foreach($info_typePromotion as $typePromotion) {?>
																						<option value="<?php echo $typePromotion->idTypePromotion; ?>" data-description="<?php echo $typePromotion->vTypePromotion; ?>"><?php echo $typePromotion->vTypePromotion; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Minimo de compras #
																				<input id="iCountPurchase" class="form-control" name="iCountPurchase" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																				<p>Compras minimas para acceder a la promoción</p>
																			</div>
																			<div class="col-12 mb-3">
																				Compra total $
																				<input id="iTotalPurchase" class="form-control" name="iTotalPurchase" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																				<p>Total de compras minimas para acceder a la promoción</p>
																			</div>

																			<div class="col-12 mb-3">
																			<div class="form-check form-switch">
																				<label><input type="radio" name="iStatus" value="0" checked="checked"> Inactiva</label>
																				<label><input type="radio" name="iStatus" value="1"> Activa</label>
																			</div>
																		</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valEdit()">Actualizar</span>
																		<button type="submit" class="btn btn-primary btn_update" name="btn_update" style="display:none;"></button>
																		<input type="hidden" class="hdn_idPromotion"	name="hdn_idPromotion" value=""/>
																		<input type="hidden" class="hdn_iStatus"		name="hdn_iStatus" value=""/>
																		
																	</div>
																</form>
                            								</div>
                        								</div>
                    								</div>
                									<!--Nuevo-->
													<button type="button" class="btn btn-primary modalNew" data-toggle="modal" data-target="#exampleModal7" style="display:none;">New</button>
                    								
													<div class="modal animated zoomIn" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
                        								<div class="modal-dialog" role="document">
                            								<div class="modal-content">
                                								<div class="modal-header">
                                    								<h5 class="modal-title tituloModal" id="exampleModalLabel3"></h5>
                                    								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        								<span aria-hidden="true">&times;</span>
                                    								</button>
                                								</div>
																
																<form method="post" action="<?php echo $helper->url($view,"create"); ?>">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-12 mb-3">
																				Nombre
																				<input id="vPromotion_new" class="form-control" name="vPromotion_new" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Descuento
																				<input id="vDiscount_new" class="form-control" name="vDiscount_new" type="text" value="" maxlength="50">
																			</div>
																			<div class="col-12 mb-3">
																				Tipo de promoción
																				<select id="idTypePromotion_new" name="idTypePromotion_new" class="form-control">
																					<option value="0" data-description="">Selecciona el tipo de promoción</option>
																					<?php foreach($info_typePromotion as $typePromotion) {?>
																						<option value="<?php echo $typePromotion->idTypePromotion; ?>" data-description="<?php echo $typePromotion->vTypePromotion; ?>"><?php echo $typePromotion->vTypePromotion; ?></option>
																					<?php } ?>
																				</select>
																			</div>
																			<div class="col-12 mb-3">
																				Minimo de compras #
																				<input id="iCountPurchase_new" class="form-control" name="iCountPurchase_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																				<p>Compras minimas para acceder a la promoción</p>
																			</div>
																			<div class="col-12 mb-3">
																				Compra total $
																				<input id="iTotalPurchase_new" class="form-control" name="iTotalPurchase_new" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																				<p>Total de compras minimas para acceder a la promoción</p>
																			</div>

																			<div class="col-12 mb-3">
																			<div class="form-check form-switch">
																				<label><input type="radio" name="iStatus_new" value="0" checked="checked"> Inactiva</label>
																				<label><input type="radio" name="iStatus_new" value="1"> Activa</label>
																			</div>
																		</div>
																	</div>

																	<div class="forgot-password">
																		<p class="messageError"></p>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																		<span class="btn btn-primary" onclick="valNew()">Guardar</span>
																		<button type="submit" class="btn btn-primary btn_create" name="btn_create" style="display:none;"></button>
																	</div>
																</form>
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