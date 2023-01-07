<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>
		
        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-top4">
                                <h2 class="h4 mb-0 pageH1 "><?php echo TITLE_CONFIGURATION?></h2>
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
													<h4><b><?php echo TITLE_SOCIAL_NETWORK?></b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,ACTION_SOCIAL_NETWORK); ?>">
															<div class="row">
																<?php 
																$vFacebook = "";
																$vInstagram = "";
																$vTwitter = "";
																$vPinterest = "";
																foreach($socialNetworks as $info) {
																	$vFacebook = $info->vUrlFacebook;
																	$vInstagram = $info->vUrlInstagram;
																	$vTwitter = $info->vUrlTwitter;
																	$vPinterest = $info->vUrlPinterest;
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
													<h4><b><?php echo TITLE_LOGO?></b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,ACTION_LOGO); ?>" enctype="multipart/form-data">
															<div class="row">
																<?php 
																$vLogo = "";

																foreach($general as $info) { 
																	$vLogo = $info->vLogo;
																}
																?>
															
																<div class="col-6 mb-3">
																	<img src="<?php echo PATH_RESOURCES; ?><?php echo $vLogo; ?>" style="<?php echo STYLE_MAX_LOGO;?>">
																</div>

																<div class="col-6 mb-3">
																	(medidas recomendadas 230x55)
																	<input type="file" class="form-control-file" id="vLogo" name="vLogo">
																</div>

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
													<h4><b><?php echo TITLE_GENERAL?></b></h4>
													<div class="margin-bottom ">

														<form method="post" action="<?php echo $helper->url($view,ACTION_GENERAL); ?>">
															<div class="row">
																<?php 
																$vPhone = "";
																$vEmail = "";
																$vAddresses = "";

																foreach($general as $info) {
																	$vPhone = $info->vPhone;
																	$vEmail = $info->vEmail;
																	$vAddresses = $info->vAddresses;
																}
																?>
															
																<div class="col-6 mb-3">
																	Teléfono
																	<input id="vPhone" class="form-control" name="vPhone" type="text" value="<?php echo $vPhone;?>" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
																</div>
																<div class="col-6 mb-3">
																	Correo
																	<input id="vEmail" class="form-control" name="vEmail" type="email" value="<?php echo $vEmail;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>
																<div class="col-6 mb-3">
																	Dirección
																	<input id="vAddresses" class="form-control" name="vAddresses" type="text" value="<?php echo $vAddresses;?>" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="500">
																</div>

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