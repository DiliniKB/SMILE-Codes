<?php
function check_isset($arr){
    foreach($arr as $name){
        if(!isset($_POST[$name])){
            echo $name;
            return false;
        }
    }
    return true;
}

function get_data_from_url($url, $paras){
    
    $paras = http_build_query($paras);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url.'?'.$paras);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//getting response
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//allow redirects
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

?>