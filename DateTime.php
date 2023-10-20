<?php



echo "Today is <strong> " . date("Y/m/d") . "</strong> <br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
echo "The time is " . date("h:i:sa");

date_default_timezone_set("Asia/Beirut");
echo date("Y-m-d H:i:s");

?>