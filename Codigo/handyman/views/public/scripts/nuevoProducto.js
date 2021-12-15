/* var nombreExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/); */
var nombreExp = new RegExp(/^[a-z A-ZñÑ0-9]+$/);
var nombreValue = false;

var marcaExp = new RegExp(/^[a-z A-ZñÑ0-9]+$/);
var marcaValue = false;

const formulario = document.getElementById('formulario');
    
    $("#nombre").keyup(function (evento) {
        $("#nombre").val($("#nombre").val().toUpperCase());
        if(nombreExp.test($("#nombre").val())){
            $("#error_nombre").addClass("oculto");
            $("#error_nombre").removeClass("activo");
            nombreValue = true;
        }else{
            $("#error_nombre").addClass("activo");
            $("#error_nombre").removeClass("oculto");
            nombreValue = false;
        }
    });

    $("#marca").keyup(function (evento) {
        $("#marca").val($("#marca").val().toUpperCase());
        if(marcaExp.test($("#marca").val())){
            $("#error_marca").addClass("oculto");
            $("#error_marca").removeClass("activo");
            marcaValue = true;
        }else{
            $("#error_marca").addClass("activo");
            $("#error_marca").removeClass("oculto");
            marcaValue = false;
        }
    });

    formulario.addEventListener('submit', (e)=>{
        if(nombreValue && marcaValue){
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