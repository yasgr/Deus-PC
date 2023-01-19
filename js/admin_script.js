//permite desplegar el menú de usuario
let perfil = document.querySelector('.header .flex .perfil');

document.querySelector('#user-btn').onclick = () =>{
    perfil.classList.toggle('active');
    navbar.classList.remove('active');

}
//permite desplegar el navbar en modo móvil
let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    profile.classList.remove('active');

}
window.onscroll = () =>{
    perfil.classList.remove('active');
    navbar.classList.remove('active');
}

let imgSecundarias = document.querySelectorAll('.actualiza-producto .img-container .img-secundarias img');
let imgPrincipal = document.querySelector('.actualiza-producto .img-container .img-principal img');

//
imgSecundarias.forEach(images =>{
    images.onclick = () =>{
        src = images.getAttribute('src');
        imgPrincipal.src = src;
    }
});