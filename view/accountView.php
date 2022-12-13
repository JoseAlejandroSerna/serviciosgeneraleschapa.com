<html lang="en" class="">
    <?php include('header.php') ?>

    <body id="index" class="lang-en country-us currency-usd layout-full-width page-index tax-display-disabled body-desktop-header-style-w-3">

        <main id="main-page-content">
            <?php include('menu.php') ?>
            <script>
                var varView = '<?php echo $view; ?>';
                var varError = '<?php echo $account["seccion1_error"]; ?>';
                var varUserNotValid = '<?php echo $account["seccion1_user_not_valid"]?>';
            </script>
            <section id="wrapper">
                <div id="inner-wrapper" class="container">
                    <aside id="notifications"></aside>    
                    <div id="content-wrapper" class="js-content-wrapper">
                        <section id="main" class="paddingHeader">
                            <header class="page-header">
                                <h1 class="h1 page-title">
                                    <span><?php echo $account["seccion1_title"]; ?> </span>
                                </h1>
                            </header>
                            <div id="content" class="page-content">
                                <section class="register-form">
                                    <p>
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i> 
                                        <a href="<?php echo $helper->url("Login","index"); ?>">
                                            <u><?php echo $account["seccion1_subtitle"]; ?></u>
                                        </a>
                                    </p>
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="field-firstname">
                                            <?php echo $account["seccion1_name"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="name" class="form-control" name="name" type="text" value="" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)" maxlength="50">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="email">
                                            <?php echo $account["seccion1_email"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="email" class="form-control" name="email" type="text" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="100">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="password">
                                            <?php echo $account["seccion1_password"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="password" class="form-control" name="password" type="password" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="50">
                                            <p><?php echo $account["seccion1_min_password"]; ?></p>
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="password">
                                            <?php echo $account["seccion1_confirm_password"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="confirm_password" class="form-control" name="confirm_password" type="password" value="" onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="50">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="phone">
                                            <?php echo $account["seccion1_phone"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="phone" class="form-control" name="phone" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="10">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="address">
                                            <?php echo $account["seccion1_address"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="address" class="form-control" name="address" type="text" value=""  onkeypress="return valTeclas(1,event)" onkeyup="fnValidaTeclas(1,this)" maxlength="200">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center ">
                                        <label class="col-md-2 col-form-label required" for="cp">
                                            <?php echo $account["seccion1_cp"]; ?>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="cp" class="form-control" name="cp" type="text" value="" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel" maxlength="7">
                                        </div>
                                        <div class="col-md-2 form-control-comment"></div>
                                    </div>
                                    <div class="forgot-password">
                                        <p class="messageError"></p>
                                    </div>

                                    <footer class="form-footer text-center clearfix">
                                        <span class="btn btn-primary form-control-submit" onclick="valAccount()"><?php echo $account["seccion1_button"]; ?></span>
                                    
                                    </footer>
                                </section>
                            </div>
                            <footer class="page-footer">
                                <!-- Footer content -->
                            </footer>
                        </section>
                    </div>
                </div>
            </section>


            <?php include('footer.php') ?>
        </main>
        
        <?php include('linksFooter.php') ?>
    </body>
</html>