<?php

$cur_unix_time = time();
$file = fopen("counter.txt", "w") or die("Unable to open file!");
fwrite($file, $cur_unix_time);
fclose($file);

header("Location: /index.php");

?>