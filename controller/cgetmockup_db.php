<?php  
header("Content-Type: text/html;charset=UTF-8");
$response = array();
require_once dirname(__FILE__) . '/function/json_encode_utf8.php';
require_once dirname(__FILE__) . '/controller.php';

if(isset($_GET["u"])) {
    $username=$_GET["u"];
}else if(isset($_POST["u"])) {
    $username=$_POST["u"];
}

if(isset($_GET["p"])) {
    $password=$_GET["p"];
}else if(isset($_POST["p"])) {
    $password=$_POST["p"];
}
if (isset($username) && isset($password)) {
    $file = file_get_contents("../model/localdb/data.json");
    print($file);
}else {
    $response["message"] = "Required field(s) is missing: url (required)";
    echo json_encode($response);
}

?>