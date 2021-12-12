/* var nombreExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/); */
var nombreExp = new RegExp(/^[a-z A-ZñÑ]+$/);
var nombreValue = false;

var apellidoExp = new RegExp(/^[a-z A-ZñÑ]+$/);
var apellidoValue = false;

var usernameExp = new RegExp(/^[a-zA-Z0-9_ñÑ]{5,}$/);
var usernameValue = false;

var passwordExp = new RegExp(/^[a-zA-Z0-9]{6,}$/);
var passwordValue = false;

var emailExp = new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-ñÑ]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
var emailValue = false;

var telefonoExp = new RegExp(/^[0-9]{9}$/);
var telefonoValue = false;

var dniExp = new RegExp(/^[0-9]{8}[a-zA-Z]{1}$/);
var dniValue = false;
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

    $("#apellidos").keyup(function (evento) {
        $("#apellidos").val($("#apellidos").val().toUpperCase());
        if(apellidoExp.test($("#apellidos").val())){
            $("#error_apellidos").addClass("oculto");
            $("#error_apellidos").removeClass("activo");
            apellidoValue = true;
        }else{
            $("#error_apellidos").addClass("activo");
            $("#error_apellidos").removeClass("oculto");
            apellidoValue = false;
        }
    });

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

    $("#email").keyup(function (evento) {
        $("#email").val($("#email").val().toUpperCase());
        if(emailExp.test($("#email").val())){
            $("#error_email").addClass("oculto");
            $("#error_email").removeClass("activo");
            emailValue = true;
        }else{
            $("#error_email").addClass("activo");
            $("#error_email").removeClass("oculto");
            emailValue = false;
        }
    });

    $("#telefono").keyup(function (evento) {
        $("#telefono").val($("#telefono").val().toUpperCase());
        if(telefonoExp.test($("#telefono").val())){
            $("#error_telefono").addClass("oculto");
            $("#error_telefono").removeClass("activo");
            telefonoValue = true;
        }else{
            $("#error_telefono").addClass("activo");
            $("#error_telefono").removeClass("oculto");
            telefonoValue = false;
        }
    });

    $("#dni").keyup(function (evento) {
        $("#dni").val($("#dni").val().toUpperCase());
        if(dniExp.test($("#dni").val()) && esLetraCorrecta($("#dni"))){
            $("#error_dni").addClass("oculto");
            $("#error_dni").removeClass("activo");
            dniValue = true;
        }else{
            $("#error_dni").addClass("activo");
            $("#error_dni").removeClass("oculto");
            dniValue = false;
        }
    });

    function esLetraCorrecta(dni){
        //Todas estas variables son locales y, por tanto, solo podrán usarse dentro de esta función.
        let resultado = false;
        let nif = dni.val().substring(0,8);
        let letra = dni.val().substring(8,).toUpperCase();
        let letrasArray = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        let posicion = nif%23;
        if(letrasArray[posicion] == letra){
            resultado = true;
            return resultado;
        }else {
            return false;
        }
    }

    formulario.addEventListener('submit', (e)=>{
        if(nombreValue && apellidoValue  && usernameValue && passwordValue && emailValue && telefonoValue && dniValue){
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