<?php
session_start();

require "database.php";

require_once "controller/controller_login.php";

// Requerir la vista
require "view/view_login.html";
?>
