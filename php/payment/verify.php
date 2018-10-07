<?php
//Docs: https://github.com/emtiyaz-app/docs#payment
//Repository: https://github.com/emtiyaz-app/samplecode-php

include_once("payment_library.php");
$transaction_authority = get('authority');

$verify_parameter = array();
$verify_parameter['token'] = 'REPLACE YOUR MERCHANT TOKEN';
$verify_parameter['authority'] = $transaction_authority;
$r = emtiyaz_verify($verify_parameter);

if($r->status == 100){
    echo "Transaction verified";
}else{
    echo "Not verify!";
}

