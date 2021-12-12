var usernameExp = new RegExp(/^[a-zA-Z0-9_ñÑ]{5,}$/);
var usernameValue = false;

var passwordExp = new RegExp(/^[a-zA-Z0-9]{8,}$/);
var passwordValue = false;

const formulario = document.getElementById('formulario');

    $("#username").keyup(function (evento) {
        $("#username").val($("#username").val().toUpperCase());
        if(usernameExp.test($("#username").val())){
            $("#error_username").addClass("oculto");
            $("#error_username").removeClass("activo");
            usernameValue = true;
        }else{
            $("#error_username").addClass("activo");
            $("#error_username").removeClass("oculto");
            usernameValue = false;
        }
    });

    $("#password").keyup(function (evento) {
        $("#password").val($("#password").val().toUpperCase());
        if(passwordExp.test($("#password").val())){
            $("#error_password").addClass("oculto");
            $("#error_password").removeClass("activo");
            passwordValue = true;
        }else{
            $("#error_password").addClass("activo");
            $("#error_password").removeClass("oculto");
            passwordValue = false;
        }
    });

    formulario.addEventListener('submit', (e)=>{
        if(usernameValue && passwordValue){
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