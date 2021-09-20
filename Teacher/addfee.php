<?php
session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}

if(isset($_POST['add_fees'])) {
	
$id=mysqli_real_escape_string($conn,$_POST['enter']);
$fee_status=mysqli_real_escape_string($conn,$_POST['fee']);
$fees=mysqli_real_escape_string($conn,$_POST['fees']);
$method=mysqli_real_escape_string($conn,$_POST['pay_method']);

$stu=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student_login WHERE id='".$id."'"));

if($fee_status=='paid'){
	$sum=$stu['fees']+$fees;
} else {
	$sum=0;
}

if($sum>50000){
	// agar fess ka sum 50,000 se jayadahoga to error btadega or else me add hojayegi fees
echo '
				<script>
					alert("You Adding More Fees, Please add less");
				</script>
			';
} else {
	
	if($fee_status=='paid') {
		
		$query=mysqli_query($conn,"INSERT INTO student_fee_mgmt (stu_id, status, amount, pay_method, date) VALUES ('$id', '$fee_status', '$fees', '$method', '".date("Y-m-d")."')");
		mysqli_query($conn,"UPDATE student_login SET fees=fees+$fees WHERE id='".$id."'");
		mysqli_query($conn,"UPDATE student_login SET due=due-$fees WHERE id='".$id."'");
		//plus fess
	} 
	else if($fee_status=='refund') {
		
			$query=mysqli_query($conn,"INSERT INTO student_fee_mgmt (stu_id, status, amount, pay_method, date) VALUES ('$id', '$fee_status', '$fees', '$method', '".date("Y-m-d")."')");
			mysqli_query($conn,"UPDATE student_login SET fees=fees-$fees WHERE id='".$id."'");
			//minus fees
	} 
	else {
			$query=mysqli_query($conn,"INSERT INTO student_fee_mgmt (stu_id, status, amount, pay_method, date) VALUES ('$id', '$fee_status', '$fees', '$method', '".date("Y-m-d")."')");
			mysqli_query($conn,"UPDATE student_login SET due=$fees WHERE id='".$id."'");
			// due fees
		}
		
		echo '
				<script>
					alert("Fees Updated");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
}
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
		<div style="border-radius:15px;height:500px; width:440px;box-shadow: 2px 2px 15px #888888;">
			<br><br>
			
			<!--user signup form start-->
			<center><p style="font-size:30px;font:center;"><span style="color:red;font-weight:bold;">STUDENT FEE</span> FORM </p></center>
			<br>
			<div style="background:;height:250px;width:380px;">
			<form action="" method="post">
				<br><input name="enter" class="form-control" placeholder="Student Id" style=" border-radius:10px;height:42px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
				
				<br><select name="fee" class="form-control"  style="height:42px; border-radius:7px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
					<option value="paid">Paid</option>
					<option value="refund">Refund</option>
					<option value="due">Due</option>
				</select>

				<br><input name="fees" class="form-control" placeholder="Enter Fee" style=" border-radius:10px;height:42px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
			<br><select name="pay_method" class="form-control"  style="height:42px; border-radius:7px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
					<option value="Paytm">Paytm</option>
					<option value="UPI">UPI</option>
					<option value="Bank">BANK</option>
					<option value="Cash">Cash</option>
				</select>
			<br><br>
			<input name="add_fees" type="submit" class="btn btn-warning btn-block" style="border-radius:10px;height:42px;font-size:23px; box-shadow: 2px 2px 15px #888888;" value="Submit">
			
			</form>
			</div>
						
		</div><!--container end--></center>
				</main>
            </div>
        </div>
		
	</body>
	</html>