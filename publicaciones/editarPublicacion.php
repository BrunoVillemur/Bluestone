<?php
session_start();

if(!isset($_SESSION['idUser']))
    header("Location: ../index.php");


if(isset($_GET['Pb'])){

    $idPublicacion = $_GET['Pb'];

    // Valido que exista esa publicacion

    $query = "SELECT * FROM publicacion WHERE idPublicacion = '$idPublicacion'";

    include "../conexion.php";

    if(mysqli_query($conn, $query)) {
        $result = mysqli_query($conn, $query);     
        if(mysqli_num_rows($result) > 0) {
            $fila = mysqli_fetch_array($result);
            $idUsuario = $fila['idUsuario'];

            if($_SESSION['idUser'] != $idUsuario) {

                header("Location: publicacion.php?Pb=".$idPublicacion);
            }
            else {
                $titulo = $fila['titulo'];
                $descripcion = $fila['descripcion'];
                $categoria = $fila['categoria'];
                $curriculum = $fila['curriculum'];

                mysqli_close($conn);
            }

        }
        else
            header("Location: publicacion.php?Pb=".$idPublicacion);
    }
    else
        header("Location: publicacion.php?Pb=".$idPublicacion);
}
else
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
    <link rel="stylesheet" href="../css/register-login.css?v=<?php echo time(); ?>" title="registercss">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <script src="js/validarModificacion.js"></script>
    <title>Editar Publicación - BlueStone</title>
</head>
<body>
<header>
        <div class="container-fluid">
            <div class="row menu" >
                <div class="logo col-12 col-lg-4 enlaces">
                    <a class="marca "href="index.php">BlueStone</a>
                </div>

                <div class="navegacion col-12 col-lg-4 enlaces">
                    <a href="index.php">Home</a>
                    <a href="index.php?do=borrarBusqueda">Publicaciones</a>
                </div>        
                
                <?php if(!isset($_SESSION['idUser'])):?>
                <div class="buttons col-12 col-lg-4 enlaces">
                    <a href="login.php">Iniciar sesión</a>
                    <a href="registro.php">Registrarse</a>                    
                </div>

                <?php else: ?>
                <div class="menu-usuario col-12 col-lg-4 enlaces">
                    <div class="nav-item dropdown nav-perfil">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['userName']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="subida.php">Crear publicación</a>
                        <a class="dropdown-item" href="misPublicaciones.php">Mis Publicaciones</a>
                        <a class="dropdown-item" href="../logout.php">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="container">
        <form action="guardarModificacion.php?Pb=<?php echo $idPublicacion; ?>" class="form-horizontal mx-auto form-subida" role="form" method="POST" enctype="multipart/form-data" onsubmit="return validar()">   
            <div class="titulo col-sm-12">
                <h2>Edición de Publicación</h2>
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
                <label for="title" class="control-label col-sm-12">Título *</label>
                <div class="col-sm-12">
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $titulo; ?>" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-12 control-label">Breve Descripción *</label>
                <div class="col-sm-12">
                <textarea class="form-control" id="description" name="description" rows="3" value="<?php echo $descripcion; ?>" autofocus><?php echo $descripcion; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="selectcat" class="control-label col-sm-12">Categoría *</label>
                <div class="col-sm-12">
                <select class="form-control" id="selectcat" name="categories">
                <?php 

                $categorias = array("Marketing", "Enseñanza", "Recursos Humanos", "Industrial", "Tecnología", "Diseño", "Legales", "Sin categoría");

                $flag = 0;

                foreach ($categorias as &$cat) {
                    if($cat==$categoria){
                        echo "<option value='".$cat."' selected>".$cat."</option>";
                        $flag = 1;
                    }
                    else
                        echo "<option value='".$cat."'>".$cat."</option>";
                }

                if($flag==0)
                    echo "<option hidden selected>Elige una Categoría</option>";

                ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="filecv" class="col-sm-12 control-label">Cambiar CV</label>
                <div class="col-sm-12">
                    <input name="uploadedfilecv" type="file"/>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            </div>
            
        </form> <!-- /form -->
    </div> <!-- ./container -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>