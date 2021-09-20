<?php
			session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
				
				if(isset($_POST['add'])){	
				$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['id']."'");				
				while($data=mysqli_fetch_assoc($sql)){
						if($data['COLUMN_NAME']!='id'){
								$c[]=$data['COLUMN_NAME'];
								$cv[]="'".$_POST[''.$data['COLUMN_NAME'].'']."'";
						}
					}
		
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ".$_GET['id']." WHERE stu_id='".$_POST['stu_id']."'"))>0){
			echo '
				<script>
					alert("Already Marks Added!");
				</script>
			';
		}  else {
			
		$r=mysqli_query($conn,"INSERT INTO ".$_GET['id']." (".implode(",",$c).") VALUES (".implode(",",$cv).")");
		if($r)
		{
			echo '
				<script>
					alert("Marks Added");
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
					
				}
					
?><html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	</head>
	<body>
	<div class="container-fluid bg-primary" style="height:60px;"><br><i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="color:white;padding-left:40px;cursor:hand;word-spacing:10px;">&nbsp;Back</i></div>

		<br><br>
		
		<!--container start--><center>
			<div style="border-radius:15px;width:440px;box-shadow: 2px 2px 15px #888888;">
			<br>
			<!--user signup form start-->
			<center><p style="font-size:30px;font:center;color:red;font-weight:bold;">ADD MARKS</p></center>
			<div style="background:;width:400px;">
				<form action="" method="post">
				<?php
					$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['id']."'");
					$s=-1;
					while($data=mysqli_fetch_assoc($sql)){
						$s++;
						if($data['COLUMN_NAME']!='id'){
							echo'
							<div class="form-group">
						<label style="float:left;">'.strtoupper(str_replace("_"," ",$data['COLUMN_NAME'])).'</label>
						<input type="text" name="'.$data['COLUMN_NAME'].'" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="">
					  </div>
						';
						}
					}
				?>
					 <!-- <div class="form-group">
						<label style="float:left;">VB.Net</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>
					  <div class="form-group">
						<label style="float:left;">Operating System</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>
					  <div class="form-group">
						<label style="float:left;">CN $ MC</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>
					  <div class="form-group">
						<label style="float:left;">Management Information System</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>
					  <div class="form-group">
						<label style="float:left;">E-Commerce</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>
					  <div class="form-group">
						<label style="float:left;">Web Development $ internet Tools</label>
						<input type="text" class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="Enter Marks">
					  </div>-->
					  <input name="add" type="submit" class="btn btn-primary btn-block" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;" value="ADD MARKS"/>
				</form>

			</div>
			<br><br>
									
		</div><!--container end--></center><br><br><br>
	</body>
	</html>