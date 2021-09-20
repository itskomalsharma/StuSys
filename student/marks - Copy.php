
<html>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

		<style>
			#container{box-shadow:2px 2px 10px #888888;
						border-radius:20px;width:815px;}
			#class{box-shadow:2px 2px 10px #888888;
						border-radius:7px;}
			#th{background:blue;
					color:white;
					height:40px;
					text-align:center;
					}
			#th2{height:35px;}
			#th3{height:35px;
					text-align:center;
					}
			#th4{
					background:blue;
					color:white;
					height:40px;
					text-align:center;
				}
			#th5{
					height:40px;
					text-align:center;
				}

				
		</style>
	</head>
	<body>
	<?php include 'header.php'; ?>
	<br>
		<div class="container" id="container">
		<br><br>	
			<form>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<select class="form-control" id="class">
							  <option>Bachelor of computer Application(BCA)</option>
							  <option>Bachelor of Business Application(BBA)</option>
							  <option>Interior Designing</option>
							  <option>Fashion Designing</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<select class="form-control" id="class">
							  <option>First Year</option>
							  <option>Second Year</option>
							  <option>Third Year</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
							<button type="button" onclick="mytbl();"class="btn btn-block btn-primary" id="class">See Results</button>
					</div>
				</div>	
			</form>
			<br>
			<br>
			
			<div id="tb">
				<table border="1" style="width:785px;">
					<tr>
						<th id="th">Code : SUBJECTS</th>
						<th id="th">Max. Marks</th>
						<th id="th">Min. Marks</th>
						<th id="th">Obtained Marks</th>
					</tr>

					<tr>
						<th id="th2">VB.net</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th id="th2">Operating System</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th id="th2">Management Info system</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th id="th2">Computer N/W & Mobile Computing</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th id="th2">E-Commerce</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th id="th2">Web Dev.& Internet Tools</th>
						<th id="th3">100</th>
						<th id="th3">36</th>
						<th id="th3">75</th>
					</tr>
					<tr>
						<th></th>
						<th id="th4">Grand Total</th>
						<th id="th4">Percentage</th>
						<th id="th4">Result : Class/Division</th>

					</tr>
					<tr>
						<th></th>
						<th id="th5">400\600</th>
						<th id="th5">60%</th>
						<th id="th5">First Division</th>

					</tr>
					
					
				</table>
			</div>
		<br>
		</div>
		
		<script>
			function mytbl(){
					$("#tb").show();
					
			}
		</script>
	</body>
	
<?php include 'footer.php'; ?>
</html>	
