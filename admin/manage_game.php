<?php include "access_check.php"; ?>
<?php

date_default_timezone_set('Asia/Kolkata'); 

include "connect.php";

$opt=$_GET['opt'];
$gid=$_GET['gid'];

if($opt == 0 || $opt == 1 || $opt == 2 || $opt == 3)
{	
  mysqli_query($conn, "update games set status=$opt where gid=$gid;"); 		  
  echo "Status Changed Successfully!";
}

if($opt == 3)
{
  mysqli_query($conn, "delete from housie_current where gid=$gid;"); 		  
  echo "<br>Housie Board Cleared Successfully!";	
  mysqli_query($conn, "update winners set pid='' where gid=$gid;"); 		  
  echo "<br>Winners Removed Successfully!";	
}

if($opt == 4)
{
  $games_res=mysqli_query($conn, "select max(gid) from games;"); 		  
  $gno=mysqli_fetch_array($games_res);
  $gid=$gno[0];

  if($gid == "") {$gid=0;} 
  
  $today=date("Y-m-d");

//  $date = date("Y-m-d h:i:s");

/*$date = strtotime($date);
  $date = strtotime("+5 minute", $date);
  $date = date('Y-m-d H:i:s', $date);
 */ 
 
  $gid++;

  $date=$today." 19:00:00"; 

  mysqli_query($conn, "insert into games (gid, schedule, cost, status) values ($gid, '$date', 0, 3)"); 		  

  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'J5A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L1A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L2A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L3A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CNA', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'C6A', '', 6)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CSA', '', 3)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'FHA', '', 10)"); 		  
/*
  $date=$today." 19:15:00"; 
  $gid++;
  mysqli_query($conn, "insert into games (gid, schedule, cost, status) values ($gid, '$date', 0, 3)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'J5A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L1A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L2A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L3A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CNA', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'C6A', '', 6)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CSA', '', 3)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'FHA', '', 10)"); 		  

  $date=$today." 19:30:00"; 
  $gid++;
  mysqli_query($conn, "insert into games (gid, schedule, cost, status) values ($gid, '$date', 0, 3)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'J5A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L1A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L2A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'L3A', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CNA', '', 5)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'C6A', '', 6)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'CSA', '', 3)"); 		  
  mysqli_query($conn, "insert into winners (gid, win_type, prize, points) values ($gid, 'FHA', '', 10)"); 		  
*/
  echo "Success!";	
}

?>