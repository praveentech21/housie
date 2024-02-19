<?php

session_start();
if($_POST['mobile'])
{
  $pid=$_POST['mobile'];
  $pin=$_POST['pin'];

  include "connect.php";  
  
  $result=mysqli_query($conn, "select * from players where pid='$pid' and pin='$pin' and status=1");
  
  if(mysqli_num_rows($result) > 0)
   {
 	 $profile=mysqli_fetch_array($result);
	 $_SESSION['pid']=$profile['pid'];    	
	 $_SESSION['player_name']=$profile['player_name'];    	
	 $_SESSION['place']=$profile['place'];    	
	 $_SESSION['points']=$profile['points'];    	
     mysqli_query($conn, "update players set lastseen=now() where pid='$pid' and pin='$pin'");	 
   }
  else
   {
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    session_destroy();
	
	$result=mysqli_query($conn, "select * from players where pid='$pid'");
    if(mysqli_num_rows($result) > 0)
	  { 
        header("Location:index.php?pwderror");
        exit;
	  }	
    else
   	  { 
        header("Location:index.php?uiderror");
        exit;
	  }	
   }
}
else if(isset($_SESSION['pid']))
{
  $pid=$_SESSION['pid'];    	
}
else #if user access the page directly, redirect to login page
{
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    session_destroy();
	header("Location:index.php");
	exit;
}

/*
session_start();
if($_SESSION['pid']) #checking if session already exists
   {
	$pid=$_SESSION['pid'];
   	include "connect.php";
    //mysqli_query($conn, "UPDATE players SET lastseen = NOW() WHERE pid = '$pid'");
   }
else if($_POST["mobile"]) #if session doesn't exist, create one
    {
     $mobile = addslashes(trim($_POST["mobile"]));
     $pin = addslashes(trim($_POST["pin"]));
   
   	 include "connect.php";

	 $player=mysqli_query($conn, "SELECT * FROM players where pid = '$mobile' and pin='$pin';"); 		

     if(mysqli_num_rows($player) > 0)
       {
		   $details=mysqli_fetch_array($player);

           $_SESSION['pid'] = $details['pid'];
           $_SESSION['name'] = $details['player_name'];
           $_SESSION['place'] = $details['place'];
      	   //mysqli_query($conn, "UPDATE players SET lastseen = NOW(), status=1 WHERE pid = '$mobile'");		   
	   }
     else
        {
           session_destroy();
           header("Location:index.php?pwderror");
           exit;
        }
  }
else  #if user access the page directly, redirect to login page
{
 session_destroy();
 header("Location:index.php");
 exit;
}
*/

?>
