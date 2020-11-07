<?php
    $api        = 'http://api.conmebol.com/portalmedico/public/v1';
    $aut        = 'dXNlcl9zZmhvbG94Om5zM3JfNWZoMCEweA==';

    $api_comet  = 'https://api-latam.analyticom.de/api/export/comet';
    $aut_comet  = 'ZGllZ29nb256YWxlejpkaWVnb2dvbnphbGV6Q09O';

    function get_curl($ext){
        global $api;
        global $aut;
        $urlAPI                     = $api.'/'.$ext;
        $ch                         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: Basic ".$aut, "Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result                     = curl_exec($ch);
        curl_close($ch);
        $result                     = json_decode($result, TRUE);
        return $result;
    }

    function post_curl($ext, $data){
        global $api;
        global $aut;
        $urlAPI                     = $api.'/'.$ext;
        $ch                         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: Basic ".$aut, "Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result                     = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function put_curl($ext, $data){
        global $api;
        global $aut;
        $urlAPI                     = $api.'/'.$ext;
        $ch                         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: Basic ".$aut, "Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result                     = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function delete_curl($ext, $data){
        global $api;
        global $aut;
        $urlAPI                     = $api.'/'.$ext;
        $ch                         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: Basic ".$aut, "Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result                     = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function get_curl_comet($ext){
        global $api_comet;
        global $aut_comet;
        $urlAPI                     = $api_comet.'/'.$ext;
        $ch                         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: Basic ".$aut_comet, "Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result                     = curl_exec($ch);
        curl_close($ch);
        $result                     = json_decode($result, TRUE);
        return $result;
    }
?>