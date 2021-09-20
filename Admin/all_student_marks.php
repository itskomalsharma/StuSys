<?php
	session_start();
	error_reporting(0);
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>All Student Marks</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<style>
		#container{box-shadow: 2px 2px 10px black;border-radius:20px;}
		#class{box-shadow: 2px 2px 10px #888888;
					border-radius:7px;}
		#tr1{height:50px;
			text-align:center;
			background:#F2F2F2;}
		#tr2{text-align:center;
			background:#FFFFFF;}
		#th1{width:150px;}
		#div{width:92px;}
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
				<br><center>
		<div  class="container" id="container">
		<br><center><p style="font-size:30px;color:red;font-weight:bold;"><span style="color:black;">ALL </span>STUDENTS MARKS</p></center>
<br>
			<br>
			<form>
			<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<select class="form-control" id="class">
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
						</div>
					</div>
					<div class="col-sm-4">
							<button type="button" onclick="window.location.href='all_student_marks.php?dept='+document.getElementById('class').value"class="btn btn-block btn-primary" id="class">See Results</button>
					</div>
				</div>		
			</form>
			<br>
			<br>
			<div class="container" id="tb">
				<table border="1" >

					<tr id="tr1">
						<?php
						include '../db.php';
						$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['dept']."'");
					while($data=mysqli_fetch_assoc($sql)){
						if($data['COLUMN_NAME']=='stu_id'){
							////echo '<th id="th1">ID</th>';
							echo '<th id="th1">Photo</th>';
							echo '<th id="th1">Name</th>';
						} else {
							echo '<th id="th1">'.strtoupper(str_replace("_"," ",$data['COLUMN_NAME'])).'</th>';
						}
						$column[]=$data['COLUMN_NAME'];
					}
					if(!$_GET['dept']==null){
						echo '<td><b>Action</b></td>';
					}
						?>
					</tr>

					<b>
					<?php
						include '../db.php';
						$sql=mysqli_query($conn,"SELECT * FROM ".$_GET['dept']."");
					while($data=mysqli_fetch_assoc($sql)){
						echo '<tr>';
						for ($i = 0; $i < count($column); $i++) {
							if($column[$i]=='stu_id') {
								$users=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where id='".$data[$column[$i]]."'"));
								///echo'<td>'.$users['id'].'</td>';
								echo '<td><img src="../student/img/'.$users['img'].'" class="rounded float-left" style="height:150px;width:150px;"></td>';
								echo '<td>'.$users['f_name'].' '.$users['l_name'].'</td>';
							} else {
							echo '<td>'.$data[$column[$i]].'</td>';
							}
						}
						echo '<td><a target="_blank" href="student_detail_page.php?dept='.$_GET['dept'].'&id='.$data['stu_id'].'" class="btn btn-primary">See Details</a></td>';
						echo '</tr>';
						
					}
						?>
					
					</b>
					
					
				</table>
			</div>
			<br>
		</div></center>
		<br>
		<br>
		<script>
			function mytbl()
			{
				$("#tb").show();
			}
		</script>
				</main>
            </div>
        </div>
    </body>
</html>
