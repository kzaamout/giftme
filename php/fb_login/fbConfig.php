<?php

if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once '../lib/facebook-php-sdk/vendor/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Configuration and setup Facebook SDK
 */
$appId         = '610997815933914'; //Facebook App ID
$appSecret     = '5271f9274d811b5d3edfde79828542b1'; //Facebook App Secret
$redirectURL   = 'https://localhost/giftme/php/'; //Callback URL
$fbPermissions = array('email');  //Optional permissions

$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.10',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
  if(isset($_SESSION['facebook_access_token'])){
      $accessToken = $_SESSION['facebook_access_token'];
  }else{
      $accessToken = $helper->getAccessToken();
  }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}

?>
