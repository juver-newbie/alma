<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IMDP extends MX_Controller {

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
		$this->load->model("IMDP_model");
		$this->load->dbforge();
		date_default_timezone_set("Asia/Manila");
	}
	public function index()
	{
		if($this->nativesession->get('username') != null)
		{
			redirect('IMDP/home');
		}
		$this->nativesession->set("page","Login");
		$this->load->view("login");
		$this->nativesession->set('message','-');
	}
	public function logout()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$this->nativesession->delete('username');
		$this->nativesession->delete('id');
		redirect('IMDP/index');
	}
	public function entry()
	{
		if($this->nativesession->get('username') != null)
		{
			redirect('IMDP/home');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data['query'] = $this->IMDP_model->getSuperAdmin($username);
		if($data['query'] != null)
		{
			if($this->encryption->decrypt($data['query']->password) == $password)
			{
				$id = $this->IMDP_model->getRow('superadmin','username',$username);
				$this->nativesession->set('id',$id->s_id);
				$this->nativesession->set('username',$username);
				$this->nativesession->set('message','-');
				$data = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'SuperAdmin Login', 'activity'=>$username.' logged in', 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
				$this->IMDP_model->insert('superadmin_logs',$data);
				redirect('IMDP/home');
			}	
			else
			{
				$data = ['s_id'=>$data['query']->s_id, 's_title'=>'SuperAdmin Login', 'activity'=>$username.' login wrong password', 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
				$this->IMDP_model->insert('superadmin_logs',$data);
				$this->nativesession->set('message','0');
				redirect('IMDP/index');
			}
		}
		else
		{
			$this->nativesession->set('message','0');
			redirect("IMDP/index");
		}
	}
	public function home()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$this->nativesession->set("page","Admin List");
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['admins'] = $this->IMDP_model->getTable("admin");
		$lastID = $this->IMDP_model->getLastID('admin');
		$data['lastID'] = $this->IMDP_model->getRow('admin','id',$lastID->id);
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['navlink'] = ['a'=>' ', 'b'=>'collapsed', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>'collapsed'];
		$this->load->view("head",$data);
		$this->load->view("home",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','1');
	}
	public function materials()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$data['admins'] = $this->IMDP_model->getTable('admin');
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['materials'] = $this->IMDP_model->getConfirmedMaterials();
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>'collapsed'];
		$data['searchText'] = "";
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("materials",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function requests()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$data['admins'] = $this->IMDP_model->getTable('admin');
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['materials'] = $this->IMDP_model->getUnConfirmedMaterials();
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'collapsed', 'c'=>'', 'd'=>'collapsed', 'e'=>'collapsed'];
		$data['searchText'] = "";
		$this->nativesession->set("page","Learning Materials");
		$this->load->view("head",$data);
		$this->load->view("requests",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function messages()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$data['admins'] = $this->IMDP_model->getTable('admin');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'collapsed', 'c'=>'collapsed', 'd'=>'', 'e'=>'collapsed'];
		$data['searchText'] = "";
		$this->nativesession->set("page","Messages");
		$username = $this->input->get("username");
		if($username == null || $username == "" || $username == " ")
		{
			redirect('IMDP/home');
		}
		$data['chats'] = $this->IMDP_model->getResult('messages','author',$username);
		$data['contact'] = $this->IMDP_model->getRow('admin','username',$username);
		$this->load->view("head",$data);
		$this->load->view("messages",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','2');
	}
	public function getMessagesAJAX()
	{
		$postData = $this->input->post();
		$data = $this->IMDP_model->getChats($postData);
		echo json_encode($data);
	}
	public function setAsRead()
	{
		$postData = $this->input->post();
		$data = $this->IMDP_model->setRead($postData);
		echo json_encode($data);
	}
	public function getUnread()
	{
		$postData = $this->input->post();
		$data = $this->IMDP_model->getUnread($postData);
		echo json_encode($data);
	}
	public function categories()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$data['admins'] = $this->IMDP_model->getTable('admin');
		$data['lastID'] = $this->IMDP_model->getLastID('categories');
		$data['categories'] = $this->IMDP_model->getTableSort('categories','name','ASC');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'collapsed', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>''];
		$this->nativesession->set("page","Categories");
		$this->load->view("head",$data);
		$this->load->view("categories",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','3');
	}
	public function myProfile()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->nativesession->get('id');
		$username = $this->nativesession->get('username');
		$data['admin'] = $this->IMDP_model->getRow('superadmin','s_id',$id);
		$data['logs'] = $this->IMDP_model->getLogs($id);
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'collapsed', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>'collapsed'];
		$data['materials'] = $this->IMDP_model->getUploads($username);
		$data['requests'] = $this->IMDP_model->getRequests($username);
		$this->nativesession->set("page","My Profile");
		$this->load->view("head",$data);
		$this->load->view("myProfile",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','3');
	}
	public function addCategory()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$code =$this->input->post('code');
		$name =$this->input->post('name');
		$data = ['code'=>$code, 'name'=>$name];
		$this->IMDP_model->insert('categories',$data);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Add Category', 'activity'=>$this->nativesession->get('username').' added category with code:'.$code.' name:'.$name, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/categories');
	}
	public function updateCategory()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id =$this->input->post('id');
		$name =$this->input->post('name');
		$data = ['name'=>$name];
		$this->IMDP_model->update('categories',$data,'id',$id);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Update Category', 'activity'=>$this->nativesession->get('username').' updated category with name:'.$name, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->imdp_model->insert('superadmin_logs',$data2);
		redirect('IMDP/categories');
	}
	public function deleteCategory()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$this->IMDP_model->delete('categories','id',$id);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Delete Category', 'activity'=>$this->nativesession->get('username').' deleted category with name:'.$name, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/categories');
	}
	public function addAdmin()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$first = $this->input->post('first');
		$middle = $this->input->post('middle');
		$last = $this->input->post('last');
		$password = $this->input->post('password');
		$password = $this->encryption->encrypt($password);
		$check = $this->IMDP_model->checkUsername($username);
		if($check < 0)
		{
			$this->nativesession->set('message','exist');
			redirect('IMDP/index');
		}
		$config['file_name'] = $id;
		$config['upload_path'] = 'assets/uploads/profile';
    $config['allowed_types'] = 'jpg|png|gif|jpeg';
		$this->load->library('upload', $config);
		$this->upload->do_upload('profile');
		$data = ['a_id'=>$id,'username'=>$username,'first'=>$first,'middle'=>$middle,'last'=>$last,'password'=>$password,'number'=>'','email'=>'','profile'=>$id.'.jpg'];
		$this->IMDP_model->insert('admin',$data);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Add Admin', 'activity'=>$username.' added '.$username, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		$this->nativesession->set('message','-');
		redirect('IMDP/index');
	}
	public function updateAdmin()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$num = $this->input->get('num');
		$id = $this->input->post('id'.$num);
		$username = $this->input->post('username'.$num);
		$first = $this->input->post('first'.$num);
		$middle = $this->input->post('middle'.$num);
		$last = $this->input->post('last'.$num);
		$password = $this->input->post('password'.$num);
		$password = $this->encryption->encrypt($password);
		$check = $this->IMDP_model->checkUsername($username);
		$activity = "update admin with username:".$username;
		if($check < 0)
		{
			$this->nativesession->set('message','exist');
			redirect('IMDP/index');
		}
		$data = ['username'=>$username,'first'=>$first,'middle'=>$middle,'last'=>$last,'password'=>$password];
		$this->IMDP_model->update('admin',$data,'a_id',$id);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Update Admin', 'activity'=>$activity, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		$this->nativesession->set('message','-');
		redirect('IMDP/index');
	}
	public function deleteAdmin()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$this->IMDP_model->delete('admin','a_id',$id);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Delete Admin', 'activity'=>$this->nativesession->get('username').' deleted admin with name:'.$name, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		unlink("./assets/uploads/profile/".$id.".jpg");
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/index');
	}
	public function addMaterial()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
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
		// $num = $this->IMDP_model->checkExist('materials','title',$config['file_name']);
		// if($num > 0)
		// {
		// 	$config['file_name'] = $config['file_name']."1";
		// } check if filename exists - avoid redundancy and error
		$a = $this->IMDP_model->getLastID('materials');
		$lastID = $this->IMDP_model->getRow('materials','id',$a->id);
		$temp = "";
		$temp2 = "";
		$id = "";
		if($lastID->m_id == null)
		{
			$id = '001';
		}
		else
		{
			$str = explode('*',$lastID->m_id);
			$temp = $str[1]+1;
            if(strlen($temp) == 1)
            {
              $temp2 = "00";
            }
            else if(strlen($temp) == 2)
            {
              $temp2 = "0";
            }
            else
            {
              $temp2 = "";
            }
		}
		$id = $temp2.$temp;
		$m_id = date('m').date('Y').'-'.$this->nativesession->get('id').'*'.$id;
		//id format
		//monthyear-adminid*uniqueid
		$data = ['m_id'=>$m_id, 'title'=>$config['file_name'], 'type'=>$type, 'yearlevel'=>$yearlevel, 'description'=>$description, 'category'=>$category, 'path'=>$config['upload_path'], 'username'=>$this->nativesession->get('username'), 'up_date'=>date('m-d-Y'), 'up_time'=>date('h:i a'), 'status'=>'1'];
		$this->imdp_model->insert('materials',$data);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Add Material', 'activity'=>$this->nativesession->get('username').' added material with name:'.$config['file_name'], 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/materials');
	}
	public function searchResults()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$data['navlink'] = ['a'=>'collapsed', 'b'=>'', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>'collapsed'];
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$keyword = $this->input->post('keyword');
		if($keyword == "" || $keyword == null)
		{
			redirect("IMDP/materials");
		}
		$data['materials'] = $this->IMDP_model->searchKeyword($keyword);
		$data['searchText'] = $keyword;
		$this->nativesession->set("page","Search Results");
		$this->load->view("head",$data);
		$this->load->view("materials",$data);
		$this->load->view("footer");
		$this->nativesession->set('message','-');
		$this->nativesession->set('link','3');
	}
	public function authorProfile()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->input->get('id');
		$data['admin'] = $this->IMDP_model->getRow('admin','a_id',$id);
		$data['logs'] = $this->IMDP_model->getResult('admin_logs','a_id',$id);
		$data['categories'] = $this->IMDP_model->getTable('categories');
		$data['superadmin'] = $this->IMDP_model->getSuperAdmin($this->nativesession->get('username'));
		$data['navlink'] = ['a'=>'', 'b'=>'collapsed', 'c'=>'collapsed', 'd'=>'collapsed', 'e'=>'collapsed'];
		$data['materials'] = $this->IMDP_model->getUploads($data['admin']->username);
		$data['requests'] = $this->IMDP_model->getRequests($data['admin']->username);
		$this->nativesession->set("page","Admin Profile");
		$this->load->view("head",$data);
		$this->load->view("adminProfile",$data);
		$this->load->view("footer");
	}
	public function approve()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
		$id = $this->input->get('id');
		$username = $this->input->get('username');
		$data = ['status'=>'1'];
		$this->IMDP_model->acceptMaterial($id,$data);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Accept Material', 'activity'=>$this->nativesession->get('username').' accepted material with id:'.$id, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/requests');
	}
	public function reject()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('superadmin/index');
		}
		$message = $this->input->post('message');
		$id = $this->input->post('id');
		$admin = $this->input->post('admin');
		$title = $this->input->post('title');
		$path = $this->input->post('path');
		$data = ['superadmin'=>$this->nativesession->get('username'), 'admin'=>$admin, 'message'=>$message, 'title'=>$title, 'n_date'=>date('m-d-Y'), 'n_time'=>date('h:i'),'status'=>'0'];
		$this->IMDP_model->insert('messages',$data);
		$this->IMDP_model->delete('materials','m_id',$id);
		unlink($path.$title);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Rejected Material', 'activity'=>$this->nativesession->get('username').' rejected material with title:'.$title.' from:'.$admin, 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		redirect('IMDP/adminProfile?username='.$admin);
	}
	public function updateSuperadmin()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('IMDP/index');
		}
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
		$this->IMDP_model->update('superadmin',$data,'s_id',$id);
		$data2 = ['s_id'=>$this->nativesession->get('id'), 's_title'=>'Updated Profile', 'activity'=>'IMDP Head update profile', 's_date'=>date('m-d-Y'), 's_time'=>date('h:i a')];
		$this->IMDP_model->insert('superadmin_logs',$data2);
		$this->nativesession->set('message','-');
		redirect('IMDP/myProfile');
	}
	public function send()
	{
		if($this->nativesession->get('username') == null)
		{
			redirect('superadmin/index');
		}
		$message = $this->input->post('message');
		$username = $this->input->post('username');
		$data = ['thread'=>'0','author'=>$username, 'message'=>$message, 'n_date'=>date('m-d-Y'), 'n_time'=>date('h:i a'),'status'=>'1'];
		$this->IMDP_model->insert('messages',$data);
		redirect('IMDP/messages?username='.$username);
	}
	public function sample()
	{
		echo $this->encryption->encrypt('12345');
		echo "<br>";
		echo $this->encryption->decrypt('97751ffb52b6e2ed6385e3ba64e28cda414f5c0fbb36f157fc342924faef1a0d338068a5cac20d6aec6fcf0660de156b1dd43b8b3fecb934a7b0d11a408fc466w7imIcBqVp8MtxTLSdgmJrk5+LDElZGVrj/4gWCSH/A=');
		echo "<br>";
		$cookie = array('name'=>'superadmin','value'=>'juver','expire'=>'0','path'=>'/');
		$this->input->set_cookie($cookie);
		echo "<br>";
		echo $this->input->cookie('superadmin');
	}
	public function sample2()
	{
		echo $this->input->post("profile");
	}
}
