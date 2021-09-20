<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
	

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>View Student</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.min.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<style>
			#container{
				width:100%;
				box-shadow: 2px 2px 10px #888888;
				border-radius:20px;

				}
			#table{width:100%;}		
				}
				#tr1{height:80px;
				text-align:center;
				background:#F2F2F2;
				color:;
				}
				#tr2{text-align:center;
					background:#ffffff;
				}
				#th1{text-align:center;}
				 .has-search .form-control {
                padding-left: 2.375rem;
            }
            .has-search .form-control-feedback {
                position: absolute;
                z-index: 2;
                display: block;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;

                color: #aaa;
            }
            .has-search .form-control-feedback1 {
                position: absolute;
                z-index: 2;
                display: block;
                width: 3.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                font-size: 30px;
                color: red;
                margin-top: 30px;
            }
		<style>
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				
	<br><br><center>
		<div  id="container">
		<br><center><p style="font-size:30px;color:red;font-weight:bold;"><span style="color:black;">ABOUT</span> ALL STUDENT</p></center>
<br>
			<div class="container" >
				<table border="1" id="table">

					<tr id="tr1">
						<th id="th1">S.No.</th>
						<th id="th1">Photo</th>
						<th id="th1">Name</th>
						<th id="th1">Contect no.</th>
						<th id="th1">E-mail</th>
						<th id="th1">Address</th>
						
					</tr>
<?php
	include '../db.php';
	$sql=mysqli_query($conn,"SELECT * FROM student_login");
	$s=0;
	while($data=mysqli_fetch_assoc($sql)){
		$s++;
		echo '
			<tr id="tr2">
						<th>'.$s.'</th>
						<th><img src="../Student/img/'.$data['img'].'" class="rounded float-left" style="height:60px;width:70px;"></th>
						<th>'.$data['f_name'].' '.$data['l_name'].'</th>
						<th>'.$data['contect'].'</th>
						<th>'.$data['email'].'</th>
						<th>'.$data['address'].','.$data['city'].','.$data['state'].'</th>
					</tr>
					
		';
	}
?>
					
					
					
				</table>
			</div>
			<br>
		</div></center>
				</main>
            </div>
        </div>
    </body>
</html>
