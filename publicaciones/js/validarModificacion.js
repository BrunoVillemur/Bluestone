function validar(){
    var titulo, descripcion, categoria, archivo, expresiontext, expresiondescr, categorias;
    titulo= document.getElementById("title").value;
    descripcion=document.getElementById("description").value;
    categoria=document.getElementById("selectcat").value;

    expresiontext = /^[ñÑÁÉÍÓÚA-Za-záéíóú _]*[ñÑÁÉÍÓÚA-Za-záéíóú][ñÑÁÉÍÓÚA-Za-záéíóú _]*$/;
    categorias=["Marketing", "Enseñanza", "Recursos Humanos", "Industrial", "Tecnología", "Diseño", "Legales", "Sin categoría"];
    expresiondescr = /^(?!\s*$)[-a-zA-Z0-9_:,.\s]/;
    
    if(titulo === "" || descripcion === "" || categoria === ""){
        alert("Todos los Datos deben estar completos.");
        return false;
    }else if(titulo.length > 50 ){
        alert("El Título es muy largo!");
        return false;
    }else if(!expresiontext.test(titulo)){
        alert("El titulo Tiene Caracteres no permitidos");
        return false;
    }else if(descripcion.length > 400){
        alert("La descripcion es demasiado larga!");
        return false;
    }else if(!expresiondescr.test(descripcion)){
        alert("La Descripcion contiene Caracteres que no son validos");
        return false;
    }else{
        var bandera=0;
        for(var i=0;i<categorias.length;i++){
            if(categoria == categorias[i]){
                bandera=1;
            }
        }
        if(bandera!=1){
            alert("Haz ingresado una categoria que no existe!");
            return false;
        }
    }
    

}