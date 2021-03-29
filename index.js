//–––––––––––––––––––––––––––//
//–––––––––– MODAL ––––––––––//
//–––––––––––––––––––––––––––//

window.onload = function() {
    var btnModal = document.getElementById('btnModal');

    var modal_content = document.getElementById('modal_content');

    var btnClose = document.getElementById('btnClose');

    function openModal(){
        modal_content.style.display = 'flex';
    }

    btnModal.addEventListener('click',openModal);

    function closeModal(){
        modal_content.style.display = 'none';
    }

    btnClose.addEventListener('click',closeModal);
};



// var modal_content = document.getElementById("modal_content");

// var btnModal = document.getElementById("btnModal");

// var btnClose = document.getElementById("btnClose");

// btnModal.onclick = function() {
//     modal_content.style.display = "block";
// }

// btnClose.onclick = function() {
//     modal_content.style.display = "none";
// }

// window.onclick = function(event) {
//     if (event.target == modal_content) {
//         modal_content.style.display = "none";
//     }
// } 
