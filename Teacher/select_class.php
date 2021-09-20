<?php
session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
	$t=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where id='".$_SESSION['teacher_id']."'"));

	?>
<html>
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
				
		</style>
	</head>
	<body>
	
	<?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
					<br><br><br>
		
		<!--container start--><center>
		<div style="border-radius:15px;height:350px; width:460px;box-shadow: 2px 2px 15px #888888;">
			<br><br>
			
			<!--user signup form start-->
			<center><p style="font-size:32px;font:center;color:red;font-weight:bold;">SELECT CLASS</p></center>
			<br>
			
			<div style="background:;height:200px;width:400px;">
					<!--
				<select id="inputState" class="form-control"  style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" required>
					
					<option>Bachelor of computer Application(BCA)</option>
					  <option>Bachelor of Business Application(BBA)</option>
					  <option>Interior Designing</option>
					  <option>Fashion Designing</option>
				</select>				
				
				<br><select id="inputState" class="form-control"  style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" required>
					<option>First Year</option>
					  <option>Second Year</option>
					  <option>Third Year</option>
				</select> -->
				<select id="dept" class="form-control"  style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" required>
					<?php
					include '../db.php';
					$sql=mysqli_query($conn,"SELECT * FROM dept");
					while($data=mysqli_fetch_assoc($sql)){
						echo'
						<option value="'.$data['dept'].'">'.$data['dept_name'].'</option>
						';
					}
				?>
				</select>
				
				<br><button type="button" class="btn btn-warning" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;width:400px;" onclick="window.location.href='add_marks.php?id='+document.getElementById('dept').value">ADD MARKS</button>
				<br>
				<br>
				<button type="button" class="btn btn-info" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;width:400px;" onclick="window.location.href='up_marks.php?id='+document.getElementById('dept').value">UPDATE MARKS</button>

			</div>
			
									
		</div><!--container end--></center>
				</main>
            </div>
        </div>
		
	</body>
	</html>