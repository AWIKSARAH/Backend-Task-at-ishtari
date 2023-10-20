<?php
// This file contains two functions: sumOfTwoNumber() and enumerateArray()

// sumOfTwoNumber() takes two numbers as input and returns the sum of those numbers.

function sumOfTwoNumber($numberOne, $numberTwo)
{
    // This function returns the sum of two numbers.

    return $numberOne + $numberTwo;
}

// Call the enumerateArray() function to print the array to the console.
echo "An Sum Function" . sumOfTwoNumber(5, 10);

echo "<br>";
// enumerateArray() takes an array as input and prints each element of the array to the console.
function enumerateArray($array)
{
    // This function enumerates the elements of an array.

    if (!is_array($array)) {
        // If the array is not a valid array, print an error message to the console.
        echo "It's not a valid Array";
    } else {
        // Iterate over the array and print each element to the console.
        foreach ($array as $key => $value) {
            echo $key . ":" . $value . " </br>";
        }
    }
}

// Example of an array in PHP
$array = [1, 2, 3, 4, 5, 6];

// Call the enumerateArray() function to print the array to the console.
echo "An Array" . enumerateArray($array);
