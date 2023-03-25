<?php
session_start();

$digit_one = $_POST["first"];
$digit_two = $_POST["second"];
$digit_three = $_POST["third"];
$digit_four = $_POST["fourth"];
$digit_five = $_POST["fifth"];
$digit_six = $_POST["sixth"];

$verification_code = $digit_one . $digit_two . $digit_three . $digit_four . $digit_five . $digit_six;
$verification_code = (int)$verification_code;

if ($verification_code == 744353) {
    $cur_unix_time = time();
    $file = fopen("counter.txt", "w") or die("Unable to open file!");
    fwrite($file, $cur_unix_time);
    fclose($file);
}

header("Location: /index.php");

?>