<?php
	include '../db.php';
	$rand=rand(1000000,9999999);
	if(isset($_POST['forget'])){
		
	$subject=urlencode("Forget Password");
	
	$email=$_POST['email'];
	
	$msg=urlencode("Your New Generated Password is: ".$rand."");
	
	$connect=file_get_contents("http://rohitchouhan.com/email.php?mail=".$email."&subject=".$subject."&msg=".$msg."");
	
	$data=json_decode($connect,true);
	
	if($data['status']=="success"){
		mysqli_query($conn,"UPDATE admin_login SET password='".$rand."' WHERE email='".$email."'");
		echo '
				<script>
					alert("New password has been sent to '.$email.'");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
	} else {
		echo '
				<script>
					alert("Oops, Something is wrong");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
	}
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		
		<style>
			.has-search .form-control {padding-left: 3.375rem;}
				.has-search .form-control-feedback {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height:3.375rem;
														line-height: 3.375rem;
														text-align: center;
														color: green;
														font-size:20px;
														margin-right:30px;
													}
				.has-search .form-control-feedback1 {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height:2.375rem;
														line-height: 3.375rem;
														text-align: center;
														color: green;
														font-size:80px;
														margin-left:200px;
														
													}	
		</style>
	</head>
	<body>
		<br><br><br>
		
		<!--container start--><center>
				<div style="border-radius:15px;height:430px; width:440px;box-shadow: 2px 2px 15px #888888;">
			<br><center>
			<div class="form-group has-search">						
				<span style="font-size:40px;" class="fa fa-lock "></span>
			</div>
			<p style="line-height:80%;background:;font-size:32px;font:center;color:green;font-weight:bold;">Forgot Password?</p>
			<p style="">You can reset your Password here</p></center>
			
			<br>
			<div style="background:;height:200px;width:400px;">
				<form action="" method="post">	
				<!--mail start-->
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="email" name="email" class="form-control" placeholder="E-Mail " style=" border-radius:10px;height:50px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
				<br><input type="submit" name="forget" class="btn btn-success btn-block" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;" value="Change Password">
				</form>
			</div>
			
									
		</div><!--container end--></center>
	</body>
	</html>