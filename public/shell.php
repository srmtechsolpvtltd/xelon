<?php 
//phpinfo();
$value2= 'ffmpeg -version';//"ffmpeg -i /var/www/website/xelon/public_stpl/public/SampleVideo.mp4  2>&1 | grep Stream | grep -oP ', \K[0-9]+x[0-9]+'";
$output=shell_exec("$value2");
echo "<pre>$output</pre>";exit;
/*$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";exit;*/
?>
