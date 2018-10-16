<?php
//Docs: https://github.com/emtiyaz-app/docs#payment
//Repository: https://github.com/emtiyaz-app/samplecodes

include_once("payment_library.php");

if(post('amount') > 0) {

    $request_parameter = array();
    $request_parameter['token'] = '081be1fb910cd07a4254e768e9e2e64e7b98c474'; //Replace your private token, Get your private token from here https://emtiyaz.app/merchant/
    $request_parameter['cancel'] = 'https://samplecodes.emtiyaz.app/php/payment/';
    $request_parameter['success'] = 'https://samplecodes.emtiyaz.app/php/payment/verify.php';
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


