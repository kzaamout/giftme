<?php
//Include GP config file
//include_once 'gpConfig.php';

require_once 'gClient.php';

session_start();
//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userInfo']);
unset($_SESSION['login']);



//Reset OAuth access token
$gClient->revokeToken();

//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location:index.php");
?>
