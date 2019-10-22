btnsPlay = document.getElementsByClassName('btn-play');
repro = document.getElementById('reproductor');
progress = document.querySelector('.progress');
iconVolume = document.getElementById('volume-control');
rangeVolume = document.getElementById('volume');
volumeMute = document.getElementById('volume-mute');
playStop =   document.getElementById('playStop');
let estado = false;

window.addEventListener('load', init(), false);

function init() {
    audio = new Audio();
}

for(let btnPlay of btnsPlay) {
    btnPlay.addEventListener('click', () => {
        audio.src = btnPlay.nextElementSibling.value;
        // console.log(estado);
        // if(estado) {
        //     btnPlay.textContent = 'play_arrow';
        //     audio.pause();
        //     estado = false;
        // }else {
        //     btnPlay.textContent = 'pause';
            audio.play();
            playStop.textContent = 'pause';
        //     estado = true;
        // }
    });
}

progress.addEventListener('click', e => {
    try {
        x = e.pageX - audio.offsetLeft - progress.offsetLeft;
        percent = Math.round((x * 100) / progress.offsetWidth);
        if (percent > 100) percent = 100;
        if (percent < 0) percent = 0;
        progress.style.setProperty("--value-progress", percent  +"%");
        audio.currentTime = (percent * audio.duration) / 100;
        audio.play();
    } catch (error) {
        
    }
});

audio.addEventListener('timeupdate', () => {
    // console.log('actual: '+ (audio.currentTime / audio.duration) * 100 +"%");
    progress.style.setProperty("--value-progress", (audio.currentTime / audio.duration) * 100  +"%");
});

playStop.addEventListener('click', () => {
    if(playStop.textContent == 'pause') {
        audio.pause();
        playStop.textContent = 'play_arrow';
    }else {
        audio.play();
        playStop.textContent = 'pause';
    }
});

iconVolume.addEventListener('click', () => {
    if(document.querySelector('.container-volume').style.display == "flex") {
        document.querySelector('.container-volume').style.display = "none";
    }else {
        document.querySelector('.container-volume').style.display = "flex";
    }
});

rangeVolume.addEventListener('click', () => {
    try {
        y = e.pageY - audio.offsetLeft - progress.offsetLeft;
        percent = Math.round((y * 100) / progress.offsetWidth);
        if (percent > 100) percent = 100;
        if (percent < 0) percent = 0;
        console.log(percent);
    } catch (error) {
        
    }
});

volumeMute.addEventListener('click', () => {
    if(!audio.paused && !audio.ended && 0 < audio.currentTime) {
        console.log(audio.played);
        if(audio.muted == true) {
            audio.muted = false;
        }else {
            audio.muted = true;
        }
    }
});