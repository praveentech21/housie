				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a class="nav-link" href="dashboard.php">
				                            <i class="fas fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                    <li>
				                        <a class="nav-link" href="index.php?logout">
				                            <i class="fas fa-power-off" aria-hidden="true"></i>
				                            <span>Log Out</span>
				                        </a>                        
				                    </li>
				                </ul>

				            </nav>

                                    <hr>
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Upcoming Games
				        </div>
				    </div>

	                            <ul  class="nav nav-main">
	
		<?php
										
        $game_res=mysqli_query($conn, "SELECT gid, DATE_FORMAT(schedule, '%M %e') as dt, DATE_FORMAT(schedule, '%h:%i %p') as tm, status, cost FROM games where schedule >= CURDATE() and status!=0 order by schedule limit 5;");

        if(mysqli_num_rows($game_res)>0)
           {									
             while($row=mysqli_fetch_array($game_res))
			    {
				  $gid2=$row['gid'];
				  //echo "<li><span class='title'><a href='game.php?gid=$gid2'>Game #$gid2 - $row[1]</a></span>";
				  //echo "<span class='description truncate'></span>$row[2] Game Today</li>";
				  
				  echo "<li><a href='game.php?gid=$gid2' style='color:#0088cc'><i class='fas fa-gamepad' aria-hidden='true'></i>
				             <span><b>Game #$gid2</b> - $row[1] ".$row['tm']."</span>
				             </a></li>";
			    }
  		   }
        else
			{
			  //echo "<li class='red' style='padding-bottom:100px;margin-top:20px;'><span class='title'>No Games Scheduled Today!</span>";
			}						

		?>	
		<li><hr>
		  <a href='all_games.php' style='color:#0088cc'><i class='fas fa-list' aria-hidden='true'></i>
		    <span>View Games Archive</span>
		  </a>
		</li>
							
         </ul>				
		 <hr class="separator" />
                               
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->
