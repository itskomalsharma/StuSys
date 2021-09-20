<?php
	error_reporting(0);
	session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
	
	if(isset($_POST['submit']))
	{
		$name=$_FILES['image']['name'];
		$temp=$_FILES['image']['tmp_name'];
		$folder="img/";
		$d=move_uploaded_file($temp,$folder.$name);
		$r=mysqli_query($conn,"update teacher_login set email='".$_POST['email']."',contect='".$_POST['contect']."'
		,password='".$_POST['password']."',img='".$_FILES['image']['name']."' where id='".$_SESSION['teacher_id']."'");
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
	$t=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where id='".$_SESSION['teacher_id']."'"));
?><!DOCTYPE html>
<html lang="en">
	<head>
		  <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
				.has-search .form-control {padding-left: 2.375rem;}
				.has-search .form-control-feedback {    position: absolute;
														z-index: 2;
														display: block;
														width: 2.375rem;
														height: 2.375rem;
														line-height: 2.375rem;
														text-align: center;
														
														color:#aaa;
													}
				.has-search .form-control-feedback1 {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height: 2.375rem;
														line-height: 2.375rem;
														text-align: center;
														font-size:30px;
														color: red;
														margin-top:30px;
													}
			#div   {height:500px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;background:;
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
	
	<?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
				<br><br>
					<!--container start-->
		<div class="container " id="div">
			<br>
				<center><h1><span style="margin-bottom:-20px;color:red;">Edit Account</span> Form</h1></center>
				
				<form method="post" action="" enctype="multipart/form-data">	
			<div class="row">
				<div class="col-3 p-4">
				<div style="margin-top:30px;border-radius:10px;height:200px;width:200px;box-shadow:2px 2px 20px #888888;">
				<img id="pic" src="img/<?php echo $t['img'];?>" alt="" class="rounded" style="border-radius:10px; width:100%;height:100%;">
				<input style="margin-top:10px;width:200px;height:40px;background:#28A745;color:white;font-size:20px;border-radius:10px;padding:2px 0px 0px 2px;" type="file" onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])" name="image">

				</div>
				</div>
				<div class="col-9 p-5">
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" name="email" class="form-control" placeholder="E-Mail " id="form" value="<?php echo $t['email'];?>" required>
						</div>	
								
							
						<div class="form-group has-search"><br>						
							<span class="fa fa-phone form-control-feedback"></span>
							<input type="number" name="contect" class="form-control" placeholder="PhoneNo" id="form" value="<?php echo $t['contect'];?>" required>
						</div><br>
						
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input type="password" name="password" class="form-control" placeholder="Password" id="form" value="<?php echo $t['password'];?>" required>
						</div>
							
						<button type="submit" name="submit" class="btn btn-danger btn-block mt-4" id="btn">Update</button>
					
					
				</div>
			</div>
			</form>
		</div>
				
				</main>
            </div>
        </div>
	
	
	</body>
</html>	