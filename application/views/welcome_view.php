<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Book Review</title>
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container">
		<h1>Welcome</h1>
		<div class="col-xs-5">
			<div class="row">
				<h3>Register</h3>
			</div>
<?php echo $this->session->flashdata('validation_errors');
	echo $this->session->flashdata('success_message');
 ?>
			<form method="post" action="/mains_controller/register">
			  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" name="first_name" placeholder="John">
			  </div>
			  <div class="form-group">
			    <label for="first_name">Last Name</label>
			    <input type="text" class="form-control" name="last_name" placeholder="Doe">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" placeholder="email@email.com">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password Confirmation</label>
			    <input type="password" class="form-control" name="password_confirm">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="col-xs-5 col-xs-offset-2">
			<div class="row">
				<h3>Sign In</h3>
<?= $this->session->flashdata('error_message'); ?>
			</div>
			<form method="post" action="/mains_controller/signIn">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>