$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();

    var botonBorrar = $("#borrarPublicacion");

    botonBorrar.click(function(event){      
        var respuesta = confirm("¿Desea eliminar esta publicación?");

        if(respuesta==false){
            event.preventDefault();
        }
    });

});