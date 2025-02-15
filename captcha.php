<?php
session_start();

// Generate a random CAPTCHA code
$captcha_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
$_SESSION['captcha'] = $captcha_code;

// Create an image
$image = imagecreatetruecolor(185, 70); // Increase dimensions for larger text

// Set colors
$background_color = imagecolorallocate($image, 255, 255, 255); // White background
$text_color = imagecolorallocate($image, 0, 0, 0);             // Black text
$line_color = imagecolorallocate($image, 64, 64, 64);          // Gray lines
$pixel_color = imagecolorallocate($image, 100, 100, 100);      // Gray dots

// Fill the background
imagefilledrectangle($image, 0, 0, 200, 70, $background_color);

// Add random lines for noise
for ($i = 0; $i < 5; $i++) {
    imageline($image, 0, rand(0, 70), 200, rand(0, 70), $line_color);
}

// Add random dots for noise
for ($i = 0; $i < 1000; $i++) {
    imagesetpixel($image, rand(0, 200), rand(0, 70), $pixel_color);
}

// Path to a TrueType font (ensure this file exists on your server)
$font_path = __DIR__ . '/fonts/arial.ttf'; // Update the path to the font file
$font_size = 18; // Set font size

// Add the CAPTCHA text using imagettftext
imagettftext($image, $font_size, 0, 35, 45, $text_color, $font_path, $captcha_code);

// Output the image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
