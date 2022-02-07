<?php

define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "apr26optical");
define('DB_TABLE', "ellsworth_cabin");

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);

?>