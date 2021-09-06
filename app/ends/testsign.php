<?php

$plat = $_POST["plat"];

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


if ($plat == "facebook"){
    $url = "https://graph.facebook.com/me";
    $paras = [
        "access_token" => $_POST["code"],
        "fields"=>"email,name,first_name,last_name"
    ];

    print_r(get_data_from_url($url,$paras));
}else if($plat == "google") {
    $url = "https://oauth2.googleapis.com/tokeninfo";
    $paras = [
        "id_token" => $_POST["code"]
    ];

    print_r(get_data_from_url($url,$paras));
}


?>