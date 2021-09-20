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
					  <th scope="col">Photo</th>
					  <th scope="col">Class</th>
					  <th scope="col">Subject</th>
					  <th scope="col">Book Tittle</th>
					  <th scope="col">Download</th>
					</tr>
				  </thead>
				<?php  
				
				include '../db.php';
				$sql=mysqli_query($conn,"select * from book");
				while($data=mysqli_fetch_assoc($sql))
				{	
				echo '
				  <tbody>
				    <tr>
					  <th scope="row">'.$data['id'].'</th>
					  <td><img src="../Admin/img/'.$data['img'].'" class="rounded float-left" style="height:60px;width:70px;"></td>					  
					  <td>'.$data['class'].'</td>
					  <td>'.$data['subject'].'</td>
					  <td>'.$data['tittle'].'</td>
					  <td>'.$data['file'].'<a href="download.php?file=../admin/img/'.$data['file'].'"><i class="fa fa-fw fa-download"></a></td>
					</tr>
					
				  </tbody>
				  ';
				}  
				?>  
			</table>
		
		</div>
		<!--container end-->
	</body>
	<?php include 'footer.php'; ?>
</html>	