<?php
//Docs: https://github.com/emtiyaz-app/docs#callback
//Repository: https://github.com/emtiyaz-app/samplecode-php

include_once("callback_library.php");

if(parameter('emtiyaz_click')){

    $callback_parameter = array();
    $callback_parameter['token'] = '{private token}'; //Get you private token from here https://emtiyaz.app/bidder/settings
    $callback_parameter['click'] = parameter('emtiyaz_click');
    $callback_parameter['ip'] = parameter('emtiyaz_ip');
    $callback_parameter['event'] = parameter('emtiyaz_event');

    $r = emtiyaz_callback($callback_parameter);
    if($r->status == 200){
        //Done

    }
}

?>

