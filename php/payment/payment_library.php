<?php
//Docs: https://github.com/emtiyaz-app/docs#payment
//Repository: https://github.com/emtiyaz-app/samplecodes

function post($parameter){
    if(!isset($_POST[$parameter])) {
            return NULL;
    }else{
        return $val = $_POST[$parameter];
    }
}

function get($parameter){
    if(!isset($_GET[$parameter])) {
        return NULL;
    }else{
        return $val = $_GET[$parameter];
    }
}

function file_get_ipv4_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function emtiyaz_request($parameter) {
    $currency_valid = array('IRR'=>true, 'IRT'=>true, 'POT'=>true, 'USD'=>true);
    if(!isset($currency_valid[$parameter['currency']])) die('Invalid Currency');
    if((int) $parameter['amount'] <= 0) die('Invaild Amount');
    $endpoint = "https://api.emtiyaz.app/".$parameter['token']."/payment/request.json";
    $endpoint .= "?currency=".$parameter['currency'];
    $endpoint .= "&amount=".$parameter['amount'];

    if(isset($parameter['cancel'])) $endpoint .= "&cancel=".$parameter['cancel'];
    if(isset($parameter['success'])) $endpoint .= "&success=".$parameter['success'];
    if(isset($parameter['item'])) $endpoint .= "&item=".$parameter['item'];
    if(isset($parameter['cellphone'])) $endpoint .= "&cellphone=".$parameter['cellphone'];
    if(isset($parameter['email'])) $endpoint .= "&email=".$parameter['email'];

    $output = file_get_ipv4_contents($endpoint);
    $result = json_decode($output);
    return $result;
}

function emtiyaz_verify($parameter) {

    $endpoint = "https://api.emtiyaz.app/".$parameter['token']."/payment/verify.json";
    $endpoint .= "?currency=".$parameter['currency'];
    $endpoint .= "&amount=".$parameter['amount'];
    $endpoint .= "&authority=".$parameter['authority'];

    $output = file_get_ipv4_contents($endpoint);
    $result = json_decode($output);
    return $result;

}



