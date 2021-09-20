<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['user_id']){
		header('location:login.php');
	}
	
	$data=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where id='".$_SESSION['user_id']."'"));
?><html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<style>
													
			#div   {height:490px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;
					}
		</style>
	</head>
	<body>
		<?php include 'header.php'?><br>
		<div class="container">
			<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-header">Notifications</div>
					<div class="card-body">
					 <marquee style="height:400px;" onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="2" direction = "up" loop="" > 
							<?php 
								$sql=mysqli_query($conn,"SELECT * FROM noti ORDER BY ID desc");
								while($n=mysqli_fetch_assoc($sql)){
									echo '
										<div>
											<b>'.date("d M, Y",strtotime($n['date'])).':</b> '.$n['msg'].' 
										</div>
									';
								}
							?>
					</marquee> 
					</div>
				</div>
			</div>
			<div class="col-8">
			<div  id="div">
			<br>
				<center><h1><span style="margin-bottom:-20px;color:red;">Welcome, </span><?php echo "".$data['f_name']." ".$data['l_name']."";?></h1></center>
				<hr>
				<br>
				<center>
					<img id="pic" src="img/<?php echo $data['img'];?>" alt="" class="rounded-circle" style="box-shadow:2px 2px 10px #888888;border-radius:10px; width:300px;height:300px;">
					</center>
				</div>
			</div>
		</div>
		</div>
	</body>
	<?php include 'footer.php'?>
</html>	