<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . '/src/ComplexNumber.php';
require_once __DIR__ . '/src/Helper.php';


$u = Helper::make();
$v = Helper::make();
$nu = Helper::negative($u);

echo "u = $u\n";
echo "v = $v\n";
echo "-u = $nu\n";



echo "\nu + v === v + u\n";
$sum = Helper::add($u, $v);
$sum2 = Helper::add($v, $u);
echo "u + v = $sum\n";
echo "v + u = $sum2\n";

$sub = Helper::sub($u, $v);
echo "\nu - v = $sub\n";


$mult = Helper::mult($u, $v);
echo "\nu * v = $mult\n";

$div = Helper::div($u, $v);
echo "\nu / v = $div\n";


sleep(100000);
