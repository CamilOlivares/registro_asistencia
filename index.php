<?php
session_start();

require "database.php";

require "controller/auth.php";


// Requerir la vista
require "view/view_index.html";
?>
