const btnMenu = document.querySelector('#menuLogin');
const inicio = document.querySelector('#menuInicio');
const imagenInicio = document.querySelector('#imagenInicio');
const imagenRegistro = document.querySelector('#imagenRegistro');

btnMenu.addEventListener('click', () => {
    btnMenu.classList.toggle('active');
    inicio.classList.toggle('collapse');
    imagenInicio.classList.toggle('collapse');
    imagenRegistro.classList.toggle('collapse');

});
$(function() {
    var animateIn = 'animated fadeIn';
    var animateOut = 'animated fadeOut collapsing-delay';
    
    $('#menuLogin').on('show.bs.collapse', function () {
        // do something…
        $(this).addClass(animateIn).on('shown.bs.collapse',                            
        function() {                                                   
            $(this).removeClass(animateIn);
        });
    })
    
    $('#menuLogin').on('hide.bs.collapse', function () {
        // do something…
        $(this).addClass(animateOut).on('hidden.bs.collapse',
        function() {
            $(this).removeClass(animateOut);
        });
    })
    
    })