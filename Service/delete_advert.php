<?php
include "../connect.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    try{
        $stmt = $conn->prepare(strtolower("DELETE FROM tb_Advert WHERE TargetGroup = ? AND TargetValue=?"));
        $stmt->bind_param('ss', $pid,$target_value);
        $pid=$_POST["id"];
        $target_value=$_POST["targetValue"];
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