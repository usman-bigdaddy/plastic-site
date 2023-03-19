<?php
include 'checkout_process.php';
 function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if(isset($_POST["ref"])){
        $ref = sanitize($_POST["ref"]);
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = sanitize('https://api.paystack.co/transaction/verify/'.$ref);

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
            echo sanitize("1");
            //Perform necessary action
        }
        else{
        //echo "Transaction was unsuccessful";
        echo sanitize("0");
        }
    }
  }
?>