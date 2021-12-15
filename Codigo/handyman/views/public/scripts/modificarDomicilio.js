/* var nombreExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/); */
var calleExp = new RegExp(/^[a-z A-ZñÑ]+$/);
var calleValue = false;

var numeroExp = new RegExp(/^[0-9]{1,3}$/);
var numeroValue = false;

var pisoExp = new RegExp(/^[0-9]{1,2}$/);
var pisoValue = false;

var puertaExp = new RegExp(/^[a-zA-Z]{1}$/);
var puertaValue = false;
const formulario = document.getElementById('formulario');
    
    $("#calle").keyup(function (evento) {
        $("#calle").val($("#calle").val().toUpperCase());
        if(calleExp.test($("#calle").val())){
            $("#error_calle").addClass("oculto");
            $("#error_calle").removeClass("activo");
            calleValue = true;
        }else{
            $("#error_calle").addClass("activo");
            $("#error_calle").removeClass("oculto");
            calleValue = false;
        }
    });

    $("#numero").keyup(function (evento) {
        $("#numero").val($("#numero").val().toUpperCase());
        if(numeroExp.test($("#numero").val())){
            $("#error_numero").addClass("oculto");
            $("#error_numero").removeClass("activo");
            numeroValue = true;
        }else{
            $("#error_numero").addClass("activo");
            $("#error_numero").removeClass("oculto");
            numeroValue = false;
        }
    });

    $("#piso").keyup(function (evento) {
        $("#piso").val($("#piso").val().toUpperCase());
        if(pisoExp.test($("#piso").val())){
            $("#error_piso").addClass("oculto");
            $("#error_piso").removeClass("activo");
            pisoValue = true;
        }else{
            $("#error_piso").addClass("activo");
            $("#error_piso").removeClass("oculto");
            pisoValue = false;
        }
    });

    $("#puerta").keyup(function (evento) {
        $("#puerta").val($("#puerta").val().toUpperCase());
        if(puertaExp.test($("#puerta").val())){
            $("#error_puerta").addClass("oculto");
            $("#error_puerta").removeClass("activo");
            puertaValue = true;
        }else{
            $("#error_puerta").addClass("activo");
            $("#error_puerta").removeClass("oculto");
            puertaValue = false;
        }
    });

    formulario.addEventListener('submit', (e)=>{
        if(calleValue && numeroValue  && pisoValue && puertaValue){
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