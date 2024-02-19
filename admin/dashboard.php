<?php include "access_check.php"; ?>
<?php 
   include "connect.php";
?>
<!doctype html>
<html class="sidebar-light fixed sidebar-left-collapsed">
	<head>
     <?php include "head.php"; ?>
	 <style>
	  td{
 		  color:#000000;
	    }
	 </style>
	 <link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />
    </head>
	<body>
		<section class="body">
            <?php include "header.php"; ?>
			<div class="inner-wrapper">
			<!-- start: sidebar -->
            <?php include "sidebar.php"; ?>
				<!-- end: sidebar -->
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>BO HOUSIE</h2>
					</header>

					<!-- start: page -->
					<div class='row'>
					<div class="col-xl-2">

					<h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">CREATE GAME</h5>
        			<?php

//					$points_res=mysqli_query($conn, "SELECT * from players where pid='$pid';"); 		
//          			$points=mysqli_fetch_array($points_res);
					
					?>

    <!--        					<div class="row">
									<div class="col-12">
										<section class="card mb-4">
											<div class="card-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">MY WALLET</h4>
															<div class="info">
																<strong class="amount" id='points'><?php //echo $points['points']; ?> Points</strong>
																<div><a href='#' style='font-size:10px;color:#ffffff;'>Buy Points (<i class='fas fa-rupee-sign'></i> 1 = 2 Points)</a></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
	-->							
								<div class="row">
									<div class="col-12">
										<section class="card mb-4">
											<div class="card-body bg-secondary">
												<div class="widget-summary">
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">CREATE NEW GAME</h4>
															<div class="info" id='game_err'>
		<button type="button" class="mb-1 mt-1 mr-1 btn btn-primary" onclick='manage_game(4);'><i class="fas fa-sync-alt fa-spin"></i> CREATE A GAME</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
	<!--						<div class="row">
									<div class="col-12">
										<section class="card mb-4">
											<div class="card-body bg-tertiary">
												<div class="widget-summary">
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">POINTS EARNED</h4>
															  <div class="info">
																<strong class="amount"> 147</strong>
																<div><a href='#' style='font-size:10px;color:#ffffff;'>View Details</a></div>
															  </div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
    -->
					</div>
					<div class="col-xl-10">
					<h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">Game Management</h5>
							<section class="card mt-4">
								<div class="card-body">
									<table class="table table-responsive-md table-striped mb-0">
										<thead>
											<tr>
												<th>Game</th>
												<th>Date/Time</th>
												<th>Game Status</th>
												<th>No. Playing</th>
												<th>Manage Game</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
 										  
        								  $game_res=mysqli_query($conn, "SELECT gid, DATE_FORMAT(schedule, '%W %e %M') as dt, DATE_FORMAT(schedule, '%h:%i %p') as tm, status, cost FROM games order by schedule desc LIMIT 10;"); 		
          								  while($row=mysqli_fetch_array($game_res))
										    {
   	        								  $gid=$row['gid'];
											  echo "<tr>";
											  echo "<td><b>Game #$gid</b></td>";
											  echo "<td>$row[1]";
											  echo " | $row[2]</td>";
											  
											       if($row['status'] == 0) {$status="<span class='badge badge-danger'>Game Over</span>";}
											  else if($row['status'] == 1) {$status="<span class='badge badge-success'>In Progress</span>";}
											  else if($row['status'] == 2) {$status="<span class='badge badge-warning'>Game Paused</span>";}
											  else if($row['status'] == 3) {$status="<span class='badge badge-primary'>Game Scheduled</span>";}
											  echo "<td>$status</td>";
											  
											  $playing_res=mysqli_query($conn, "SELECT count(*) FROM player_games where gid=$gid;"); 		
                                              $playing=mysqli_fetch_row($playing_res); 
											  echo "<td>".$playing[0]."</td>";
											  echo "<td><a href='manage_housie.php?gid=$gid'><button type='button' class='mb-1 mt-1 mr-1 btn btn-xs btn-primary'>MANAGE GAME $gid</button></a></td>";
											  echo "</tr>";
										    }											
                                        ?>  
										</tbody>
									</table>
<!--                                 <div align='right'><a href=''>More...</a></div> -->
								</div>
<!--							<button id="sticky-error" class="mt-3 mb-3 btn btn-danger">Error</button> -->
							</section>
								

					</div>
                    </div>

					<div class='row'>
					 <div class="col-xl-12">
					 <h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">Our Partners & Sponsors</h5>
					  <div class="owl-carousel owl-theme" data-plugin-carousel data-plugin-options='{ "dots": false, "autoplay": true, "autoplayTimeout": 3000, "loop": true, "margin": 10, "nav": true, "responsive": {"0":{"items":2 }, "600":{"items":3 }, "1000":{"items":6 } }  }'>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/bvrmol.jpg" alt=""></div>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/westberry.jpg" alt=""></div>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/varma.jpg" alt=""></div>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/food_republic.jpg" alt=""></div>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/srkrec.jpg" alt=""></div>
						<div class="item"><img class="img-thumbnail" src="img/sponsors/mcr_web.jpg" alt=""></div>
					  </div>
					 </div>
                    </div>					
				</section>
			</div>


		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-ui/jquery-ui.js"></script>
		<script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
		<script src="vendor/jquery-appear/jquery-appear.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<!-- <script src="js/custom.js"></script> -->
		<!--<script src="js/housie.js"></script> -->
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

	<script>
		
	//MANAGE_GAME......
	//MANAGE GAME......
  function manage_game(opt)
   {
 	 var option;
	 
     if(opt == 4)
	 {
	   option="CREATE";	   
	   if (!confirm("Are you sure you want to " + option + " the games?"))
         {  
           exit; 
         }  
	 }
	 
	document.getElementById('game_err').innerHTML="";

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==1)
			{
				document.getElementById('game_err').innerHTML="Changing Game Status.....";
			}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('game_err').innerHTML=xmlhttp.responseText;
			}
    }
  xmlhttp.open("GET","manage_game.php?gid=0&opt=" + opt,true);
  xmlhttp.send();
}

/*
    $('#sticky-error').click(function() {
		var notice = new PNotify({
			title: 'Click to Close',
			text: 'Check me out! I\'m a sticky notice. You\'ll have to click me to close.',
			addclass: 'click-2-close',
			hide: false,
			buttons: {
				closer: false,
				sticker: false
			}
		});

		notice.get().click(function() {
			notice.remove();
		});
	});
	
	*/
	</script>
	<script src="vendor/pnotify/pnotify.custom.js"></script>
	<br><br>
    <?php include "footer.php"; ?>
	</body>
</html>