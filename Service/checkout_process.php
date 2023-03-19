<?php
session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	    include "../connect.php"; 
		if(isset($_POST["ref"])){
			$ref = sanitize($_POST["ref"]);
			$result = array();
			//The parameter after verify/ is the transaction reference to be verified
			$url = 'https://api.paystack.co/transaction/verify/'.$ref;
	
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt(
			$ch, CURLOPT_HTTPHEADER, [
				'Authorization: Bearer SECRET_KEY']
			);
			$request = curl_exec($ch);
			if(curl_error($ch)){
			echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
	
			if ($request) {
			$result = json_decode($request, true);
			}
	
			if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
				//echo "Transaction was successful";
				//echo sanitize("1");
				do_checkout($servername, $username, $password, $dbname);
				//Perform necessary action
			}
			else{
			//echo "Transaction was unsuccessful";
			  echo sanitize("0");
			}
		}
		else{
		    do_checkout($servername, $username, $password, $dbname);
		}
	}
	function do_checkout($servername, $username, $password, $dbname){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$order_id = substr(str_shuffle($permitted_chars), 0, 10);
		$guid=sanitize($_POST['email']);
		$conn = new mysqli($servername, $username, $password, $dbname);
		if (isset($_SESSION['user_email'])){
			if(isset($_SESSION['do_i_have_details'])){
				$stmt = $conn->prepare(strtolower("UPDATE tb_user SET firstname = ?, lastname=?,phone=? WHERE email = ?"));
				$stmt->bind_param('ssss',
				$fname_0,
				$lname_0,
				$phone_0,
				$email_0
				);
				$fname_0=sanitize($_POST["fname"]);
				$lname_0=sanitize($_POST["lname"]);
				$phone_0 = sanitize($_POST["phone"]);
				$email_0=sanitize($_POST['email']);
				$stmt->execute();
				$stmt->close();
				//echo $fname.$lname.$phone.$email_ln1;
				//echo "<script> location.href='my-profile-my-ordedddrs.php'; </script>";
			}
			$stmt = $conn->prepare(strtolower("UPDATE tb_order SET Status_ = ?, ShippinId=? WHERE UserEmail = ? AND Status_ = ?"));
			$stmt->bind_param('ssss',
			$stat_new,
			$order_id,
			$guid_of_logged_in_user,
			$status_old
			);
			$guid_of_logged_in_user = sanitize($_POST['email']);
			$stat_new=sanitize("Ordered");
			$status_old=sanitize("Cart");
			$stmt->execute();
			$count = $stmt->affected_rows;
			$stmt->close();
		}
		else{
			try{
					$stmt =  $conn->prepare(strtolower("INSERT INTO tb_user  VALUES (?, ?, ?, ?, ?, ?, ?, ?)"));
					$stmt->bind_param("ssssssss", $email, $fname, $lname, $phone, $pass, $addr,$is_vendor_value,$shopname); 
					$email = sanitize($_POST["email"]);
					$fname=sanitize($_POST["fname"]);
					$lname=sanitize($_POST["lname"]);
					$phone = sanitize($_POST["phone"]);
					$pass=sanitize($_POST["pass"]);
					//$pass=sha1($pass)."+++".md5($pass);
					$addr=sanitize("");
					$shopname=sanitize("");
					$is_vendor_value=sanitize("0");
					//$password =password_hash($_POST["pass_for_reg"], PASSWORD_BCRYPT);
					$stmt->execute();
					$count = $stmt->affected_rows;
					$stmt->close();

					$stmt = $conn->prepare(strtolower("UPDATE tb_order SET UserEmail=?,Status_ = ?, ShippinId=? WHERE UserEmail = ? AND Status_ = ?"));
					$stmt->bind_param('sssss',
						$email,
						$stat_new,
						$order_id,
						$guid_old,
						$status_old
					);
					$stat_new=sanitize("Ordered");
					$status_old=sanitize("Cart");
					$guid_old = sanitize($_COOKIE["user"]);
					$stmt->execute();
					$count = $stmt->affected_rows;
					$stmt->close();
					$_SESSION["user_email"] =  sanitize($email);
			}
			catch(Exception $e){
				$stmt->close();
				$conn->close();
					$msg="Please Try Again";
					echo "<script type='text/javascript'>alert('$msg');</script>";
			}
		}
		$stmt =  $conn->prepare(strtolower("INSERT INTO tb_user_shipping_details  VALUES (?, ?, ?, ?, ?)"));
		$stmt->bind_param("sssss", $order_id, $_POST["email"],$addr, $date_added,$time_added); 
		$addr=sanitize($_POST["addr"]);
		$date_added=date("d/m/Y");
		$time_added = date("h:ia");
		$stmt->execute();
		$stmt->close();
		require_once("../mail_page_for_new_order_to_vendor.php");
		require_once("../send_mail.php");
		$mail_controller = new mail_controller();
		foreach ($_SESSION['vendor_array'] as $value) {
				$mail_controller->send_mail($value,"New Order",$msg_to_send);
		}
		require_once("../mail_page_for_new_order_to_customer.php");
		$mail_controller->send_mail($_SESSION["user_email"],"New Order",$msg_to_send);
		require_once("../mail_page_for_new_order_to_admin.php");
		$mail_controller->send_mail("vendooronline@gmail.com","New Order",$msg_to_send);
		unset($_SESSION['do_i_have_details']);
		unset($_SESSION['vendor_array']);
		$conn->close();
		echo "1";
	}
?>