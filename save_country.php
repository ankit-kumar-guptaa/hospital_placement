<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country = $_POST['country'];
    $_SESSION['country_selected'] = $country;
    $_SESSION['country_code'] = $_POST['code'];
    echo "Success";
} else {
    echo "Error";
}
?>