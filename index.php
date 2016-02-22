<?php
$prefix = (isset($_GET['prefix']) ? $_GET['prefix'] : '');
$length = (isset($_GET['length']) && $_GET['length'] > 0 ? $_GET['length'] : 16);

if (is_numeric($prefix)) {
    $number = $prefix;
} else {
    $number = '';
}

while (strlen($number) < $length - 1) {
    $number .= rand(0, 9);
}

$sum = 0;
$reverseNumbers = str_split(strrev($number));
foreach ($reverseNumbers as $key => $num) {
    if (($key + 1) % 2 != 0) {
        if ($num * 2 < 10) {
            $sum += $num * 2;
        } else {
            $sum += ($num * 2) - 9;
        }
    } else {
        $sum += $num;
    }
}

$check = 10 - ($sum % 10);
$number .= $check;
echo $number;
