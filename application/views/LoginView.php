<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcout icon" href="<?php echo base_url(); ?>assets/img/logo_sistema.png">
    <title>Inicio de sesión</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- Estilos generales -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">


    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login_styles.css">

</head>

<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="<?php echo base_url(); ?>assets/img/user.png">
                    <h3>Sistema de Registro Académico</h3>
                </div>

                <?php echo isset($error) ? $error : ''; ?>

                <form class="col-12" action="<?php echo site_url('LoginController/authe'); ?>" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Usuario" name="user">
                    </div>

                    <div class="form-group" id="password-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    </div>

                    <button type="submit" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>