<?php
session_start();
//session_unset();
unset($_SESSION["company_email"]);

echo "<script> location.href='index.php'; </script>";
