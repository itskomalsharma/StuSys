<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
	$count_s=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student_login"));
	$count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book"));
	$count1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teacher_login"));
	$count2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student_login"));
	
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

                <?php include '4sidermenu.php';?>
        <div class="container-fluid">
		
            <div class="row">

                
                <main role="main" class="col-md-8 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    <br />
                    <div style="background: ; height: 120px;">
                        <div class="form-group has-search" style="background: #00c0ef; border-radius: 10px; box-shadow: 2px 2px 20px #888888; height: 120px; width: 210px; float: left; margin-left: 40px; margin-right: 10px;">
                            <div style="float: left; width: 50%;">
                                <p style="line-height: 80%; color: white; font-weight: bold; font-size: 40px; margin-left: 15px; margin-top: 15px;"><?php echo $count_s; ?></p>
                                <p style="color: white; font-weight: ; font-size: 15px; margin-left: 15px;">Students</p>
                            </div>
                            <div style="float: left; background: ; width: 50%;"><img src="img/student.png" style="height: 90px; width: 90px; float: right; margin-top: 10px; margin-right: 20px;" /></div>
                            <div style="background: #00a3cb; height: 25px; margin-top: 105px; font-size: 12px; color: white;">
                                <center>more info<i></i></center>
                            </div>
                        </div>
                        <div
                            class="form-group has-search"
                            onclick="window.location.href='add_book.php'"
                            style="cursor: hand; background: #00a65a; border-radius: 10px; box-shadow: 2px 2px 20px #888888; height: 130px; width: 210px; float: left; margin-left: 30px; margin-right: 10px;"
                        >
                            <div style="float: left; width: 50%;">
                                <p style="line-height: 80%; color: white; font-weight: bold; font-size: 40px; margin-left: 15px; margin-top: 15px;"><?php echo $count; ?></p>
                                <p style="color: white; font-weight: ; font-size: 15px; margin-left: 15px;">Books</p>
                            </div>
                            <div style="float: left; background: ; width: 50%;"><img src="img/book1.png" style="height: 80px; width: 100px; float: right; margin-top: 15px; margin-right: 15px;" /></div>
                            <div style="background: #008d4d; height: 25px; margin-top: 105px; font-size: 12px; color: white; cursor: hand;" onclick="window.location.href='add_book.php'"><center>more info</center></div>
                        </div>
                        <div
                            class="form-group has-search"
                            onclick="window.location.href='view_teacher.php'"
                            style="cursor: hand; background: #f39c12; border-radius: 10px; box-shadow: 2px 2px 20px #888888; height: 120px; width: 210px; float: left; margin-left: 30px; margin-right: 20px;"
                        >
                            <div style="float: left; width: 50%;">
                                <p style="line-height: 80%; color: white; font-weight: bold; font-size: 40px; margin-left: 15px; margin-top: 15px;"><?php echo $count1; ?></p>
                                <p style="color: white; font-weight: ; font-size: 15px; margin-left: 15px;">Teachers</p>
                            </div>
                            <div style="float: left; background: ; width: 50%;"><img src="img/cap.png" style="height: 110px; width: 230px; float: right; margin-top: px;" /></div>
                            <div style="background: #cf850f; height: 25px; margin-top: 105px; font-size: 12px; color: white; cursor: hand;" onclick="window.location.href='view_teacher.php'"><center>more info</center></div>
                        </div>
                        <div
                            class="form-group has-search"
                            onclick="window.location.href='all_student_marks.php'"
                            style="cursor: hand; background: #dd4b39; border-radius: 10px; box-shadow: 2px 2px 20px #888888; height: 120px; width: 210px; float: left; margin-left: 20px; margin-right: 20px;"
                        >
                            <div style="float: left; width: 50%;">
                                <p style="line-height: 80%; color: white; font-weight: bold; font-size: 40px; margin-left: 15px; margin-top: 15px;"><?php echo $count2; ?></p>
                                <p style="color: white; font-weight: ; font-size: 15px; margin-left: 15px;">Marks</p>
                            </div>
                            <div style="float: left; background: ; width: 50%;"><img src="img/graph1.png" style="height: 100px; width: 95px; float: right; margin-top: 5px; margin-right: 15px;" /></div>
                            <div style="background: #bb4031; height: 25px; margin-top: 105px; font-size: 12px; color: white; cursor: hand;" onclick="window.location.href='all_student_marks.php'"><center>more info</center></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
		
</body>

</html>

