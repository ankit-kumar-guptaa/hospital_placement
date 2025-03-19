<!-- cookie-consent.php -->
<style>
/* Cookie Popup Styling */
.cookie-consent {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    max-width: 90%;
    width: 650px;
    background: linear-gradient(135deg, #ffffff, #e6f0fa);
    padding: 25px 35px;
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(0, 0, 76, 0.1), 0 5px 15px rgba(0, 0, 76, 0.05);
    z-index: 1000;
    display: none;
    font-family: 'Poppins', 'Arial', sans-serif;
    border: 1px solid rgba(204, 219, 232, 0.7);
    backdrop-filter: blur(8px);
    overflow: hidden;
    animation: fadeInSlideUp 0.6s ease-out forwards;
}

@keyframes fadeInSlideUp {
    from {
        opacity: 0;
        transform: translate(-50%, 50px);
    }
    to {
        opacity: 1;
        transform: translate(-50%, 0);
    }
}

/* Header Section with Icon */
.cookie-header {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
    position: relative;
}

.cookie-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #4a90e2, #50e3c2);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.cookie-icon svg {
    width: 28px;
    height: 28px;
    fill: #ffffff;
}

/* Text Styling */
.cookie-consent h3 {
    margin: 0 0 10px;
    color: #2c5282;
    font-size: 22px;
    font-weight: 700;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: linear-gradient(90deg, #2c5282, #4a90e2);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.cookie-consent p {
    margin: 0 0 20px;
    font-size: 15px;
    color: #4a5568;
    line-height: 1.7;
    text-align: center;
    padding: 0 10px;
}

.cookie-consent p a {
    color: #4a90e2;
    text-decoration: none;
    font-weight: 600;
    position: relative;
    transition: color 0.3s ease;
}

.cookie-consent p a:hover {
    color: #357abd;
}

.cookie-consent p a:after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #4a90e2;
    transition: width 0.3s ease;
}

.cookie-consent p a:hover:after {
    width: 100%;
}

/* Buttons Styling */
.cookie-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 15px;
}

.cookie-btn {
    padding: 12px 28px;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.4s ease;
    font-family: 'Poppins', 'Arial', sans-serif;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
    outline: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.accept-btn {
    background: linear-gradient(135deg, #4a90e2, #50e3c2);
    color: white;
}

.accept-btn:hover {
    background: linear-gradient(135deg, #357abd, #38b2ac);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(74, 144, 226, 0.4);
}

.accept-btn:active {
    transform: translateY(0);
}

.deny-btn {
    background: #ffffff;
    color: #718096;
    border: 1px solid #e2e8f0;
}

.deny-btn:hover {
    background: #f7fafc;
    color: #4a5568;
    border-color: #cbd5e0;
    transform: translateY(-2px);
}

.deny-btn:active {
    transform: translateY(0);
}

/* Button Glow Effect */
.cookie-btn:before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 0;
}

.cookie-btn:hover:before {
    opacity: 1;
}

.cookie-btn span {
    position: relative;
    z-index: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cookie-consent {
        width: 85%;
        padding: 20px 25px;
    }

    .cookie-icon {
        width: 40px;
        height: 40px;
    }

    .cookie-icon svg {
        width: 22px;
        height: 22px;
    }

    .cookie-consent h3 {
        font-size: 18px;
    }

    .cookie-consent p {
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .cookie-consent {
        width: 90%;
        padding: 15px 20px;
        border-radius: 15px;
    }

    .cookie-buttons {
        flex-direction: column;
        gap: 10px;
    }

    .cookie-btn {
        width: 100%;
        padding: 10px 20px;
        font-size: 14px;
    }
}
</style>

<div class="cookie-consent" id="cookieConsent">
    <div class="cookie-header">
        <div class="cookie-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M257.5 27.6c-.8-5.4-4.9-9.8-10.3-10.6c-22.1-3.1-44.6 .9-64.4 11.4l-74 39.5C89.1 78.4 73.2 94.9 63.4 115L26.7 190.6c-9.8 20.1-13 42.9-9.1 64.9l14.5 82.8c3.9 22.1 14.6 42.3 30.7 57.9l60.3 58.4c16.1 15.6 36.6 25.6 58.7 28.7l83 11.7c22.1 3.1 44.6-.9 64.4-11.4l74-39.5c19.7-10.5 35.6-27 45.4-47.2l36.7-75.5c9.8-20.1 13-42.9 9.1-64.9c-.9-5.3-5.3-9.3-10.6-10.1c-51.5-8.2-92.8-47.1-104.5-97.4c-1.8-7.6-8-13.4-15.7-14.6c-54.6-8.7-97.7-52-106.2-106.8zM208 208c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32zm0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm160 0c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"/>
            </svg>
        </div>
    </div>
    <h3>Cookie Consent</h3>
    <p>
        We use cookies to improve your experience on <a href="https://hospitalplacement.com">hospitalplacement.com</a>. By clicking "Accept", you agree to our use of cookies as outlined in our <a href="../privacy-policy.php">Privacy Policy</a>. Choose "Deny" to opt out of non-essential cookies.
    </p>
    <div class="cookie-buttons">
        <button class="cookie-btn accept-btn" onclick="acceptCookies()"><span>Accept</span></button>
        <button class="cookie-btn deny-btn" onclick="denyCookies()"><span>Deny</span></button>
    </div>
</div>

<script>
    // Check if cookie consent is already given
    document.addEventListener("DOMContentLoaded", function () {
        const cookieConsent = getCookie("cookieConsent");
        if (!cookieConsent) {
            document.getElementById("cookieConsent").style.display = "block";
        } else if (cookieConsent === "accepted") {
            enableTracking();
        } else if (cookieConsent === "denied") {
            disableTracking();
        }
    });

    // Function to set a cookie
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Function to get a cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i].trim();
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Accept Cookies Logic
    function acceptCookies() {
        setCookie("cookieConsent", "accepted", 365); // Cookie for 1 year
        enableTracking();
        document.getElementById("cookieConsent").style.display = "none";
        console.log("Cookies accepted. Tracking enabled.");
    }

    // Deny Cookies Logic
    function denyCookies() {
        setCookie("cookieConsent", "denied", 1); // Cookie for 1 day
        disableTracking();
        document.getElementById("cookieConsent").style.display = "none";
        console.log("Cookies denied. Tracking disabled.");
    }

    // Function to enable tracking (e.g., Google Analytics)
    function enableTracking() {
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
            console.log("Tracking enabled via Google Analytics.");
        } else {
            console.log("No tracking script detected (e.g., Google Analytics).");
        }
    }

    // Function to disable tracking (e.g., Google Analytics)
    function disableTracking() {
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'denied'
            });
            console.log("Tracking disabled via Google Analytics.");
        } else {
            console.log("No tracking script detected (e.g., Google Analytics).");
        }
    }
</script>