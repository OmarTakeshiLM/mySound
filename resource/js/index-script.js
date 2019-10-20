let btnsAddPlaylist = document.querySelectorAll('.btn-add-playlist');
let backModal = document.querySelector('.back-modal');
let modal = document.querySelector('.modal');

for (const btn of btnsAddPlaylist) {
    btn.addEventListener('click', e => {
        backModal.style.display = "inline";
        modal.style.display = "inline";
    });
}

backModal.addEventListener('click', () => {
    backModal.style.display = "none";
    modal.style.display = "none";
});