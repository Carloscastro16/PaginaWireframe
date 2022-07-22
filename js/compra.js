function validarCompra(form){
    if(form.sesion.value.length == 0){ 
        event.preventDefault();
        window.location.replace('../Paginas/LogIn.php');
        return false;
    }
    else{
        form.submit(); 
    }
}