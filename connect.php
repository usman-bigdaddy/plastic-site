<?php

$conn = new mysqli("localhost", "root", "", "plastic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
