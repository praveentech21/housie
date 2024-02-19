<?php include "access_check.php"; ?>
<?php 
   include "connect.php";
   $pid=$_SESSION['pid'];
?>
<!doctype html>
<html class="sidebar-light fixed sidebar-left-collapsed">
	<head>
     <?php include "head.php"; ?>
	 <style>
		  td{
 		  color:#000000;
	    }
		
 .ui-pnotify.red .ui-pnotify-container {
  background-color: #0088cc !important;
  color:#ffffff;
  border:0px;
}
	 </style>
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
					<div class="col-xl-12">
					<h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">My Wallet Transactions</h5>
							<section class="card mt-4">
								<div class="card-body">
									<table class="table table-responsive-md table-striped mb-0">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Points</th>
												<th>Type</th>
												<th>Remarks</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
 										  
        								  $game_res=mysqli_query($conn, "SELECT points, DATE_FORMAT(timestamp, '%W %e %M %h:%i %p') as tm, reason FROM transactions where pid=$pid order by timestamp desc;"); 		
                                          $sno=1; 
          								  while($row=mysqli_fetch_array($game_res))
										    {
											  echo "<tr>";
											  echo "<td>$sno</td>";
											  echo "<td><b>$row[0]</b></a></td>";
											  if($row[0] < 0)
										    	  echo "<td style='color:red'>Deducted</td>";
    	                                      else   
                                           		  echo "<td style='color:green'>Added</td>";
        
											  echo "<td>$row[2]</td>";
											  echo "<td>$row[1]</td>";
											  echo "</tr>";
											  $sno++;
										    }											
                                        ?>  
										</tbody>
									</table>
<!--                                 <div align='right'><a href=''>More...</a></div> -->
								</div>
							</section>
								

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
        <script src="js/examples/examples.modals.js"></script>
        <script src="vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Custom -->
		<!--<script src="js/custom.js"></script>-->
		<!--<script src="js/housie.js"></script> -->
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<script>
//BUY_TICKET......
function buy_ticket(pid, gid)
  {
			var er = "gerr" + gid;	 

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
						 document.getElementById(er).innerHTML="Joining Game...!";
						}
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						 document.getElementById(er).innerHTML=xmlhttp.responseText;
						 get_points();
						}
				}
			xmlhttp.open("GET","buy_ticket.php" + "?pid=" + pid + "&gid=" + gid, true);
			xmlhttp.send();
		}
</script>


	<script>
	 var source = new EventSource("login_alert.php");
  source.onmessage = function(event) {
	  if(event.data != "0")
	  {
		new PNotify({
			title: 'New Login!',
			text: event.data,
            addclass: 'red notification-primary',
			icon: 'fab fa-twitter',
			delay:1000
		   });
	  }
   }	  
</script>

	<br><br>
    <?php include "footer.php"; ?>
	</body>
</html>