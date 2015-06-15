<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mains_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_view');
	}

	public function register()
	{
		$config = array(
						array(
							'field' => 'first_name',
							'label' => 'First Name',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'last_name',
							'label' => 'Last Name',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email|is_unique[users.email]'
							),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[8]'
							),
						array(
							'field' => 'password_confirm',
							'label' => 'Password Confirmation',
							'rules' => 'required|matches[password]'
							),
						);
		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect('/');

		}
		else
		{
			$this->mains_model->register($this->input->post());
			$success = $this->session->set_flashdata('success_message', 'Thanks for registering! Please log in.');
			redirect('/');
		}

	}

	public function signIn()
	{
		$config = array(
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required'
							),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required'
							)
						);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error_message', 'Invalid login credentials!');
			redirect('/');
		}
		else
		{
			$user = $this->mains_model->login($this->input->post());
			if($user)
			{
				$this->session->set_userdata($user);
				redirect('/mains_controller/home');
			}
			else
			{
				die('No records in database');
			}
		}
	}

	public function home()
	{
		$reviews = $this->mains_model->getReviews();
		$books = $this->mains_model->getBooks();
		$this->load->view('home_view', array(
			'reviews' => $reviews,
			'books' => $books
			));
	}

	public function logout()
	{
		session_destroy();
		redirect('/');
	}

	public function addBook()
	{
		die('in controller');
	}

	public function getOneBook($id)
	{
		$books = $this->mains_model->getOneBook($id);
		$reviews = $this->mains_model->getBooksReviews($id);
		$this->load->view('books_view', array(
			'books' => $books,
			'reviews' => $reviews
			));
	}

	public function addReview()
	{
		$review = $this->mains_model->addReview($this->input->post());
		redirect('/mains_controller/home');
	}

	public function delete($id)
	{
		$this->mains_model->deleteReview($id);
		redirect('/mains_controller/home');
	}

	public function user($id)
	{
		$users = $this->mains_model->getUser($id);
		$this->load->view('users', array(
			'users' => $users
			));
	}
}
