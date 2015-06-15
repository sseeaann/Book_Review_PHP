<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css">
	<style type="text/css">
		.reviews{
			box-shadow: 0 0 5px black;
			margin-bottom: 10px;
			padding: 5px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-statis-top">
		<div class="container">
			<ul class="nav navbar-nav pull-right">
				<li><a href="/mains_controller/home">Home</a></li>
				<li><a href="/mains_controller/addBook">Add Book and Review</a></li>
				<li><a href="/mains_controller/logout">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="col-xs-6">
			<p><strong>NAME: </strong><?= $users['first_name']." ".$users['last_name']?></p>
			<p><strong>Email: </strong><?= $users['email']?></p>
			<p><strong>TOTAL REVIEWS: </strong></p>
		</div>
		<div class="col-xs-6">
			<h4>Posted Reviews on the following books:</h4>
<?php var_dump($users); foreach($users as $user) { ?>
			<p><a href="#"><?=$user['title'];?></a></p>
<?php } ?>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>