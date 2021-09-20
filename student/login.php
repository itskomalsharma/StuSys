<?php 
	$alert=null;
	include '../db.php';
	session_start();
	if (isset($_POST['submit']))
	{
		$users_check=mysqli_query($conn,"select * from student_login where email='".$_POST['email']."' and password='".$_POST['password']."'");
		$users_count=mysqli_num_rows($users_check);
		if($users_count==1)
		{
			$users=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where email='".$_POST['email']."' and password='".$_POST['password']."'"));
			session_start();
			$_SESSION['user_id']=$users['id'];
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
		<link rel="stylesheet" href="bootstrap.min.css">
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
													
													.teacher {
														position:absolute;
														margin-left:-31.50rem;
														height:500px;
													}
													
													.s1 {
														position:absolute;
														margin-left:-33.50rem;
														margin-top:14rem;
														height:350px;
													}
													
													
													.s2 {
														position:absolute;
														margin-left:-22.50rem;
														margin-top:14rem;
														height:350px;
													}
		</style>											
	</head>
	<body><center>
	<i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="padding-top:10px;padding-left:30px;float:left;cursor:hand;word-spacing:10px;">&nbsp;Back</i>
	<br>
	<br><br>
	
		<div style="width:500px;height:550px;border-radius:10px;box-shadow:2px 2px 20px #888888;">
		
			<img class="teacher" src="img/teacher.png"/>
			<img class="s1" src="img/student.png"/>
			<img class="s2" src="img/student2.png"/>
			<div style="background:purple;height:90px;border-radius:10px 10px 0px 0px;">
				<h2 style="color:white;font-weight:bold;padding-top:24px;">PLEASE LOGIN</h2>
			</div>
			<br><br><br>
			<div style="background:;height:200px;width:420px;">
			<form method="post" action="">	
				<!--mail start-->
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" name="email" class="form-control" placeholder="E-Mail " style="border-radius:10px;height:50px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
				<!--mail end-->	
				<!--password start--><br>
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input type="password" name="password"class="form-control" placeholder="Password" style="border-radius:10px;height:50px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
				<!--password end-->	
				<div style="background:;width:250px;float:left;">
					<br><button name="submit" type="submit" class="btn btn-block" style="background:purple;color:white;border-radius:10px;height:50px;width:250px;float:left;font-size:23px; box-shadow: 2px 2px 15px #888888;">Login</button>
					<a href="forget_pass.php"><label class="form-check-label" style="cursor:hand;color:purple;float:left;margin:10px 0px 0px 60px;">Forgot Password</label></a>
				</div>
				<div style="background:;width:10px;float:left;"><img src="img/student.png" style="background:;width:240px;height:250px;float:left;margin-right:px;"></div>
				
				</form>
			</div>
			
		</div>
		
		</center>
	</body>
</html>