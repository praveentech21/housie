<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

	include "connect.php";
	$table="";

	if(isset($_GET['gid'])) { $gid=$_GET['gid']; }			  

	$logged=mysqli_query($conn, "SELECT count(*) FROM players p, player_games g where p.pid=g.pid and gid=$gid order by lastseen DESC;"); 		

	$cnt=mysqli_fetch_row($logged);
	
	$table=$table.$cnt[0];
	
    echo "retry:5000\n";
	echo "data:{$table}\n\n";
    flush();

?><?php