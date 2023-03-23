
let jj = localStorage.getItem('colors');
// console.log(jj);
if (jj !== null){
// console.log('there is some data in localStorage');
// localStorage.setItem('--black-color', jj);}
document.documentElement.style.setProperty('--black-color', jj);
}


document.querySelector('.toggle-settings .fa-gear').onclick = function () {

this.classList.toggle('fa-spin');
document.querySelector('.settings-Box').classList.toggle('open');

};


// nav active 
const aForAllNav = document.querySelectorAll('.topnav li');
aForAllNav.forEach(li => {
    li.addEventListener("click", (e) => {
        e.target.parentElement.querySelectorAll('.active').forEach(element => {
            element.classList.remove('active');
            });
// e.target.classList.add('active');
});

});

// Switch Colors
const colorLi = document.querySelectorAll('.colors-list li');

colorLi.forEach(li => {
li.addEventListener("click", (e) => {

// Set Color on root 
document.documentElement.style.setProperty('--black-color', e.target.dataset.color);
localStorage.setItem('colors', e.target.dataset.color);
e.target.parentElement.querySelectorAll('.active').forEach(Element => {
Element.classList.remove('active');
});
// e.target.classList.add('active');
});

});


// Select Landing page Element
let landingPage = document.querySelector('.landing-page'); 

// Get Array for imge
const imgeArray = ['01.jfif', '02.jfif', '03.jfif'];


// setInterval(() => {

    // Get Rundom Number
// var randomNumber = Math.floor(Math.random() * imgeArray.length);

// Change Background Image
// landingPage.style.backgroundImage = 'url("' + imgeArray[randomNumber] + '")';

// }, 10000);
