<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	
	if(isset($_POST['add_dept'])){
		$r=mysqli_query($conn,"
		CREATE TABLE IF NOT EXISTS ".strtolower($_POST['dept'])." (
    id INT AUTO_INCREMENT PRIMARY KEY,stu_id TEXT
)  ENGINE=INNODB;
		");
		if($r)
		{
			mysqli_query($conn,"INSERT INTO dept (dept, dept_name) VALUES ('".$_POST['dept']."','".$_POST['dept_name']."')");
			echo '
				<script>
					alert("Department Added");
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

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add Department</title>
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
				<br><br><br><br>
		
		<!--container start--><center>
		<div style="border-radius:15px;height:350px; width:460px;box-shadow: 2px 2px 15px #888888;">
			<br><br>
			
			<!--user signup form start-->
			<center><p style="font-size:32px;font:center;color:red;font-weight:bold;">ADD DEPT</p></center>
			<br>
			
			<div style="background:;height:250px;width:400px;">
					
				<form action="" method="post">
					<div class="form-group">
						<input name="dept" class="form-control" style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" placeholder="Table Name for Department (no space)"/>
					</div>
					<div class="form-group">
						<input name="dept_name" class="form-control" style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" placeholder="Enter Department"/>
					</div>
					<div class="form-group">
						<input name="add_dept" type="submit" class="btn btn-warning btn-block" style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" value="Add"/>
					</div>
				</form>
			</div>				
		</div><!--container end--></center>
		<br>
		<br>
		<div class="container">
			<table class="table">
				<tr>
					<th>#</th>
					<th>Dept Table Name</th>
					<th>Dept Name</th>
					<th>Acton</th>
				</tr>
				<?php
					$sql=mysqli_query($conn,"SELECT * FROM dept");
					while($data=mysqli_fetch_assoc($sql)){
						echo'
							<tr>
								<td>'.$data['id'].'</td>
								<td>'.$data['dept'].'</td>
								<td>'.$data['dept_name'].'</td>
								<td><a href="add_sub.php?id='.$data['dept'].'" class="btn btn-success">Add Subject</a></td>
							</tr>
						';
					}
				?>
			<table>
		</div>
				</main>
            </div>
        </div>
    </body>
	
</html>
