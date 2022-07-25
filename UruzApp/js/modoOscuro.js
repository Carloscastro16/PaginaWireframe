const btnSwitch = document.querySelector('#switch');

btnSwitch.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    btnSwitch.classList.toggle('active');

if(document.body.classList.contains('dark')){ //cuando el cuerpo tiene la clase 'dark' actualmente
    localStorage.setItem('darkMode', 'enabled'); //almacenar estos datos si el modo oscuro está activado
}else{
    localStorage.setItem('darkMode', 'disabled'); //almacenar estos datos si el modo oscuro está desactivado
}
});

if(localStorage.getItem('darkMode') == 'enabled'){
document.body.classList.toggle('dark');
btnSwitch.classList.toggle('active');
workContainer.classList.toggle('dark');
}

