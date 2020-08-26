// Function called if AdBlock is not detected
function adBlockNotDetected() {
    const checkad = document.getElementById('ad-content');
    checkad.style.display = 'none';
}
// Function called if AdBlock is detected
function adBlockDetected() {
    const checkad = document.getElementById('ad-content');
    checkad.style.display = 'block';
}

// Recommended audit because AdBlock lock the file 'blockadblock.js'
// If the file is not called, the variable does not exist 'blockAdBlock'
// This means that AdBlock is present
if(typeof blockAdBlock === 'undefined') {
    adBlockDetected();
} else {
    blockAdBlock.onDetected(adBlockDetected);
    blockAdBlock.onNotDetected(adBlockNotDetected);
    // and|or
    blockAdBlock.on(true, adBlockDetected);
    blockAdBlock.on(false, adBlockNotDetected);
    // and|or
    blockAdBlock.on(true, adBlockDetected).onNotDetected(adBlockNotDetected);
}
