<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Book Review</title>
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
				<li><a href="/mains_controller/logout">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h4><u>Add a New Book Title and a Review</u></h4>
		<form method="post" action="/mains_controller/">
		  <div class="form-group">
		    <label for="bookTitle">Book Title: </label>
		    <input type="text" class="form-control" id="bookTitle">
		  </div>
		  <div class="form-group">
		    <label for="author">Author</label>
		    <p>Choose from the list:</p>
		    <select class="form-control">
				<option></option>
				<option>Stephen King</option>
			 	<option>Michael Crichton</option>
				<option>Ernest Hemingway</option>
				<option>Mark Twain</option>
				<option>J.K. Rowling</option>
			</select>
			<p>Or add a new author:</p>
			<input type="text" class="form-control" id="bookTitle">
		  </div>
		  <div class="form-group">
		    <label for="review">Review: </label>
		    <textarea class="form-control" rows="3"></textarea>
		  </div>
		  <div class="form-group">
		  	<label for="rating">Rating: </label>
		  	<select class="form-control">
			  <option>1</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
		  </div>
		  <button type="submit" class="btn btn-default">Add Book and Review</button>
		</form>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>