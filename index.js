//–––––––––––––––––––––––––––//
//–––––––––– MODAL ––––––––––//
//–––––––––––––––––––––––––––//

var btnModal = document.getElementById('btnModal');

var modal_content = document.getElementById('modal_content');

var btnClose = document.getElementById('btnClose');

function openModal(){
    modal_content.style.display = 'block';
}

btnModal.addEventListener('click',openModal);

function closeModal(){
    modal_content.style.display = 'none';
}

btnClose.addEventListener('click',closeModal);




// var modalBg = document.getElementById("modal_bg");

// var modalBtn = document.getElementById("modal-btn");

// var modalClose = document.getElementsByClassName("modal-close")[0];

// modalBtn.onclick = function() {
//     modalBg.style.display = "block";
// }

// modalClose.onclick = function() {
//     modalBg.style.display = "none";
// }

// window.onclick = function(event) {
//     if (event.target == modalBg) {
//         modalBg.style.display = "none";
//     }
// } 
