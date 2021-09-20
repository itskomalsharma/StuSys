<?php
	session_start();
	include '../db.php';
	if(!$_SESSION['admin_id']){
		header('location:login.php');
	}
$stu=mysqli_fetch_assoc(mysqli_query($conn,"select * from student_login where id='".$_GET['id']."'"));
$d=mysqli_fetch_assoc(mysqli_query($conn,"select * from dept where id='".$stu['course']."'"));
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="student_detail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <style>
		div#mydiv{
				border-radius:15px;
				height:480px;
				width:800px;
				box-shadow: 2px 2px 15px #888888;
			}
			#img-1{
				border:2px solid gray;
				margin-left:20px;
				margin-top:20px;
				border-radius:10px;
				 width:200px;
				 height:240px;
			}

			div#div-1{
				border-radius:7px;
				box-shadow: 2px 2px 15px #888888;
				float:left;
				background:;
				height:270px;
				width:500px;
				margin-left:50px;
				margin-top:20px;
			}

			h3#h3-1{
				color:red;
				font-weight:bold;
				float:left;
				margin-left:5px;
			}

			p#mydata{
				 float:left;
				margin-left:10px;
				font-weight:bold;
			}

			#button-1{
				margin-right:150px;
				margin-top:50px;
				 width:250px;
				float:right;
				border-radius:10px;
				height:50px;
				font-size:23px;
				 box-shadow: 2px 2px 15px #888888;
			}

			div#div-2{
				border:6px solid black;
				margin-top:20px;
				float:left;
				background:;
				border-radius:15px;
				height:150px;
				width:198px;
				margin-left:22px;
			}

			p#p-7{
				margin-top:30px;
				font-size:30px;
				font-weight:bold;
			}

			div#div-3{
				 background:red;
				height:30px;
				margin-top:34px;
				font-size:20px;
				color:white;
				border-radius:0px 0px 11px 11px;
			}

			div#tb{
				display:none;
			}

			table#table-1{
				float:left;
				margin-top:20px;
				width:801px;
			}

			th#th-1{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-2{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-3{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-4{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-5{
				height:35px;
			}

			th#th-6{
				height:35px;
				text-align:center;
			}

			th#th-7{
				height:35px;
				text-align:center;
			}

			th#th-8{
				height:35px;
				text-align:center;
			}

			th#th-9{
				height:35px;
			}

			th#th-10{
				height:35px;
				text-align:center;
			}

			th#th-11{
				height:35px;
				text-align:center;
			}

			th#th-12{
				height:35px;
				text-align:center;
			}

			th#th-13{
				height:35px;
			}

			th#th-14{
				height:35px;
				text-align:center;
			}

			th#th-15{
				height:35px;
				text-align:center;
			}

			th#th-16{
				height:35px;
				text-align:center;
			}

			th#th-17{
				height:35px;
			}

			th#th-18{
				height:35px;
				text-align:center;
			}

			th#th-19{
				background:blue;
				color:white;
				height:35px;
				text-align:center;
			}

			th#th-20{
				height:35px;
				text-align:center;
			}

			th#th-21{
				height:35px;
			}

			th#th-22{
				height:35px;
				text-align:center;
			}

			th#th-23{
				height:35px;
				text-align:center;
			}

			th#th-24{
				height:35px;
				text-align:center;
			}

			th#th-25{
				height:35px;
			}

			th#th-26{
				height:35px;
				text-align:center;
			}

			th#th-27{
				height:35px;
				text-align:center;
			}

			th#th-28{
				height:35px;
				text-align:center;
			}

			th#th-29{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-30{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-31{
				background:blue;
				color:white;
				height:40px;
				text-align:center;
			}

			th#th-32{
				height:40px;
				text-align:center;
			}

			th#th-33{
				height:40px;
				text-align:center;
			}

			th#th-34{
				height:40px;
				text-align:center;
			}
    </style>
</head>

<body>
<div class="container-fluid bg-primary" style="height:60px;"><br><i class="fa fa-fw fa-chevron-left" onclick="window.history.back()"style="color:white;padding-left:40px;cursor:hand;word-spacing:10px;">&nbsp;Back</i></div>
		
    
    <br>
    <br>

    <!--container start-->
    <center>
        <div id="mydiv">
            <img src="../student/img/<?php echo $stu['img'];?>" class="rounded float-left" id="img-1">
            <div id="div-1">
                <h3 id="h3-1"><?php echo $stu['f_name']." ".$stu['l_name'];?></h3>
                <br>
                <br>
                <p id="mydata">Mail : <?php echo $stu['email'];?></p><br><br>
                <p id="mydata">Contect : <?php echo $stu['contect'];?></p><br><br>
                <p id="mydata">Address : <?php echo $stu['address'];?></p><br><br>
                <p id="mydata">Pincode :<?php echo $stu['pincode'];?></p><br><br>
                <p id="mydata" >Course : <?php echo $d['dept_name'];?></p>
            </div>
            <br>
            <button onclick="mytbl();" type="button" class="btn btn-warning" id="button-1">View Marks</button>
            <div id="div-2">
                <p id="p-7"><?php echo $stu['due'];?></p>
                <div id="div-3">
                    <center>Fee Status : <span>Due</span>
</center>
                </div>
            </div>
			
			<div id="tb">
<table border="1" border="1" id="table-1">
					<tr>
						<th id="th-19">SUBJECTS</th>
						<th colspan="2" id="th-19">Marks</th>
						<th id="th-19">Obtained Marks</th>
					</tr>

					
					<?php
					$sql=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$db_name."' AND TABLE_NAME = '".$_GET['dept']."'");
					$s=-1;
					$sum=0;
					$ttl=0;
					while($data=mysqli_fetch_assoc($sql)){
						$s++;
						if($data['COLUMN_NAME']!='id' && $data['COLUMN_NAME']!='stu_id'){
							$nubmer=mysqli_fetch_array(mysqli_query($conn,"SELECT ".$data['COLUMN_NAME']." from ".$_GET['dept']." WHERE stu_id='".$_GET['id']."'"));
							echo '
							<tr>
						<th id="th-18">'.strtoupper(str_replace("_"," ",$data['COLUMN_NAME'])).'</th>
						<th colspan="2" id="th-18">'.$nubmer[0].'</th>
						<th id="th018">100</th>
					</tr>';
					$sum=$sum+$nubmer[0];
					$ttl=$ttl+100;
						}
					}
					$per=$sum/$ttl*100;
					$div="";
					if($per>=60){
						$div="First Division";
					} else if ($per<=59 && $per>=49){
						$div="Second Division";
					} else if ($per<=48 && $per>=36){
						$div="Third Division";
					} else {
						$div="Hurray, You are Failed";
					}
					if(isset($_GET['dept'])){
					if($ttl==0){
						echo '
							<script>
								alert("No result found");
								//window.location.href="marks.php";
							</script>
						';
					}
					}
				?>
					<tr>
						<th></th>
						<th id="th-19">Grand Total</th>
						<th id="th-19">Percentage</th>
						<th id="th-19">Result : Class/Division</th>

					</tr>
					<tr>
						<th></th>
						<th id="th5"><?php echo $sum;?>\<?php echo $ttl;?></th>
						<th id="th5"><?php echo round($per,2);?>%</th>
						<th id="th5"><?php echo $div;?></th>

					</tr>
					
					
				</table>		  
		  </div>
        </div>
        <!--container end-->
    </center>
    <br>
    <br>
    <br>
	<script>
		function mytbl(){
				$("#tb").show();
				$("#mydiv").height(800);
		}
	</script>
    <!--<script>
			 function openme() 
			 {
				window.open('','mywin','width=500,height=500');
			}
		</script>-->
</body>

</html>
