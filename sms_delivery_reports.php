<?php

// Step 1: set your API_KEY from https://sms.serverclub.digital/sms-api/info

$api_key = 'a3l0am5pd3JodWxwQnhCbE9nYkM=';

// Step 2: Replace your Install URL like https://sms.serverclub.digital/sms/api with https://sms.serverclub.digital/
// <sms/api> is mandatory.

$url = 'https://sms.serverclub.digital/sms/api';

// Create SMS Body for request
$sms_body = array(
    'action' => 'get-inbox',
    'api_key' => $api_key
);

$send_data = http_build_query($sms_body);

$gateway_url = $url . "?" . $send_data;

try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}
