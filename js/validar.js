function validar(){
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-\.]+$/;
    $(document).ready(function(){
        $("#enviar").onclick(function(){
            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var email = $("#email").val();
            var password = $("#password").val();

            if(nombre == ""){
                alert("Debe introducir un nombre");
                return false;
            }
            if(apellidos == ""){
                alert("Debe introducir los apellidos");
                return false;
            }
            if(email == "" || expr.test(email)){
                    alert("Debe introducir el correo correctamente");
                    return false;
            }
            if(password = "" || password.value.length<5){
                        alert("EL password debe tener almenos 5 caracteres.");
                        return false;
            }
        });
    });
}

/* $(document).ready(function() {
    $("#registrar").submit(function() {
        var val  =validar();        
        if (!val) event.preventDefault();
    });
}); */


/* function validar() {

    var todo_correcto = true;

    if(document.getElementById('nombre').value.length < 3){
        todo_correcto = false;
    }

    if(document.getElementById('apellidos').value.length < 5){
        todo_correcto = false;
    }

    if(isNaN(document.getElementById('password').value)){
        todo_correcto = false;
    }

    var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/;
    var email = "";//document.form1.email.value;
    if (!expresion.test(email)){
        todo_correcto = false;
    }
    if(!todo_correcto){
    alert('Algunos campos no están correctos, vuelva a revisarlos');
    }
    return todo_correcto;
} */



