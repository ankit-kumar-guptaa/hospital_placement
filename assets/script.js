// Define animation duration in milliseconds
var animationDurationInMillis = 1000;

// At the start of animation
document.addEventListener('DOMContentLoaded', function() {
    document.body.style.overflowX = 'hidden';
    
    // After animation completes
    setTimeout(function() {
        document.body.style.overflowX = 'auto';
    }, animationDurationInMillis);
});
