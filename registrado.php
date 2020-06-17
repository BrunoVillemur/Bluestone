<?php session_start(); 

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
    <link rel="stylesheet" href="css/validation.css?v=<?php echo time(); ?>" title="registercss">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <title>Document</title>
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
                    <a href="#">Contacto</a>
                </div>

                <div class="buttons col-12 col-lg-4 enlaces">
                    <a href="login.php">Iniciar sesión</a>
                </div>
            </div>
    </header>
    <div class="container">
        <div  class="contenido-horizontal mx-auto" role="contenido">
            <div class="titulo col-sm-12">
                <h2>Te Haz Registrado Correctamente</h2>
            </div>
        </div> 
    </div>
</body>
</html>