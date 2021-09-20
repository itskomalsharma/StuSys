<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		
		<style>
			.has-search .form-control {padding-left: 3.375rem;}
				.has-search .form-control-feedback {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height:3.375rem;
														line-height: 3.375rem;
														text-align: center;
														color: green;
														font-size:20px;
														margin-right:30px;
													}
				.has-search .form-control-feedback1 {    position: absolute;
														z-index: 2;
														display: block;
														width: 3.375rem;
														height:2.375rem;
														line-height: 3.375rem;
														text-align: center;
														color: green;
														font-size:80px;
														margin-left:200px;
														
													}	
		</style>
	</head>
	<body>
		<br><br><br>
		
		<!--container start--><center>
				<div style="border-radius:15px;height:430px; width:440px;box-shadow: 2px 2px 15px #888888;">
			<br><center>
			<div class="form-group has-search">						
				<span style="font-size:40px;" class="fa fa-lock "></span>
			</div>
			<p style="line-height:80%;background:;font-size:32px;font:center;color:green;font-weight:bold;">Forgot Password?</p>
			<p style="">You can reset your Password here</p></center>
			
			<br>
			<div style="background:;height:200px;width:400px;">
				<form>	
				<!--mail start-->
						<div class="form-group has-search">						
							<span class="fa fa-envelope-open form-control-feedback"></span>
							<input type="mail" class="form-control" placeholder="E-Mail " style=" border-radius:10px;height:50px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
				<!--mail end-->	
				<!--password start-->
						<div class="form-group has-search">						
							<span class="fa fa-lock form-control-feedback"></span>
							<input type="text" class="form-control" placeholder="Enter New Password" style=" border-radius:10px;height:50px;font-size:20px; box-shadow: 2px 2px 15px #888888;" required>
						</div>
				<!--password end-->				
				
				

				
				<br><button type="button" class="btn btn-success btn-block" style="border-radius:10px;height:40px;font-size:20px; box-shadow: 2px 2px 15px #888888;">Change Password</button>
				</form>
			</div>
			
									
		</div><!--container end--></center>
	</body>
	</html>