<?php
session_start();

if(!isset($_SESSION['idUser']))
    header("Location: ../index.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!--Css-->
    <link rel="stylesheet" href="../css/publicaciones.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/publicacion.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/misPublicaciones.css?v=<?php echo time(); ?>">
    
    <title>Mis publicaciones</title>
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
        <div class="row">
            <div class="col-md-12">
                <div class="tituloMisPublicaciones">
                    <h2>Mis Publicaciones</h2>
                </div>
                <div class="misPublicaciones">
                    <?php 
                        include "../conexion.php";

                        $idUser = $_SESSION['idUser'];

                        $query = "SELECT * FROM publicacion WHERE idUsuario = '$idUser' ORDER BY fechaPublicacion DESC";

                        if(mysqli_query($conn, $query)){
                            $result = mysqli_query($conn, $query);
                                
                            
                            if(mysqli_num_rows($result) > 0){ ?>
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th class="none">Categoría</th>
                                            <th class="none">Fecha de publicación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $i = 0;
                            while($publicacion = mysqli_fetch_assoc($result)): ?>                                                         
                                    
                                    <?php if(($i%2)==0){ ?>
                                        <tr class="publicacion verde">
                                    <?php } else {?>
                                        <tr class="publicacion">
                                    <?php } ?>
                                            <td><a href="publicacion.php?Pb=<?php echo $publicacion['idPublicacion']?>"><?php echo $publicacion['titulo']; ?></a></td>
                                            <td class="none"><?php echo $publicacion['categoria']; ?></td>
                                            <td class="none"><?php 
                                            $phpdate = strtotime( $publicacion['fechaPublicacion']);
                                            $mysqldate = date( 'd-m-Y', $phpdate );
                                            echo $mysqldate;
                                            ?></td>
                                            <td class="acciones">
                                                <div class="iconos">
                                                    <a data-toggle="tooltip" title="Editar publicación" href="editarPublicacion.php?Pb=<?php echo $publicacion['idPublicacion']?>">
                                                        <i class="pencil"><img src="../img/iconos/pencil.png" alt=""></i>
                                                    </a>
                                                    <a data-toggle="tooltip" class="none" title="Ver publicación" href="publicacion.php?Pb=<?php echo $publicacion['idPublicacion']?>">
                                                        <i class=""><img src="../img/iconos/visibility.png" alt=""></i>
                                                    </a>
                                                    <a data-toggle="tooltip" title="Eliminar publicación" id="borrarPublicacion" href="borrarPublicacion.php?Pb=<?php echo $publicacion['idPublicacion']?>">
                                                        <i class="trash"><img src="../img/iconos/remove.png" alt=""></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php $i++;?>
                            <?php endwhile; ?>
                                    </table>
                                </tbody>
                        <?php }
                            else {
                                echo "<h3 class='sinPublicacion'>No tenes ninguna publicación creada</h3>";
                            }
                        ?>   
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js?v=<?php echo time(); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>