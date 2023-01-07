<?php

$ch=curl_init();
$url='http://localhost:8000';



$datas=array("pid"=>"CRAF-0-A#1");
$data=http_build_query($datas);
echo $data;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);


$resp=curl_exec($ch);
if($e=curl_error($ch)){
    echo $e;
}
else{
    $decoded=json_decode($resp);
    print_r($decoded);
}

curl_close($ch);


?>