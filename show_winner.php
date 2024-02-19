<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

	include "connect.php";
	$table="";

	$gid=$_GET['gid'];
	
	$prizes=mysqli_query($conn, "SELECT w.pid, player_name, prize, DATE_FORMAT(timestamp, '%r'),place, win_type, w.points FROM winners w, players p where w.pid=p.pid and gid=$gid and TIMESTAMPDIFF(SECOND, timestamp, now()) < 8 order by timestamp desc;"); 		

    if(mysqli_num_rows($prizes)>0)
	{
	  $row=mysqli_fetch_array($prizes);
     //echo $table=$table."<script>alert('$curtime-' + '$time');</script>";					   
      $win_type=$row['win_type'];
	  $type=substr($win_type,0,2);
	  $prize2=$row['prize'];
	  $points=$row['points'];
	  
	  if($prize2 != "" && $points > 0)
		  {
			$final_prize="$prize2 <b>OR</b> $points points";
		  } 
   	  else if($prize2 != "")
		 {
       		if($prize2=='-') {$prize2="Sorry! No Prize.<br>Better Luck Next Time!";} 	
		       $final_prize="$prize2";
    	 } 
	  else
		{
        	$final_prize="$points points";
		} 

	  if($type == "J5") {$prize = "JALDI 5 ($win_type)";}
	  else if($type == "L1") {$prize = "LINE 1 ($win_type)";}
	  else if($type == "L2") {$prize = "LINE 2 ($win_type)";}
	  else if($type == "L3") {$prize = "LINE 3 ($win_type)";}
	  else if($type == "CN") {$prize = "4 CORNERS ($win_type)";}
	  else if($type == "C6") {$prize = "6 CORNERS ($win_type)";}
	  else if($type == "CS") {$prize = "CENTRE STAR ($win_type)";}
	  else if($type == "FH") {$prize = "FULL HOUSIE ($win_type)";}
	  
//  	  $table=$table."<div style='font-size:14px;text-align:center;color:#ffffff;'><span style='color:#ffffff;'><i class='fa fa-trophy'></i> <b>$prize WINNER</b></span><div style=''><b style='color:#ffffff;'>$row[1]</b><br>$row[4]</div>";
//	  $table=$table."<div style='text-align:center;color:yellow;'><br><span style='color:#ffffff;'><i class='fa fa-gift'></i> <b>PRIZE</b></span><br>$final_prize</div></div>";
	  //$table=$table."<div align='center'><img src='img/congrats.gif' class='img-fluid'></div>";
      //$table=$table."<div id='wrap'><div class='scratch'><img id='test' class='scratch-img' src='img/bvrmol_bg.jpg'><h6 width='100%'><strong>$final_prize</strong></h6></img></div></div>";

  	  $table=$table."<div style='font-size:14px;'><i class='fa fa-trophy' style='color:yellow'></i> <b style='color:yellow;'>$prize WINNER</b><div style='color:#ffffff;font-weight:bold;'>$row[1]</div>$row[4]</div>";
	  $table=$table."<div style='color:#ffffff;font-size:14px;'><br><i class='fa fa-gift' style='color:yellow'></i> <b style='color:yellow'>PRIZE</b><div style='color:#ffffff;'>$final_prize</div></div>";
	  
	  $msg="Congratulations ".$row[1].", ".$row[4]." for winning $prize!";
   	  $winner=mysqli_query($conn, "SELECT msg FROM comments where gid=$gid and msg='$msg';"); 		

      if(mysqli_num_rows($winner)==0)
		{
          mysqli_query($conn,"insert into comments (gid,pid,msg) values ($gid, '0000000000', '$msg');"); 			  
		}  
	}
	else
	{
	  $table="PR";
	}
	
    echo "retry:4000\n";
	echo "data:{$table}\n\n";
    flush();

?><?php