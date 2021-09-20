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
        <title>Admin</title>
        <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    </head>

    <body>
        <?php include 'header.php';?>

        <div class="container-fluid">
            <div class="row">
                <?php include '4sidermenu.php';?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				
				</main>
            </div>
        </div>
    </body>
</html>
