<?php
include "../connect.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            try{
                $stmt =  $conn->prepare(strtolower("INSERT INTO tb_wish VALUES (?,?,?)"));
                $stmt->bind_param("sss", $pid, $deviceID, $date); 
                $date=date("d/m/Y");
                $pid=$_POST["productId"];
                $deviceID=$_POST["deviceID"];
                //$password =password_hash($_POST["pass_for_reg"], PASSWORD_BCRYPT);
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