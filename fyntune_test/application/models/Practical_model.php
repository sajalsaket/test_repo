<?php

// defined('BASEPATH')
//     OR ('No direct script access allowed');
// namespace App\Models;
// use CodeIgniter\Model;
class Practical_model extends CI_Model
{

    public $id = 'id';
    public $order = 'ASC';


    function insert_register($data)
    {
        $this->db->insert('user', $data);
    }

    function insert_feeds($data)
    {
        $this->db->insert('feeds', $data);
    }

    public function validate() {
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
       
            $sql = "select * from user where email = '" . $email . "' and password = '" . md5($password) . "' limit 1";
             $query = $this->db->query($sql);            
            if ($query->num_rows()==1) {
                $row = $query->row();
                $data = array(
                    'login_id' => $row->id,
                    'email' => $row->email,
                    'name' => $row->name,
                     'validated' => true,
                     'login_stat' =>'1'
                );
                $this->session->set_userdata($data);
                return $row;
            }
    }

    function read_feeds($category= NULL,$limit,$start)
    {
        $this->db->limit($limit, $start);
        if($category!='0'){
            $this->db->like('category', $category);
        }
        
            $this->db->order_by('feed_id', 'desc');
            $query = $this->db->get('feeds');
            return $query->result();
    }

    function read_email($email)
    {
            $this->db->where('email', $email);
            $query = $this->db->get('user');
            return $query->result();
    }

    public function get_count($category= NULL) {
        if($category!='0'){
        $this->db->like('category',$category);
        }
        return $this->db->get('feeds')->num_rows();
    }

    function read_feed_user_id($feed_id)
    {   
        $this->db->select('user_id');
        $this->db->from('feeds');
        $this->db->where('feed_id', $feed_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->user_id;  
    }

    function update_feeds($feed_id,$data)
    {
        $this->db->where('feed_id', $feed_id);
        $this->db->update('feeds', $data);
    }

    function delete_feeds($feed_id)
    {
        $this->db->where('feed_id', $feed_id);
        $this->db->delete('feeds');
    }

   
}
