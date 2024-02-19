<?php include "access_check.php"; ?>
<?php
      session_start();
      include "connect.php";
      $pid = $_GET['pid'];
      $opin = $_GET['opin'];
      $npin = $_GET['npin'];
	
   	  $pin_chk=mysqli_query($conn, "SELECT * FROM players where pid='$pid' and pin='$opin';"); 		
	  if(mysqli_num_rows($pin_chk) > 0)
		{  
  		 mysqli_query($conn,"update players set pin='$npin' where pid='$pid';"); 	
    	 echo "PIN Updated!";
		}
      else
	    {
  		 echo "<span style='color:red'><b>Wrong Current PIN!<b></span>";
		}
?>