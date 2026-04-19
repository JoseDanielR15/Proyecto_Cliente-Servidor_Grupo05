<?php

function OpenDatabase()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $context = mysqli_connect("127.0.0.1:3306", "root", "", "infinitytech");
    mysqli_set_charset($context, 'utf8mb4');
    return $context;
}

function CloseDatabase($context)
{
    mysqli_close($context);
}
