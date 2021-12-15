/* var asuntoExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/); */
var asuntoExp = new RegExp(/^[a-z A-ZñÑ0-9á-úÁ-Ú,.;"']+$/);
var asuntoValue = false;

var descripcionExp = new RegExp(/^[a-z A-ZñÑ0-9á-úÁ-Ú,.;"'\n]+$/);
var descripcionValue = false;

const formulario = document.getElementById('formulario');
    
    $("#asunto").keyup(function (evento) {
        $("#asunto").val($("#asunto").val().toUpperCase());
        if(asuntoExp.test($("#asunto").val())){
            $("#error_asunto").addClass("oculto");
            $("#error_asunto").removeClass("activo");
            asuntoValue = true;
        }else{
            $("#error_asunto").addClass("activo");
            $("#error_asunto").removeClass("oculto");
            asuntoValue = false;
        }
    });

    $("#descripcion").keyup(function (evento) {
        $("#descripcion").val($("#descripcion").val().toUpperCase());
        if(descripcionExp.test($("#descripcion").val())){
            $("#error_descripcion").addClass("oculto");
            $("#error_descripcion").removeClass("activo");
            descripcionValue = true;
        }else{
            $("#error_descripcion").addClass("activo");
            $("#error_descripcion").removeClass("oculto");
            descripcionValue = false;
        }
    });

    formulario.addEventListener('submit', (e)=>{
        if(asuntoValue && descripcionValue){
            $("#error_formulario").addClass("oculto");
            $("#error_formulario").removeClass("activo");
        }
        else{
            e.preventDefault();
            console.log("errrooor");
            $("#error_formulario").addClass("activo");
            $("#error_formulario").removeClass("oculto");
        }
    });