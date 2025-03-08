<?php
session_start();
if (!isset($_SESSION['country_selected'])) {
    // Show popup only if country is not selected
    $countries = [
        "United States" => "us",
        "India" => "in",
        "Japan" => "jp",
        "Germany" => "de",
        "China" => "cn",
        "Singapore" => "sg",
        "Russia" => "ru",
        "Ireland" => "ie",
        "The Netherlands" => "nl",
        "United Kingdom" => "gb",
        "Canada" => "ca",
        "France" => "fr",
        "Brazil" => "br",
        "Indonesia" => "id",
        "South Korea" => "kr",
        "Ukraine" => "ua",
        "Seychelles" => "sc",
        "Belarus" => "by",
        "Switzerland" => "ch",
        "Sweden" => "se",
        "Saudi Arabia" => "sa",
        "Kyrgyzstan" => "kg",
        "Australia" => "au",
        "Pakistan" => "pk",
        "Iceland" => "is",
        "Poland" => "pl",
        "Maldives" => "mv",
        "Mongolia" => "mn",
        "Türkiye" => "tr",
        "Mexico" => "mx",
        "Kazakhstan" => "kz",
        "Latvia" => "lv",
        "Iran" => "ir",
        "Hong Kong" => "hk",
        "Lithuania" => "lt",
        "Spain" => "es",
        "Bahrain" => "bh",
        "Romania" => "ro",
        "Thailand" => "th",
        "Zambia" => "zm",
        "Rwanda" => "rw",
        "Bahamas" => "bs",
        "Italy" => "it",
        "South Africa" => "za",
        "" => ""
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Country</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
        }
        
        .header {
            background-color: #006064;
            color: white;
            padding: 20px 30px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 600;
        }
        
        .country-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .country-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid #e0e0e0;
        }
        
        .country-item:hover {
            background-color: #f0f7ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border-color: #006064;
        }
        
        .flag {
            margin-right: 10px;
            width: 24px;
            height: 18px;
            object-fit: cover;
            border-radius: 2px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .country-name {
            font-size: 14px;
            color: #333;
        }
        
        .arrow {
            margin-left: auto;
            color: #006064;
            font-size: 16px;
        }
        
        @media (max-width: 768px) {
            .country-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 480px) {
            .country-grid {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 24px;
            }
        }
        
        /* Custom scrollbar */
        .country-grid::-webkit-scrollbar {
            width: 8px;
        }
        
        .country-grid::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .country-grid::-webkit-scrollbar-thumb {
            background: #006064;
            border-radius: 10px;
        }
        
        .country-grid::-webkit-scrollbar-thumb:hover {
            background: #004d40;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Choose your Country</h1>
        </div>
        <div class="country-grid">
            <?php
            foreach ($countries as $country => $code) {
                echo "<div class='country-item' onclick=\"selectCountry('$country', '$code')\">
                        <img src='https://flagcdn.com/24x18/$code.png' class='flag' alt='$country flag'>
                        <span class='country-name'>$country</span>
                        <span class='arrow'>›</span>
                      </div>";
            }
            ?>
        </div>
    </div>

    <script>
        function selectCountry(country, code) {
            // Send AJAX request to set the country in session
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'set_country.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    window.location.href = 'index.php';
                }
            };
            xhr.send(`country=${country}&code=${code}`);
        }
    </script>
</body>
</html>
<?php
} else {
    // If country is selected, redirect to the main page
    header("Location: index.php");
    exit();
}
?>