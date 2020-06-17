<?php
session_start();

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
    <link rel="stylesheet" href="css/validation.css?v=<?php echo time(); ?>" title="registercss">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row menu" >
                <div class="logo col-12 col-md-4">
                    <a class="marca "href="index.php">BlueStone</a>
                </div>

                <div class="navegacion col-12 col-md-4">
                    <a href="#">Home</a>
                    <a href="#">Acerca de</a>
                    <a href="#">Contacto</a>
                </div>

                <div class="buttons col-12 col-md-4">
                    <a href="login.php">Iniciar sesión</a>
                    <a href="registro.php">Registrarse</a>
                </div>
            </div>
    </header>
    <div class="container">
        <div  class="contenido-horizontal mx-auto" role="contenido">
            <div class="titulo col-sm-12">
                <h2>No Te has podido registrar correctamente, Vuelve a intentarlo.</h2>
            </div>
        </div> 
    </div>
</body>
</html>