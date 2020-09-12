<?php
function check($x, $y, $r)
{
    if (($x >= -$r && $x <= 0 && $y <= 0 && $y >= -$r) ||
        ($r >= ($x - $y) && $y <= 0 && $x >= 0) ||
        (sqrt(($x * $x + $y * $y)) <= sqrt(($r * $r + $r * $r)) && $x <= 0 && $y >= 0)) {
        return "<span style='color: green'>True</span>";
    } else {
        return "<span style='color: red'>False</span>";

    }
}

function checkArea($x, $y, $r)
{
    return !in_array($y, array(-5, -4, -3, -2, -1, 0, 1, 2, 3))
        || !is_numeric($x) || $x < -5 || $x > 5 ||
        !in_array($r, array(1, 1.5, 2, 2.5, 3));
}

session_start();

date_default_timezone_set('Europe/Moscow');
$currentTime = date("H:i:s");
$start = microtime(true);


$x = (float)$_GET['x_val'];
$y = (int)$_GET['y_val'];
$r = (int)$_GET['r_val'];


if (checkArea($x, $y, $r)) {
    http_response_code(400);
    return;
}

$res = check($x, $y, $r);
$time = microtime(true) - $start;
$result = array($x, $y, $r, $currentTime, $time, $res);

//console.log("ready");


if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = array();

}

array_push($_SESSION['history'], $result);

include "table.php";
