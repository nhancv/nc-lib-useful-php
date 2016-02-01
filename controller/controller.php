<?php

/**
 * Created by PhpStorm.
 * User: nhancao
 * Date: 1/31/16
 * Time: 2:54 PM
 */
require_once dirname(__FILE__) . '/function/json_encode_utf8.php';

class controller
{
    public static $response = array();
    public static function executeBasicAu($remote_url, $username, $password)
    {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Authorization: Basic " . base64_encode("$username:$password")
            )
        );

        $context = stream_context_create($opts);
        $json = @file_get_contents($remote_url, false, $context);
        if ($json === false) {
            if (strpos($http_response_header[0], 'HTTP/1.1 401 Unauthorized') !== false) {
                $response["message"] = "Unauthorized";
            }else{
                $response["message"] = "Not support this format";
            }
            echo json_encode($response);
        } else {
            print($json);
        }


    }
}