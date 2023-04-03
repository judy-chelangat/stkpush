<?php
$amount = '1'; //Amount to transact 
$phonenumber = '07XXXXXXXX'; // Phone number paying
$Account_no = 'Mpesa'; // Enter account number optional
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
    'amount' => $amount,
    'msisdn' => $phonenuber,
    'account_no' => $Account_no
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: 8CF7ah28NA2' // Replace with your api key
);
$info = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);

if ($resp === false) {
    echo "CURL ERROR: " . curl_error($curl);
}
$msg_resp = json_decode($resp);

if ($msg_resp->success == 'true') {
    echo "WAIT FOR NEVEREST STK POP UP";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="index1.css" rel="stylesheet">
  <title>STK push</title>
  <script src="alert.js"></script>
</head>

<body>
  <div class="mesg">
  </div>
  <form method="POST" action="transactions.php" id="paymentForm">
    <div class="form">
      <div class="top-bar">
        STK PUSH
      </div>
            <a href="transactiontable.php">CHECK TRANSACTIONS</a>
      <input name="phonenumber" title="" pattern=".*[^ ].*" autocomplete="off" required type="number" id="username">
      <label for="username" class="name-label"></label>
      <input name="amount" title="" required type="number" id="password">
      <label for="password" class="pass-label"></label>
      <button type="submit" name="pay">MAKE PAYMENT</button>
    </div>

  </form>
</body>

</html>