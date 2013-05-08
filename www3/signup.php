<?php

include "MCAPI.class.php";

$apikey = "b3e4e44d6570dde4047d64df68196569-us5";
$listId = "3235809f24";


$api = new MCAPI($apikey);

$merge_vars = array('FNAME'=>$_REQUEST['firstname'], 'LNAME'=>$_REQUEST['lastname'], 'COMPANY'=>$_REQUEST['company']); 

// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!
$retval = $api->listSubscribe( $listId, $_REQUEST['email'], $merge_vars );

if ($api->errorCode){
  $response['status']="FAIL";
  $response['code']=$api->errorCode;
  $response['message']=$api->errorMessage;
} else {
  $response['status']="OK";
}

echo json_encode($response);

 ?>