<?php
// This code demonstrates the different data types in PHP.

// Integer
$number = 1110;

// Float
$float = 10.55;

// String
$string = "hello";

// Array
$array = [1, 2, 3, 4, 5, 6];

// Object
$object = new stdClass();
$object->name = "Bard";
$object->age = 2;

// Display the data types of the variables.
var_dump($number); // int(1110)
var_dump($float); // float(10.55)
var_dump($string); // string(5) "hello"
var_dump($array); // array(6) {
//   [0] => int(1)
//   [1] => int(2)
//   [2] => int(3)
//   [3] => int(4)
//   [4] => int(5)
//   [5] => int(6)
// }
var_dump($object); // object(stdClass)#1 (2) {
//   ["name"] => string(4) "Bard"
//   ["age"] => int(2)
// }
