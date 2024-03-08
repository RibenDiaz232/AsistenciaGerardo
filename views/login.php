<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acceso al sistema</title>
    <link rel="shortcut icon" href="<?php echo RUTA . 'assets/'; ?>images/tecnm.ico" />
    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo RUTA . 'assets/'; ?>css/login.css" rel="stylesheet">
    <link href="<?php echo RUTA . 'assets/'; ?>css/snackbar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>css/animate.min.css"/>
</head>

<body>

    <div class="wrapper">
        <form class="login animate__animated animate__rotateInUpLeft" id="frmLogin" autocomplete="off">
            <h1 class="title" style="font-family: Arial;">Acceder al sistema</h1>
            <div class="form-group" style="font-family: Arial;">
                <label for="email">Correo Electrónico</label>
                <input type="text" class="form-control animate__animated animate__slideInDown" style="font-family: Arial;" placeholder="Correo Electrónico" id="email" autofocus />
            </div>
            <div class="form-group" style="font-family: Arial;">
                <label for="password ">Contraseña</label>
                <input type="password" class="form-control animate__animated animate__slideInUp" style="font-family: Arial;" id="password" placeholder="Contraseña" />
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="spinner"></i>
                <span class="state">Iniciar Sesión</span>
            </button>
        </form>
        <footer><a target="blank" style="font-family: Arial;" href="https://martineztorre.tecnm.mx/">Página al Sitio Web Tec Martinez</a></footer>
    </div>

    <script src="<?php echo RUTA . 'assets/'; ?>vendor/js/jquery.min.js"></script>
    <script src="<?php echo RUTA . 'assets/'; ?>js/snackbar.min.js"></script>
    <script src="<?php echo RUTA . 'assets/'; ?>js/axios.min.js"></script>
    <script>
        const ruta = '<?php echo RUTA; ?>';
    </script>
    <script src="<?php echo RUTA . 'assets/'; ?>js/login.js"></script>
</body>

</html>