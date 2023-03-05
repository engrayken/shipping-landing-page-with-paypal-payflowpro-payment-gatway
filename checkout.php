<?php 

$host = "https://payflowpro.paypal.com";
// $data = array(
//     'VENDOR'=> urlencode($_POST['VENDOR']),
//    'USER'=> urlencode($_POST['USER']),
//   'PWD'=> urlencode($_POST['PWD']),

// // 'VENDOR' =>'luxeconcepts',
// //  'USER' =>'luxeconcepts',
// // 'PWD' =>'Pw4Fiverr1',
// //   'BILLTOFIRSTNAME'=> $_POST['BILLTOFIRSTNAME'], //integer
// //       'BILLTOSTREET' => $_POST['BILLTOSTREET'],   
// //     'BILLTOCITY' =>  $_POST['BILLTOCITY'], 
// //   'BILLTOSTATE' =>  $_POST['BILLTOSTATE'], // integer
// //   'PARTNER' => $_POST['PARTNER'], //integer
// //   'BILLTOZIP' => $_POST['BILLTOZIP'],
// //   'CUSTOM' => $_POST['CUSTOM'],
// //   'COMMENT1' => $_POST['COMMENT1'],
// //   'TENDER' => $_POST['TENDER'],
// //   'TRXTYPE' => $_POST['TRXTYPE'],
// //   'ACCT' => $_POST['ACCT'],
// //   'EXPDATE' => $_POST['EXPDATE'],
// //   'CVV2' => $_POST['CVV2'],
// //   'AMT' => $_POST['AMT'],

// );
  
// $curl       = curl_init();
// curl_setopt_array($curl, array(
// CURLOPT_URL => $host,
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
	
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "POST",
// 	CURLOPT_POSTFIELDS => $data,
// ));

// echo curl_exec ($curl); 

$user = 'luxeconcepts'; // API User Username
$password = 'Pw4Fiverr1'; // API User Password
$vendor = 'luxeconcepts'; // Merchant Login ID
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
    //file_put_contents('text.txt', json_encode($_POST));
file_put_contents('text.txt', $result);


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