<?php

//In PHP there are 4 type of loop : for,while,do-while,foreach


//for loop
for ($i = 0; $i < 10; $i++) {
    echo $i . "\n";
}


// while loop

$i = 0;
while ($i < 10) {
    echo $i . "\n";
    $i++;
}


//do-while loop

$i = 0;
do {
    echo $i . "\n";
    $i++;
} while ($i < 10);

//foreach loop

$array = [1, 2, 3, 4, 5];
foreach ($array as $value) {
    echo $value . "\n";
}