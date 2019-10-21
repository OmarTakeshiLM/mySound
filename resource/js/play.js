btnsPlay = document.getElementsByClassName('btn-play');
repro = document.getElementById('reproductor');
progress = document.querySelector('.progress');
repro.volume = .10;

window.addEventListener('load', init(), false);

function init() {
    audio = new Audio();
}

for(let btnPlay of btnsPlay) {
    btnPlay.addEventListener('click', () => {
        audio.src = btnPlay.nextElementSibling.value;
        audio.play();
    });
}

audio.addEventListener('play', () => {
    console.log(audio.readyState);
    if(repro.readyState > 0) {
        let minutes = parseInt(repro.duration / 60, 10);
        let seconds = parseInt(repro.duration % 60);
        
        console.log(minutes+":"+seconds);
    }
});
