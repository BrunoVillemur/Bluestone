<?php
session_start();

if(isset($_SESSION['idUser']))
    header("Location: index.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet"> 
    <!--Css-->
    <link rel="stylesheet" href="css/register-login.css?v=<?php echo time(); ?>" title="registercss">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <script src="js/validarregister.js"></script>

    <title>Registro de usuario - Bluestone</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row menu" >
                <div class="logo col-12 col-lg-4 enlaces">
                    <a href="index.php">BlueStone</a>
                </div>

                <div class="navegacion col-12 col-lg-4 enlaces">
                    <a href="index.php">Home</a>
                    <a href="publicaciones/index.php?do=borrarBusqueda">Publicaciones</a>
                </div>

                <div class="buttons col-12 col-lg-4 enlaces">
                    <a href="login.php">Iniciar sesión</a>
                </div>
            </div>
    </header>

    <div class="container">
        <form action="validacion.php" class="form-horizontal mx-auto" role="form" method="POST" enctype="multipart/form-data" onsubmit="return validar();">   
            <div class="titulo col-sm-12">
                <h2>Registrate</h2>
            </div>
            <?php if(isset($_SESSION['messageSignup'])){ 
                if(is_array($_SESSION['messageSignup'])){ ?>
                    <div class="bg-danger text-white alert">
                    <p><?php foreach($_SESSION['messageSignup'] as $mensaje)
                        echo "* ".$mensaje."<br>";          
                        ?>
                    </p>
                </div>
                <?php } else{ ?>
                    <div class="bg-danger text-white alert">
                    <p><?php echo "* ".$_SESSION['messageSignup'];?></p>
                    </div>
                <?php }
                } 
                unset($_SESSION['messageSignup']);
                ?>
            <div class="form-group">
                <label for="firstName" class="control-label col-sm-12">Nombre</label>
                <div class="col-sm-12">
                    <input type="text" id="firstName" name="firstName" placeholder="Ingrese el Nombre Completo" class="form-control" value="" autofocus >
                </div>
            </div>
            <div class="form-group">
                <label for="lastName1" class="col-sm-12 control-label">Apellido</label>
                <div class="col-sm-12">
                    <input type="text" name="lastName" id="lastName" placeholder="Ingrese el Nombre Completo" class="form-control" value="" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="email1" class="col-sm-12 control-label">Email</label>
                <div class="col-sm-12">
                    <input type="email" name="email" id="email" placeholder="Ingrese el Email" class="form-control" value="" >
                </div>
            </div>
            <div class="form-group">
                <label for="password1" class="col-sm-12 control-label">Contraseña</label>
                <div class="col-sm-12">
                    <input type="password" id="pasword1"  name="password" placeholder="Ingrese la Contraseña" class="form-control" value="" >
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword1" class="col-sm-12  control-label">Confirma La Contraseña</label>
                <div class="col-sm-12">
                    <input type="password" id="confirmPassword1" id="email" name="confirmPassword" placeholder="Vuelva a ingresar la Contraseña" class="form-control" value="" autofocus >
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate1" class="col-sm-12 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-12">
                    <input type="date" id="birthDate" name="birthDate" class="form-control" value="" >
                </div>
            </div>
            <div class="form-group">
                <label for="phone1" class="col-sm-12 control-label">Numero de Telefono</label>
                <div class="col-sm-12">
                    <input type="phone" id="phonenumer" name="phone" placeholder="Ingrese el Numero de Telefono" class="form-control" value="" autofocus >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-12">Genero:</label>
                <div class="col-sm-12">
                    <div class="row genero">
                        <div class="col-sm-3">
                            <label class="radio-inline">
                                <input type="radio" id="opcion" name="genero" id="femaleRadio" value="Mujer"> Mujer
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="radio-inline">
                                <input type="radio" id="opcion" name="genero" id="maleRadio" value="Hombre"> Hombre
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="radio-inline">
                                <input type="radio" id="opcion" name="genero" id="uncknownRadio" value="Indefinido" checked> Indefinido
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="col-sm-12 control-label">Foto de Perfil</label>
                <div class="col-sm-12">
                    <input name="uploadedfile" id="fileperfil" type="file" />
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Registrarse">
            </div>
            
        </form> <!-- /form -->
    </div> <!-- ./container -->
</body>
</html>