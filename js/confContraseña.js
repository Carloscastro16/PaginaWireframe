function validarCampos2(form){
    if(form.passwordConf.value == form.password.value){ 
        form.submit(); 
    }
    else{
        form.passwordConf.value = ""; form.passwordConf.focus(); 
        event.preventDefault();
        form.password.classList.add("denegada");
        alert("Las contraseñas no coinciden");
        return false;
    }
}