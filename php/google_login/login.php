<?php

session_start();

include_once 'gConfig.php';
require_once 'User.php';

$debug = array();

$output = "";
$token = "";
$warnings = "";

if ( isset( $_GET['code'] ) ){
  
    $gClient->authenticate( $_GET['code'] );
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ./');
    
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken( $_SESSION['token'] );

    //Get user Id from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    $oauth_uid = $gpUserProfile['id'];
    
    $user = new User();
    
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    
    
    header('Location: ' . filter_var('https://localhost/giftme/php/google_login/index.php', FILTER_SANITIZE_URL));
} else {
    $debug[] = "token is not set";
    $authUrl = $gClient->createAuthUrl();
    $googleLoginURL = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="../../img/google-login.png" alt="" height="42" width="220"/></a>';
}

?>


<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>GiftMe::Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="../../css/custom.css" rel="stylesheet">

       
    <script src="../../js/stables.js" type="text/javascript"></script>
        
	<style>
	</style>
</head>

<body>

  <!-- Wrapper div -->
  <div class="container-fluid">    
    
    <!-- Including the navbar -->
    <?php include '../nav.html';?>    
    <?php echo $warnings; ?>  
    <!-- Login Div -->
    <div class="row content">
      
      <div class="col-md-4 sidenav"></div>
    
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <p> Please sign in. </p>
          </div>
          <div class="panel-body">
            <?php echo $googleLoginURL; ?>
          </div>
        </div>
      </div>
    
      <div class="col-md-4 sidenav"></div>
      
    </div>
    
  </div>
</body>  
