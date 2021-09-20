.<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css">
		<style>
			#div{height:80px;}
			#row{margin-left:100px;
					margin-right:100px;}
			#img{width:270px;}	
			#img1{width:170px;}	
			#footer1{text-align:center;cursor:hand;
					background:red;color:white;font-size:20px;font-weight:bold;
					margin-top:18px;}
			#card1{width:270px;border:none;}
		</style>
	</head>
	<body>
		<br>
		<br>
		<center><h1>Welcome To <span style="color:red;font-weight:bold;">StuSys</span></h1>
		<img class="rounded-circle" src="logo.png" id="img1">
		</center>
		<br>
		<br><br>
		<center>
		<div class="row" id="row">
			<div class="col-sm-4">
				<div class="card" id="card1">
					<img class="rounded-circle" src="admin.png" id="img">
					<div class="card-footer" id="footer1" onclick="window.location.href='Admin/login.php'"> Admin</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card"id="card1">
					<img class="rounded-circle" src="teacher1.png" id="img">
					<div class="card-footer" id="footer1" onclick="window.location.href='teacher/login.php'"> Teachers</div>
				</div>
					
			</div>
			<div class="col-sm-4">
				<div class="card" id="card1">
					<img class="rounded-circle" src="student1.png" id="img">
					<div class="card-footer" id="footer1" onclick="window.location.href='student/login.php'"> Students</div>
				</div>
			</div>
		</div>
		</center>
		<br><br>
	</body>
</html>