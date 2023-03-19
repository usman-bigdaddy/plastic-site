<?php
include "../connect.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    try{
        $stmt = $conn->prepare(strtolower("UPDATE tb_order SET Quantity = ? WHERE UserEmail = ? AND Status_ = ? AND ProductID=?"));
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

                $stmt =  $conn->prepare(strtolower("SELECT SUM(Quantity) as CartCount FROM tb_order where UserEmail=? AND Status_=?")); 
                $stmt->bind_param("ss", $guid,$stat); 
                $stat="Cart";
                $stmt->execute();
                $result = $stmt->get_result();
                $value = $result->fetch_object();
                echo $value->cartcount;
                $conn->close();
    }
    catch(Exception $e){
          $conn->close();
            $msg="Please Try Again";
            echo "<script type='text/javascript'>alert('$msg');</script>";
      }
    }
  ?>