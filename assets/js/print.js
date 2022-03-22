// document.addEventListener('DOMContentLoaded', () => {
//     const frame = document.getElementsByClassName('frame');
//     frame.forEach(element => {
//         element.addEventListener('click', (event) => {
//             event.preventDefault();
//         })

//         })
// });


// let img = document.createElement("img");
// img.src = "{{ asset('build/images/formulaire-adhesion.png') }}";
// img.setAttribute("style", "margin-top: 80px;");

// let div = document.getElementById("x");
// div.appendChild(img);
// div.setAttribute("style", "text-align:center");




// function print() {
//     let frame = document.getElementById('frame');
//     let form = frame.getAttribute('href');
//     form.print();
// }
// console.log('coucou');


// function myFunction() {
//   let x = document.createElement("IMG");
//   x.setAttribute("build/images/", "formulaire-adhesion.png");
//   x.setAttribute("width", "304");
//   x.setAttribute("height", "228");
//   x.setAttribute("alt", "The Pulpit Rock");
//   document.body.appendChild(x);
// }
function print() {
    let frame = document.getElementById('frame');
    // frame.contentWindow.focus();
    frame.contentWindow.print();
}