<?php


// Define some variables
$x = 5;
$y = 10;

// Perform some arithmetic operations
$sum = $x + $y;
$difference = $y - $x;
$product = $x * $y;
$quotient = $y / $x;

// Perform some comparison operations
$equals = $x == $y;
$notEquals = $x != $y;
$lessThan = $x < $y;
$greaterThan = $x > $y;
$lessThanOrEqualTo = $x <= $y;
$greaterThanOrEqualTo = $x >= $y;

// Perform some logical operations
$and = $x == 5 && $y == 10;
$or = $x == 5 || $y == 10;
$not = !$x == 5;

// Perform some string operations
$string1 = "Hello";
$string2 = "world!";
$concatenatedString = $string1 . " " . $string2;

// Display the results
echo "The sum of $x and $y is $sum.";
echo "<br>";
echo "The difference of $y and $x is $difference.";
echo "<br>";
echo "The product of $x and $y is $product.";
echo "<br>";
echo "The quotient of $y and $x is $quotient.";
echo "<br>";
echo "Is $x equal to $y? $equals.";
echo "<br>";
echo "Is $x not equal to $y? $notEquals.";
echo "<br>";
echo "Is $x less than $y? $lessThan.";
echo "<br>";
echo "Is $x greater than $y? $greaterThan.";
echo "<br>";
echo "Is $x less than or equal to $y? $lessThanOrEqualTo.";
echo "<br>";
echo "Is $x greater than or equal to $y? $greaterThanOrEqualTo.";
echo "<br>";
echo "Are both $x and $y equal to 5 and 10, respectively? $and.";
echo "<br>";
echo "Is either $x or $y equal to 5 or 10, respectively? $or.";
echo "<br>";
echo "Is $x not equal to 5? $not.";
echo "<br>";
echo "The concatenated string is $concatenatedString.";

?>