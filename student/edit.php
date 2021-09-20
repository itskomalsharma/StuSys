<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['user_id']){
		header('location:login.php');
	}
	
	if(isset($_POST['submit']))
	{
		$name=$_FILES['image']['name'];
		$temp=$_FILES['image']['tmp_name'];
		$folder="img/";
		$d=move_uploaded_file($temp,$folder.$name);
		$r=mysqli_query($conn,"update student_login set email='".$_POST['email']."',contect='".$_POST['contect']."'
		,password='".$_POST['password']."',img='".$_FILES['image']['name']."' where id='".$_SESSION['user_id']."'");
		if($r)
		{
			echo '
				<script>
					alert("Data Updated");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
		}
		else
		{
			echo '
				<script>
					alert("Faild to add, '.mysqli_error($conn).'");
				</script>
			';
		}
	}	
	$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where id='".$_SESSION['user_id']."'"));
?>
<html>
	<head>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
			#div   {height:500px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;
					}
			#form_div{background:;
						margin-right:20px;
						width:460px;
						float:right;}
			#form{border-radius:10px;
					height:50px;
					font-size:20px; 
					box-shadow: 2px 2px 15px #888888;}
			#btn{border-radius:10px;
					border-radius:px;
					font-size:23px; 
					box-shadow: 2px 2px 15px #888888;}
			#img{height:100%;
					width:100%;
					}
			#btn2{width:200px;
					margin-left:20px;
					border-radius:px;
					font-size:23px;
					box-shadow: 2px 2px 15px #888888;}
		</style>
	</head>
	<body>
	<?php include 'header.php'; ?>
	<br><br>
	<!--container start-->
		<div class="container " id="div">
			<br>
				<center><h1><span style="margin-bottom:-20px;color:red;">Edit Student</span> Form</h1></center>
				
				<form method="post" action="" enctype="multipart/form-data">	
			<div class="row">
				<div class="col-3 p-4">
				<div style="margin-top:30px;border-radius:10px;height:220px;width:200px;box-shadow:2px 2px 20px #888888;">
				<img id="pic" src="img/<?php echo $data['img'];?>" alt="" class="rounded" style="border-radius:10px; width:100%;height:100%;">
				<input style="margin-top:10px;width:200px;height:40px;background:#28A745;color:white;font-size:20px;border-radius:10px;padding:2px 0px 0px 2px;" type="file" onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])" name="image">

				</div>
				</div>
				<div class="col-9 p-5">
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" name="email" class="form-control" placeholder="E-Mail " id="form" value="<?php echo $data['email'];?>" required>
						</div>	
								
							
						<div class="form-group has-search"><br>						
							<span class="fa fa-phone form-control-feedback"></span>
							<input type="number" name="contect" class="form-control" placeholder="PhoneNo" id="form" value="<?php echo $data['contect'];?>" required>
						</div><br>
						
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input type="password" name="password" class="form-control" placeholder="Password" id="form" value="<?php echo $data['password'];?>" required>
						</div>
							
						<button type="submit" name="submit" class="btn btn-danger btn-block mt-4" id="btn">Update</button>
					
					
				</div>
			</div>
			</form>
		</div>
	</body>
	<?php include 'footer.php'; ?>
</html>	