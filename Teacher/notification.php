<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['teacher_id']){
		header('location:login.php');
	}
	
	if(isset($_POST['submit'])){
		$msg=mysqli_real_escape_string($conn,$_POST['noti']);
		$check=mysqli_query($conn,"INSERT INTO noti (msg,date) VALUES ('".$msg."','".date("Y-m-d")."')");
		if($check)
		{
			echo '
				<script>
					alert("Notification Sent");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
		}
		else
		{
			echo '
				<script>
					alert("Somethig is wrong, Failed to Sent");
				</script>
			';
		}
	}
	
	if(isset($_POST['del'])){
		$check=mysqli_query($conn,"DELETE FROM noti WHERE id='".$_POST['id']."'");
		if($check)
		{
			echo '
				<script>
					alert("Notification Deleted");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
		}
		else
		{
			echo '
				<script>
					alert("Somethig is wrong, Failed to delete");
				</script>
			';
		}
	}
$t=mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher_login where id='".$_SESSION['teacher_id']."'"));

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Teacher</title>
		<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
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
#div   {height:500px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;
					}		</style>
    </head>

    <body>
        

		<?php include 'header.php';?>
        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
				<br>
				<br>
						<div class="container pt-4" id="div">
						<center><h2>Send Notification</center></center>
						<hr>
						<form action="" method="post"> 
						<textarea name="noti" id="editor">
							<p>Your Message Here.</p>
						</textarea>
					<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
						<br>
						<button name="submit" type="submit" class="btn btn-warning btn-block" id="form">Send Notification</button>
						</form>
						</div>
						<br>
						<table class="table">
						<tr>
							<td>S. no </td>
							<td>Notification </td>
							<td>Date</td>
							<td>Action</td>
						</tr>
						<?php 
								$sql=mysqli_query($conn,"SELECT * FROM noti ORDER BY ID desc");
								$s=0;
								while($n=mysqli_fetch_assoc($sql)){
									$s++;
									echo '
										<tr>
											<td>'.$s.'</td>
											<td>'.$n['msg'].'</td>
											<td>'.date("d M, Y",strtotime($n['date'])).'</td>
											<td><form action="" method="post">
												<input type="hidden" name="id" value="'.$n['id'].'"/>
												<button type="submit" name="del" class="btn btn-danger">Delete</button>
											</form></td>
										</tr>
									';
								}
							?>
							</table>
				</main>
            </div>
        </div>
    </body>
</html>
