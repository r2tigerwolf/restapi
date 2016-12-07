<?php
    $data = array("id"=>"79");
    
    $data_string = json_encode($data);
    
    $ch = curl_init('http://localhost/github/restapi/');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "delete");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    
    $result = curl_exec($ch);
    echo $result;
?>