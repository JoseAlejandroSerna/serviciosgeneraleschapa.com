<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <nav class="footer-menu">
                    <button class="footer-nav-toggler hvr-bounce-to-right">Footer Menu <i class="fa fa-bars"></i></button>
                    <ul>
                        <li><a href="#topbar">Inicio</a></li>
                        <li><a href="#who-we-are">Promociones</a></li>
                        <li><a href="#service-we-provide">Servicios</a></li>
                        <li><a href="#our-projects">Proyectos</a></li>
                        <li><a href="pricing-content">Precios</a></li>
                        <li><a href="#contact-content">Contáctanos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 widget">
                <?php 
                $vInformation = "";
                foreach($contact as $info) {
                    $vInformation = $info->vInformation;
                    }?>
                <h3>Conocenos</h3>
                <p><?php echo $vInformation; ?></p>

                <ul class="social">
                <?php foreach($socialNetworks as $urlSocialNetworks) {?>
                        
                    <?php if($urlSocialNetworks->vUrlFacebook != ""){?>
                        <li><a href="<?php echo $urlSocialNetworks->vUrlFacebook; ?>" target="_blank" class="hvr-radial-out"><i class="fa fa-facebook"></i></a></li>
                    <?php }?>

                    <?php if($urlSocialNetworks->vUrlInstagram != ""){?>
                        <li><a href="<?php echo $urlSocialNetworks->vUrlInstagram; ?>" class="hvr-radial-out"><i class="fa fa-instagram"></i></a></li>
                    <?php }?>
                    
                    <?php if($urlSocialNetworks->vUrlTwitter != ""){?>
                        <li><a href="<?php echo $urlSocialNetworks->vUrlTwitter; ?>" target="_blank" class="hvr-radial-out"><i class="fa fa-twitter"></i></a></li>
                    <?php }?>

                    <?php if($urlSocialNetworks->vUrlPinterest != ""){?>
                        <li><a href="<?php echo $urlSocialNetworks->vUrlPinterest; ?>" target="_blank" class="hvr-radial-out"><i class="fa fa-pinterest"></i></a></li>
                    <?php }?>
                <?php } ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 widget">
                <h3 style="display:none">popular Posts</h3>
                <ul class="popular-post" style="display:none">
                    <li>
                        <a href="#"><h5>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</h5></a>
                        <p class="date">June 02, 2015</p>
                    </li>
                    <li>
                        <a href="#"><h5>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</h5></a>
                        <p class="date">June 02, 2015</p>
                    </li>
                    <li>
                        <a href="#"><h5>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</h5></a>
                        <p class="date">June 02, 2015</p>
                    </li>
                </ul>
            </div> 

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 widget">
                <h3>Contáctanos</h3>
                <ul class="contact-info">
                <?php foreach($general as $info) {?>

                    <?php if($info->vAddresses != ""){?>
                        <li><i class="fa fa-map-marker"></i> <?php echo $info->vAddresses; ?></li>
                    <?php } ?>

                    <?php if($info->vPhone != ""){?>
                        <li><i class="fa fa-phone"></i> <?php echo $info->vPhone; ?></li>
                    <?php } ?>

                    <?php if($info->vEmail != ""){?>
                        <li><i class="fa fa-envelope-o"></i> <?php echo $info->vEmail; ?></li>
                    <?php } ?>
                <?php } ?>
                </ul>
            </div> 

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 widget">
                <img class="positioned wow slideInUp " src="../assets/images/resources/footer-man.png" alt="">
            </div>
        </div>
    </div>
</footer> 

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://maps.google.com/maps/api/js"></script>
<script src="js/gmap.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/validate.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/jquery.scrolly.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/main.js"></script>