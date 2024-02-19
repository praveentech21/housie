<?php include "access_check.php"; ?>

<?php
   session_start();
   if(isset($_SESSION['pid'])) #checking if session already exists
     {
        include "connect.php";
    	$pid = $_SESSION['pid'];
	    $gid = $_GET['gid'];
        $tid=9;
		
		$result=mysqli_query($conn,"SELECT cost FROM games where gid = $gid;"); 		
		$cost=mysqli_fetch_row($result);

		//GET POINTS
		$points_res=mysqli_query($conn, "SELECT sum(points) from transactions where pid='$pid';"); 		
        $points=mysqli_fetch_array($points_res);		
	    if($points[0]==""){ $tpoints=0;}else {$tpoints=$points[0];}
        		
		if($tpoints >= $cost[0])
		{
		 /*$max_tickets=mysqli_query($conn, "select if(max(tid) IS NULL,0,tid)as tid from player_games where gid=$gid group by tid;"); 		
		 $maxtkt=mysqli_fetch_array($max_tickets);
		 $tid=$maxtkt[0];
		 $tid++;
		*/
        $ticket_numbers=mysqli_query($conn, "SELECT tid FROM player_games where gid=$gid order by tid;"); 		
		  
		if(mysqli_num_rows($ticket_numbers) > 0)
		  {
            $i=0;
			
		    while($numbers=mysqli_fetch_row($ticket_numbers))
				{	
				 $completed[$i]=$numbers[0];
				 $i++;	  
				}
				
			do{	
			   $tid=mt_rand(1,300);
  		      }while(in_array($tid,$completed));		
		  }

  	     mysqli_query($conn,"insert into player_games (pid,gid,tid) values ('$pid', $gid, $tid);"); 
         $reason = "Purchased Ticket worth $cst points for Game ID: $gid";		 
         $cst = $cost[0]*-1;
		 if($cst[0] > 0)
		 {
  	       mysqli_query($conn,"insert into transactions (pid,points,reason) values ('$pid', $cst, '$reason');");
         }		 
//         mysqli_query($conn,"update points set points=points-$cost[0] where pid='$pid';"); 		

// 		 echo "	";
	//	 $_SESSION['points']=$_SESSION['points'] - $cost[0]; 
	
         echo "<a href='game.php?gid=$gid'><button type='button' class='mb-1 mt-1 mr-1 btn btn-xs btn-success'>JOINED (VIEW GAME)</button></a>";
//		 $_SESSION['points']=$_SESSION['points'] - $cost[0]; 

		} 
		else
		{
		  echo "Not Enough Points in Your Wallet! Please Recharge to Buy this Ticket!";	
		}
     }
    else
	{
		echo "Session Timed Out! Login again and Try.";
	}		
?>