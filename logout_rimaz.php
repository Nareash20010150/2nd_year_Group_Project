<?php

require_once("./patient/DBconnect.php");
session_start();
session_unset();
session_destroy();

header('location:/royalhospital/login_form.php');

?>