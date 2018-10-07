<?php
//Docs: https://github.com/emtiyaz-app/docs#callback
//Repository: https://github.com/emtiyaz-app/samplecode-php

function parameter($p){
    if(!isset($_GET[$p])) {
        if (!isset($_COOKIE[$p])) {
            return NULL;
        } else {
            return $val = $_COOKIE[$p];
        }
    }else{
        return $val = $_GET[$p];
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

function emtiyaz_callback($p) {

    $endpoint = "https://callback.emtiyaz.app/".$p['token'];
    $endpoint .= "?emtiyaz_click=".$p['click'];
    if(isset($p['ip'])) $endpoint .= "&emtiyaz_ip=".$p['ip'];
    if(isset($p['event'])) $endpoint .= "&emtiyaz_event=".$p['event'];
    if(isset($p['ios_idfa'])) $endpoint .= "&emtiyaz_ios_idfa=".$p['ios_idfa'];
    if(isset($p['google_ad_id'])) $endpoint .= "&emtiyaz_google_ad_id=".$p['google_ad_id'];
    if(isset($p['android_device_id'])) $endpoint .= "&emtiyaz_android_device_id=".$p['android_device_id'];

    $output = file_get_ipv4_contents($endpoint);
    $result = json_decode($output);
    return $result;
}




