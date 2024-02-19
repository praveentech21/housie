<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

	include "connect.php";
	$table="";

	$pid=$_GET['pid'];
	
	$games=mysqli_query($conn, "SELECT p.gid FROM player_games p, games g where p.gid=g.gid and pid='$pid' and status=1;"); 		

    if(mysqli_num_rows($games)>0)
	{
	  $game=mysqli_fetch_row($games);
      $gid=$game[0];	  
  	  $table=$table."<div align='center'><a href='game.php?gid=$gid'><img src='img/game_ready.png' class='img-fluid' alt='YOUR GAME IS READY'></a><br><br><a href='game.php?gid=$gid'><button type='button' class='mb-1 mt-1 mr-1 btn btn-danger'><i class='fa fa-lg fa-gamepad' style='color:#ffffff;'></i> GAME #$gid IS IN PROGRESS!</button></a><br><b>CLICK TO PLAY GAME - $gid</b></div>";			             
	}
	else
	{
	  $table="PR";
	}
	
    echo "retry:10000\n";
	echo "data:{$table}\n\n";
    flush();

?><?php