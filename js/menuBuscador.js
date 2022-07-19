let navbar = document.querySelector('.menu');
let content = document.querySelector('.log-in');
var altura = navbar.offsetTop;
window.onscroll = () => {
    if (window.pageYOffset > altura){
        navbar.classList.add('fixed-top');
        content.style.padding = '179px 80px 80px 80px';
    }else{
        navbar.classList.remove('fixed-top');
        content.style.padding = '80px 80px 80px 80px';
    }
}