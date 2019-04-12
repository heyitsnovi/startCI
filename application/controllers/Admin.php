<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		if (!$this->ion_auth->logged_in())
		{
 
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
 
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
				$data['view_content'] = 'dashboard/index';
				$data['page_title'] = 'Dashboard';
				$this->load->view('layouts/main',$data);
		}

	}
	public function users(){

		if (!$this->ion_auth->logged_in())
		{
 
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
 
			return show_error('You must be an administrator to view this page.');
		}
		else
		{

			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['users'] = $this->ion_auth->users()->result();
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
				$data['view_content'] = 'auth/index';
				$data['page_title'] = 'Users';
				$this->load->view('layouts/main',$data);
		}

	}

	public function groups(){

		if (!$this->ion_auth->logged_in())
		{
 
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
 
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
 
			   $data['groups'] = $this->ion_auth->groups()->result();
				$data['view_content'] = 'users/group-list';
				$data['page_title'] = 'Groups';
				$this->load->view('layouts/main',$data);
		}

	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */