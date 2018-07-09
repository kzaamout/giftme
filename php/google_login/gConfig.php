<?php

    
    require_once '../../lib/google-php-sdk/vendor/autoload.php';
    
    $clientId = '413255103478-opk0t3ngqb5bq3kk1vh45mbk0msd3ccl.apps.googleusercontent.com';
    $clientSecret = 'MLpSBiRKFx8QK3ccb3etxqc-';
    $redirectURL = 'https://localhost/giftme/php/google_login/login.php';

    //Call Google API
    $gClient = new Google_Client();
    $gClient->setApplicationName('Login to pm.com');
    $gClient->setClientId($clientId);
    $gClient->setClientSecret($clientSecret);
    $gClient->setRedirectUri($redirectURL);
    $gClient->addScope("email");
    $gClient->addScope("profile");
    $gClient->addScope("https://www.googleapis.com/auth/drive.file");
    $gClient->addScope("https://www.googleapis.com/auth/plus.me");
    $google_oauthV2 = new Google_Service_Oauth2( $gClient );
    $driveService   = new Google_Service_Drive ( $gClient );
