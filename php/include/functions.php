<?php

function transformDate($date)
{
    $dt = explode("-", $date);
    $day = $dt[2];
    $month = $dt[1];
    $year = $dt[0];

    return "$day/$month/$year";
}

function transformDateToId($date)
{
    $dt = explode("-", $date);
    $day = $dt[2];
    $month = $dt[1];
    $year = $dt[0];

    $mktime =  mktime(0, 0, 0, $month, $day, $year);

    return date('dmy', $mktime);
}
