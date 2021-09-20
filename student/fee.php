<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['user_id']){
		header('location:login.php');
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<title>All Transaction</title>
		<style>
			#container{box-shadow:2px 2px 10px #888888;}
		</style>
	</head>
	<body>
	<?php include 'header.php'; ?>
		<br>
		<br>
		
		<!--container start-->
		<div class="container" id="container">
			<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">Id</th>
					  <th scope="col">Amount</th>
					  <th scope="col">Payment Status</th>
					  <th scope="col">Method</th>
					  <th scope="col">Date</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
					$sql=mysqli_query($conn,"SELECT * FROM student_fee_mgmt WHERE stu_id='".$_SESSION['user_id']."'");
					while($data=mysqli_fetch_assoc($sql)){
						echo '
					<tr>
					  <th scope="row">1</th>
					  <td>'.$data['amount'].'</td>
					  <td>'.$data['status'].'</td>
					  <td><img style="height:50px;" src="img/'.$data['pay_method'].'.png"/>&nbsp;'.strtoupper($data['pay_method']).'</td>
					  <td>'.$data['date'].'</td>
					</tr>
						';
					}
				  ?>
				  </tbody>
			</table>
		
		</div>
		<!--container end-->
	</body>
	<?php include 'footer.php'; ?>
</html>	