let toggle = document.querySelector('.toggle');
let body = document.querySelector('body');


toggle.addEventListener('click', function () {
    body.classList.toggle('open');
})


//Permet de masquer et demasquer les sections
//Quand on cliquer sur le Toggle
function Masquer() {

    let section = document.querySelector('section');
    let partie2 = document.querySelector('#partie2');
    let partie3 = document.querySelector('#partie3');
    let partie4 = document.querySelector('#partie4');

    section.style.display = 'none';
    partie2.style.display = 'none';
    partie3.style.display = 'none';
    partie4.style.display = 'none';

}

function Demasquer() {

    let section = document.querySelector('section');
    let partie2 = document.querySelector('#partie2');
    let partie3 = document.querySelector('#partie3');
    let partie4 = document.querySelector('#partie4');

    section.style.display = 'block';
    partie2.style.display = 'block';
    partie3.style.display = 'block';
    partie4.style.display = 'block';

}

// TIMER SESSION ERROR

let erreur = document.querySelector('.blocErreur');

setTimeout(divError, 10000);

function divError() {
    erreur.style.display = 'none';
}

/*-------- TOOLBAR TEXT ----------*/

var editor = new MediumEditor('.AjoutBlogDescription');

