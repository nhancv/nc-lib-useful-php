<?php  
header("Content-Type: text/html;charset=UTF-8");
header('Access-Control-Allow-Origin: *');
// array for JSON response
$response = array();
require_once dirname(__FILE__) . '/controller/function/json_encode_utf8.php';
require_once dirname(__FILE__) . '/controller/controller.php';
if(isset($_GET["url"])) {
    $url=$_GET["url"];
}else if(isset($_POST["url"])) {
    $url=$_POST["url"];
}

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

if (isset($url) && isset($username) && isset($password)) {
    controller::executeBasicAu($url, $username, $password);
}else {
    $response["message"] = "Required field(s) is missing: url (required)";
    echo json_encode($response);
}

?>