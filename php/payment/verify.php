<?php
//Docs: https://github.com/emtiyaz-app/docs#payment
//Repository: https://github.com/emtiyaz-app/samplecodes

include_once("payment_library.php");
$transaction_authority = get('authority');

$verify_parameter = array();
$verify_parameter['token'] = '081be1fb910cd07a4254e768e9e2e64e7b98c474'; //Replace your private token, Get your private token from here https://emtiyaz.app/merchant/
$verify_parameter['authority'] = $transaction_authority;
$r = emtiyaz_verify($verify_parameter);

if($r->status == 200){

    echo "Transaction verified. <br/>";
    echo "<pre>";
    print_r($r);
    echo "</pre>";


}else{

    echo "Not verify! <br/>";
    echo "<pre>";
    print_r($r);
    echo "</pre>";

}

