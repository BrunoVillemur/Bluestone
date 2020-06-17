<?php
session_start();
if(isset($_SESSION['messageSignup']))
    unset($_SESSION['messageSignup']);
//validaciones//
    $bandera=0;
    if( isset($_POST['firstName']) ) {
    $nombre=$_POST['firstName'];
    }
    if( isset($_POST['lastName']) ) {
    $apellido=$_POST['lastName'];
    }
    if( isset($_POST['email']) ) {
    $email=$_POST['email'];
    }
    if( isset($_POST['password']) ) {
    $pasword=$_POST['password'];
    }
    if( isset($_POST['confirmPassword']) ) {
    $rqpasword=$_POST['confirmPassword'];
    }
    if( isset($_POST['birthDate']) ) {
    $date=$_POST['birthDate'];
    }
    if( isset($_POST['phone']) ) {
    $telefono=$_POST['phone'];
    }
    if( isset($_POST['genero']) ) {
    $genero=$_POST['genero'];
    }
    
    $permitidos=array("image/jpg","image/jpeg", "image/png"); //lo odio!//
    $limite_kb=720000;

    $_SESSION['messageSignup'] = array();

    //nombre//
    if(trim($nombre)==''){
        $bandera=1;
    }else{
        if( (ctype_alpha ( $nombre )) == true){ //validacion de solo letras//
        }else{
            $bandera=1;
            array_push($_SESSION['messageSignup'], "Ingrese solo letras en el nombre");
            
        }
    }

    //Apellido//
    if(trim($apellido)==''){
        $bandera=1;
        array_push($_SESSION['messageSignup'], "Ingrese su apellido");
    }
    
    //Email//
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
        $bandera=1;
    }else{ //validacion de que no haya mas de un mail igual//
        require "conexion.php";
        $query = "SELECT * FROM usuario WHERE email = '$email'"; 
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0){
            $bandera=1;
            array_push($_SESSION['messageSignup'], "El email ingresado ya se encuentra registrado");
        }
    }
    
    //password//
    if(trim($pasword)==''){
        $bandera=1;
    }else{
        if($pasword==$rqpasword){
            $pasword_cifrada=password_hash($pasword, PASSWORD_DEFAULT);
        }else{
            $bandera=1;
            array_push($_SESSION['messageSignup'], "Las contraseñas no coinciden");
        }
    }
    //Fecha nacimiento//
    $birth = $_POST['birthDate'];
    $date = new Datetime($birth);
    $hasta = new Datetime ('today');
    $edad= $date->diff($hasta)->y;
    if($edad<18 || $edad > 99){
        $bandera=1;
        array_push($_SESSION['messageSignup'], "Debe ser mayor de edad y menor de 99 años.");
    }
    //Telefono//
    if( (is_numeric ( $telefono ) )==true){

    }else{
        $bandera=1;
    }
    //Subida Imagen//
    if(in_array($_FILES['uploadedfile']['type'],$permitidos) && $_FILES['uploadedfile']['size']<=$limite_kb*1024){    //1024 porque size toma los datos en bits//
        $image = $_FILES['uploadedfile']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        require "conexion.php";
        $sql="SELECT * from usuario order by idUsuario desc limit 1";

        $result=mysqli_query($conn,$sql);
        $id=1;
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = ($row['idUsuario']+1);
            }
        }       
        $ruta= "img/perfil/".$id.".png";
        mysqli_close($conn);
        move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$ruta);
    }else {
        $bandera=1;   
        array_push($_SESSION['messageSignup'], "Error al ingresar imágen.");
    }

    if($bandera==0){
        require "conexion.php";
        $sql="INSERT INTO usuario (nombre, apellido, email, password,tipoUsuario, fechaNac, foto, nroTelefono, Genero) VALUES ('$nombre', '$apellido', '$email', '$pasword_cifrada','Normal', '$birth', '$ruta', '$telefono', '$genero')";
        if (mysqli_query($conn, $sql)) {
        } else {
        }
        mysqli_close($conn);
        unset($_SESSION['messageSignup']);
        header('Location: registrado.php');
    }else{
      header('Location: registro.php');
    }
?>




