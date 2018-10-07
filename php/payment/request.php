<?php
//Docs: https://github.com/emtiyaz-app/docs#payment
//Repository: https://github.com/emtiyaz-app/samplecode-php

include_once("payment_library.php");

if(post('amount') > 0) {
    $request_parameter = array();
    $request_parameter['token'] = 'REPLACE YOUR MERCHANT TOKEN';
    $request_parameter['cancel'] = 'http://www.mystore.com/cancel.php';
    $request_parameter['success'] = 'http://www.mystore.com/verify.php';
    $request_parameter['currency'] = 'IRR';

    $request_parameter['amount'] = post('amount');
    $request_parameter['item'] = post('item');
    $request_parameter['cellphone'] = post('cellphone');
    $request_parameter['email'] = post('email');

    if ($request_parameter['amount'] > 0) {
        $r = emtiyaz_request($request_parameter);
        if ($r->status == 200) {
            $transaction_authority = $r->authority;
            $offerwall = "https://offerwall.emtiyaz.app/?authority=" . $transaction_authority;
            header("Location: $offerwall");
            exit;
        }
    }
}


