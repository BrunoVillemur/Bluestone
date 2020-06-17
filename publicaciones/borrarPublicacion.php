<?php
session_start();

if(isset($_SESSION['idUser']) && isset($_GET['Pb'])){
    
    $idPublicacion = $_GET['Pb'];

    // Valido que exista esa publicacion

    $query = "SELECT * FROM publicacion WHERE idPublicacion = '$idPublicacion'";

    include "../conexion.php";

    if(mysqli_query($conn, $query)) {
        $result = mysqli_query($conn, $query);     
        if(mysqli_num_rows($result) > 0) {
            $fila = mysqli_fetch_array($result);
            $idUsuario = $fila['idUsuario'];

            if($_SESSION['idUser'] == $idUsuario) {
                $delete = "DELETE FROM publicacion WHERE idPublicacion = '$idPublicacion'";

                if (mysqli_query($conn, $delete)) {
                    $_SESSION['publicacionBorrada'] = "Publicacion borrada satisfactoriamente";
                    mysqli_close($conn);
                } else {
                    $_SESSION['publicacionBorrada'] = "No se pudo borrar la publicación";
                    header("Location: publicacion.php?Pb=".$idPublicacion);
                }
            }

        }
    }
}

header("Location: index.php?categoria=todas&page=0");

?>