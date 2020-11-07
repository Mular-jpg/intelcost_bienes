<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "intelcost_bienes";
$charset = "utf8";

$mysqli = new mysqli($server, $user, $password, $database);
$mysqli->set_charset($charset);
