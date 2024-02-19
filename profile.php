<?php include "access_check.php"; ?>
<?php 
   include "connect.php";
   $pid=$_SESSION['pid'];
   
   $profile_res=mysqli_query($conn, "SELECT * FROM players where pid='$pid';");
   $profile=mysqli_fetch_assoc($profile_res);
   
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
    .err
	{
	  color:red;
      font-size:10px;
      font-weight:bold;	  
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
					<div class="col-xl-4">
							<section class="card mt-4">
								<div class="card-body">

							<div class="current-user text-center">
								<h5 class="user-name text-dark m-0"><b>UPDATE PROFILE</b></h5>
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="mobile" name="mobile" type="text" class="form-control form-control" placeholder="Mobile Number" autocomplete="off" value="<?php echo $pid; ?> [Non-Editable]" DISABLED>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-phone"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="player_name" name="player_name" type="text" class="form-control form-control" placeholder="Full Name" autocomplete="off" value="<?php echo $profile['player_name']; ?>"/>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
										</span>
									</span>
								</div>
                                <div id='name_err' class='err'></div> 
								</div>
							<div class="form-group mb-3">
							<div class="input-group">
							<select class="form-control" id="place" name="place">
<option value="">SELECT AREA</option>
<option value="A.S.R. Nagar">A.S.R. Nagar</option>
<option value="Adarsh Nagar">Adarsh Nagar</option>
<option value="B.C. Colony">B.C. Colony</option>
<option value="Balusumudi">Balusumudi</option>
<option value="Bank Colony">Bank Colony</option>
<option value="Bharati Vidya Bhavan's Road">Bharati Vidya Bhavan's Road</option>
<option value="Chinarangani Palem">Chinarangani Palem</option>
<option value="Chinna Amiram">Chinna Amiram</option>
<option value="Cosmo Club Road">Cosmo Club Road</option>
<option value="D.N.R College Road">D.N.R College Road</option>
<option value="Durgapuram">Durgapuram</option>
<option value="Gandhi Nagar">Gandhi Nagar</option>
<option value="Gollalakoderu">Gollalakoderu</option>
<option value="Gunupudi">Gunupudi</option>
<option value="Housing Board Colony">Housing Board Colony</option>
<option value="K.G.R.L College">K.G.R.L College</option>
<option value="Kodavalli">Kodavalli</option>
<option value="Komarada Road">Komarada Road</option>
<option value="Kovvada">Kovvada</option>
<option value="Maruthi Nagar">Maruthi Nagar</option>
<option value="Mavullamma Temple Road">Mavullamma Temple Road</option>
<option value="Mentey Vaari Thota">Mentey Vaari Thota</option>
<option value="Naachuvaari Centre">Naachuvaari Centre</option>
<option value="Narasayya Agraharam">Narasayya Agraharam</option>
<option value="Narasimhapuram">Narasimhapuram</option>
<option value="New Bus Stand">New Bus Stand</option>
<option value="One Town Police Station">One Town Police Station</option>
<option value="Padmalaya Theatre">Padmalaya Theatre</option>
<option value="Palakoderu">Palakoderu</option>
<option value="Pedda Amiram">Pedda Amiram</option>
<option value="Police Bomma Centre">Police Bomma Centre</option>
<option value="Prakasam Chowk">Prakasam Chowk</option>
<option value="Rayalam">Rayalam</option>
<option value="Rest House Road">Rest House Road</option>
<option value="S.R.K.R College">S.R.K.R College</option>
<option value="SBI Main Branch">SBI Main Branch</option>
<option value="Siva Rao Peta">Sivarao Peta</option>
<option value="Srinivasa Centre">Srinivasa Centre</option>
<option value="Srirampuram">Srirampuram</option>
<option value="Srungavruksham">Srungavruksham</option>
<option value="Sunday Market">Sunday Market</option>
<option value="Sunkara Paddayya Street">Sunkara Paddayya Street</option>
<option value="Taderu">Taderu</option>
<option value="Tammi Raju Nagar">Tammi Raju Nagar</option>
<option value="Town Railway Station">Town Railway Station</option>
<option value="Two Town Police Station">Two Town Police Station</option>
<option value="Vamsi Krishna Nagar">Vamsi Krishna Nagar</option>
<option value="Vishnupur">Vishnupur</option>
<option value="Vissakoderu">Vissakoderu</option>
<option value="Wednesday Market">Wednesday Market</option>
<option value="Westberry Road">Westberry Road</option>
<option value="Youth Club Road">Youth Club Road</option>
<option value="Outside Bhimavaram">OUTSIDE BHIMAVARAM</option>
									</select>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-map-signs"></i>
										</span>
									</span>
									
								</div>
                                <div id='place_err' class='err'></div> 
							</div>
                       <input id="city" name="city" type="hidden" value="Bhimavaram"> 

							<div class="row">
								<div class="col-6">
                                <div id='submit_err' class='err' style='color:#007bff;'></div> 
								</div>
								<div class="col-6">
									<button type="submit" class="btn btn-primary pull-right" onclick="update_profile('<?php echo $pid; ?>');">UPDATE PROFILE</button>
								</div>
							</div>
								
								</div>
							</section>
								

					</div>
					<div class="col-xl-4">
							<section class="card mt-4">
								<div class="card-body">

							<div class="current-user text-center">
								<h5 class="user-name text-dark m-0"><b>UPDATE PIN</b></h5>
							</div>
							
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="opin" name="opin" type="number" class="form-control" placeholder="CURRENT 4 DIGIT PIN" MAXLENGTH='4' value='' autocomplete="off" REQUIRED/>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-th-large"></i>
										</span>
									</span>
								</div>
                                <div id='opin_err' class='err'></div> 
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="npin1" name="npin1" type="number" class="form-control" placeholder="NEW 4 DIGIT PIN" MAXLENGTH='4' value='' autocomplete="off" REQUIRED/>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-th-large"></i>
										</span>
									</span>
								</div>
                                <div id='npin1_err' class='err'></div> 
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="npin2" name="npin2" type="number" class="form-control" placeholder="CONFIRM PIN" MAXLENGTH='4' value='' autocomplete="off" REQUIRED/>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-th-large"></i>
										</span>
									</span>
								</div>
                                <div id='npin2_err' class='err'></div> 
							</div>

							<div class="row">
								<div class="col-6">
                                <div id='psubmit_err' class='err' style='color:#007bff;'></div> 
								</div>
								<div class="col-6">
									<button type="submit" class="btn btn-primary pull-right" onclick="update_pin('<?php echo $pid; ?>');">UPDATE PIN</button>
								</div>
							</div>
						</form>
								
								
								</div>
							</section>
								

					</div>

					<div class="col-xl-4"></div>

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
	<br><br>
	
	<script>
//UPDATE PROFILE......
function update_profile(pid)
  {

  	var player_name=document.getElementById("player_name").value;
	var place=document.getElementById("place").value;

	document.getElementById('name_err').innerHTML="";
 	document.getElementById('place_err').innerHTML="";
	document.getElementById('submit_err').innerHTML="";
	  
   	if(player_name.length < 3) 
	   { 
		 document.getElementById('name_err').innerHTML="Name should have 3 or more letters!";
		 return;
	   }
	else if(!(/^[A-z .]{3,20}$/.test(player_name))) 
	   { 
		 document.getElementById('name_err').innerHTML="Please enter a valid name!";
		 return;
	   }
   	if(place == "") 
	   { 
		 document.getElementById('place_err').innerHTML="Please Select Your Area!";
		 return;
	   }
	   
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
						 document.getElementById('submit_err').innerHTML="Updating Profile...!";
						}
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						 document.getElementById('submit_err').innerHTML=xmlhttp.responseText;
						}
				}
			xmlhttp.open("GET","update_profile.php" + "?pid=" + pid + "&player_name=" + player_name + "&place=" + place, true);
			xmlhttp.send();			
		}

//UPDATE PIN......
function update_pin(pid)
  {

  	var opin=document.getElementById("opin").value;
  	var npin1=document.getElementById("npin1").value;
  	var npin2=document.getElementById("npin2").value;

	document.getElementById('opin_err').innerHTML="";
	document.getElementById('npin1_err').innerHTML="";
	document.getElementById('npin2_err').innerHTML="";
	document.getElementById('psubmit_err').innerHTML="";
	  
	if(!(/^[0-9]{4}$/.test(opin))) 
	   { 
		 document.getElementById('opin_err').innerHTML="PIN Should Be a 4 Digit Number!";
		 return;
	   }
	if(!(/^[0-9]{4}$/.test(npin1))) 
	   { 
		 document.getElementById('npin1_err').innerHTML="New PIN Should Be a 4 Digit Number!";
		 return;
	   }
	if(npin1 != npin2) 
	   { 
		 document.getElementById('npin2_err').innerHTML="The New PINs Did Not Match!";
		 return;
	   }
	   
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
						 document.getElementById('psubmit_err').innerHTML="Updating PIN...!";
						}
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						 document.getElementById('psubmit_err').innerHTML=xmlhttp.responseText;
						}
				}
			xmlhttp.open("GET","update_pin.php" + "?pid=" + pid + "&opin=" + opin + "&npin=" + npin1, true);
			xmlhttp.send();			
		}
		
</script>


	
    <?php include "footer.php"; ?>
	</body>
</html>