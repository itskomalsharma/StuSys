<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}	
	if(isset($_POST['submit']))
	{
		$r=mysqli_query($conn,"update admin_login set email='".$_POST['email']."' ,password='".$_POST['password']."' where id='".$_SESSION['admin_id']."'");
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
	$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from admin_login where id='".$_SESSION['admin_id']."'"));
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit Admin</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<style>	#div   {height:300px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;
					}
			#form_div{background:;
						margin-right:20px;
						width:300px;
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

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<br>
				<br>
					<div class="container " id="div">
			<br>
				<center><h1><span style="margin-bottom:-20px;color:red;">Edit Admin</span> Form</h1></center>
				
				<form method="post" action="" enctype="multipart/form-data">	
			<div class="row">
				<div class="col-12 p-4">
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" name="email" class="form-control" placeholder="E-Mail " id="form" value="<?php echo $data['email'];?>" required>
						</div>	
							
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input type="password" name="password" class="form-control" placeholder="Password" id="form" value="<?php echo $data['password'];?>" required>
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
