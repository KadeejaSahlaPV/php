<?php
function reverseString($str) {
    $reversed = '';
    $length = strlen($str);

    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }

    return $reversed;
}

$inputString = "Hello, World!";
$reversedString = reverseString($inputString);
echo "Original String: $inputString<br>";
echo "Reversed String: $reversedString";
?>
