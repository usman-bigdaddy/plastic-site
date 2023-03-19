<?php
include "../connect.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    try{
        $stmt = $conn->prepare(strtolower("DELETE FROM tb_order WHERE Quantity = ? AND UserEmail = ? AND Status_ = ? AND ProductID=?"));
        $stmt->bind_param('ssss',
           $qty,
           $guid,
           $status,
           $pid
        );
        $qty=$_POST["qty"];
        $guid=$_POST["userEmailOrGUID"];
        $status="Cart";
        $pid=$_POST["pid"];
        $stmt->execute();
        $count = $stmt->affected_rows;
        $stmt->close();
        $conn->close();
        echo "1";
    }
    catch(Exception $e){
          $conn->close();
            $msg="Please Try Again";
            echo "<script type='text/javascript'>alert('$msg');</script>";
      }
    }
  ?>