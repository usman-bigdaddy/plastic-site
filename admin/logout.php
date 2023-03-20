<?php
session_start();
//session_unset();
unset($_SESSION["admin_email"]);

echo "<script> location.href='index.php'; </script>";
