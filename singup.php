<?php

session_start();

include_once 'gClient.php';
require_once 'User.php';

$output = "";
$token = "";

$gClient->setRedirectUri('http://smart.zaamout.com/todo3/singup.php');


if ( isset( $_GET['code'] ) ){
    echo "Code was aquired </br>";
    $gClient->authenticate( $_GET['code'] );
    $token = $gClient->getAccessToken();
    $_SESSION['token'] = $token;
    echo "Token was aquired </br>";
    echo "Token: " . $_SESSION['token'] . "</br>";
    print_r($_SESSION['token']);
}

if (isset($_SESSION['token'])) {
    
    $gClient->setAccessToken( $_SESSION['token'] );
    
       
    //Get user profile data from google
    $gUserProfile = $google_oauthV2->userinfo->get();
    
    $gUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gUserProfile['id'],
        'first_name'    => $gUserProfile['given_name'],
        'last_name'     => $gUserProfile['family_name'],
        'email'         => $gUserProfile['email'],
        'gender'        => $gUserProfile['gender'],
        'locale'        => $gUserProfile['locale'],
        'picture'       => $gUserProfile['picture'],
        'link'          => $gUserProfile['link']
    );
    
    
    $user = new User();
    // check if user exist in the database
    if ($user->exist($gUserData['oauth_uid'])) {
        echo "user exist </br>";
        // go to login screen, add warning to login screen to inform the user 
        // that his account already exist
        //Insert or update user data to the database
        //$userData = $user->checkUser($gpUserData);
        $userInfo = $user->get_userInfo($gUserProfile['id']);
        //Storing user data into session
        $_SESSION['userInfo'] = $userInfo;
        echo "UserInfo: </br>";
        print_r($userInfo);
        $_SESSION['login'] = true;
        header('Location: ' . filter_var('http://smart.zaamout.com/todo3/index.php', FILTER_SANITIZE_URL));
    } else {
        echo "user does not exist </br>";
        // use does not exit, then ask user to enter Display Name and position
        // and to accept the terms
        $_SESSION['gUserData'] = $gUserData;
        header('Location: ' . filter_var('http://smart.zaamout.com/todo3/registration.php', FILTER_SANITIZE_URL));
    }

} else {
    
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="img/google-login.png" alt="" height="42" width="220"/></a>';
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

    <title>Portal 1</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        
        <script src="js/stables.js" type="text/javascript"></script>
        
	<style>
	
	/* Tables CSS */
	.dataRow:hover { background-color:#E6E6E6 !important; }
	
	
	
	/* user profile div*/
	#divUserProfile{
		text-align: center;
		line-height: 0.75em;
	}
	
      
	</style>
</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span> ProjectManager</a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Products</a>
                    </li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                    <li><a href="#">Engage</a></li>
                                    <li><a href="#">Pontificate</a></li>
                                    <li><a href="#">Synergize</a></li>
                            </ul>
                    </li>    
                </ul>

                <!-- Search -->
                <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                                <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    
    
    
<div class="container-fluid">    
    <div class="row content">
        
        <div class="col-md-4 sidenav">
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="uid">User Id</label>
                                <input type="text" class="form-control" id="uid" name="uid" placeholder="MadCowMeow">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="********">
                            </div>
                            <button type="submit" class="btn btn-default" style="float: right;">Sign Up</button>
                            <p><a>Forgot my username or password</a></p>
                            
                            
                            <p>Already have an account? <a>login</a></p>
                        
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-4 sidenav"></div>
    </div>
    
    <div class="row content">
            <div class="col-md-4 sidenav">
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p> Other Sing Up options </p>
                    <?php echo $output; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 sidenav"></div>
    </div>
</div>
    

    
    
        
    
    
</body>