<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practical extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Practical_model');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library("pagination");
    }
	public function index()
	{
        $data['action']='practical/save_company_details';
		$this->load->view('practical_view');
	}

    public function home()
	{
            $search = ($this->input->post("category"))? $this->input->post("category") : "0";
            $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
            $category=$this->input->post('category');

        $config = array();
        $config["base_url"] = base_url() . "practical/home/$search";
        $config["total_rows"] = $this->Practical_model->get_count($search);
        // echo $config["total_rows"];
        $config["per_page"] = 3;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : $category;
        $data['links'] = $this->pagination->create_links();
        


        $comp_data=$this->Practical_model->read_feeds($search,$config["per_page"], $page);
        // echo $this->db->last_query();
        $data['total_rows']=$config["total_rows"];
        $data['comp_data']=$comp_data;
        $data['category']=$search;
        $data['action']='practical/save_feeds';
		$this->load->view('home_page',$data);
	}

    
    public function register(){
        $data['action']='practical/save_register';
        
        $this->load->view('register_page',$data);
  }

  public function login(){
    $data['action']='practical/process';
    
    $this->load->view('login_page',$data);
}

public function process() {
    $result = $this->Practical_model->validate();
    if ($result > '0') {
        redirect('practical/home');
    } else {
        $this->session->set_flashdata('message', '"Email Id" or "Password" incorrect');
        redirect('practical/login');
    }
}

        public function save_register(){
         
            $data=array(
                'email'=> $this->input->post('email'),
                'name'=> $this->input->post('name'),
                'password'=> md5($this->input->post('password')),
            );
            
           $mail = $this->Practical_model->read_email($this->input->post('email'));
           if(!empty($mail)){
            $this->session->set_flashdata('message', 'This email already exist');
            redirect(site_url('practical/register'));

           }else{
        $this->Practical_model->insert_register($data);
        $this->session->set_flashdata('message', 'Profile Created Successfully, Please login to Proceed');
        redirect(site_url('practical/login'));
           }
    }

    public function save_feeds(){
         
        $data=array(
            'user_id'=>$this->session->userdata('login_id'),
            'category'=>$this->input->post('category'),
            'feed'=> $this->input->post('feeds'),
        );
    $this->Practical_model->insert_feeds($data);
    $this->session->set_flashdata('message', 'Feed Posted Sucessfully');
    redirect(site_url('practical/home'));

}

function update_feed(){
    $feed_id= $this->input->post('f_id');
    $data=array(
        'feed' => $this->input->post('feed'),
        'category' =>$this->input->post('category'),
    );

    $comp_data=$this->Practical_model->update_feeds($feed_id,$data);
    return 'success';
}

function delete_feeds(){
    $feed_id= $this->input->post('f_id');
    $comp_data=$this->Practical_model->delete_feeds($feed_id);
    return 'success';
}

public function logout() {
    $this->session->unset_userdata('login_id');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('validated');
    $this->session->unset_userdata('login_stat');
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', 'Logout Success');
    redirect('practical');
}
    
}
