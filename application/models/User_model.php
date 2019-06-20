<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserData()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function getUserDataAll()
    {
        $this->db->select('name, email, username, image, date_created');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function userCheckLogin($username)
    {
        $this->db->where("email =  '$username' or username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
}