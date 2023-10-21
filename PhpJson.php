<?php
$age = json_encode(array("Name" => "Sarah", "Age" => 27, "email" => "awiksarah@gmail.com"));



$obj = json_decode($age);

foreach ($obj as $key => $value) {
echo $key . " => " . $value . "<br>";
}

