// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '200',
        width: '350',
        videoId: YTVideoId,
        playerVars: {
            'controls': 0,
            'fs': 0,
            'disablekb': 1,
            'enablejsapi': 1,
        },
        events: {
            'onStateChange': writeDuration,
        }
    });
}

//Total duration and current timestamp
const totalDuration = document.getElementById("totalDuration");
const currentTimer = document.getElementById("currentTimer");
const progressBarPassedEl = document.getElementById("progressBarPassed");


function writeDuration(event) {
    totalDuration.innerHTML = Math.floor(player.getDuration());

    getTimeStamp(event.data);
}

function getTimeStamp(playerStatus) {
    if(playerStatus == 1) {
        var getTimeHandle = setInterval(getTime, 1000);
        var progressBarPassedHandle = setInterval(progressBarPassed, 1000);
    } else {
        clearInterval(getTimeHandle);
        clearInterval(progressBarPassedHandle);
    }
}

function getTime() {
    //Write current timeStamp
    currentTimer.innerHTML = Math.floor(player.getCurrentTime());
}

