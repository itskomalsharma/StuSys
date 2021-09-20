<?php
		session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	if(isset($_POST['add_sub'])){
		$r=mysqli_query($conn,"
		ALTER TABLE ".$_GET['id']." ADD ".$_POST['sub']." TEXT;
		");
		if($r)
		{
			echo '
				<script>
					alert("Subject Added");
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
	
	if(isset($_GET['del'])){
		$r=mysqli_query($conn,"
		ALTER TABLE ".$_GET['id']." DROP COLUMN ".$_GET['del'].";
		");
		if($r)
		{
			echo '
				<script>
					alert("Subject Deleted");
					window.location.href="add_sub.php?id='.$_GET['id'].'";
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
?>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		
		<style>
				
		</style>
	</head>
	<body>
	
		<div class="container-fluid bg-primary" style="height:60px;"><br><i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="color:white;padding-left:40px;cursor:hand;word-spacing:10px;">&nbsp;Back</i></div>
		<br><br><br>
		
		<!--container start--><center>
		<div style="border-radius:15px;height:350px; width:460px;box-shadow: 2px 2px 15px #888888;">
			<br><br>
			
			<!--user signup form start-->
			<center><p style="font-size:32px;font:center;color:red;font-weight:bold;">ADD SUB (<?php echo $_GET['id'];?>)</p></center>
			<br>
			
			<div style="background:;height:250px;width:400px;">
					
				<form action="" method="post">
					<div class="form-group">
					<label style="text-align:left;">for ex. operating_system</label>
						<input name="sub" class="form-control" style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" placeholder="Subject Name (no space)"/>
					</div>
					<div class="form-group">
						<input name="add_sub" type="submit" class="btn btn-primary btn-block" style="height:40px; border-radius:7px;font-size:18px; box-shadow: 2px 2px 15px #888888;" value="Add"/>
					</div>
				</form>
			</div>				
		</div><!--container end--></center>
		<br>
		<br>
		<div class="container">
			<table class="table">
				<tr>
					<th>#</th>
					<th>db column</th>
					<th>Subject</th>
					<th>Acton</th>
				</tr>
				<?php
					$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['id']."'");
					$s=-2;
					while($data=mysqli_fetch_assoc($sql)){
						$s++;
						if($data['COLUMN_NAME']!='id' && $data['COLUMN_NAME']!='stu_id'){
							echo'
							<tr>
								<td>'.$s.'</td>
								<td>'.$data['COLUMN_NAME'].'</td>
								<td>'.strtoupper(str_replace("_"," ",$data['COLUMN_NAME'])).'</td>
								<td><a onclick="del(\''.$data['COLUMN_NAME'].'\')" class="btn btn-danger text-white">DELETE</a></td>
							</tr>
						';
						}
					}
				?>
			<table>
		</div>
		<script>
			function del(x) {
			var a=confirm("Are you sure want to delete ["+x+"] subject, it will also delete from database too. Press OK to delete");
			if(a==true){
					window.location.href="<?php echo basename( $_SERVER["REQUEST_URI"]);?>&del="+x;
				}
			}
		</script>
	</body>
	</html>