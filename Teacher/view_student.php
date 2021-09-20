<?php
//error_reporting(0);
	session_start();
	include '../db.php';
	$count_s=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student_login"));
	$count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book"));
	$count1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teacher_login"));
	$count2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student_login"));
	if(!$_SESSION['teacher_id']){
		
		
		header('location:login.php');
	}
	
	$t=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where id='".$_SESSION['teacher_id']."'"));
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Student</title>
		 <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <style>
            .has-search .form-control {
                padding-left: 2.375rem;
            }
            .has-search .form-control-feedback {
                position: absolute;
                z-index: 2;
                display: block;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;

                color: #aaa;
            }
            .has-search .form-control-feedback1 {
                position: absolute;
                z-index: 2;
                display: block;
                width: 3.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                font-size: 30px;
                color: red;
                margin-top: 30px;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="container-fluid" style="height:500px;">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                   <center>
		<div  id="container">
		<br><center><p style="font-size:30px;color:red;font-weight:bold;"><span style="color:black;">ABOUT</span> ALL STUDENT</p></center>
<br>
			<div class="container" >
				<table border="1" class="table" id="table">

					<tr id="tr1">
						<th id="th1">S.No.</th>
						<th id="th1">Photo</th>
						<th id="th1">Name</th>
						<th id="th1">Contect no.</th>
						<th id="th1">E-mail</th>
						<th id="th1">Address</th>
						
					</tr>
<?php
	include '../db.php';
	$sql=mysqli_query($conn,"SELECT * FROM student_login");
	$s=0;
	while($data=mysqli_fetch_assoc($sql)){
		$s++;
		echo '
			<tr id="tr2">
						<th>'.$s.'</th>
						<th><img src="../Student/img/'.$data['img'].'" class="rounded float-left" style="height:60px;width:70px;"></th>
						<th>'.$data['f_name'].' '.$data['l_name'].'</th>
						<th>'.$data['contect'].'</th>
						<th>'.$data['email'].'</th>
						<th>'.$data['address'].','.$data['city'].','.$data['state'].'</th>
					</tr>
					
		';
	}
?>
					
					
					
				</table>
			</div>
			<br>
		</div></center>
                </main>
            </div>
        </div>
    </body>
</html>
