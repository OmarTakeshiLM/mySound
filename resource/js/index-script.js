let btnsAddPlaylist = document.querySelectorAll('.btn-add-playlist');
let backModal = document.querySelector('.back-modal');
let modal = document.querySelector('.modal');
let btnCrear = document.getElementById('btn-crear');
let formCrear = document.getElementById('form-crear');

for (const btn of btnsAddPlaylist) {
    btn.addEventListener('click', e => {
        backModal.style.display = "inline";
        modal.style.display = "inline";
        idTrack = btn.nextElementSibling.value;
    });
}

backModal.addEventListener('click', () => {
    backModal.style.display = "none";
    modal.style.display = "none";
});

btnCrear.addEventListener('click', async (e) => {
    e.preventDefault();
    if(idTrack > 0) {
        let dataForm = new FormData(formCrear);
        dataForm.append('idTrack', idTrack);
        fetch('./playlistController.php', {method: "POST", body: dataForm})
        .then(function(reponse) {
            return reponse.text();
        }).then(function(text) {
            if(text == 'true') {
                Swal.fire(
                    'Operación exitosa!',
                    'Se ha creado la playlist y fue agregado el track.',
                    'success'
                );
                backModal.style.display = "none";
                modal.style.display = "none";
            }else {
                Swal.fire(
                    'Upss!',
                    'Parece que hay un error.',
                    'error'
                ); 
            }
        });
    }
});