let pngSrc = "/profile-avatar.png";
let gifSrc = "/profile-avatar.gif";
let profileAvatar = document.getElementById("profile-avatar");

function playGif() {
    profileAvatar.src = gifSrc;
}

function stopGif() {
    profileAvatar.src = pngSrc;
}
