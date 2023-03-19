<?php
include "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
    $stmt =  $conn->prepare(strtolower("SELECT SUM(Quantity) as CartCount FROM productrequest where customer_email=? AND status_=?"));
    $stmt->bind_param("ss", $user_email, $stat);
    $user_email = $_POST['user_email'];
    $stat = "Cart";
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();
    echo $value->cartcount;
    //echo "<script type='text/javascript'>alert('$value->cartcount');</script>";
  } catch (Exception $e) {
    $conn->close();
    $msg = "Please Try Again";
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
}
