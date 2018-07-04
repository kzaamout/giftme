<?php

session_start();

include_once 'gClient.php';
require_once 'User.php';

$debug = array();

$output = "";
$token = "";
$warnings = "";

if ( isset( $_GET['code'] ) ){
    $gClient->authenticate( $_GET['code'] );
    $_SESSION['token'] = $gClient->getAccessToken();
    
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken( $_SESSION['token'] );

    //Get user Id from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    $oauth_uid = $gpUserProfile['id'];
    
    $user = new User();
    
    if (!$user->exist($oauth_uid)) {
        $warnings = '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Login Fail:</strong> user does not exist. If you are not registered, please click <a href="singup.php">here</a> to register a new account!
                    </div>';
        unset($_SESSION['token']);
        header('Location: ' . filter_var('http://smart.zaamout.com/todo3/login.php', FILTER_SANITIZE_URL));
        
    } else {
        $userInfo = $user->get_userInfo($oauth_uid);

        //Storing user data into session
        $_SESSION['userInfo'] = $userInfo;
        $_SESSION['login']    = true;

        header('Location: ' . filter_var('http://smart.zaamout.com/todo3/index.php', FILTER_SANITIZE_URL));
    }
} else {
    $debug[] = "token is not set";
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
            <?php echo $warnings; ?>
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
                            <button type="submit" class="btn btn-default" style="float: right;">Log In</button>
                            <p><a>Forgot my username or password</a></p>
                            
                            
                            <p>Dont have an account? <a href='singup.php'>Sign Up</a></p>
                        
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
                    <p> Other Login options </p>
                    <?php echo $output; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 sidenav"></div>
    </div>
</div>
    
</div>
    
    
        
    
    
