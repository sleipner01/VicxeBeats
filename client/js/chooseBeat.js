// Retrieving and Saving Youtube ID for the videoplayer
const footerEl = document.getElementsByTagName("footer");
var beats = document.getElementsByClassName("beatRow");
const audioControls = document.getElementById("audioControls");
const audioPlayer = document.getElementById("audioPlayer");
var playerAvatar = document.getElementById("playerAvatar");
var playerTitle = document.getElementById("playerTitle");
var YTVideoId = "dQw4w9WgXcQ";

var lastChosen;

for(var i = 0; i < beats.length; i++) {
    beats[i].addEventListener("click", playBeat);
}

function playBeat(e) {
    if(e.target.classList == "addCart" || e.target.parentNode.classList == "addCart") {
        return;
    } else {
        //Show the audio-controller
        audioControls.classList.add("playing");
        audioPlayer.classList.add("visPlaying")
        footerEl[0].style.margin = "0 0 100px 0";
        
        YTVideoId = e.target.parentNode.id;
        player.loadVideoById(YTVideoId)
    
        if(lastChosen !== undefined) {
            lastChosen.classList.remove("tr-active");
        }
        e.target.parentNode.classList.add("tr-active");
        lastChosen = e.target.parentNode;
    
        playerAvatar.src = lastChosen.children[0].children[0].src;
        playerTitle.innerHTML = lastChosen.children[1].innerHTML;

    }

}