<?php

session_save_path($_SERVER["DOCUMENT_ROOT"]."/ellsworth-cabin/admin/cgi-bin/tmp");
session_start();

session_destroy();

header("location: /ellsworth-cabin/admin");
exit;

?>