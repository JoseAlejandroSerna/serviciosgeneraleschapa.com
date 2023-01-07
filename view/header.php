
<?php
    if ($_SERVER['HTTPS'] != 'on') {
        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: ' . $url, true, 301);
        exit();
    }
?>
<head>
	<meta charset="UTF-8">
	<title>Servicios Generales Chapa</title>

    <meta name="description" content="servicios, puertas, ventanas, generales">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo PATH_RESOURCES_ADMIN;?>logo.ico">
    <link rel="apple-touch-icon" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="icon" type="image/x-icon" href="<?php echo PATH_RESOURCES_ADMIN;?>logo.ico" />

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/respond.js"></script>
	<![endif]-->


</head>