<!doctype html>
<html class="fixed">
	<head>
   <?php include "head.php"; ?>
   <style>
    .err
	{
	  color:red;
      font-size:10px;
      font-weight:bold;	  
	}
   </style>
	</head>
	<body>
		<!-- start: page -->
	<section class="body-sign body-locked">
			<div class="center-sign">
				<div class="panel card-sign">
					<div class="card-body">
						<form action="index.php" method='post' autocomplete="off" onsubmit='return register();'>
							<div class="current-user text-center">
								<img src="img/full_logo.jpg" alt="BO HOUSIE" class="rounded-circle user-image" />
								<h2 class="user-name text-dark m-0" style='font-size:24px;'>NEW PLAYER SIGNUP</h2>
							    <p class="user-email m-0">Your Favorite Game + Online = FUN</p>
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="player_name" name="player_name" type="text" class="form-control form-control" placeholder="Full Name" autocomplete="off"/>
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
									<input id="mobile" name="mobile" type="number" class="form-control form-control" placeholder="Mobile Number" autocomplete="off" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-phone"></i>
										</span>
									</span>
								</div>
                                <div id='mobile_err' class='err'></div> 
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
<!--									<input id="place" name="place" type="text" class="form-control form-control-lg" placeholder="Area / Locality"  autocomplete="off" REQUIRED />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-map-signs"></i>
										</span>
									</span>
-->
									
							<select class="form-control" name="place">		
									
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
<!--							
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="city" name="city" type="text" class="form-control form-control" placeholder="City / Town"  autocomplete="off" REQUIRED />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-map-marker-alt"></i>
										</span>
									</span>
								</div>
                                <div id='city_err' class='err'></div> 
							</div>

							<div class="form-group mb-3">
								<div class="input-group">
									<input id="pin" name="pin" type="number" class="form-control form-control-lg" placeholder="4 Digit PIN (for Login)" MAXLENGTH='4' value='' autocomplete="off" REQUIRED/>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-th-large"></i>
										</span>
									</span>
								</div>
                                <div id='pin_err' class='err'></div> 
							</div>
-->							
<!--                            <div class="form-group row">
								<div class="col-sm-2"></div>
								<div class="col-sm-10">
									<div class="checkbox-custom">
										<input type="checkbox" name="bvrm" id="bvrm">
										<label for="w1-bvrm">I live in / belong to Bhimavaram.</label>
									</div>
								</div>
							</div>
-->
                            <div class="form-group row">
								<div class="col-sm-2"></div>
								<div class="col-sm-10">
									<div class="checkbox-custom">
										<input type="checkbox" name="cterms" id="cterms" CHECKED required>
										<label for="w1-terms">I agree to the Terms & Conditions. <a class="mb-1 mt-1 mr-1 modal-basic" href="#terms">Read T & C</a></label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-6">
								 <p class="mt-1 mb-3">
									<a href="index.php">Already Registered?<br>LOGIN HERE</a>
								 </p>
								</div>
								<div class="col-6">
									<button type="submit" class="btn btn-primary pull-right">REGISTER ACCOUNT</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
  	  <!-- end: page -->

      <div id="terms" class="modal-block modal-block-info mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Terms & Conditions</h2>
											</header>
											<div class="card-body">
												<div class="modal-wrapper">
													<div class="modal-text">
				<p align='justify'>The Bhimavaram Online Housie Software is a product of <b>MCR Web Solutions, Bhimavaram</b> primarily created for the people of Bhimavaram and for the customers of <b>Bhimavaram Online</b>, although anyone from any place can join the game. 
				The product has been designed purely for entertainment & fun and will not encourage any sort of gambling or fraud.</p>									
				<h4>Privacy / Terms & Conditions</h4>
				<ul>
				<li>The details collected (Name, Place & Mobile Number) are kept confidential. <b>We will not disclose or share your details to any third-party.</b></li>
				<li>The game is only intended purely for entertainment and will not encourage any of the players to involve in gambling or fraud.</li>
				<li>By accepting these terms & conditions, <b>you have agreed to get game alerts / updates / notification messages (of Bhimavaram Online) via SMS or WhatsApp.</b>
				If you don’t want to receive notifications from us, you can anytime ask us to stop notifications by sending us a message via WhatsApp to +91 92 93 94 0004.</li>
				<li>Prizes for the games will be decided by the admin and the sponsors and are subjected to change based on the availability, and need.</li>
				<li>Players need to have sufficient points/amount in their wallet to play the game. The same can be purchased from Bhimavaram Online.</li>
				<li>No objectionable or offensive information should be posted as comments. Nothing should be related to abusive, threatening, racial, sexual, or obscene.</li>
				<li>Your account shall not be used to cheat or hack the game by any means.</li>
				<li>The admin reserves the right to delete or modify the comments or information of the players if found to be involved in fraud or wrong practices while playing.</li>
                <li>Bhimavaram Online reserves the final right of decision in any game to ensure a clean and smooth organization.</li>				
				</ul>
 

													</div>
												</div>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-info modal-dismiss">OK</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		<script src="js/examples/examples.modals.js"></script>
		<!-- Theme Custom -->		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<script type="text/javascript">

	function register()
	{
 	  var player_name=document.getElementById('player_name').value;	  
	  var pid=document.getElementById('mobile').value;

 	  document.getElementById('name_err').innerHTML="";
 	  document.getElementById('mobile_err').innerHTML="";
	  
	  if(player_name.length < 3) 
	   { 
		 document.getElementById('name_err').innerHTML="Name should have 3 or more letters!";
		 return false;
	   }
	  else if(!(/^[A-z .]{3,20}$/.test(player_name))) 
	   { 
		 document.getElementById('name_err').innerHTML="Please enter a valid name!";
		 return false;
	   }

       if(pid == "")
	   {
		 document.getElementById('mobile_err').innerHTML="Please fill your 10 digit mobile number!";
		 return false;
	   }
	   else if(!(/^[0-9]{10}$/.test(pid))) 
	   { 
		 document.getElementById('mobile_err').innerHTML="Please enter a valid 10 digit mobile number!";
		 return false;
	   }
	   
	 return true;
  }	 
</script>
	</body>
</html>