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
    if ($hours == 1){
        $s = $hours . " hour, " . $minutes . " minutes, " . $seconds . " seconds.";
    } else {
        $s = $hours . " hours, " . $minutes . " minutes, " . $seconds . " seconds.";
    }
} else if ($minutes != 0) {
    if ($minutes == 1) {
        $s = $minutes . " minute, " . $seconds . " seconds.";
    } else {
        $s = $minutes . " minutes, " . $seconds . " seconds.";
    }
} else {
    if ($seconds == 1) {
        $s = $seconds . " second.";
    } else {
        $s = $seconds . " seconds.";
    }
}

echo ($s)

// echo $formatted_time;

?>