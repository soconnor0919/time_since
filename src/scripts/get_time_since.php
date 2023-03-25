<?php
$file = "counter.txt";
$fh = fopen($file, 'r');
$time_unix = fgets($fh);
fclose($fh);

$cur_time = time();
$time_since = $cur_time - $time_unix;

$seconds = gmdate("s", $time_since);
$minutes = gmdate("i", $time_since);
$hours = gmdate("H", $time_since);

$seconds = (int)$seconds;
$minutes = (int)$minutes;
$hours = (int)$hours;

if ($hours != 0) {
    $s = $hours . " hours, " . $minutes . " minutes, " . $seconds . " seconds.";
} else if ($minutes != 0) {
    $s = $minutes . " minutes, " . $seconds . " seconds.";
} else {
    $s = $seconds . " seconds.";
}

echo ($s)

// echo $formatted_time;

?>