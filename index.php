<?php session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">

    <title>BlueStone</title>
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
                    <a href="publicaciones/index.php?do=borrarBusqueda">Publicaciones</a>
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
                            <a class="dropdown-item" href="publicaciones/subida.php">Crear publicación</a>
                            <a class="dropdown-item" href="publicaciones/misPublicaciones.php">Mis Publicaciones</a>
                            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="row img-bg">
                <div class="col-12 col-md-6">
                    <div class="textos">
                        <h1>Conectá con los profesionales que necesitás</h1>
                        <a href="registro.php">Empezá ahora!</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row resumen">
                <div class="col-12 col-md-6 textos">
                    <h2>Trabajamos para vos</h2>
                    <p>Con nosotros, vos no buscas trabajo, el trabajo te busca a vos, para que tengas la mejor experiencia.</p>
                    <p><em>“Si no puedes volar, corre, si no puedes correr, camina, si no puedes caminar, gatea, pero hagas lo que hagas, sigue adelante.”</em></p>
                </div>
                <div class="col-12 col-md-6">
                    <img src="img/ress.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="container-fluid como-funciona">
            <div class="row titulo">
                <div class="mx-auto">
                    <h2>Como funciona BlueStone</h2>
                </div>
            </div>

            <div class="row explicacion">
                <div class="col-12 col-md-4">
                    <div class="pasos">
                        <img class="img-fluid" src="img/iconos/employee.png" alt="">
                        <h3>Crea tu perfil</h3>
                        <p class="text-light">En un simple paso registrate en nombredeempresa y empezá a crear tu futuro.</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="pasos">
                        <img class="img-fluid" src="img/iconos/conference.png" alt="">
                        <h3>Publicá</h3>
                        <p class="text-light">Mostrá a que te dedicas, subiendo tu CV y agregandole una categoría para que te encuentren fácilmente</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="pasos">
                        <img class="img-fluid" src="img/iconos/deal.png" alt="">
                        <h3>Empezá a trabajar</h3>
                        <p class="text-light">Una vez anunciado tu empleo, empresas te empezarán a contactar para que apliques en su puesto.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto btn-crear-cuenta">
                    <a href="registro.php">Crear cuenta</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>