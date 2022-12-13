<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

		<script>
			var info_main = '<?php echo json_encode($info_main); ?>';
			var JSON_main = JSON.parse(info_main);
			
			var info_designer = '<?php echo json_encode($info_designer); ?>';
			var JSON_designer = JSON.parse(info_designer);
		</script>
		
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 ">Configuración de sitio web</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="container-fluid mt-n10 ">
                    	<div class="svgStyle toppadding50 bottompadding50">
                        	<div class="row margin-bottom">
                            	<div class="col-xl-12">

                                	<div class="row">
                                    	<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    		<div class="card shadow margin-bottom">
												<div class="card-body">
													<h4><b>Redes sociales</b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,"socialNetwork"); ?>">
															<div class="row">
																<?php 
																$vFacebook = "";
																$vInstagram = "";
																$vTwitter = "";
																$vPinterest = "";
																foreach($info_socialNetworks as $socialNetworks) {
																	$vFacebook = $socialNetworks->vUrlFacebook;
																	$vInstagram = $socialNetworks->vUrlInstagram;
																	$vTwitter = $socialNetworks->vUrlTwitter;
																	$vPinterest = $socialNetworks->vUrlPinterest;
																}
																?>
															
																<div class="col-6 mb-3">
																	Facebook
																	<input id="facebook" class="form-control" name="facebook" type="text" value="<?php echo $vFacebook;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<div class="col-6 mb-3">
																	Instagram
																	<input id="instagram" class="form-control" name="instagram" type="text" value="<?php echo $vInstagram;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<div class="col-6 mb-3">
																	Twitter
																	<input id="twitter" class="form-control" name="twitter" type="text" value="<?php echo $vTwitter;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<div class="col-6 mb-3">
																	Pinterest
																	<input id="pinterest" class="form-control" name="pinterest" type="text" value="<?php echo $vPinterest;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<input type="hidden" class="hdn_idSocialNetworks" name="hdn_idSocialNetworks" value="1"/>


																<div class="col-12 mb-3">
																	<button type="submit" class="btn btn-primary">Guardar</button>
																</div>
															</div>
														</form>

													</div>
												</div>
                                        	</div>
                                    	</div>
                            		</div>

									<div class="row">
										<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="card shadow margin-bottom">
												<div class="card-body">
													<h4><b>Pagos</b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,"sendingSettings"); ?>">
															<div class="row">
																<?php 
																$vSending = "0";
																$vCommission = "0";
																$vCommissionTerminal = "0";

																foreach($info_sendingSettings as $sendingSettings) {
																	$vSending = $sendingSettings->vSending;
																	$vCommission = $sendingSettings->vCommission;
																	$vCommissionTerminal = $sendingSettings->vCommissionTerminal;
																}
																?>
															
																<div class="col-6 mb-3">
																	Cobro de envio ($)
																	<input id="vSending" class="form-control" name="vSending" type="text" value="<?php echo $vSending;?>" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																</div>
																<div class="col-6 mb-3">
																	Comision de venta online (%)
																	<input id="vCommission" class="form-control" name="vCommission" type="text" value="<?php echo $vCommission;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<div class="col-6 mb-3">
																	Comision de venta terminal (%)
																	<input id="vCommissionTerminal" class="form-control" name="vCommissionTerminal" type="text" value="<?php echo $vCommissionTerminal;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<input type="hidden" class="hdn_idSendingSettings" name="hdn_idSendingSettings" value="1"/>

																<div class="col-12 mb-3">
																	<button type="submit" class="btn btn-primary">Guardar</button>
																</div>
															</div>
														</form>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="card shadow margin-bottom">
												<div class="card-body">
													<h4><b>Home</b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,"main"); ?>" enctype="multipart/form-data">
															<div class="row">
																<?php 
																$vVideoSeccion1 = "";
																$vVideoSeccion2 = "";
																$vVideoSeccion3 = "";
																$vVideoSeccion4 = "";
																$vVideoSeccion5 = "";
																$path = "/assets/video/";

																foreach($info_main as $main) {
																	$vVideoSeccion1 = $main->vVideoSeccion1;
																	$vVideoSeccion2 = $main->vVideoSeccion2;
																	$vVideoSeccion3 = $main->vVideoSeccion3;
																	$vVideoSeccion4 = $main->vVideoSeccion4;
																	$vVideoSeccion5 = $main->vVideoSeccion5;
																}
																?>
															
																<div class="col-6 mb-3">
																	<p>Video 1</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion1;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion1" name="vVideoSeccion1">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_1">
																			<input type="checkbox" id="check_1" value=""> 
																			Activo
																		</label>
																	</p>
																</div>
																<div class="col-6 mb-3">
																	<p>Video 2</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion2;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion2" name="vVideoSeccion2">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_2">
																			<input type="checkbox" id="check_2" value=""> 
																			Activo
																		</label>
																	</p>
																</div>

																<div class="col-12 mb-3"></div>

																<div class="col-6 mb-3">
																	<p>Video 3</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion3;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion3" name="vVideoSeccion3">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_3">
																			<input type="checkbox" id="check_3" value=""> 
																			Activo
																		</label>
																	</p>
																</div>
																<div class="col-6 mb-3">
																	<p>Video 4</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion4;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion4" name="vVideoSeccion4">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_4">
																			<input type="checkbox" id="check_4" value=""> 
																			Activo
																		</label>
																	</p>
																</div>
																
																<div class="col-12 mb-3"></div>

																<div class="col-6 mb-3">
																	<p>Video 5</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion5;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion5" name="vVideoSeccion5">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_5">
																			<input type="checkbox" id="check_5" value=""> 
																			Activo
																		</label>
																	</p>
																</div>

																<div class="col-12 mb-3">
																	<p class="messageError"></p>
																</div>

																<input type="hidden" class="hdn_idMain" 	name="hdn_idMain" value="1"/>
																
																<input type="hidden" class="hdn_vVideoSeccion1" 	name="hdn_vVideoSeccion1" value="<?php echo $vVideoSeccion1;?>"/>
																<input type="hidden" class="hdn_vVideoSeccion2" 	name="hdn_vVideoSeccion2" value="<?php echo $vVideoSeccion2;?>"/>
																<input type="hidden" class="hdn_vVideoSeccion3" 	name="hdn_vVideoSeccion3" value="<?php echo $vVideoSeccion3;?>"/>
																<input type="hidden" class="hdn_vVideoSeccion4" 	name="hdn_vVideoSeccion4" value="<?php echo $vVideoSeccion4;?>"/>
																<input type="hidden" class="hdn_vVideoSeccion5" 	name="hdn_vVideoSeccion5" value="<?php echo $vVideoSeccion5;?>"/>

																<input type="hidden" class="hdn_iCheck_1"	name="hdn_iCheck_1" value="1"/>
																<input type="hidden" class="hdn_iCheck_2" 	name="hdn_iCheck_2" value="1"/>
																<input type="hidden" class="hdn_iCheck_3"	name="hdn_iCheck_3" value="1"/>
																<input type="hidden" class="hdn_iCheck_4" 	name="hdn_iCheck_4" value="1"/>
																<input type="hidden" class="hdn_iCheck_5" 	name="hdn_iCheck_5" value="1"/>

																<div class="col-12 mb-3">
																	<button type="button" class="btn btn-primary btnSave" onclick="validation()">Guardar</button>
																	<button type="submit" class="btn btn-primary" id="btn_save" style="display:none">Guardar</button>
																</div>
															</div>
														</form>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="card shadow margin-bottom">
												<div class="card-body">
													<h4><b>Diseñador</b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,"designer"); ?>" enctype="multipart/form-data">
															<div class="row">
																<?php 
																$vVideoSeccion1_designer = "";
																$vTitle = "";
																$vDescription1 = "";
																$vDescription2 = "";
																$vFirma = "";
																$path = "/assets/video/";

																foreach($info_designer as $designer) {
																	$vVideoSeccion1_designer = $designer->vVideoSeccion1;
																	$vTitle = $designer->vTitle;
																	$vDescription1 = $designer->vDescription1;
																	$vDescription2 = $designer->vDescription2;
																	$vFirma = $designer->vFirma;
																}
																?>
															
																<div class="col-6 mb-3">
																	<p>Video</p>
																	<video width="320" height="240" controls>
																		<source src="<?php echo $path.$vVideoSeccion1_designer;?>" type="video/mp4">
																	</video>
																	<p>
																		<input type="file" class="form-control-file" id="vVideoSeccion1_designer" name="vVideoSeccion1_designer">
																	</p>
																	<p>
																		<label class="col-md-10 col-form-label check_1_designer">
																			<input type="checkbox" id="check_1_designer" value=""> 
																			Activo
																		</label>
																	</p>
																</div>
																<div class="col-6 mb-3"></div>

																<div class="col-6 mb-3">
																	Titulo
																	<input id="vTitle" class="form-control" name="vTitle" type="text" value="<?php echo $vTitle;?>" maxlength="500">
																</div>

																<div class="col-6 mb-3">
																	Firma
																	<input id="vFirma" class="form-control" name="vFirma" type="text" value="<?php echo $vFirma;?>" maxlength="500">
																</div>

																<div class="col-6 mb-3">
																	Descripcion 1
																	<textarea id="vDescription1" class="form-control" name="vDescription1" rows="10" cols="50" maxlength="1000"><?php echo $vDescription1;?></textarea>
																</div>

																<div class="col-6 mb-3">
																	Descripcion 2
																	<textarea id="vDescription2" class="form-control" name="vDescription2" rows="10" cols="50" maxlength="1000"><?php echo $vDescription2;?></textarea>
																</div>

																<div class="col-12 mb-3">
																	<p class="messageError"></p>
																</div>

																<input type="hidden" class="hdn_idDesigner" 				name="hdn_idDesigner" value="1"/>
																<input type="hidden" class="hdn_vVideoSeccion1_designer" 	name="hdn_vVideoSeccion1_designer" value="<?php echo $vVideoSeccion1_designer;?>"/>
																<input type="hidden" class="hdn_iCheck_1_designer"			name="hdn_iCheck_1_designer" value="1"/>

																<div class="col-12 mb-3">
																	<button type="button" class="btn btn-primary btnSave_designer" onclick="validationDesigner()">Guardar</button>
																	<button type="submit" class="btn btn-primary" id="btn_save_designer" style="display:none">Guardar</button>
																</div>
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
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>
		
		<style>
			.errorForm{border: 1px solid red;}
			p.messageError {color: red;}
			.table td, .table th {text-align: center;}
		</style>
	</body>
</html>