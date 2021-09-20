<?php
	
	$users=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where id='".$_SESSION['user_id']."'"));
?>	<div class="container-fluid" style="background:#fc9e05;height:100px;">
		
		<ul class="nav justify-content-end">
			<h3 style="padding:25px 300px 0px 0px;font-weight:bold;color:white;cursor:hand;" onclick="window.location.href='dashboard.php'">Welcome to , <span style="color:purple;"><?php echo $users['f_name'];?></span></h3>
			<li class="nav-item">
				<a class="nav-link active" href="dashboard.php" style="color:white;font-style:none;font-size:20px;margin-top:20px;"><i class="fa fa-fw fa-home"></i>Home</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="edit.php" style="color:white;font-style:none;font-size:20px;margin-top:20px;"><i class="fa fa-fw fa-pencil"></i>Edit</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="marks.php" style="color:white;font-style:none;font-size:20px;margin-top:20px;"><i class="fa fa-fw fa-bar-chart"></i>Marks</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="fee.php"style="color:white;font-style:none;font-size:20px;margin-top:20px;"><i class="fa fa-fw fa-university"></i>Fee</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="library.php"style="color:white;font-style:none;font-size:20px;margin-top:20px;"><i class="fa fa-fw fa-book"></i>Library</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="logout.php"style="color:white;font-style:none;font-size:20px;margin-top:20px;margin-right:50px;"><i class="fa fa-fw fa-power-off"></i>Logout</a>
			 </li>
		</ul>
	</div>	