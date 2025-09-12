/**
 * Google reCAPTCHA v3 integration for Hospital Placement forms
 */

// Load the reCAPTCHA API script
const loadRecaptchaScript = () => {
    const script = document.createElement('script');
    script.src = 'https://www.google.com/recaptcha/api.js?render=6Ledy8UrAAAAAGLUn3toR4y2awVaNUkt0iyOlVLU';
    document.head.appendChild(script);
};

// Initialize reCAPTCHA and set up token refreshing
const initRecaptcha = () => {
    // Wait for the reCAPTCHA API to load
    window.onload = function() {
        if (typeof grecaptcha !== 'undefined') {
            // Set up token refreshing every 90 seconds (tokens expire after 2 minutes)
            refreshRecaptchaTokens();
            setInterval(refreshRecaptchaTokens, 90000);
        }
    };
};

// Refresh reCAPTCHA tokens for all forms
const refreshRecaptchaTokens = () => {
    if (typeof grecaptcha !== 'undefined' && grecaptcha.ready) {
        grecaptcha.ready(function() {
            // Get token for employer form
            if (document.getElementById('employer-recaptcha-response')) {
                grecaptcha.execute('6Ledy8UrAAAAAGLUn3toR4y2awVaNUkt0iyOlVLU', {action: 'employer_form'})
                    .then(function(token) {
                        document.getElementById('employer-recaptcha-response').value = token;
                    });
            }
            
            // Get token for job seeker form
            if (document.getElementById('jobseeker-recaptcha-response')) {
                grecaptcha.execute('6Ledy8UrAAAAAGLUn3toR4y2awVaNUkt0iyOlVLU', {action: 'jobseeker_form'})
                    .then(function(token) {
                        document.getElementById('jobseeker-recaptcha-response').value = token;
                    });
            }
            
            // Get token for contact form
            if (document.getElementById('contact-recaptcha-response')) {
                grecaptcha.execute('6Ledy8UrAAAAAGLUn3toR4y2awVaNUkt0iyOlVLU', {action: 'contact_form'})
                    .then(function(token) {
                        document.getElementById('contact-recaptcha-response').value = token;
                    });
            }
        });
    }
};

// Load the script and initialize reCAPTCHA
loadRecaptchaScript();
initRecaptcha();