<?php
$data = array(
    "AMOUNT" => 1000,
    "CURRENCY" => "RUR",
    "ORDER" => "123456789",
    "NONCE" => "rendom_nonce"
);

$params = [
    "key" => "3654BC976322B23640D6F08F18DB23C5",
    "sign" => ['AMOUNT', 'CURRENCY', 'ORDER', 'NONCE']
];

function toMacData($param){
    return iconv_strlen($param,'UTF-8')."".$param;
}

function getMacData($data, $sign){
    $result = "";
    foreach($sign as $item){
        $result = $result."".toMacData($data[$item]);
    }
    return $result;
}

$psign = hash_hmac('sha1', getMacData($data, $params["sign"]), hex2bin($params['key']));
echo $psign;
?>