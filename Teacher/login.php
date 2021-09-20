<?php 
	$alert=null;
	session_start();
	include '../db.php';
	if (isset($_POST['submit']))
	{
		$users_check=mysqli_query($conn,"select * from teacher_login where email='".$_POST['email']."' and password='".$_POST['password']."'");
		$users_count=mysqli_num_rows($users_check);
		if($users_count==1)
		{
			$users=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where email='".$_POST['email']."'and password='".$_POST['password']."'"));
			$_SESSION['teacher_id']=$users['id'];
			header('location:dashboard.php');
			
		}
		else
		{
			echo '
				<script> 
					alert("Wrong User Name or Password please try again");
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
														color:black;
														font-size:25px;
														margin-right:30px;
													}
				.has-search .form-control-feedback1 {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height:2.375rem;
														line-height: 3.375rem;
														text-align: center;
														color:#007BFF;
														margin-left:150px;
														margin-top:150px;
														float:left;
													}
				#form{border-radius:10px;
						height:45px;
						font-size:20px;
						box-shadow: 2px 2px 15px #888888;}
				#label{cursor:hand;
						color:blue;
						padding-top:10px;}		
		</style>
	</head>
	<body style="background-image:url('img/blue.jpg'); background-repeat:no-repeat;background-size:100% 100%;">
	<br><br><br>
		<div class="container" style="border-radius:15px;height:570px;">
			<div style="height:100%;" class="row">
				<div class="col-6" style=" border-radius:15px 0px 0px 15px;background-image:url(img/side_background.png);background-repeat:no-repeat;background-size:100% 100%;">
				<i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="padding-top:10px;cursor:hand;color:white;word-spacing:10px;">&nbsp;Back</i>

				</div>
				<div class="col-6 bg-white p-3" style="border-radius:0px 15px 15px 0px;">
						<div style="height:100%;width:95%;border:2px solid gray;margin:13px;">
							<p style="margin-top:85px;font-size:35px;float:left;margin-left:180px;color:black;font-weight:bold;">
							<span  style="color:blue;font-size:50px;" class="fa fa-sign-in form-control-feedback1"></span> LOGIN</p>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					
						
					<div class="pl-5 pr-5">
						<form method="post" action="">
							<!--mail start-->
									<div class="form-group has-search">
										<span class="fa fa-envelope-open form-control-feedback"></span>
										<input type="mail" class="form-control" placeholder="Email " id="form" name="email" required><br>
									</div>
							<!--mail end-->	
							<!--password start-->
									<div class="form-group has-search">
										<span class="fa fa-unlock-alt form-control-feedback"></span>
										<input type="password" class="form-control" placeholder="Password" id="form" name="password" required>
									</div>
							<!--password end-->				
							<br><button type="submit" class="btn btn-primary btn-block" id="form" name="submit">Login</button>
							<center><label class="form-check-label" id="label" onclick="window.location.href = 'forget_pass.php';">Forget Password</label></center>
						</form>
						
					</div>
						</div>
							
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
	</body>
</html>
