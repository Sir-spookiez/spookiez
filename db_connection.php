<?php
$dbConnection = pg_connect("host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454");

if (!$dbConnection) {
    die("Database connection failed!");
}
?>
