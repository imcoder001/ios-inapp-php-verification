<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'class/IOSPaymentVerifier.php';

if (empty($_POST)) {
    exit("You cant send empty data");
}
if (!isset($_POST['receipt']) && $_POST['receipt'] == ''):
    exit('Receipt cannot be null');
endif;

//$mode = 'live';
$mode = (isset($_POST['sandbox']) && $_POST['sandbox'] == 1) ? 'sandbox': 'live';

$receipt = $_POST['receipt'];


$verifier = new IOSPaymentVerifier($mode, $receipt);

if (!$verifier) {
    exit("Error Found.. Please try again later");
}


echo "<pre>";
print_r($verifier->getData());
echo "</pre>";