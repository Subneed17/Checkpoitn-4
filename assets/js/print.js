// document.addEventListener('DOMContentLoaded', () => {
//     const frame = document.getElementsByClassName('.frame');
//     frame.forEach(element => {
//         element.addEventListener('click', (event) => {
//             event.preventDefault();
//             console.log('coucou');   
//         })

//         })
// });

// function print() {
//     console.log('coucou');
// addEventListener.focus;
// addEventListener.print;
// }
function print() {
    let frame = document.getElementById('frame');
    frame.contentWindow.focus();
    frame.contentWindow.print();
}
