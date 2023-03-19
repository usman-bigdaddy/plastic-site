<?php
include "../connect.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    try{
        $stmt = $conn->prepare(strtolower("DELETE FROM tb_wish WHERE productid = ? AND deviceid = ?"));
        $stmt->bind_param('ss',
           $pid,
           $device
        );
        $device=$_POST["device"];
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