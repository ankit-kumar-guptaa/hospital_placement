<?php
session_start();

// Generate a random CAPTCHA code
$captcha_code = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789'), 0, 6);
$_SESSION['captcha'] = $captcha_code;

// Create an image
$image_width = 280;
$image_height = 100;
$image = imagecreatetruecolor($image_width, $image_height);

// Set background and text colors
$background_color = imagecolorallocate($image, 230, 240, 250); // Light blue background
$text_colors = [
    imagecolorallocate($image, 0, 51, 153),    // Dark blue
    imagecolorallocate($image, 34, 139, 34),  // Green
    imagecolorallocate($image, 220, 20, 60),  // Red
    imagecolorallocate($image, 72, 61, 139),  // Purple
];
$line_color = imagecolorallocate($image, 200, 200, 200); // Light gray for noise lines

// Fill the background
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $background_color);

// Add soft diagonal noise lines
for ($i = 0; $i < 5; $i++) {
    imageline(
        $image,
        rand(0, $image_width),
        rand(0, $image_height),
        rand(0, $image_width),
        rand(0, $image_height),
        $line_color
    );
}

// Path to TrueType font (ensure the font file exists on your server)
$font_path = __DIR__ . '/fonts/Poppins-Bold.ttf'; // Use a clean modern font
if (!file_exists($font_path)) {
    die("Font file not found. Please ensure the font exists at: $font_path");
}


// Add CAPTCHA text in the center
$font_size = 32; // Font size
$x = 30; // Initial x-coordinate for text
$y = 65; // Fixed y-coordinate for a consistent look
for ($i = 0; $i < strlen($captcha_code); $i++) {
    $char = $captcha_code[$i];
    $text_color = $text_colors[array_rand($text_colors)];
    $angle = rand(-10, 10); // Slight random rotation for a natural effect
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font_path, $char);
    $x += 40; // Increment x-coordinate for spacing between characters
}

// Add subtle random dots for noise
for ($i = 0; $i < 500; $i++) {
    $dot_color = $text_colors[array_rand($text_colors)];
    imagesetpixel($image, rand(0, $image_width), rand(0, $image_height), $dot_color);
}

// Output the CAPTCHA image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
