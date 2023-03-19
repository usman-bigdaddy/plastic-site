<?php
include "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt =  $conn->prepare(strtolower("SELECT count(*) as ProductCount from productrequest where customer_email=? AND status_=? AND product_id=?"));
        $stmt->bind_param("sss", $user_email, $stat, $product_id);
        $user_email = $_POST['user_email'];
        $stat = "Cart";
        $address = "";
        $product_id = $_POST["product_id"];
        $stmt->execute();
        $result = $stmt->get_result();
        $value = $result->fetch_object();
        $ProductCount = $value->productcount;
        $stmt->close();
        if ($ProductCount == 0) {
            $stmt =  $conn->prepare(strtolower("INSERT INTO productrequest (customer_email,product_id,delivery_address,status_)
             VALUES (?, ?, ?, ?)"));
            $stmt->bind_param("ssss", $user_email, $product_id, $address, $stat);
            $stmt->execute();
            $count = $stmt->affected_rows;
            $stmt->close();
            if ($count > 0) {
                echo "Item Added";
            } else {
                echo "Please Try Again";
            }
        } else {
            $stmt =  $conn->prepare(strtolower("SELECT * FROM productrequest where customer_email=? AND status_=? AND product_id=?"));
            $stmt->bind_param("sss", $user_email, $stat, $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $value = $result->fetch_object();
            $qty = $value->Quantity;
            $stmt->close();
            //   _____________________________
            $stmt = $conn->prepare(strtolower("UPDATE productrequest SET Quantity = ? where customer_email=? AND status_=? AND product_id=?"));
            $stmt->bind_param('ssss', $qty, $user_email, $stat, $product_id);
            $qty = $qty + 1;
            $stmt->execute();
            $count = $stmt->affected_rows;
            $stmt->close();
            if ($count > 0) {
                echo "Item Updated";
            } else {
                echo "Could not update" . $qty;
            }
        }
    } catch (Exception $e) {
        $conn->close();
        $msg = "Please Try Again";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
