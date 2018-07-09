<?php
session_start();
//
//// if user is not logged in, then go to login page.
//if (isset($_SESSION['login'])){
//    $login = $_SESSION['login'];
//}
//
//if (empty($login)){
//    header('Location: ' . filter_var('http://smart.zaamout.com/todo3/login.php', FILTER_SANITIZE_URL));
//}
//$picture  = "";
//$name     = "";
//$position = "";
//$email    = "";
//$score    = "";
// get UserInfo info from Session
//$userInfo = $_SESSION['userInfo'];
//if(!empty($userInfo)){
//    $picture = $userInfo['picture'];
//    $name    = $userInfo['first_name'].' '. $userInfo['last_name'];
//    $email   = $userInfo['email'];
//    $position= $userInfo['position'];
//    $score   = $userInfo['score'];
//}else{
//    $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
//}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">-->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!--$score   = $userInfo['score'];-->
        <title>ProjectManager :: DashBoard</title>

        <!--favicon-->
        <link rel="shortcut icon" type="image/png" href="/giftme/img/favicon.png"/>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
        <link href="css/custom.css" rel="stylesheet">

        <script src="js/stables.js" type="text/javascript"></script>

        <!--Gridly-->
        <link href="lib/gridly/stylesheets/sample_khobaib.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
        <script src="lib/gridly/javascripts/jquery.gridly.js" type="text/javascript"></script>
        <script src="lib/gridly/javascripts/sample_khobaib.js" type="text/javascript"></script> 

    </head>

    <body>

        <!-- Navigation -->
        <?php include 'php/nav.html'; ?>

        <div class="container-fluid" id='mainDiv'>

            <!-- Left Column -->
            <div class="col-sm-2">

                <!-- User Profile Pane -->
                <div class="panel panel-default"  id="divUserProfile">
                    <div class="panel-body">
                        <div >
                            <!--<img id="userImage" src="<?php echo $picture; ?>" width=100 height=100 class="img-circle" alt="Smiley face" >-->
                        </div>
                        <div class="panel-body">
<!--                                    <p><?php echo $name; ?></p>
                            <p><?php echo $position; ?></p>
                            <p><?php echo $email; ?></p>
                            <p><?php echo $score; ?></p>-->
                            <a href='logout.php'>Logout</a>
                        </div>
                    </div>
                </div>

                <!-- Projects Panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Project</h1>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">> List</a>
                        <a href="#" class="list-group-item">> Add</a>
                        <a href="#" class="list-group-item">> Delete</a>
                        <a href="#" class="list-group-item">> Modify</a>
                    </div>
                </div>

            </div><!--/Left Column-->


            <!-- Center Column -->
            <div class="col-sm-7" id="CenterColumn" >

                <!-- List Item -->

                <section class="row">
                    <h2>Birthday Gifts</h2>
                    <hr>
                    
                    <div class="example gridly" > 

                        <!--                        <div class='brick small' style="display: inline; float: none; text-align: center; align-content: center;align-items: center;align-self: center">-->
                        <div class='brick small'>

                            <div class="col-sm-4"> 
                                <div id="item_picture" >
                                    <img src="img/htc.png" width="100%" height="100%" alt="htc" />
                                </div>
                                
                            </div>

                            <div class="col-sm-8"> 
                                <div class="row" style="height: 30%">
                                    
                                    <div class="col-sm-10">
                                        <p>Name of the item </p> </div>
                                    <div class='col-sm-2 delete glyphicon glyphicon-remove'></div>
                                    
                                </div>
                                <hr>
                                <div class="row" style="height: 75%">
                                    <div class="progress"  style="width:95%">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                                             aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                            90% ($1,431)
                                        </div>
                                    </div>
                                </div>
                            </div>



                            

                        </div>
                    </div>
                    <p class="actions">
                        <a class="add button" href="#">Add</a>
                    </p>
                </section>

            </div><!--/Center Column-->


            <!-- Right Column -->
            <!--            <div class="col-sm-3">
                             Progress Bars 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <span class="glyphicon glyphicon-scale"></span>
                                        Dramatically Engage
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                                             aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                            100% Proactively Envisioned
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80"
                                             aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                            80% Objectively Innovated
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100" style="width:45%">
                                            45% Portalled
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="35"
                                             aria-valuemin="0" aria-valuemax="100" style="width:35%">
                                            35% Done
                                        </div>
                                    </div>
                                </div>
                            </div>
            
            
                        </div>/Right Column -->

        </div><!--/container-fluid-->

        <footer>
            <div class="footer-blurb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 footer-blurb-item">
                            <h3><span class="glyphicon glyphicon-text-size"></span> Dynamic</h3>
                            <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                            <p><a class="btn btn-default" href="#">Procrastinate</a></p>
                        </div>
                        <div class="col-sm-3 footer-blurb-item">
                            <h3><span class="glyphicon glyphicon-wrench"></span> Efficient</h3>
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. </p>
                            <p><a class="btn btn-default" href="#">Unleash</a></p>
                        </div>
                        <div class="col-sm-3 footer-blurb-item">
                            <h3><span class="glyphicon glyphicon-paperclip"></span> Complete</h3>
                            <p>Professionally cultivate one-to-one customer service with robust ideas. Completely synergize resource taxing relationships via premier niche markets. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                            <p><a class="btn btn-default" href="#">Complete</a></p>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="small-print">
                <div class="container">
                    <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
                    <p>Copyright &copy; Example.com 2015 </p>
                </div>
            </div>
        </footer>

        <!--         jQuery 
                <script src="js/jquery-1.11.3.min.js"></script>
        
                 Bootstrap Core JavaScript 
                <script src="js/bootstrap.min.js"></script>   
        
                 Placeholder Images 
                <script src="js/holder.min.js"></script>-->

    </body>

</html>
