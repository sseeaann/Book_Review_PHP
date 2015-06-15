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
		<h2><?=$books['title']?></h2>
		<h4>Author: <?=$books['name']?></h4>
		<div class="col-xs-8">
			<h3>Reviews:</h3>
			
<!-- LOOP -->
<?php foreach($reviews as $review) { ?>
	<div class="reviews">
<?php
		$rating = $review['rating'];
		for($i=0; $i<$rating; $i++)
		{echo '<span id="like" class="glyphicon glyphicon-star" aria-hidden="true"></span>';}
		for($i=$rating; $i<5; $i++)
			{echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';}?>	
				<p><em><a href="/mains_controller/user/<?=$review['userID']?>"> <?=$review['first_name'] ?>:</a> <?=$review['review'] ?></em></p>
				<p><em><?=$review['created_at'] ?></em></p>
<?php if($this->session->userdata('id') === $review['userID'])
		{ echo '<p><a href="/mains_controller/delete/'.$review['reviewID'].'">Delete</a></p>'; } ?>
			</div>
<?php } ?>

<!-- END LOOP -->
		</div>
		<div class="col-xs-4">
			<h4><u>Add a Review:</u></h4>
			<form method="post" action="/mains_controller/addReview">
				<div class="form-group">
		    		<textarea name="review" class="form-control" rows="3"></textarea>
		  		</div>
		  		<div class="form-group">
				  	<label for="rating">Rating: </label>
				  	<select name="rating" class="form-control">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
				  </div>
				  <input type="hidden" name="user_id" value="<?=$this->session->userdata('id');?>">
				  <input type="hidden" name="book_id" value="<?=$books['book_id'];?>">
				  <button type="submit" class="btn btn-default pull-right">Submit Review</button>
			</form>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>