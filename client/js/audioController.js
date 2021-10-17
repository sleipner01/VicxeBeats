/* Controls */
const playEl = document.getElementById("play");
const pauseEl = document.getElementById("pause");
const volumeUpEl = document.getElementById("volumeUp");
const volumeDownEl = document.getElementById("volumeDown");
const muteEl = document.getElementById("volumeMute");
const progressBarEl = document.getElementById("progressBar");
const progressBarControlEl = document.getElementById("progressBarControl");
const volumeBarEl = document.getElementById("volumeBar");
const volumeColumnEl = document.getElementById("volumeColumn");
const volumeDotEl = document.getElementById("volumeDot");

var mouseOverBar = false;
var mouseOverVolumeBar = false;

    playEl.addEventListener("click", playAudio);
    pauseEl.addEventListener("click", pauseAudio);
    volumeUpEl.addEventListener("click", mute);
    muteEl.addEventListener("click", unMute);
    progressBarEl.addEventListener("mousemove", moveController);
    progressBarEl.addEventListener("mouseleave", resetBoolean);
    progressBarEl.addEventListener("click", skipTo);
    volumeBarEl.addEventListener("mousemove", moveVolumeDot);
    volumeBarEl.addEventListener("mouseleave", resetVolumeBoolean);
    volumeBarEl.addEventListener("click", adjustVolume);


function playAudio() {
    player.playVideo();

    playEl.style.display = "none";
    pauseEl.style.display = "initial";
}

function pauseAudio() {
    player.pauseVideo();

    playEl.style.display = "initial";
    pauseEl.style.display = "none";
}

//Volume Controller
function unMute() {
    player.unMute();

    volumeUpEl.style.display = "initial";
    muteEl.style.display = "none";
}

function mute() {
    player.mute();

    volumeUpEl.style.display = "none";
    muteEl.style.display = "initial ";
}

function moveVolumeDot() {
    mouseOverVolumeBar = true;
    if(mouseOverVolumeBar == true) {
        volumeDotEl.style.left = "50px";
    }
}

function resetVolumeBoolean() {
    mouseOverBar = false; 

    resetVolumeDot();
}

function adjustVolume(e) {
    player.setVolume(40);

    //Have to set a timeout so the Youtube API have initialized the volumechange
    setTimeout(checkVolume, 100);
}

function checkVolume() {
    if(player.getVolume() <= 50) {
        volumeUpEl.style.display = "none";
        volumeDownEl.style.display = "initial"
    }
}


//Trackbar controller
function moveController(e) {
    mouseOverBar = true;

    progressBarControlEl.style.transition = "none";
    progressBarControlEl.style.left = e.clientX - 7 + "px";
}

function resetBoolean() {
    mouseOverBar = false;

    moveProgressBarDot();
}

function progressBarPassed() {
    //Show current playback in progressbar, percent of currentTimer/totalDuration
    progressBarPassedEl.style.width = Number(currentTimer.innerHTML)/Number(totalDuration.innerHTML)*100 + "%";

    //Move the controller dot
    moveProgressBarDot();
}

function moveProgressBarDot() {
    if (mouseOverBar !== true) {
        progressBarControlEl.style.transition = "1s ease-out";
        progressBarControlEl.style.left = progressBarPassedEl.style.width;
    }
}

function skipTo(e) {
    player.seekTo(e.clientX/progressBarEl.offsetWidth*player.getDuration(), true);
}