<!--
			<header class="header">
				<div class="logo-container">
						<img src="img/sponsor.png" alt="BO HOUSIE" />
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			</header>
-->
			<!-- end: header -->

				<header class="header">
				<div class="logo-container">
					<a href="dashboard.php" class="logo">
						<img src="img/logo_main.png" alt="BO HOUSIE" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">			
					<span class="separator"></span>
			
					<ul class="notifications">
						<li>
							<a href="#" onclick='get_sgames();' class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fas fa-tasks"></i>
								<span class="badge">
								<?php
								include "connect.php";
								$game_res=mysqli_query($conn, "SELECT gid, DATE_FORMAT(schedule, '%M %e [%W]') as dt, DATE_FORMAT(schedule, '%h:%i %p') as tm, status, cost FROM games where schedule >= CURDATE() order by schedule limit 5;");
								$sch=mysqli_num_rows($game_res);
								echo $sch;
                                ?>
								
								</span>
							</a>
			
							<div class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="float-right badge badge-default"><?php  echo $sch; ?></span>
									Scheduled Games
								</div>
			
								<div class="content">
									<ul id='scheduled_games' style='font-size:12px;'>
									</ul>
								</div>
								
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fas fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="float-right badge badge-default">3</span>
									Alerts
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-thumbs-up bg-danger text-light"></i>
												</div>
												<span class="title">1 FREE Game Every Day!</span>
												<span class="message">Stay Tuned @ 7:00 PM</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-gift bg-warning text-light"></i>
												</div>
												<span class="title">Play & Win Gifts / Points</span>
												<span class="message">Use Points To Shop @ Bhimavaram Online</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-user-friends bg-success text-light"></i>
												</div>
												<span class="title">Shop Online & Get Tickets</span>
												<span class="message">1 Ticket Free with Order of Rs.200/-</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<div class="profile-info">
								<span class="name"><?php echo $_SESSION['player_name']; ?></span>
								<span class="role"><?php echo $_SESSION['place']; ?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile.php"><i class="fas fa-user"></i> Profile Settings</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="index.php?logout"><i class="fas fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			
		<script>
			
					//GET GAMES......
		function get_sgames()
          {
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
						document.getElementById("scheduled_games").innerHTML="<div align='center'>Fetching Scheduled Games!<br><img src='img/loader.gif'></div>";
					  }
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					  {
						document.getElementById('scheduled_games').innerHTML=xmlhttp.responseText;
					  }
				}
			xmlhttp.open("GET","today_games.php", true);
			xmlhttp.send();
		  }
			
		</script>