<?php 

$value2="ffmpeg -i /var/www/html/ffmpeg/SampleVideo.mp4  2>&1 | grep Stream | grep -oP ', \K[0-9]+x[0-9]+'";
$output=shell_exec("$value2");
echo $output;

?>
