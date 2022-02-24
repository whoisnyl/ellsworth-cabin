<?php

session_save_path($_SERVER["DOCUMENT_ROOT"]."/admin/cgi-bin/tmp");
session_start();

session_destroy();

header("location: /admin");
exit;

?>