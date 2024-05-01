const profileAvatarLink = document.getElementById('profile-avatar-link');
profileAvatarLink.addEventListener('mouseover', playAnimation);
profileAvatarLink.addEventListener('mouseout', stopAnimation);

let svgElement;

const objectElement = document.getElementById('profile-avatar-obj');
objectElement.onload = function() {
    let svgDoc = objectElement.contentDocument;
    svgElement = svgDoc.getElementById('profile-avatar');
}

function playAnimation() {
    svgElement?.classList.remove('pause-animation');
}

function stopAnimation() {
    svgElement?.classList.add('pause-animation');
}
