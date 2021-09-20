<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	
		if(isset($_POST['submit']))
	{
		$name=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
        $folder="img/";
		
		$pdf_name=$_FILES['pdf']['name'];
        $pdf_temp=$_FILES['pdf']['tmp_name'];
        $pdf_folder="../student/img/";
        $d=move_uploaded_file($temp,$folder.$name);
        $d=move_uploaded_file($pdf_temp,$pdf_folder.$pdf_name);
		$b=mysqli_query($conn,"insert into book(tittle,`class`,`subject`,`file`,`img`) values('".$_POST['tittle']."','".$_POST['class']."','".$_POST['subject']."','".$_FILES['pdf']['name']."','".$_FILES['image']['name']."')");
		
		if($b)
		{
			echo '
				<script>
					alert("Inserted");
					window.location.href="'.basename( $_SERVER["REQUEST_URI"]).'";
				</script>
			';
		}
		else
		{
			echo '
				<script>
					alert("Somethig is wrong, Failed to Add");
				</script>
			';
		}
	}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Book</title>
         <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<style>	#div   {height:500px;width:800px;
					box-shadow:2px 2px 10px #888888;
					border-radius:20px;
					}
			#form_div{background:;
						margin-right:20px;
						width:300px;
						float:right;}
			#form{border-radius:10px;
					height:50px;
					font-size:20px; 
					box-shadow: 2px 2px 15px #888888;}
			#btn{border-radius:10px;
					border-radius:px;
					font-size:23px; 
					box-shadow: 2px 2px 15px #888888;}
			#img{height:100%;
					width:100%;
					}
			#btn2{width:200px;
					margin-left:20px;
					border-radius:px;
					font-size:23px;
					box-shadow: 2px 2px 15px #888888;}
			#pdf{padding-top:3px;border-radius:10px;box-shadow: 2px 2px 15px #888888;background:red;color:white;}

		</style>
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<br>
<br>
						<div class="container" id="div">
			<center>
			<br>
				<h2><span style="color:red;">BOOKS ADD</span> FORM</h2>
			</center>
			<form method="post" action="" enctype="multipart/form-data">

				<div class="row">
					<div class="col-md-4 p-5">
						<div id="img_div">
							<img id="pic" src="https://dummyimage.com/200x200/d40007/ffffff&text=Choose+Image" class="rounded float-left" style="border-radius:10px; width:200px;height:200px;">
						</div>
						<center>
							<input style="margin-top:10px;width:200px;height:40px;background:#28A745;color:white;font-size:20px;border-radius:10px;padding:2px 0px 0px 2px;" type="file" onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])" name="image">
						</center>
					</div>
					<div class="col-md-8 p-5">
						<div class="form-group">						
							<input name="tittle" type="text" class="form-control" placeholder="Enter Tittle" id="form" required>
						</div>
						
						<div class="form-group">						
							<input name="class" type="text" class="form-control" placeholder="Enter Class" id="form" required>
						</div>
							
						<div class="form-group">						
							<input name="subject" type="text" class="form-control" placeholder="Enter Subject" id="form" required>
						</div>	
							
						<div class="form-group">						
							<input name="pdf" type="file" class="form-control"  id="pdf" required>
						</div>	
						<br>
						<button name="submit" type="submit" class="btn btn-warning btn-block" id="form">Add</button>
					</div>
				</div>
			</form>
		</div>
			   </main>
            </div>
        </div>
    </body>
</html>
