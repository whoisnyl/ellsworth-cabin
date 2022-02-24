<?php

$root = $_SERVER["DOCUMENT_ROOT"];

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

session_destroy();

header("Location: /");
exit;

?>