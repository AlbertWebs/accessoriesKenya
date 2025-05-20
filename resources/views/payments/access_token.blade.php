<?php
	date_default_timezone_set("Africa/Nairobi");


    require 'paymentsAPI.class.php';

    $consumerKey =  'QIi4GKdy4TOqbCTkWB6VMIJ6EpdHYGwg';
    $consumerSecret = 'Kq0iAKSKeLjXEtBe';

    # This class contains the method for simulating the transaction
    $BusninessAPI = new MobilePayments($consumerKey, $consumerSecret);

	$ShortCode = '602950';
	$BusinessShortCode = '174379';
	$Initiator = 'apiop70';
	$msisdn = '254708374149';
	$Timestamp = date('YmdHis');
	$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
	$Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

	$securityCredential = 'fRnYkhgZUIRPIv4YQF56zUM0CSucT/6IDjNVMnEc3r5FoLIbj9DESTGuP2kSlkgdfIZRupPXvjG3SU94hsVjkPlfB7BjfF19I4gntoWbqkSVGIpKb1XX31K/CEwn5yyIm2qkKKD5MHP5ljA0kF2LF1a1UFSeFwx7nicn5X00/5XULn6V3IXoqhZyLcNfHUvrA4i5PlV6BKPzgzx6n4W8VYkzmt0CSAB4a6PV/ol9KZhUb60Tt0ExeFA4tOtbse8QRbP4C08j8DWKhMHvQeat3E4aSEGcW3T9WJGcjWNpNDzWN2YiiEQiwlm43vIOcKDV3ZLfXAWwJRzgbniRVMKw+A==';

	# register url URLs
	$confirmationUrl = 'http://amanivehiclesounds.co.ke/prototype/public/cart/checkout/payments/confirmation_url.php';
	$validationUrl = 'http://amanivehiclesounds.co.ke/prototype/public/cart/checkout/payments/validation_url.php';

	/* b2b urls */
	$QueueTimeOutURL = 'https://designekta.com/mpesa_payments/FinalCode/b2b-api-db.php';
	$B2BResultURL = 'https://designekta.com/mpesa_payments/FinalCode/b2b-api-db.php';

	/* b2c urls */
	$B2CResultURL = 'https://designekta.com/mpesa_payments/FinalCode/b2c-api-db.php';
	$Occasion = 'Out Of Stock';


	/* reverse api urls */
	$reversalResultURL = 'https://designekta.com/mpesa_payments/FinalCode/reverse-api-db.php';


	/* lnmo api urls */
	$lnmoCallBackURL = 'https://designekta.com/mpesa_payments/FinalCode/lnmo-api-db.php';

	/* transaction status api urls */
	$transactionStatusResultURL = 'https://designekta.com/mpesa_payments/FinalCode/transaction-status-api-db.php';

	/* account balance api urls */
	$AccountBalanceResultURL = 'https://designekta.com/mpesa_payments/FinalCode/account-balance-api.php';
?>