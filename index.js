// MODAL

var modalBg = document.getElementById("modal_bg");

var modalBtn = document.getElementById("modal-btn");

var modalClose = document.getElementsByClassName("modal-close")[0];

modalBtn.onclick = function() {
    modalBg.style.display = "block";
}

modalClose.onclick = function() {
    modalBg.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modalBg) {
        modalBg.style.display = "none";
    }
} 



// SECOND ATTEMPT

// function openModal() {
//     modalBg.style.display = 'block';
// }

// modalBtn.addEventListener('click', openModal);


// function closeModal() {
//     modalBg.style.display = 'none';
// }

// modalClose.addEventListener('click', closeModal); 



// FIRST ATTEMPT

// modalBtn.addEventListener('click', function() {
//     modalBg.classList.add('bg-active');
// });

// modalClose.addEventListener('click', function() {
//     modalBg.classList.close('bg-active');
// });