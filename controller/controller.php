<?php

/**
 * Created by PhpStorm.
 * User: nhancao
 * Date: 1/31/16
 * Time: 2:54 PM
 */
class controller
{
    public static function executeBasicAu($remote_url, $username, $password)
    {

        // Create a stream
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Authorization: Basic " . base64_encode("$username:$password")
            )
        );

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        $file = file_get_contents($remote_url, false, $context);

        print($file);

    }
}