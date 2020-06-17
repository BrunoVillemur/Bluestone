<?php

include "../conexion.php";

if(isset($orden)){
    switch($orden){
        case 1:
            // Selecciono todas las publicaciones de la categoria seleccionada para calcular
            // cantidad de paginas y la paginacion
            
            if($categoria=="todas"){
                if(isset($_SESSION['busqueda'])){
                    $busqueda = $_SESSION['busqueda'];
                    $query = "SELECT * FROM publicacion WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
                }
                else
                    $query = "SELECT * FROM publicacion"; 
            }
            else{
                if(isset($_SESSION['busqueda'])){
                    $busqueda = $_SESSION['busqueda'];
                    $query = "SELECT * FROM publicacion WHERE (categoria = '$categoria') AND (titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%')";
                }
                else{
                    $query = "SELECT * FROM publicacion WHERE categoria = '$categoria'";
                }
            }

            if (mysqli_query($conn, $query)) {
                $publicaciones = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($publicaciones) > 0){
                    $cantPublicaciones = mysqli_num_rows($publicaciones);
                    $publicacionesPorPagina = 3;
                    
                    $paginas = $cantPublicaciones/$publicacionesPorPagina;
                    $paginas = ceil($paginas);
                }
            } else {

            }

            if(mysqli_num_rows($publicaciones) > 0){
                if($paginaActual > $paginas)
                    header("Location: index.php?categoria=".$categoria."&page=".($paginas-1));
            }
            break;

        case 2:
            // Traigo las publicaciones corrependientes a la pagina segun el numero
            // de publicaciones por pagina que tenga
            
            if($categoria=="todas"){
                // Verifico si 

                if(isset($_SESSION['busqueda'])){
                    $busqueda = $_SESSION['busqueda'];
                    $query = "SELECT idPublicacion, titulo, SUBSTRING(descripcion, 1, 70) AS descripcion, fechaPublicacion, categoria FROM publicacion WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' ORDER BY fechaPublicacion DESC LIMIT $desde, $publicacionesPorPagina";
                }
                else
                    $query = "SELECT idPublicacion, titulo, SUBSTRING(descripcion, 1, 70) AS descripcion, fechaPublicacion, categoria FROM publicacion ORDER BY fechaPublicacion DESC LIMIT $desde, $publicacionesPorPagina";
            }
            else{
                if(isset($_SESSION['busqueda'])){
                    $busqueda = $_SESSION['busqueda'];
                    $query = "SELECT idPublicacion, titulo, SUBSTRING(descripcion, 1, 70) AS descripcion, fechaPublicacion, categoria FROM publicacion WHERE (categoria = '$categoria') AND (titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY fechaPublicacion DESC LIMIT $desde, $publicacionesPorPagina";
                }
                else{
                    $query = "SELECT idPublicacion, titulo, SUBSTRING(descripcion, 1, 70) AS descripcion, fechaPublicacion, categoria FROM publicacion WHERE categoria = '$categoria' ORDER BY fechaPublicacion DESC LIMIT $desde, $publicacionesPorPagina ";
                }
            }
            break;
        default:
            echo "Orden no válida";
    }
}
?>