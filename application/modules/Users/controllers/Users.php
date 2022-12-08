<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Users_model");
		date_default_timezone_set("Asia/Manila");
	}
	public function index()
	{
		$this->nativesession->set("page","Portal");
		$this->load->view("portal");
		$this->nativesession->set('message','-');
	}
	public function home()
	{
		$data['navlink'] = ['a'=>'active', 'b'=>' ', 'c'=>' ', 'd'=>' '];
		$this->nativesession->set("page","Home");
		$this->load->view("head",$data);
		$this->load->view("index");
		$this->load->view("footer");
		$this->nativesession->set('message','-');
	}
	public function materials()
	{
		$data['categories'] = $this->Users_model->getTable('categories');
		$data['materials'] = $this->Users_model->getConfirmedMaterials();
		$data['navlink'] = ['a'=>' ', 'b'=>'active', 'c'=>' ', 'd'=>' '];
		$data['searchText'] = "";
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("materials",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function authors()
	{
		$data['categories'] = $this->Users_model->getTable('categories');
		$data['materials'] = $this->Users_model->getConfirmedMaterials();
		$data['navlink'] = ['a'=>' ', 'b'=>' ', 'c'=>'active', 'd'=>' '];
		$data['searchText'] = "";
		$data['admins'] = $this->Users_model->getTable('admin');
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("admins",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function contact()
	{
		$data['categories'] = $this->Users_model->getTable('categories');
		$data['materials'] = $this->Users_model->getConfirmedMaterials();
		$data['navlink'] = ['a'=>' ', 'b'=>' ', 'c'=>' ', 'd'=>'active'];
		$data['searchText'] = "";
		$data['admins'] = $this->Users_model->getTable('admin');
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("contact",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function authorProfile()
	{
		$username = $this->input->get('username');
		$data['categories'] = $this->Users_model->getTable('categories');
		$data['materials'] = $this->Users_model->getUploads($username);
		$data['navlink'] = ['a'=>' ', 'b'=>' ', 'c'=>'active', 'd'=>' '];
		$data['searchText'] = "";
		$data['admin'] = $this->Users_model->getRow('admin','username',$username);
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("adminProfile",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function searchResults()
	{
		$data['navlink'] = ['a'=>' ', 'b'=>'active', 'c'=>' ', 'd'=>' '];
		$data['categories'] = $this->Users_model->getTable('categories');
		$keyword = $this->input->post('keyword');
		if($keyword == "" || $keyword == null || $keyword == " ")
		{
			$keyword = "";
		}
		$data['materials'] = $this->Users_model->searchKeyword($keyword);
		$data['searchText'] = $keyword;
		$this->nativesession->set("page","Search Results");
		$this->load->view("head",$data);
		$this->load->view("materials",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','3');
	}
	public function sendFeedback()
	{
		$name = $this->input->post('name');
		if($name == null || $name =="")
		{
			$name = "Anonymous";
		}
		$message = $this->input->post('message');
		$data = ['name'=>$name, 'message'=>$message, 'up_date'=>date('m-d-Y'), 'up_time'=>date('h:i a')];
		$this->Users_model->insert('feedbacks',$data);
		$this->nativesession->set('message','-');
		redirect('users/contact');
	}
	public function reportFile()
	{
		$id = $this->input->post('id');
		$message = $this->input->post('message');
		if($message == null || $message == "" || $message == " ")
		{
			redirect('users/materials');
		}
		$data = ['name'=>'Anonymous', 'message'=>'File Report('.$id.'):'.$message, 'up_date'=>date('m-d-Y'), 'up_time'=>date('h:i a')];
		$this->Users_model->insert('feedbacks',$data);
		$this->nativesession->set('message','1');
		redirect('users/materials');
	}
}
