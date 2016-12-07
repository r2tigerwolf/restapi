<?php
    $ch = curl_init('http://localhost/github/restapi/16');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    echo $result;    
?>