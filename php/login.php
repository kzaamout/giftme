<?php

  require_once 'fbConfig.php';
  require_once 'User.php';

  if(isset($accessToken))
  {
    echo "access token is set</br>";
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
      header('Location: ./');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,cover,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Initialize User class
    $user = new User();
    
    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUserProfile['id'],
        'first_name'    => $fbUserProfile['first_name'],
        'last_name'     => $fbUserProfile['last_name'],
        'email'         => $fbUserProfile['email'],
        'gender'        => $fbUserProfile['gender'],
        'locale'        => $fbUserProfile['locale'],
        'cover'         => $fbUserProfile['cover']['source'],
        'picture'       => $fbUserProfile['picture']['url'],
        'link'          => $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);
    $userData['logoutURI'] = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
    
    // Put user data into session
    $_SESSION['userData'] = $userData;
    
    header("Location: ./index.php");
    
  }else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL.'login.php', $fbPermissions);
    
    // Render facebook login button
    $facbookLoginUrl = '<a href="'.htmlspecialchars($loginURL).'"><img src="../img/fb_login.png" alt="Login via facebook" style="width:200px;height:50px;"></a>';
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="../css/custom.css" rel="stylesheet">

       
    <script src="../js/stables.js" type="text/javascript"></script>
        
	<style>
	</style>
</head>

<body>

  <!-- Wrapper div -->
  <div class="container-fluid">    
    
    <!-- Including the navbar -->
    <?php include 'nav.html';?>    
    
    <!-- Login Div -->
    <div class="row content">
      
      <div class="col-md-4 sidenav"></div>
    
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <p> Please sign in. </p>
          </div>
          <div class="panel-body">
            <?php echo $facbookLoginUrl; ?>
          </div>
        </div>
      </div>
    
      <div class="col-md-4 sidenav"></div>
      
    </div>
    
  </div>
</body>  
