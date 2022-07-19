let 
function validarCampos2(form){
    if(form.passwordConf.value == form.password.value){ 
        form.submit(); 
    }
    else{
        alert("La contraseña no coincide.");
        form.passwordConf.value = ""; form.passwordConf.focus(); 
        event.preventDefault();
        window.location.href = "../Paginas/SignIn.html";
        return false;
    }
}