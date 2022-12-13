<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BabyKeep</title>

    <link rel="stylesheet" href="css/login/bootstrap.min.css">
    <link href="css/login/styles.min.css" rel="stylesheet" />

    <!-- Favicons -->
	<link rel="shortcut icon" href="/assets/images/branch/logo.ico">
    <link rel="icon" type="image/x-icon" href="/assets/images/branch/logo.ico" />

    <link rel="apple-touch-icon" href="/assets/images/branch/logo.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/images/branch/logo.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/branch/logo.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/images/branch/logo.png">
    <!-- Js -->
    <script src="js/login/all.min.js"></script>
    <link rel="stylesheet" href="css/login/line-awesome.min.css">
    <script src="js/login/feather.min.js"></script>
    <script src="js/login/login.js"></script>

</head>
<body>

    <?php include('menuAdmin.php') ?>

    <div class="container-fluid mt-4 d-flex justify-content-center">
        <div class="card loginBox shadow  svgStyle margin-bottom2">
            <div class="card-body">
                <div class="text-center bottomLine2 margin-bottom4">
                    <h1 class="font-weight-bold ">¡Bienvenido!</h1>
                    <p class="text-success">Para continuar inicie sesión en su cuenta</p>
                </div>

                <div class=" d-flex justify-content-center">
                    <div class=" col-12">
                        <form class="margin-bottom2" action="<?php echo $helper->url("Admin","index"); ?>" method="post">

                            <div class="margin-botto3">
                                <p>Usuario</p>
                                <div class="input-group mb-2 mr-sm-2 ">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i data-feather="user"></i></div>
                                    </div>
                                    <input type="text" name="email" class="default1 form-control formS-PD-normal" placeholder="Usuario">
                                </div>
                            </div>

                            <div class="margin-botto3">
                                <p>Contraseña</p>
                                <div class="input-group mb-2 mr-sm-2 margin-bottom2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i data-feather="lock"></i></div>
                                    </div>
                                    <input type="password" name="password" id="showPass" class="default1 form-control formS-PD-normal" placeholder="Contraseña">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text input-group-textRight">
                                            <a onclick="showPassClick()"><i data-feather="eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center ">
                                <button type="submit" id="loader1" class="btn waves-effect waves-dark bt-rounded btn-primary col-4">Entrar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>

        function showPassClick() {
            var x = document.getElementById("showPass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>



    <!-- Custom Waves Effects -->
    <script src="js/login/materialize.min.js"></script>
    <script src="js/login/perfect-scrollbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="js/login/popper.min.js"></script>
    <script src="js/login/bootstrap.min.js"></script>
    <script src="js/login/jquery.min.js"></script>
    <script src="js/login/tooltips.js"></script>
    <script src="js/login/custom.js"></script>
    <script src="js/login/flatpickr.min.js"></script>
    <script src="js/login/flatpickerSales.js"></script>
    <script src="js/login/signInButtons.js"></script>
</body>
</html>