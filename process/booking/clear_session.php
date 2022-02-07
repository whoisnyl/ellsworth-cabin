<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

session_destroy();

header("location: /ellsworth-cabin");
exit;

?>