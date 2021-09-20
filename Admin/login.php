<?php 
	$alert=null;
	session_start();
	include '../db.php';
	if (isset($_POST['submit']))
	{
		$users_check=mysqli_query($conn,"select * from admin_login where email='".$_POST['email']."' and password='".$_POST['password']."'");
		$users_count=mysqli_num_rows($users_check);
		if($users_count==1)
		{
			$users=mysqli_fetch_assoc(mysqli_query($conn,"select * from admin_login where email='".$_POST['email']."'and password='".$_POST['password']."'"));
			$_SESSION['admin_id']=$users['id'];
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
				body{background-image:url('img/background.jpg');
								background-repeat:no-repeat;
								background-size:100% 100%;}
				#container{background:red;border-radius:20px;box-shadow: 2px 2px 15px white;height:560px;background:white;}
				#img{margin-top:110px; margin-left:110px; width:250px;box-shadow:2px 2px 20px #888888;}
				#div2{background:;margin:50px 70px 0px 0px;width:400px; height:400px;float:right;}
				#form{border-radius:20px;height:50px;font-size:23px; box-shadow: 2px 2px 15px #888888;}
				#label{cursor:hand;color:blue;padding-top:10px;}	  
		</style>
	</head>
	<body>
		<br><br><br><br>
		<div class="container" id="container">
		<i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="padding-top:10px;cursor:hand;word-spacing:10px;">&nbsp;Back</i>
			<br><img src="img/login.jpg" class="rounded-circle float-left" id="img">
			<br><div id="div2">
			<h2><span style="color:red">ADMIN</span> LOGIN</h2><br>
				<form method="post" action="">	
				<!--mail start-->
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" name="email" class="form-control" placeholder="E-Mail " id="form" required>
						</div>
				<!--mail end-->	
				<!--password start--><br>
						<div class="form-group has-search">						
							<span class="fa fa-unlock-alt form-control-feedback"></span>
							<input type="password" name="password"class="form-control" placeholder="Password" id="form" required>
						</div>
				<!--password end-->
					<br>
					<button type="submit" class="btn btn-warning btn-block" id="form" id="form" name="submit">Login</button>
						<center><label class="form-check-label"  onclick="window.location.href = 'admin_forget_pass.php';" id="label">Forget Password</label></center>
								
				</form>
			</div>
			
		</div>
		<br>
		<br>
		<br>
	</body>
</html>