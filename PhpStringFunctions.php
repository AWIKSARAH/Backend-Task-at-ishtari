<?php

// Get the length of a string.
$string = "Hello, world!";
$length = strlen($string);
echo $length; // 13

// Replace all occurrences of a substring in a string.
$string = "Hello, world!";
$newString = str_replace("world", "everyone", $string);
echo $newString; // Hello, everyone!


// Count the number of word in the string "Hello world!":

$string = "Hello, world!";
$newString = str_word_count("world", "everyone");
echo $newString; // 2

// Reverse the string "hello world"

$string = "Hello world!";
$newString = strrev($string);
echo $newString;

$string = "Hello, world!";

// Find the position of the first occurrence of the substring "world".
$position = strpos($string, "world");

// Replace the substring "world" with the substring "everyone".
$newString = str_replace("world", "everyone", substr($string, 0, $position));

// Display the new string.
echo $newString;

