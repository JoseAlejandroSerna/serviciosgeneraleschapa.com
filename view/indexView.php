<html lang="en" class="">
    <?php include('header.php') ?>
    
	<body>

	    <div class="preloader"></div>

        <section id="topbar" class="home-v2">
            <div class="container">
                <div class="row">
                    <div class="social pull-left">
                        <ul>
                        <?php foreach($socialNetworks as $urlSocialNetworks) {?>
                        
                            <?php if($urlSocialNetworks->vUrlFacebook != ""){?>
                                <li>
                                    <a href="<?php echo $urlSocialNetworks->vUrlFacebook; ?>" target="_blank" style="display: inline;">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                            <?php }?>

                            <?php if($urlSocialNetworks->vUrlInstagram != ""){?>
                                <li>
                                    <a href="<?php echo $urlSocialNetworks->vUrlInstagram; ?>" target="_blank" style="display: inline;">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            <?php }?>
                            
                            <?php if($urlSocialNetworks->vUrlTwitter != ""){?>
                                <li>
                                    <a href="<?php echo $urlSocialNetworks->vUrlTwitter; ?>" target="_blank" style="display: inline;">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            <?php }?>

                            <?php if($urlSocialNetworks->vUrlPinterest != ""){?>
                                <li>
                                    <a href="<?php echo $urlSocialNetworks->vUrlPinterest; ?>" target="_blank" style="display: inline;">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                            <?php }?>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="contact-info pull-right">
                        <ul>
                            <?php 
                                $vPhone = "";
                                foreach($general as $info) {  ?>

                            <?php if($info->vPhone != ""){ 
                                $vPhone = $info->vPhone;
                            ?>
                            <li>
                                <a href="tel:<?php echo $info->vPhone; ?>" class="hvr-bounce-to-bottom">
                                    <i class="fa fa-phone"></i> <?php echo $info->vPhone; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($info->vEmail != ""){?>
                            <li>
                                <a href="mailto:<?php echo $info->vEmail; ?>" class="hvr-bounce-to-bottom">
                                    <i class="fa fa-envelope-o"></i> <?php echo $info->vEmail; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <header class="home-v2">

            <!--Busqueda-->
            <div class="search-box">
                <div class="container">
                    <div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
                        <form method="post" action="<?php echo $helper->url(CONTROLADOR_MAIN,ACTION_LOGIN); ?>">
                            
                            <input type="email" name="vEmail" placeholder="Correo">
                            <input type="password" name="vPassword" placeholder="Contraseña">

                            <button type="submit" style="padding-top: 10px; padding-bottom: 13px;">
                                <i class="icon icon-Arrow"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-4 col-lg-offset-0 col-md-offset-4 logo">
                        <?php 
                            $vLogo = "";
                            foreach($general as $info) {

                                if($info->vLogo != ""){ 
                                    $vLogo = $info->vLogo;
                                }
                            }
                        ?>
                        <a href="<?php echo $helper->url(CONTROLADOR_MAIN,ACCION_INDEX); ?>">
                            <img src="<?php echo PATH_RESOURCES; ?><?php echo $vLogo; ?>" alt="Servicios generales Chapa" style="<?php echo STYLE_MAX_LOGO;?>">
                        </a>
                    </div>

                    <nav class="col-lg-9 col-md-12 col-lg-pull-0 col-md-pull-1 mainmenu-container">
                        <ul class="top-icons-wrap pull-right">
                            <li class="top-icons search"><a href="#"><i class="icon icon-User"></i></a></li>
                        </ul>
                        <button class="mainmenu-toggler">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="mainmenu one-page-scroll-menu pull-right">
                            <li class="scrollToLink current">
                                <a href="#topbar" class="hvr-overline-from-left">Inicio</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#who-we-are" class="hvr-overline-from-left">Promociones</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#service-we-provide" class="hvr-overline-from-left">Servicios</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#our-projects" class="hvr-overline-from-left">Proyectos</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#pricing-content" class="hvr-overline-from-left">Precios</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#contact-content" class="hvr-overline-from-left">Contáctanos</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <section id="banner">
            <div class="banner-container">
                <div class="banner home-v2">
                    <ul>
                        <?php foreach($slider as $info) { ?>
                            <li 
                                class="slider-2" 
                                data-transition="fade" 
                                data-slotamount="7" 
                                data-thumb="<?php echo PATH_SLIDES; ?><?php echo $info->vImage; ?>"
                                data-title="WE ARE AVAILABLE">

                                <img 
                                    src="<?php echo PATH_SLIDES; ?><?php echo $info->vImage; ?>" 
                                    data-bgrepeat="no-repeat" 
                                    data-bgfit="cover" 
                                    data-bgposition="top center"
                                    alt="slider image">
                                
                                <div 
                                    class="caption skewfromright  light-plumber-slider-caption tp-resizeme" 
                                    data-x="0" 
                                    data-y="200" 
                                    data-speed="600" 
                                    data-start="1700" 
                                    data-easing="easeOutBack">

                                    <h1><?php echo $info->vSlider; ?></h1>
                                </div>
                                <div 
                                    class="caption randomrotate bold-plumber-slider-caption tp-resizeme" 
                                    data-x="0" 
                                    data-y="250" 
                                    data-speed="500" 
                                    data-start="2200" 
                                    data-easing="easeOutBack">

                                    <h1><?php echo $info->vInformation; ?></h1>
                                </div>
                                

                            </li>
                        <?php  }?>

                    </ul>
                </div>
            </div>
        </section>

        <section id="request-a-qoute-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-title">
                            <ul>
                                <li data-tab-title="residential"><span class="active">Cotización rapida</span></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="residential">

                                <form action="#">    
                                <ul class="clearfix">
                                    <li>
                                        <label>Nombre:</label>
                                        <input type="text" id="email_name" name="email_name" placeholder="Ingrese su nombre" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)">
                                    </li>
                                    <li>
                                        <label>Teléfono:</label>
                                        <input type="text" id="email_phone" name="email_phone" placeholder="ej. 8112345678" maxlength="10" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel">
                                    </li>
                                    <li>
                                        <label>Tipo de cotizacion:</label>
                                        <select id="email_service" name="email_service">
                                        <?php foreach($service as $info) { ?>
                                            <option value="<?php echo $info->idService; ?>"><?php echo $info->vService; ?></option>
                                        <?php }?>
                                        </select>
                                    </li>
                                    <li>
                                        <label>&nbsp;</label>
                                        <button type="submit" class="hvr-bounce-to-right" onclick="BtnCotRapida()">Enviar</button>
                                    </li>
                                </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="who-we-are">
            <div class="container">
                <div class="row">

                    <?php foreach($promotion as $info) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 single-box wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                            <div class="img-holder">
                                <img src="<?php echo PATH_WHO_WE_ARE; ?><?php echo $info->vImage; ?>" alt="" style="<?php echo STYLE_MAX_HEIGHT_PROMOTION;?>">
                            </div>
                            <h2><?php echo $info->vPromotion; ?></h2>
                            <p><?php echo $info->vInformation; ?></p>
                        </div>
                    <?php  }?>	

                </div>
            </div>
        </section>

        <section id="service-we-provide">
            <div class="container">
                <div class="section-title">
                    <h1>Servicios que ofrecemos</h1>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 wow slideInLeft">
                        <div class="service-tab-title">
                            <ul class="clearfix">
                            <?php 
                                $cont = 0;
                                foreach($service as $info) {        
                            ?>
                                <?php if($cont == 0){?>
                                    <li class="active" data-tab-name="service-<?php echo $info->idService; ?>"><?php echo $info->vService; ?></li>
                                <?php }else{?>
                                    <li data-tab-name="service-<?php echo $info->idService; ?>"><?php echo $info->vService; ?></li>
                                <?php }?>

                            <?php 
                                $cont++;
                                } 
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 wow slideInRight">
                        <div class="row">
                            <div class="service-tab-content clearfix">
                            <?php 
                                $cont = 0;
                                foreach($service as $info) {        
                            ?>
                                <?php if($cont == 0){?>
                                    <div id="plumbing">
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <p><?php echo $info->vInformation; ?></p>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage; ?>" style="<?php echo STYLE_MAX_HEIGHT_SERVICE;?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <ul>
                                                    <?php foreach($serviceDetail as $infoDetail) { ?>
                                                        <?php if($info->idService == $infoDetail->idService){?>
                                                            <li>
                                                                <i class="fa fa-arrow-circle-o-right"></i>
                                                                <?php echo $infoDetail->vServiceDetail; ?>
                                                            </li>
                                                        <?php }?>
                                                    <?php  }?>									
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zoomIn">
                                            <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage2; ?>" alt="">
                                        </div>
                                    </div>
                                    <div id="service-<?php echo $info->idService; ?>">
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <p><?php echo $info->vInformation; ?></p>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage; ?>" style="<?php echo STYLE_MAX_HEIGHT_SERVICE;?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <ul>
                                                    <?php foreach($serviceDetail as $infoDetail) { ?>
                                                        <?php if($info->idService == $infoDetail->idService){?>
                                                            <li>
                                                                <i class="fa fa-arrow-circle-o-right"></i>
                                                                <?php echo $infoDetail->vServiceDetail; ?>
                                                            </li>
                                                        <?php }?>
                                                    <?php  }?>									
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zoomIn">
                                            <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage2; ?>" alt="">
                                        </div>
                                    </div>
                                <?php }else{?>
                                    <div id="service-<?php echo $info->idService; ?>">
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <p><?php echo $info->vInformation; ?></p>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage; ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                                    <ul>
                                                    <?php foreach($serviceDetail as $infoDetail) { ?>
                                                        <?php if($info->idService == $infoDetail->idService){?>
                                                            <li>
                                                                <i class="fa fa-arrow-circle-o-right"></i>
                                                                <?php echo $infoDetail->vServiceDetail; ?>
                                                            </li>
                                                        <?php }?>
                                                    <?php  }?>									
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zoomIn">
                                            <img src="<?php echo PATH_SERVICE_WE_PROVIDE; ?><?php echo $info->vImage2; ?>" alt="">
                                        </div>
                                    </div>
                                <?php }?>

                            <?php 
                                $cont++;
                                } 
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="our-projects" class="with-filter">
            <div class="container">
                <div class="section-title">
                    <h1>Nuestros proyectos</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="gallery-filter masonary">
                            <li class="active" data-filter=".masonary-item">
                                <span>Todos</span>
                            </li>
                            
                            <?php foreach($service as $info) {   ?>
                                <li data-filter=".service-<?php echo $info->idService; ?>">
                                    <span><?php echo $info->vService; ?></span>
                                </li>

                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 masonary-gallery" id="image-gallery-isotope">

                        <?php foreach($project as $info) { ?>

                            <div class="masonary-item width-1 service-<?php echo $info->idService; ?>">
                                <a class="fancybox" href="<?php echo PATH_OUR_PROJECTS; ?><?php echo $info->vImage; ?>">
                                    <div class="img-wrap">
                                        <img src="<?php echo PATH_OUR_PROJECTS; ?><?php echo $info->vImage; ?>" alt="" style="<?php echo STYLE_MAX_HEIGHT_PROJECT;?>">
                                        <div class="content-wrap">
                                            <div class="border">
                                                <div class="content">
                                                    <h4><?php echo $info->vProject; ?></h4>
                                                    <span><?php echo $info->vInformation; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php }?>

                    </div>
                </div>
            </div>
        </section>
        
        <section id="our-achivement" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
                        <ul>
                            <li>
                                <span><i class="icon icon-Cup"></i></span> 
                                <span><b class="timer" data-from="10" data-to="1532" data-speed="5000" data-refresh-interval="50">1532</b><br> Awards</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
                        <ul>
                            <li>
                                <span><i class="icon icon-Mug"></i></span> 
                                <span><b class="timer" data-from="10" data-to="1624" data-speed="5000" data-refresh-interval="50">1624</b><br> Awards</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
                        <ul>
                            <li>
                                <span><i class="icon icon-Picture"></i></span> 
                                <span><b class="timer" data-from="10" data-to="1588" data-speed="5000" data-refresh-interval="50">1588</b><br> Awards</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
                        <ul>
                            <li>
                                <span><i class="icon icon-Users"></i></span> 
                                <span><b class="timer" data-from="10" data-to="9654" data-speed="5000" data-refresh-interval="50">9654</b><br> Awards</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-choose-us">
            <div class="container">
                <div class="section-title">
                    <h1>Confia en nosotros</h1>
                </div>
                <div class="row">
                    <?php foreach($choose as $info) { ?>
                        <?php if($info->vTime != ""){?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="img-wrap wow fadeInDown">
                                    <img src="<?php echo PATH_ICON_WHY_CHOOSE_US; ?>1.png" alt="">
                                </div>
                                <h4><?php echo $info->vTime; ?></h4>
                                <p><?php echo $info->vTimeInfo; ?></p>
                            </div>
                        <?php  }?>

                        <?php if($info->vTeam != ""){?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="img-wrap wow fadeInDown" data-wow-delay=".3s">
                                    <img src="<?php echo PATH_ICON_WHY_CHOOSE_US; ?>2.png" alt="">
                                </div>
                                <h4><?php echo $info->vTeam; ?></h4>
                                <p><?php echo $info->vTeamInfo; ?></p>
                            </div>
                        <?php  }?>

                        <?php if($info->vSatisfaction != ""){?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="img-wrap wow fadeInDown" data-wow-delay=".3s">
                                    <img src="<?php echo PATH_ICON_WHY_CHOOSE_US; ?>3.png" alt="">
                                </div>
                                <h4><?php echo $info->vSatisfaction; ?></h4>
                                <p><?php echo $info->vSatisfactionInfo; ?></p>
                            </div>
                        <?php  }?>	

                        <?php if($info->vEstimate != ""){?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="img-wrap wow fadeInDown" data-wow-delay=".3s">
                                    <img src="<?php echo PATH_ICON_WHY_CHOOSE_US; ?>4.png" alt="">
                                </div>
                                <h4><?php echo $info->vEstimate; ?></h4>
                                <p><?php echo $info->vEstimateInfo; ?></p>
                            </div>
                        <?php  }?>	
                    <?php  }?>
                </div>
            </div>
        </section>

        <section id="pricing-content">
            <div class="container">

                <?php 
                    $vOfferInformation = "";
                    $vInformation = "";
                    foreach($offerInformation as $info) {
                        $vOfferInformation = $info->vOfferInformation;
                        $vInformation = $info->vInformation;
                     }?>
                <div class="section-title">
                    <h1><?php echo $vOfferInformation; ?></h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p><?php echo $vInformation; ?></p>
                    </div>
                </div>
                <div class="row price-table-wrap">

                    <?php 
                        $cont = 0;
                        $class = "";
                        foreach($offer as $info) { 
                        
                        if($cont == 0) $class = "bronze";
                        if($cont == 1) $class = "silver";
                        if($cont == 2) $class = "gold";
                        if($cont == 3) $class = "platinum";
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 price-table <?php echo $class; ?> wow zoomIn " data-wow-duration=".5s" data-wow-delay="0s">
                            <div class="price-content">
                                <div class="price-table-top">
                                    <h3><?php echo $info->vOffer; ?></h3>
                                </div>
                                <div class="price-box">
                                    $ <span><?php echo $info->iPrice; ?></span>
                                </div>
                                <ul class="price-info">
                                <?php foreach($offerDetai as $infoDetail) { 
                                    
                                    if($info->idOffer == $infoDetail->idOffer){
                                ?>
                                    <li><?php echo $infoDetail->vOfferDetail; ?></li>
                                <?php }
                            } ?>
                                </ul>
                                <span class="btnPrice hvr-bounce-to-right" onclick="send_whatsapp_offer('<?php echo $vPhone;?>','<?php echo $vOfferInformation; ?>')">Contáctanos</span>
                                <!--<button class="hvr-bounce-to-right">Contáctanos</button>-->
                            </div>
                        </div>
                <?php  
                    $cont++;

                    if($cont>3){
                        $cont = 0; 
                    }
                }
                ?>

                </div>
            </div>
        </section>

        <section id="emergency" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <img class="wow bounceInLeft" src="<?php echo PATH_EMERGENCY; ?>man.png" alt="">
                    </div>
                    <div class="col-lg-offset-3 col-md-offset-3 col-lg-9 col-md-9">
                        <h2>Emergency Leaks & <span>Pipe Bursts</span></h2>
                        <p>If you have an emergency plumbing need, simply call our 24 hour emergecny plumbing</p>
                        <p class="phone-contact"><b>01865 524 8503</b> OR <a href="contact.html" class="hvr-bounce-to-right">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing-faq" class="home-v2">
            <div class="parallax-container">
                <div class="parallax bg-img-sharp-effect" data-velocity="-.5"  style="background-image: url(<?php echo PATH_RESOURCES; ?>pricing-faq-bg.jpg);"></div>
            </div>
            <div class="container">
                <div class="section-title">
                    <h1>Preguntas frecuentes</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul>
                        <?php foreach($questions as $info) { ?>
                            <li class="wow fadeIn" data-wow-duration=".5s" data-wow-delay=".5s">
                                <h2><?php echo $info->vQuestion; ?></h2>
                                <p><?php echo $info->vResponse; ?></p>
                            </li>
                        <?php  }?>	
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact-content" class="home-v2">
            <div class="container">

                <?php 
                    $vContact = "";
                    $vInformation = "";
                    foreach($contact as $info) { 
                        $vContact = $info->vContact;
                        $vInformation = $info->vInformation;
                     }?>	
                <div class="section-title">
                    <h1><?php echo $vContact;?></h1>
                </div>				
                <p><?php echo $vInformation;?></p>
                <div class="row">	
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 ">
                        <form action="#" class="contact-form">
                            <p>
                                <input type="text" id="cot_name" name="cot_name" placeholder="Nombre" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)">
                            </p>
                            <p>
                                <input type="text" id="cot_phone" name="cot_phone" placeholder="Teléfono" maxlength="10" onkeypress="return valTeclas(3,event)" onkeyup="fnValidaTeclas(3,this)" pattern="[0-9]*" inputmode="tel">
                            </p>
                            <p>
                                <input type="text" id="cot_subject" name="cot_subject" placeholder="Asunto" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)">
                            </p>
                            <p>
                                <textarea id="cot_message" name="cot_message" placeholder="Mensaje" onkeypress="return valTeclas(4,event)" onkeyup="fnValidaTeclas(4,this)"></textarea>
                            </p>
                            <p><button type="submit" onclick="BtnCot()">Enviar</button></p>
                        </form>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-4 col-xs-12  col-lg-offset-1  col-md-offset-0  col-sm-offset-0  col-xs-offset-0 contact-info">
                        <h3>Contáctanos</h3>
                        <p>¿Tienes alguna duda? <b>¡Nosotros te la resolvemos!</p>
                        <ul>
                        <?php foreach($general as $info) {?>

                            <?php if($info->vAddresses != ""){?>
                                <li class="clearfix">
                                    <img src="<?php echo PATH_ICON_CONTACT_PAGE; ?>1.png" alt=""> 
                                    <div class="content">
                                        <h4>Oficina</h4>
                                        <p><?php echo $info->vAddresses; ?></p>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if($info->vPhone != ""){?>
                                <li class="clearfix">
                                    <img src="<?php echo PATH_ICON_CONTACT_PAGE; ?>3.png" alt=""> 
                                    <div class="content">
                                        <h4>Teléfono</h4>
                                        <p><?php echo $info->vPhone; ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if($info->vEmail != ""){?>
                                <li class="clearfix">
                                    <img src="<?php echo PATH_ICON_CONTACT_PAGE; ?>2.png" alt=""> 
                                    <div class="content">
                                        <h4>Correo</h4>
                                        <p><?php echo $info->vEmail; ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </section>

        <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel owl-theme">
                            <?php foreach($client as $info) { ?>
                                <div class="item">
                                    <img src="<?php echo PATH_CLIENTS; ?><?php echo $info->vImage; ?>" alt="" style="<?php echo STYLE_MAX_HEIGHT_CLIENT;?>">
                                </div>
                            <?php  }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php') ?>
    </body>
</html>