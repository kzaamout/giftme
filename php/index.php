<?php
  session_start();

  //var_dump($_SESSION['userData']);    
  var_dump($_SESSION['userData']['logoutURI']);
  if(!isset($_SESSION['userData'])) {
    echo "you are not looged in</br>";
    $output = '<a href="login.php">login</a>';
  } else {
    $output = '<a href="'.$_SESSION['userData']['logoutURI'].'">logout</a>';
  }
?>
<html>
<head>
<title> GiftMe::Home</title>
</head>
<body>
    <!-- Display login button / Facebook profile information -->
    <div><?php echo $output; ?></div>
</body>
</html>
