	  <?php
        $signup=0;	  
	    if(isset($_POST['mobile']))
		 {
           $player_name=addslashes(ucwords(strtolower($_POST['player_name'])));		   
           $mobile=addslashes($_POST['mobile']);		   
           $place=addslashes($_POST['place']);
           $city="Bhimavaram";		   
 		   		   
		   include "connect.php";
		   
		   $usr_chk=mysqli_query($conn, "SELECT * FROM players where pid='$mobile';"); 		
	 	   if(mysqli_num_rows($usr_chk) > 0)
		    {  
             $signup=3; //user already exists
            }			
           else
		   {			   
             $otp=rand(10,99);
             $pin=$otp."".$otp;

  		     $query="insert into players (pid, pin, player_name, place, status, points) values ('$mobile','$pin','$player_name','$place',1,50)";

		     if(!mysqli_query($conn, $query))
		      {
			    $signup=2;
		      }
             else
              {			   
                $signup=1;

//sending sms				
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=6127bc98f1247f0f96621e8a&mobile=91$mobile&authkey=346376Ab5qGXs4i09X5fa3c80eP1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\"MOBILE\":\"$mobile\",\"OTP\":\"$pin\",\"WEBSITE\":\"www.bvrmol.in/play\"}",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

		      }
		   }		   
		 }
		 
      ?>


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
						<form action="dashboard.php" method='post' onsubmit='return lcheck();'>
							<div class="current-user text-center">
								<img src="img/full_logo.jpg" alt="BO HOUSIE" class="rounded-circle user-image" />
								<h2 class="user-name text-dark m-0" style='font-size:24px;'>PLAYER LOGIN</h2>
							    <p class="user-email m-0"><span class="alternative-font text-3">Only for The People of Bhimavaram</span></p>
							</div>
							<div class="form-group mb-3">
								<div class="input-group">
									<input id="mobile" name="mobile" type="number" class="form-control form-control" placeholder="Mobile Number"/>
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
									<!-- <input id="pin" name="pin" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" class="form-control form-control-lg" placeholder="4 Digit PIN" MAXLENGTH='4' value='' REQUIRED/> -->
									<input id="pin" name="pin" type="number" class="form-control form-control" placeholder="4 Digit PIN" MAXLENGTH='4' style='color:transparent; text-shadow:0 0 2px rgba(0,0,0,0.5);' autocomplete="off" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-th-large"></i>
										</span>
									</span>
								</div>
                                <div id='pin_err' class='err'></div> 

							</div>
	  <div class="help-block text-center">
	  <?php
	  
	    if(isset($_REQUEST['logout']))
		 {
		   session_start();
           $pid=$_SESSION['pid'];		   
		   include "connect.php";
		   //mysqli_query($conn, "update players set status=1 where pid='$pid'");	 

  		   $_SESSION = array();
           session_destroy();
           if(!isset($_SESSION['pid']))
             {
               echo "<center><span style='color:red;'>YOU ARE NOT LOGGED OUT!</span></center>";
			 }			   
		 }
		else if(isset($_REQUEST['pwderror']))
		 {
		   session_start(); 
  		   $_SESSION = array();
           session_destroy();
           echo "<center><span style='color:red;' id='foo'><b>INVALID PIN TRY AGAIN or<br>CONTACT ADMIN @ 9010972333.</b></span></center>";
		 }
		else if(isset($_REQUEST['uiderror']))
		 {
		   session_start(); 
  		   $_SESSION = array();
           session_destroy();
           echo "<center><span style='color:red;' id='foo'><b>USER NOT REGISTERED! <br>REGISTER NOW & PLAY.</b></span></center>";
		 }
        else  
 		 {		
          //echo "<span style='font-size:14px;'>Default PIN: <b style='color:red;'>0000</b></span>";
		 }			
		 
		 if($signup == 1)
             {
               echo "<center><span style='color:green;'><b>ACCOUNT CREATED SUCCESSFULLY!<BR>CHECK SMS IN $mobile & LOGIN NOW<BR>Contact Admin @9010972333</b></span></center>";
			 }			   
		 if($signup == 2)
             {
				// echo $query;
				 
               echo "<center><span style='color:red;'><b>ERROR CREATING ACCOUNT. CONTACT ADMIN!</b></span></center>";
			 }			   
		 if($signup == 3)
             {
               echo "<center><span style='color:red;'><b>USER ID $mobile ALREADY EXISTS. LOGIN NOW!</b></span></center>";
			 }			   

      ?>
	  
	  
	  </div>

							<div class="row">
								<div class="col-6">
									<p class="mt-1 mb-3">
									  <a href="signup.php">Not Registered? SIGNUP FOR FREE</a>
									</p>
								</div>
								<div class="col-6">
									<button type="submit" class="btn btn-primary pull-right">LOGIN TO PLAY</button>
								</div>
							</div>


	</form>
					</div>
				</div>
			</div>
		</section>
		
  	  <!-- end: page -->

 	  <!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

				<script type="text/javascript">

	function lcheck()
	{
 	  var mobile=document.getElementById('mobile').value;	  
	  var pin=document.getElementById('pin').value;

 	  document.getElementById('pin_err').innerHTML="";
 	  document.getElementById('mobile_err').innerHTML="";
	  
       if(mobile == "")
	   {
		 document.getElementById('mobile_err').innerHTML="Please fill your 10 digit mobile number!";
		 return false;
	   }
	   else if(!(/^[0-9]{10}$/.test(mobile))) 
	   { 
		 document.getElementById('mobile_err').innerHTML="Please enter a valid 10 digit mobile number!";
		 return false;
	   }

       if(pin == "")
	   {
		 document.getElementById('pin_err').innerHTML="Please fill your 4 digit pin number!";
		 return false;
	   }
	   else if(!(/^[0-9]{4}$/.test(pin))) 
	   { 
		 document.getElementById('pin_err').innerHTML="Please enter a valid 4 digit mobile number!";
		 return false;
	   }
	   
	 return true;
  }	 
</script>

		
        <script>		
         setTimeout(function ()
		 {
			document.getElementById('foo').style.display='none';
		 }, 5000);
        </script>	
        
<!-- /GetButton.io widget -->		
	</body>
</html>