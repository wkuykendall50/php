<?php
$count = file_get_contents("count.txt");
$count = trim($count);
$count = $count + 1;
$fl = fopen("count.txt","w+");
fwrite($fl,$count);
fclose($fl);
echo "You are visitor number " . $count;
?>