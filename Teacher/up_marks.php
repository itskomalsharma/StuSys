<?php
		session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
				if($_GET['stu_id']==''){
					echo '
					<script>
						var id=prompt("Enter Student ID");
						window.location.href="up_marks.php?id='.$_GET['id'].'&stu_id="+id;
					</script>
					';
				} 
				$ssql=mysqli_query($conn,"SELECT * FROM student_login WHERE id='".$_GET['stu_id']."'");
				$stu=mysqli_fetch_assoc($ssql);
				if(mysqli_num_rows($ssql)<=0){
					echo '
					<script>
					alert("Student not found");
					window.location.href="select_class.php";
					</script>
					';
				}
			
			if(isset($_POST['add'])){	
				$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['id']."'");				
				while($data=mysqli_fetch_assoc($sql)){
						if($data['COLUMN_NAME']!='id' && $data['COLUMN_NAME']!='stu_id'){
								$c[]="".$data['COLUMN_NAME']."='".$_POST[''.$data['COLUMN_NAME'].'']."'";
						}
					}
					
					$r=mysqli_query($conn,"UPDATE ".$_GET['id']." SET ".implode(",",$c)." WHERE stu_id='".$_GET['stu_id']."'");
		if($r)
		{
			echo '
				<script>
					alert("Marks Updated");
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
			<center><p style="font-size:30px;font:center;color:red;font-weight:bold;">UPDATE MARKS</p></center>
			<center><p style="font-size:20px;font:center;color:blue;;">Name: <?php echo $stu['f_name'];?></p></center>
			<div style="background:;width:400px;">
				<form action="" method="post">
				<?php
					$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['id']."'");
					$s=-1;
					while($data=mysqli_fetch_assoc($sql)){
						$s++;
						if($data['COLUMN_NAME']!='id' && $data['COLUMN_NAME']!='stu_id'){
							$nubmer=mysqli_fetch_array(mysqli_query($conn,"SELECT ".$data['COLUMN_NAME']." from ".$_GET['id']." WHERE stu_id='".$_GET['stu_id']."'"));
							echo'
							<div class="form-group">
						<label style="float:left;">'.strtoupper(str_replace("_"," ",$data['COLUMN_NAME'])).'</label>
						<input type="text" name="'.$data['COLUMN_NAME'].'" value="'.$nubmer[0].'"class="form-control" style="box-shadow: 2px 2px 15px #888888;"placeholder="">
					  </div>
						';
						}
					}
				?>
					  <input name="add" type="submit" class="btn btn-primary btn-block" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;" value="UPDATE MARKS"/>
				</form>

			</div>
			<br><br>
									
		</div><!--container end--></center><br><br><br>
	</body>
	</html>