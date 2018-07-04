<?php

session_start();

include_once 'gClient.php';
require_once 'User.php';


$login = $_SESSION['login'];

if (empty($login)){
    header('Location: ' . filter_var('http://smart.zaamout.com/todo3/login.php', FILTER_SANITIZE_URL));
}


$debug = array();

$output = "";
$token = "";

$gUserData = $_SESSION['gUserData'];
if (isset($gUserData)) {
    
    
    if(!empty($_POST)){
        
        // add user to database
        $user = new User();
        $gUserData['position'] = $_POST['position'];
        $gUserData['displayName'] = $_POST['displayName'];
        $gUserData['department'] = $_POST['department'];
        $gUserData['created']    = date("Y-m-d H:i:s");
        $gUserData['modified']    = date("Y-m-d H:i:s");
        
    
        $res = $user->add($gUserData);
        
    
        $_SESSION['userInfo'] = $gUserData;
        $_SESSION['login'] = true;
        header('Location: ' . filter_var('http://smart.zaamout.com/todo3/index.php', FILTER_SANITIZE_URL));
        
    } 
} else {
    header('Location: ' . filter_var('http://smart.zaamout.com/todo3/singup.php', FILTER_SANITIZE_URL));
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
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="registerForm">
                            <div class="form-group">
                                <label for="displayName">Display Name</label>
                                <input type="text" class="form-control" id="displayName" name="displayName" placeholder="MadCowMeow">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="devops engineer, front-end developer">
                            </div>
                            
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="operation, development, netops">
                            </div>
                            <button type="submit" class="btn btn-default" style="float: right;">Create account</button>
                                                   
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
    
    
        
    
    
