<?php include "access_check.php"; ?>
<?php
      session_start();
      include "connect.php";
      $pid = $_GET['pid'];
      $player_name=addslashes(ucwords(strtolower($_GET['player_name'])));		   
	  $place = $_GET['place'];

  	  mysqli_query($conn,"update players set player_name='$player_name', place='$place' where pid='$pid';"); 	
      $_SESSION['place']=$place;	  
      $_SESSION['player_name']=$player_name;	  
	  echo "Profile Updated!";
?>