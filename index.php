<?php

//test

session_start();

// if user is not logged in, then go to login page.
if (isset($_SESSION['login'])){
    $login = $_SESSION['login'];
} 

if (empty($login)){
    header('Location: ' . filter_var('http://smart.zaamout.com/todo3/login.php', FILTER_SANITIZE_URL));
}

$picture  = "";
$name     = "";
$position = "";
$email    = "";
$score    = "";

// get UserInfo info from Session
$userInfo = $_SESSION['userInfo'];



if(!empty($userInfo)){
    $picture = $userInfo['picture'];
    $name    = $userInfo['first_name'].' '. $userInfo['last_name'];
    $email   = $userInfo['email'];
    $position= $userInfo['position'];
    $score   = $userInfo['score'];
}else{
    $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
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

    <title>ProjectManager :: DashBoard</title>

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

<div class="container-fluid" id='mainDiv'>

		<!-- Left Column -->
		<div class="col-sm-2" style="width: 260px;">

			<!-- User Profile Pane -->
			<div class="panel panel-default"  id="divUserProfile">
                            <div class="panel-body">
                                <div >
                                    <img id="userImage" src="<?php echo $picture; ?>" width=100 height=100 class="img-circle" alt="Smiley face" >
                                </div>
                                <div class="panel-body">
                                    <p><?php echo $name; ?></p>
                                    <p><?php echo $position; ?></p>
                                    <p><?php echo $email; ?></p>
                                    <p><?php echo $score; ?></p>
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

			<!-- Tasks Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-check"></span> Tasks</h1>
				</div>
				<div class="list-group">
					<a href="#" class="list-group-item">> List</a>
					<a href="#" class="list-group-item">> Add</a>
					<a href="#" class="list-group-item">> Delete</a>
					<a href="#" class="list-group-item">> Modify</a>
				</div>
			</div>
			
			<!-- Projects Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-flash"></span> BrainStorming</h1>
				</div>
				<div class="list-group">
					<a href="#" class="list-group-item">> List</a>
					<a href="#" class="list-group-item">> Add</a>
					<a href="#" class="list-group-item">> Delete</a>
					<a href="#" class="list-group-item">> Modify</a>
				</div>
			</div>
			
			<!-- Text Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<span class="glyphicon glyphicon-bullhorn"></span> 
						Active Predomination
					</h3>
				</div>
				<div class="panel-body">
					<p>Proactively envisioned multimedia based expertise and cross-media growth strategies.</p>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default">Resource</button>
						<button type="button" class="btn btn-default">Envision</button>
						<button type="button" class="btn btn-default">Niche</button>
					</div>
				</div>
			</div>	
				
		</div><!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-7" id="CenterColumn">
		
			<!-- Alert -->
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Synergize:</strong> Seamlessly visualize quality intellectual capital!
			</div>		
		
			<!-- Articles -->
			<div class="row">
				<h2>Projects</h2>
				<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal">New</button>
				<button type="button" class="btn btn-default">Delete</button>

				
                                <table id="projectTable" class="table table-hover">
                                    
                                </table>
                                
				<ul class="pagination">
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
			</div>
			<hr>
			<div class="row">
				<h2>Tasks</h2>
				<button type="button" class="btn btn-default">New</button>
				<button type="button" class="btn btn-default">Delete</button>
				<table id="tasksTable" class="table table-hover">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Status</th>
						<th>Priority</th>
						<th>Owner</th>
						<th>Assigned To</th>
						<th>Project</th>
						<th>Due Date</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Cron Controller</td>
						<td>Open</td>
						<td>Lowest (10)</td>
						<td>Saad</td>
						<td>paul, nicole</td>
						<td>Cron Controller</td>
						<td>2017-12-03</td>
					  </tr>
					  <tr>
						<td>Domain Controller</td>
						<td>Open</td>
						<td>Highest (1)</td>
						<td>Heman</td>
						<td>paul, nicole, saad</td>
						<td>Cron Controller</td>
						<td>2017-10-17</td>
					  </tr>

					</tbody>
				  </table>
				  <ul class="pagination">
					  <li><a href="#">1</a></li>
					  <li class="active"><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
				  </ul>

			</div>
			<hr>      
			<div class="row">
				<article class="col-xs-12">
					<h2>Completely Synergize</h2>
					<p>Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
					<p><button class="btn btn-default">Read More</button></p>
					<p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
					<ul class="list-inline">
						<li><a href="#">2 Days Ago</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-comment"></span> 12 Comments</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-share"></span> 18 Shares</a></li>
					</ul>
				</article>
			</div>
			<hr>
		</div><!--/Center Column-->


	  <!-- Right Column -->
	  <div class="col-sm-3">

			
 
 
			<!-- Progress Bars -->
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

			<!-- Progress Bars -->
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
			

	  </div><!--/Right Column -->

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



        
	
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
    <!-- IE10 viewport bug workaround -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- Placeholder Images -->
    <script src="js/holder.min.js"></script>
	
</body>

</html>
<script>
    var modal = '   <div class="modal fade" id="myModal" role="dialog"> \
                        <div class="modal-dialog">  \
                            <!-- Modal content-->   \
                            <div class="modal-content"> \
                                <div class="modal-header"> \
                                  <button type="button" class="close" data-dismiss="modal">&times;</button> \
                                  <h4 class="modal-title">New Project</h4> \
                                </div> \
                                <div class="modal-body"> \
                                    <label for="name">Name</label> \
                                    <input type="text" class="form-control" id="btnName"> \
                                    <label for="comment">Comments</label> \
                                    <input type="text" class="form-control" id="btnComment"> \
                                    <label for="date">DueDate</label> \
                                    <input type="text" class="form-control" id="btnDate"> \
                                    <label for="assginto">AssignedTo</label> \
                                    <div class="dropdown"> \
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> \
                                            <span id="uSelected">Choose option</span> \
                                            <span class="caret"></span> \
                                        </button> \
                                        <ul class="dropdown-menu" id="ulUser"> \
                                            <li><a href="#">1: Hightest</a></li> \
                                        </ul> \
                                    </div> \
                                    <label for="priority">Priority</label> \
                                    <div class="dropdown"> \
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> \
                                            <span id="pSelected">Choose option</span> \
                                            <span class="caret"></span> \
                                        </button> \
                                        <ul class="dropdown-menu" id="ulPriority"> \
                                            <li><a href="#">1: Hightest</a></li> \
                                            <li><a href="#">2: Hight</a></li> \
                                            <li><a href="#">3: Middle</a></li> \
                                            <li><a href="#">4: Low</a></li> \
                                            <li><a href="#">5: Lowest</a></li> \
                                        </ul> \
                                    </div> \
                                </div> \
                                <div class="modal-footer"> \
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> \
                                  <button type="button" class="btn btn-default" id="submitProject">Add</button> \
                                </div> \
                            </div> \
                        </div> \
                    </div>'; 
                    
    
    
        
    // FUNCTIONS
    // NOT USED
    function GetURLParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    }


    

    // On page load, get all users, get all of the categories, get the user info
    $( document ).ready(function() {
        // 1. load all system users to populate the users drop down menu
        if (localStorage.getItem("displayName") == null) {
            $.get(
                "http://smart.zaamout.com/todo3/api.php?action=users_list",
                function (data, status) {
                    res = JSON.parse(data);
                    console.log(res.data[0].displayName);
                    var ul = document.getElementById('ulUser');
                    for  (var i = 0; i < res.data.length; i++) {
                        var li = document.createElement('li');
                        var a = document.createElement('a');
                        a.innerHTML = res.data[i].displayName;
                        a.setAttribute('href', '#')
                        li.appendChild(a);
                        ul.appendChild(li);
                    }
                    
                }
            );
            $('#mainDiv').append(modal);
        }
        $("#myModal").on("shown.bs.modal", function () { 
            
        })

        // MODAL: what happen when a priority is selected 
          $('#ulUser a').click(function(){
            console.log('user');
            $('#uSelected').text($(this).text());
        });
        $('#ulPriority a').click(function(){
            console.log('priority');
            $('#pSelected').text($(this).text());
        }); 
        
        // MODAL: what happen when a button 'ADD' is clicked
        $('#submitProject').click(function(){

            // 0. collect the data
            var d = new Object();
            d.name = document.getElementById('btnName').value;
            d.assingTo = document.getElementById('btnAssginto').value;
            d.comments = document.getElementById('btnComment').value;
            d.duedate  = document.getElementById('btnDate').value;
            d.priority = document.getElementById('selected').innerHTML;
            d.owner    = "saad";
            d.status   = "open";
            //console.log(d);

            // 1. Post (ajax) to server
            $.post(
                "http://smart.zaamout.com/todo3/api.php?action=project_add",
                d,
                function(data, status){
                    console.log("status:" + status);
                })

            // 2. close the modal
            $('#myModal').modal('hide');

            // 3. add the info of the modal to the datatable.
            projectTable.append([d.name, d.status, d.priority, "", d.owner, d.assingTo, d.duedate ]);
        });

        $('#myModal').on('hidden.bs.modal', function (e) {
            var input = $(this).find("input");  // cache the variable
            //console.log(input);
        });

        
    });
    
    
        
  
    
    


    var projectTable = new sTables({
        tableId: "projectTable",
        columns: ['id', 'Name','Status', 'Priority', 'Progress', 'Owner', 'Assigned To', 'Due Date'],
        //data: [['Cron Controller', 'Open', 'Lowest (10)', 'Saad', 'paul, nicole', 'Cron Controller', '2017-12-03'],
        //        ['Cron Controller', 'Open', 'Lowest (10)', 'Saad', 'paul, nicole', 'Cron Controller', '2017-12-03']],
        ajax   : {
              url: "http://smart.zaamout.com/todo3/api.php?action=project_list",
              onsuccess: function ( res ){
                    //console.log("test");
              }
        }
    });


  
    
    
    
</script>











