<?php
  session_start();
  
  $picture  = "";
  $name     = "";
  $position = "";
  $email    = "";
  $score    = "";
  
  $userData = $_SESSION['userData'];
  if(!isset($_SESSION['userData'])) {
    echo "you are not looged in</br>";
    $output = '<a href="login.php">login</a>';
  } else {
    $output = '<a href="logout.php">logout</a>';
    var_dump($userData);
  }

  



/*  
 * FACEBOOK SECTION
 * 
 $userData = $_SESSION['userData'];
 if(!isset($_SESSION['userData'])) {
    echo "you are not looged in</br>";
    $output = '<a href="login.php">login</a>';
  } else {
    $output = '<a href="'.$userData['logoutURI'].'">logout</a>';
    var_dump($userData);
  }
  */
  
 
  
  
?>
<html>
<head>
<title> GiftMe::Home</title>
</head>
<body>
    <?php echo '<img style="position: absolute; top: 90%; left: 25%;" src="'.$userData['picture'].'"/>'; ?>
    <?php echo $userData['first_name'] . " " . $userData['last_name']; ?>
    
    
    
    
    <div><?php echo $output; ?></div>
</body>
</html>
