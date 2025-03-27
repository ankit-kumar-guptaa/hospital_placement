<!-- Country Selection Popup -->
<div class="popup-overlay" id="countryPopup">
    <div class="popup-content">
        <h2>Select Your Country</h2>
        <div class="country-option" data-country="us">
            <img src="https://cdn.britannica.com/79/4479-050-6EF87027/flag-Stars-and-Stripes-May-1-1795.jpg" alt="US Flag"> United States
        </div>
        <div class="country-option" data-country="india">
            <img src="https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg" alt="India Flag"> India
        </div>
        <div class="country-option" data-country="germany">
            <img src="https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg" alt="Germany Flag"> Germany
        </div>
        <div class="country-option" data-country="japan">
            <img src="https://upload.wikimedia.org/wikipedia/en/9/9e/Flag_of_Japan.svg" alt="Japan Flag"> Japan
        </div>
        <div class="country-option" data-country="singapore">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Flag_of_Singapore.svg" alt="Singapore Flag"> Singapore
        </div>
        <!-- Add Europe Option -->
<div class="country-option" data-country="europe">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Flag_of_Europe.svg" alt="Europe Flag"> Europe
</div>
        <div class="country-option" data-country="other">
            <span class="globe-icon">🌐</span> Other
        </div>
    </div>
</div>

<style>
    /* Enhanced Popup Overlay */
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(5px);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.4s cubic-bezier(0.19, 1, 0.22, 1);
    }

    /* Enhanced Popup Content */
    .popup-content {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        padding: 35px 30px;
        border-radius: 20px;
        text-align: center;
        width: 400px;
        max-width: 90%;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(255, 255, 255, 0.15);
        border: none;
        position: relative;
        overflow: hidden;
        animation: slideUp 0.5s cubic-bezier(0.19, 1, 0.22, 1);
    }

    /* Decorative Elements */
    .popup-content:before {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: radial-gradient(circle, rgba(74, 144, 226, 0.08) 0%, rgba(74, 144, 226, 0) 70%);
        border-radius: 50%;
        top: -90px;
        right: -90px;
        z-index: -1;
    }

    .popup-content:after {
        content: '';
        position: absolute;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(74, 144, 226, 0.05) 0%, rgba(74, 144, 226, 0) 70%);
        border-radius: 50%;
        bottom: -75px;
        left: -75px;
        z-index: -1;
    }

    /* Enhanced Heading */
    .popup-content h2 {
        font-family: 'Segoe UI', 'Arial', sans-serif;
        font-size: 26px;
        color: #2c3e50;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
        border-bottom: none;
        font-weight: 600;
        letter-spacing: -0.5px;
    }

    .popup-content h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #4a90e2, #5ca6ff);
        border-radius: 3px;
    }

    /* Country Container */
    .country-container {
        max-height: 400px;
        overflow-y: auto;
        margin: 0 -15px;
        padding: 5px 15px;
    }

    /* Scrollbar Styling */
    .country-container::-webkit-scrollbar {
        width: 6px;
    }

    .country-container::-webkit-scrollbar-track {
        background: #f0f4f8;
        border-radius: 10px;
    }

    .country-container::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #4a90e2, #6babf5);
        border-radius: 10px;
    }

    /* Enhanced Country Option */
    .country-option {
        display: flex;
        align-items: center;
        padding: 14px 18px;
        margin: 8px 0;
        cursor: pointer;
        background: #f7f9fc;
        border-radius: 12px;
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        position: relative;
        border-left: 3px solid transparent;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
        animation: slideIn 0.5s backwards;
    }

    /* Staggered Animation for Country Options */
    .country-option:nth-child(1) { animation-delay: 0.1s; }
    .country-option:nth-child(2) { animation-delay: 0.15s; }
    .country-option:nth-child(3) { animation-delay: 0.2s; }
    .country-option:nth-child(4) { animation-delay: 0.25s; }
    .country-option:nth-child(5) { animation-delay: 0.3s; }
    .country-option:nth-child(6) { animation-delay: 0.35s; }
    .country-option:nth-child(7) { animation-delay: 0.4s; }

    .country-option:hover {
        background: linear-gradient(135deg, #4a90e2, #5ea2ef);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(74, 144, 226, 0.35);
        border-left: 3px solid #3a7bc8;
    }

    .country-option:active {
        transform: translateY(0);
        box-shadow: 0 4px 10px rgba(74, 144, 226, 0.25);
    }

    /* Country Name */
    .country-name {
        font-weight: 500;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .country-option:hover .country-name {
        transform: translateX(3px);
    }

    /* Enhanced Flag Image */
    .country-option img {
        width: 40px;
        height: 40px;
        margin-right: 16px;
        border-radius: 20%;
        object-fit: fill;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        border: 2px solid white;
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .country-option:hover img {
        transform: scale(1.15) rotate(5deg);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced Globe Icon */
    .globe-icon {
        font-size: 32px;
        margin-right: 16px;
        background: -webkit-linear-gradient(#4a90e2, #5ca6ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .country-option:hover .globe-icon {
        transform: rotate(30deg) scale(1.15);
        filter: brightness(2);
        -webkit-text-fill-color: white;
    }

    /* Arrow Indicator */
    .country-option:after {
        content: '→';
        position: absolute;
        right: 20px;
        opacity: 0;
        color: white;
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .country-option:hover:after {
        opacity: 1;
        right: 15px;
    }

    /* Close Button */
    .close-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0, 0, 0, 0.05);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #7f8c8d;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .close-btn:hover {
        background: rgba(74, 144, 226, 0.1);
        color: #4a90e2;
        transform: rotate(90deg);
    }

    /* Footer Area */
    .popup-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .cancel-btn {
        background: transparent;
        border: 2px solid #e0e6ed;
        padding: 10px 25px;
        border-radius: 30px;
        color: #7f8c8d;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .cancel-btn:hover {
        border-color: #4a90e2;
        color: #4a90e2;
        transform: translateY(-2px);
    }

    /* Improved Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes slideIn {
        from { 
            opacity: 0;
            transform: translateX(-10px);
        }
        to { 
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Enhanced Responsive Design */
    @media (max-width: 480px) {
        .popup-content {
            width: 90%;
            padding: 25px 20px;
        }
        
        .country-option {
            padding: 12px 15px;
        }
        
        .country-option img {
            width: 35px;
            height: 35px;
        }
        
        .globe-icon {
            font-size: 28px;
        }
        
        .popup-content h2 {
            font-size: 22px;
        }
        
        .country-option:after {
            font-size: 18px;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .popup-content {
            background: linear-gradient(145deg, #2c3e50, #1e2a38);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }
        
        .popup-content h2 {
            color: #ecf0f1;
        }
        
        .country-option {
            background: rgba(255, 255, 255, 0.05);
            color: #ecf0f1;
        }
        
        .country-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .cancel-btn {
            border-color: rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
        }
        
        .cancel-btn:hover {
            border-color: #4a90e2;
            color: #4a90e2;
        }
        
        .close-btn {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }
    }
</style>

<!-- <script>
    // Show popup every time the page loads
    window.onload = function() {
        document.getElementById('countryPopup').style.display = 'flex';
    };

    // Handle country selection
    document.querySelectorAll('.country-option').forEach(option => {
        option.addEventListener('click', function() {
            const country = this.getAttribute('data-country');
            
            // Redirect based on selection
            switch (country) {
                case 'us':
                    window.location.href = 'https://us.hospitalplacement.com';
                    break;
                case 'india':
                    window.location.href = 'https://india.hospitalplacement.com';
                    break;
                case 'germany':
                    window.location.href = 'https://germany.hospitalplacement.com';
                    break;
                case 'japan':
                    window.location.href = 'https://japan.hospitalplacement.com';
                    break;
                case 'singapore':
                    window.location.href = 'https://singapore.hospitalplacement.com';
                    break;
                default:
                    // For "Other", hide popup and stay on default site
                    document.getElementById('countryPopup').style.display = 'none';
                    break;
            }
        });
    });
</script> -->



<!-- Update Redirect Logic in Script -->
<script>
    // Show popup every time the page loads
    window.onload = function() {
        document.getElementById('countryPopup').style.display = 'flex';
    };

    // Handle country selection
    document.querySelectorAll('.country-option').forEach(option => {
        option.addEventListener('click', function() {
            const country = this.getAttribute('data-country');
            
            // Redirect based on selection
            switch (country) {
                case 'us':
                    window.location.href = 'https://us.hospitalplacement.com';
                    break;
                case 'india':
                    window.location.href = 'https://hospitalplacement.com';
                    break;
                case 'germany':
                    window.location.href = 'https://germany.hospitalplacement.com';
                    break;
                case 'japan':
                    window.location.href = 'https://japan.hospitalplacement.com';
                    break;
                case 'singapore':
                    window.location.href = 'https://singapore.hospitalplacement.com';
                    break;
                case 'europe':
                    window.location.href = 'https://europe.hospitalplacement.com';
                    break;
                default:
                    // For "Other", hide popup and stay on default site
                    document.getElementById('countryPopup').style.display = 'none';
                    break;
            }
        });
    });
</script>