<?php
function classifyNumber($number) {
    if ($number <= 0) {
        return "Please enter a positive integer.";
    }    
    $divisorsSum = 0;
    for ($i = 1; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            $divisorsSum += $i;
        }
    }    
    if ($divisorsSum == $number) {
        return "$number is a perfect number.";
    } elseif ($divisorsSum > $number) {
        return "$number is an abundant number.";
    } else {
        return "$number is a deficient number.";
    }
}
$number = 28; 
$result = classifyNumber($number);
echo $result;
?>
