// Animation ke start pe
document.body.style.overflowX = 'hidden';

// Animation ke complete hone ke baad
setTimeout(function() {
    document.body.style.overflowX = 'auto';
}, animationDurationInMillis); // Replace with your animation duration
