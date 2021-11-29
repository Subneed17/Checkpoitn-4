document.addEventListener('DOMContentLoaded', () => {
    const frame = document.getElementsByClassName('.frame');
    frame.forEach(element => {
        element.addEventListener('click', (event) => {
            event.preventDefault();
            console.log('coucou');   
        })

        })
});

function print() {
    console.log('coucou');
    
    // event.preventDefault();
    // let frame = document.getElementById('frame');
    // event.focus();
    // frame.href.print();
}