<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mains_model extends CI_Model {

	public function register($user)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($user['first_name'],
						$user['last_name'],
						$user['email'],
						$user['password']
						);
		$results = $this->db->query($query, $values);
	}

	public function login($userInfo)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($userInfo['email'], $userInfo['password']);
		$results = $this->db->query($query, $values)->row_array();
		return($results);
	}

	public function getReviews($limit = 3)
	{
		$query = "SELECT users.first_name, users.id AS userID, reviews.review, reviews.rating, reviews.created_at, books.title, books.id FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id ORDER BY created_at DESC LIMIT 0,?;";
		$results = $this->db->query($query, array($limit))->result_array();
		return $results;
	}

	public function getBooks()
	{
		$query = "SELECT * FROM books;";
		$results = $this->db->query($query)->result_array();
		return $results;
		
	}

	public function getOneBook($id)
	{
		$query = "SELECT * FROM books JOIN books_has_authors ON books.id = books_has_authors.book_id JOIN authors ON books_has_authors.author_id = authors.id WHERE books.id = ?";
		$results = $this->db->query($query, array($id))->row_array();
		return($results);
	}

	public function getBooksReviews($id)
	{
		$query = "SELECT users.first_name, users.id AS userID, reviews.id AS reviewID, reviews.review, reviews.rating, reviews.created_at, books.title, books.id FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id WHERE books.id = ? ORDER BY created_at DESC ;";
		$results = $this->db->query($query, array($id))->result_array();
		return $results;
	}
	
	public function addReview($review)
	{
		$query = "INSERT INTO reviews (review, rating, created_at, updated_at, user_id, book_id) VALUES (?, ?, NOW(), NOW(), ?, ?)";
		$values = array($review['review'],
						$review['rating'],
						$review['user_id'],
						$review['book_id']
						);
		$results = $this->db->query($query,$values);
		return($results);
	}

	public function deleteReview($id)
	{
		$query = "DELETE FROM reviews WHERE id = ?";
		$results = $this->db->query($query, array($id));
		return $results;
	}

	public function getUser($id)
	{
		$query = "SELECT * FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id WHERE users.id = ?";
		$results = $this->db->query($query, array($id))->row_array();
		return $results;
	}
}
