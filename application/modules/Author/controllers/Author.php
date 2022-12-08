<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends MX_Controller {

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
		$this->load->model("Author_model");
		$this->load->dbforge();
		date_default_timezone_set("Asia/Manila");
	}
	public function index()
	{
		if($this->nativesession->get('username2') != null)
		{
			redirect('author/home');
		}
		$this->nativesession->set("page","Login");
		$this->load->view("login");
		$this->nativesession->set('message','-');
	}
	public function entry()
	{
		if($this->nativesession->get('username2') != null)
		{
			redirect('author/home');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->Author_model->getRow('admin','username',$username);
		if($query != null)
		{
			if($this->encryption->decrypt($query->password) == $password)
			{
				$this->nativesession->set('username2',$username);
				$this->nativesession->set('id',$query->a_id);
				$this->nativesession->set('message','-');
				$data = ['a_id'=>$query->a_id, 'a_title'=>'Admin Login', 'activity'=>'logged in', 'a_date'=>date('m-d-Y'), 'a_time'=>date('h:i a')];
				$this->Author_model->insert('admin_logs',$data);
				redirect('author/home');
			}	
			else
			{
				$this->nativesession->set('message','0');
				redirect('author/index');
			}
		}
		else
		{
			$this->nativesession->set('message','0');
			redirect("author/index");
		}
	}
	public function home()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$username = $this->nativesession->get("username2");
		$id = $this->nativesession->get("id");
		$this->nativesession->set("page","Home");
		$data['admin'] = $this->Author_model->getRow('admin','username',$username);
		$data['uploads'] = $this->Author_model->getUploads($username);
		$data['logs'] = $this->Author_model->getLogs($id);
		$data['navlink'] = array('','collapsed','collapsed','collapsed');
		$data['categories'] = $this->Author_model->getTable('categories');
		$this->load->view("head",$data);
		$this->load->view("home",$data);
		$this->load->view("footer");
	}
	public function uploads()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$this->nativesession->set("page","Uploads");
		$username = $this->nativesession->get("username2");
		$data['admin'] = $this->Author_model->getRow('admin','username',$username);
		$data['uploads'] = $this->Author_model->getUploads($username);
		$data['navlink'] = array('collapsed','','collapsed','collapsed');
		$data['categories'] = $this->Author_model->getTable('categories');
		$this->load->view("head",$data);
		$this->load->view("uploads",$data);
		$this->load->view("footer");
	}
	public function messages()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$this->nativesession->set("page","Messages");
		$username = $this->nativesession->get("username2");
		$data['imdp'] = $this->Author_model->getRow('superadmin','username','imdp-head');
		$data['admin'] = $this->Author_model->getRow('admin','username',$username);
		$data['chats'] = $this->Author_model->getResult('messages','author',$username);
		$data['navlink'] = array('collapsed','collapsed','','collapsed');
		$data['categories'] = $this->Author_model->getTable('categories');
		$this->load->view("head",$data);
		$this->load->view("messages",$data);
		$this->load->view("footer");
	}
	public function send()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$message = $this->input->post('message');
		$username = $this->input->post('username');
		$thread = $this->input->post('thread');
		$data = ['thread'=>$thread,'author'=>$username, 'message'=>$message, 'n_date'=>date('m-d-Y'), 'n_time'=>date('h:i a'),'status'=>'1'];
		$this->Author_model->insert('messages',$data);
		redirect('author/messages');
	}
	public function getMessagesAJAX()
	{
		$postData = $this->input->post();
		$data = $this->Author_model->getChats($postData);
		echo json_encode($data);
	}
	public function setAsRead()
	{
		$postData = $this->input->post();
		$data = $this->Author_model->setRead($postData);
		echo json_encode($data);
	}
	public function getUnread()
	{
		$postData = $this->input->post();
		$data = $this->Author_model->getUnread($postData);
		echo json_encode($data);
	}
	public function logs()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$this->nativesession->set("page","Messages");
		$username = $this->nativesession->get('username2');
		$data['admin'] = $this->Author_model->getRow('admin','username',$username);
		$data['navlink'] = array('collapsed','collapsed','collapsed','');
		$data['categories'] = $this->Author_model->getTable('categories');
		$data['logs'] = $this->Author_model->getTable('admin_logs');
		$this->load->view("head",$data);
		$this->load->view("logs",$data);
		$this->load->view("footer");
	}
	public function myProfile()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$id = $this->nativesession->get('id');
		$username = $this->nativesession->get('username2');
		$data['admin'] = $this->Author_model->getRow('admin','a_id',$id);
		$data['logs'] = $this->Author_model->getLogs($id);
		$data['categories'] = $this->Author_model->getTable('categories');
		$data['navlink'] = array('collapsed','collapsed','collapsed','collapsed');
		$data['materials'] = $this->Author_model->getAuthorUploads($username);
		$data['requests'] = $this->Author_model->getRequests($username);
		$this->nativesession->set("page","My Profile");
		$this->load->view("head",$data);
		$this->load->view("myProfile",$data);
		$this->load->view("footer"); 
	}
	public function updateAuthor()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$first = $this->input->post('first');
		$middle = $this->input->post('middle');
		$last = $this->input->post('last');
		$email = $this->input->post('email');
		$number = $this->input->post('number');
		$password = $this->input->post('password');
		$password = $this->encryption->encrypt($password);
		if(!empty($_FILES['profile']['name']))
		{
			unlink("./assets/uploads/profile/".$id .".jpg");
			$config['file_name'] = $id;
			$config['upload_path'] = 'assets/uploads/profile';
	    	$config['allowed_types'] = 'jpg';
			$this->load->library('upload', $config);
			$this->upload->do_upload('profile');
		}
		$data = ['first'=>$first,'middle'=>$middle,'last'=>$last,'password'=>$password,'number'=>$number,'email'=>$email];
		$this->Author_model->update('admin',$data,'a_id',$id);
		$data2 = ['a_id'=>$this->nativesession->get('id'), 'a_title'=>'Updated Profile', 'activity'=>'Author update profile', 'a_date'=>date('m-d-Y'), 'a_time'=>date('h:i a')];
		$this->Author_model->insert('admin_logs',$data2);
		$this->nativesession->set('message','-');
		redirect('Author/myProfile');
	}
	public function sendMessage()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$message = $this->input->post("message");
		$data = ['superadmin'=>'juver', 'admin'=>get_cookie('admin'), 'thread'=>'2', 'message'=>$message, 'n_date'=>date('m-d-Y'), 'n_time'=>date('h:i a'), 'status'=>'0'];
		$this->Author_model->insert('messages',$data);
		redirect("author/messages");
	}
	public function addMaterial()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$username = $this->nativesession->get('username2');
		$a_id = $this->nativesession->get('id');
		$category = $this->input->post('category');
		$yearlevel = $this->input->post('yearlevel');
		$description = $this->input->post('description');
		$img = ['png','jpg','jpeg','gif','ico','psd'];
		$vid = ['mp4','3gp','avi','wmv','mov'];
		$mus = ['mp3','wav'];
		$doc = ['doc','docx','xlsx','xls','ppt','pptx','pdf','txt','pub','csv'];
		$com = ['zip','rar','7z','tar','gz'];
		$folder = "";
		$type = "";
		$ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
		if(in_array($ext, $img))
		{
			$folder = "img/";
			$type = "img";
		}
		else if(in_array($ext, $vid))
		{
			$folder = "vid/";
			$type = "vid";
		}
		else if(in_array($ext, $mus))
		{
			$folder = "mus/";
			$type = "mus";
		}
		else if(in_array($ext, $doc))
		{
			$folder = "doc/";
			$type = "doc";
		}
		else if(in_array($ext, $com))
		{
			$folder = "com/";
			$typw = "com";
		}
		else
		{
			$folder = "oth/";
			$type = "oth";
		}
		$tempName = str_replace(' ','_',$_FILES['file']['name']);
		$config['upload_path']          = 'assets/uploads/'.$folder;
        $config['allowed_types']        = '*';
        $config['file_name'] = $tempName;
		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
		// $num = $this->SuperAuthor_model->checkExist('materials','title',$config['file_name']);
		// if($num > 0)
		// {
		// 	$config['file_name'] = $config['file_name']."1";
		// } check if filename exists - avoid redundancy and error
		$a = $this->Author_model->getLastID('materials');
		$lastID = $this->Author_model->getRow('materials','id',$a->id);
		$temp = "";
		$temp2 = "";
		$id = "";
		if($lastID->m_id == null)
		{
			$id = date('m-d-Y').'001';
		}
		else
		{
			$str = explode('-', $lastID->m_id);
			if($str[0] == date('mY'))
			{
				$str[1] = $str[1]+1;
				if(strlen($str[1]) == 1)
	            {
	              $id = date('mY')."-00".$str[1];
	            }
	            else if(strlen($str[1]) == 2)
	            {
	              $id = date('mY')."-0".$str[1];
	            }
	            else
	            {
	              $id = date('mY').'-'.$str[1];
	            }
			}
			else
			{
				$id = date('mY')."001";
			}
		}
		//id format
		//monthyear-uniqueid
		$data = ['m_id'=>$id, 'title'=>$config['file_name'], 'type'=>$type, 'yearlevel'=>$yearlevel, 'description'=>$description, 'category'=>$category, 'path'=>$config['upload_path'], 'username'=>$username, 'up_date'=>date('m-d-Y'), 'up_time'=>date('h:i a'), 'status'=>'0'];
		$this->Author_model->insert('materials',$data);
		$data2 = ['a_id'=>$a_id,'a_title'=>'Add Material', 'activity'=>$username.' added material with id: '.$id, 'a_date'=>date('m-d-Y'), 'a_time'=>date('h:i a')];
		$this->Author_model->insert('admin_logs',$data2);
		redirect('author/uploads');
	}
	public function deleteMaterial()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$id = $this->input->post('id');
		$file = $this->input->post('file');
		$path = $this->input->post('path');
		$this->Author_model->delete('materials','m_id',$id);
		$data2 = ['a_id'=>$this->nativesession->get('id'), 'a_title'=>'Delete Material', 'activity'=>$this->nativesession->get('username2').' deleted material named: '.$file, 'a_date'=>date('m-d-Y'), 'a_time'=>date('h:i a')];
		unlink("./".$path.$file);
		$this->Author_model->insert('admin_logs',$data2);
		redirect('author/uploads');
	}
	public function logout()
	{
		if($this->nativesession->get('username2') == null)
		{
			redirect('author/index');
		}
		$this->nativesession->delete('username2');
		$this->nativesession->delete('id');
		redirect('author/index');
	}
}
