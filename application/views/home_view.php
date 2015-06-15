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
		#like{
			color: gold;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-statis-top">
		<div class="container">
			<div class="col-xs-3">
				<h2>Welcome <?=$this->session->userdata('first_name');?>!</h2>
			</div>
			<ul class="nav navbar-nav pull-right">
				<li><a href="/mains_controller/addBook">Add Book and Review</a></li>
				<li><a href="/mains_controller/logout">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="col-xs-8">
			<h4><u>Recent Book Reviews:</u></h4>
<!-- LOOP -->
<?php foreach($reviews as $review) { 
		$rating = $review['rating'];
		for($i=0; $i<$rating; $i++)
		{echo '<span id="like" class="glyphicon glyphicon-star" aria-hidden="true"></span>';}
		for($i=$rating; $i<5; $i++)
			{echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';}
	?>
		<div class="reviews">
				<h5><a href="/book/getBook/<?=$review['id'] ?>"><?=$review['title'] ?></a></h5>
				<p>Rating: <?=$review['rating'] ?></p>
				<p><em><a href="/mains_controller/user/<?=$review['userID']?>"> <?=$review['first_name'] ?>:</a> <?=$review['review'] ?></em></p>
				<p><em><?=$review['created_at'] ?></em></p>
			</div>
<?php } ?>

<!-- END LOOP -->
		</div>
		<div class="col-xs-3 col-xs-offset-1">
			<h4><u>Other Books with Reviews:</u></h4>
<?php foreach($books as $book) { ?>
			<p><a href="/book/getBook/<?=$book['id'] ?>"><?=$book['title'] ?></a></p>
<?php } ?>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>