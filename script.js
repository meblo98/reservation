let myform = document.querySelector('.myform')
let login = document.querySelector('#login-form')
let menubar = document.querySelector('#menu-bars')
let mynav = document.querySelector('.navbar')



login.onclick = () =>{
    myform.classList.toggle('active');
}


menubar.onclick = () =>{
    menubar.classList.toggle('fa-times');
    mynav.classList.toggle('active');
}


