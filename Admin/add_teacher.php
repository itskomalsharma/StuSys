<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	
		if(isset($_POST['submit']))
	{
		$b=mysqli_query($conn,"insert into teacher_login(`f_name`,`l_name`,`gender`,`email`,`address`,`state`,`city`,`pincode`,`contect`,`password`,`img`) values('".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['gender']."','".$_POST['email']."','".$_POST['address']."','".$_POST['state']."','".$_POST['city']."','".$_POST['pincode']."','".$_POST['contect']."','".$_POST['password']."','".$_FILES['image']['name']."')");
		$name=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
        $folder="../teacher/img/";
        $d=move_uploaded_file($temp,$folder.$name);
		$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where id=".mysqli_insert_id($conn).""));
		if($b)
		{
			echo '
				<script>
					alert("Inserted");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
		}
		else
		{
			echo '
				<script>
					alert("Somethig is wrong, Failed to Add");
				</script>
			';
		}
	}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add Teacher</title>
       <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<br>
				<br>
				<div class="container" style="width:800px;border-radius:15px;box-shadow: 2px 2px 15px #888888;">
		<br>
		<center><p style="font-size:28px;color:;font-weight:bold;"><span style="color:red;">TEACHER ADDMITION</span> FORM</p></center>
			<form method="post" action="" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4 p-5">
					<div style="border-radius:10px;height:200px;width:200px;box-shadow:2px 2px 20px #888888;">
					<img id="pic" src="img/user.jpg" class="rounded float-left" style="border-radius:10px; width:200px; height:200px;">
				</div>
				<center>
					<input style="border-radius:10px;padding:2px 0px 0px 2px;margin-top:10px;width:200px;height:40px;background:#28A745;color:white;font-size:20px;" type="file" onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])" name="image">

					<!--<button type="file" class="btn btn-success btn-block mt-2" style="border-radius:20px;height:40px;font-size:23px; box-shadow: 2px 2px 15px #888888;">Choose Photo</button>-->
				</center>
				</div>
				<div class="col-md-8 p-5">
				
					<!--name start-->
					<!--row start-->
						<div class="row">
							<div class="col-sm-6">	<!--column 1-->
									<div class="form-group has-search">
									<span class="fa fa-user-circle form-control-feedback"></span>
									<input name="f_name" type="text" class="form-control" placeholder="First Name" style="border-radius:10px;height:40px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
									</div>
							</div>
							<div class="col-sm-6"> 	<!--comumn2-->
								<div class="form-group has-search">
									<span class="fa fa-user-circle form-control-feedback"></span>
									<input name="l_name" type="text" class="form-control" placeholder="Last name" style="border-radius:10px;height:40px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
								</div>
							</div>
						</div>
						<!--row end -->	
						<!--name end-->
						
						
						<!--gender start-->
						<!--row start-->
						<div class="row">
							<div class="col-sm-6">	<!--column 1-->
									<div class="radio">
										<label style="font-size:16px;">
											
											<input style="height:20px; width:20px;" type="radio" name="gender"  value="Male" required>  <img src="img/male1.png" alt="..." class="img-thumbnail" style=" margin-bottom:15px;width:32px; height:34px;border:none;">Male
										</label>
									</div>
							</div>
							<div class="col-sm-6 "> 	<!--comumn2-->
								<div class="radio">
										<label style="font-size:16px;">
											<input style="height:20px; width:20px;" type="radio" name="gender"  value="Female" required> <img src="img/female.png" alt="..." class="img-thumbnail" style=" margin-bottom:15px;width:30px;border:none;">Female
										</label>
									</div>
							</div>
						</div>
						<!--row end -->	
						<!--gender end-->
						
						
						<!--mail start-->
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input name="email" type="mail" class="form-control" placeholder="E-Mail " style=" border-radius:10px;height:40px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
						<!--mail end-->
						
						
						<!--address start-->
						<div class="form-group has-search">
							<span class="fa fa-address-card-o form-control-feedback"></span>
							<textarea name="address" placeholder="Write a Address...." class="form-control" rows="2" style=" border-radius:7px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required></textarea>
						</div>
						<!--address end-->
						
						
						<!--row start-->
						<div class="row"> 
							<div class="form-group col-md-4">  <!--comumn2-->
								<input  name="state" type="text" placeholder="State" class="form-control"  style="height:40px; border-radius:7px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
								
							</div>
							<div class="form-group col-md-4">   <!--comumn2-->
								<input name="city" type="text" placeholder="City"class="form-control" style="height:40px; border-radius:7px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
								
							</div>
							<div class="form-group col-md-4">  <!--comumn2-->
							<input name="pincode" type="number" class="form-control" Placeholder="Pincode" style="height:40px; border-radius:7px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
							</div>
						</div>
						<!--row end-->
						
						<!--contect no.start-->
						<div class="form-group">
							<div class="input-group mb-3" style=" border-radius:7px;font-size:16px; box-shadow: 2px 2px 15px #888888; height:40px;">
								  <div class="input-group-prepend">
									<span class="input-group-text" style="color:blue;font-weight:bold;">+91</span>
								  </div>
								  <input name="contect" type="number" class="form-control" placeholder="Contect Number" style="height:40px;">
								</div>							
						</div>
						<!--contect no. end-->
						
						
						
						<!--password start-->
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input name="password" type="password" class="form-control" placeholder="Enter Password" style=" border-radius:10px;height:40px;font-size:16px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
						<!--password end-->
						
						
						<button name="submit" type="submit" class="btn btn-warning btn-block" style="border-radius:10px;height:40px;font-size:23px; box-shadow: 2px 2px 15px #888888;">Add</button>
						
					</form>
				</div>
			</div>
		</div><!--container end-->
		<br>
				</main>
            </div>
        </div>
    </body>
	<?php include 'footer.php';?>
</html>
