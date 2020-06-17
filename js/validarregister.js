function validar(){ 
    var nombre, apellido, email, contrasenia, confcontrasenia, cumpleaños, telefono, opcion, fotoperfil, expresionemail, expresiontext, expresioncontrasenia;

    nombre=document.getElementById("firstName").value;
    apellido=document.getElementById("lastName").value;
    email=document.getElementById("email").value;
    contrasenia=document.getElementById("pasword1").value;
    confcontrasenia=document.getElementById("confirmPassword1").value;
    cumpleaños=document.getElementById("birthDate").value;
    telefono=document.getElementById("phonenumer").value;
    opcion=document.getElementById("opcion").value;
    fotoperfil=document.getElementById("fileperfil").value;

    expresionemail= /\w+@\w+\.+[a-z]/; 
    expresiontext = /^[ñÑÁÉÍÓÚA-Za-záéíóú _]*[ñÑÁÉÍÓÚA-Za-záéíóú][ñÑÁÉÍÓÚA-Za-záéíóú _]*$/;
    expresioncontrasenia = /^[a-z0-9_-]{6,18}$/;

    if(nombre === "" || apellido === "" || email === "" || contrasenia === "" || confcontrasenia === "" || cumpleaños === "" || telefono === ""|| opcion === "" || fotoperfil === ""){
        alert("Todos los Campos deben Estar completos");
        return false;
    } 
    if(nombre.length > 20){
        alert("El nombre ingresado es muy largo!");
        return false;
    }else if(!expresiontext.test(nombre)){
        alert("El nombre tiene caracteres no permitidos o los nommbres no comienzan con mayuscula");
        return false;
    }else if(apellido.length > 20){ 
        alert("El apellido es muy largo!");
        return false;
    }else if(!expresiontext.test(apellido)){
        alert("El apellido debe comenzar con mayuscula o haz ingresado un caracter incorrecto");
        return false;
    }else if(!expresionemail.test(email)){
        alert("No has ingresado un correo valido!");
        return false;
    }else if(email.length > 30){
        alert("El Correo es demasiado largo!");
        return false;
    }else if(contrasenia.length > 18){
        alert("La contraseña es muy larga");
        return false;
    }else if(expresioncontrasenia.test(contrasenia)){
        alert("Haz ingresado una contraseña invalida");
        return false;
    }else if(contrasenia != confcontrasenia){
        alert("La contraseña no coiniciden!");
        return false;
    }else if(isNaN(telefono)){
        alert("El telefono tiene que ser un número");
        return false;
    }else if(telefono.length > 35 || telefono.length < 8){
        alert("El Teléfono debe tener entre 8 y 35 dígitos");
        return false;
    }
}