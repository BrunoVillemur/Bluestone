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

                header("Location: index.php");
            }

        }
        else
            header("Location: index.php");
    }
    else
        header("Location: index.php");
}
else
    header("Location: index.php");

if(isset($_SESSION['messageSignup']))
unset($_SESSION['messageSignup']);

$bandera=0;
if( isset($_POST['title']) ) {
    $titulo=$_POST['title'];
    }
    if( isset($_POST['description']) ) {
    $descripcion=$_POST['description'];
    }
    if( isset($_POST['categories']) ) {
    $categoria=$_POST['categories'];
    }
    // //Fecha de hoy//
    // $ahora = date("Y-m-d H:i:s");
    
    //id usuario//
    $idusuario= $_SESSION['idUser'];
    //restricciones archivo//
    $permitidos=array("application/pdf");
    $limite_kb=100000;

    $_SESSION['messageSignup'] = array();
    //titulo//
    if(trim($titulo)==''){
        $bandera=1;
        array_push($_SESSION['messageSignup'], "Ingrese un Titulo Correcto");
    }
    //Descripcion//
    if(trim($descripcion)==''){
        $bandera=1;
        array_push($_SESSION['messageSignup'], "Ingrese una Descripción valida");
    }
    //Archivo//

    $cvModificado = false;

    if(in_array($_FILES['uploadedfilecv']['type'],$permitidos) && $_FILES['uploadedfilecv']['size']<=$limite_kb*1024){    //1024 porque size toma los datos en bits//
        unlink("archivos/".$idPublicacion.".pdf");

        header("Location: index.php");

        $archivo = $_FILES['uploadedfilecv']['tmp_name'];
        $archContenido = addslashes(file_get_contents($archivo));

        $ruta= "archivos/".$idPublicacion.".pdf";
        $cvModificado = true;
        move_uploaded_file($_FILES['uploadedfilecv']['tmp_name'],$ruta);
    }else {
        // array_push($_SESSION['messageSignup'], "Error al subir el archivo.");
    }

    if($bandera==0){
        require "../conexion.php";

        if($cvModificado == true){
            $sql = "UPDATE publicacion SET 
            titulo = '$titulo',
            descripcion = '$descripcion',
            categoria = '$categoria',
            curriculum = '$ruta'
            WHERE idPublicacion = $idPublicacion";
        }
        else {
            $sql = "UPDATE publicacion SET 
            titulo = '$titulo',
            descripcion = '$descripcion',
            categoria = '$categoria'
            WHERE idPublicacion = $idPublicacion";
        }

        if (mysqli_query($conn, $sql)) {
            $_SESSION['publicacionGuardada'] = "La publicación fue actualizada <strong>exitosamente</strong>";
            unset($_SESSION['messageSignup']);
            header("Location: publicacion.php?Pb=".$idPublicacion);
        } else {
            
        }

      mysqli_close($conn);
    }else{
      header('Location: editarPublicacion.php?Pb='.$idPublicacion);
    }                    
?>