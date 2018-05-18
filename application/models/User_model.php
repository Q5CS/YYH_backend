<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    public function loged()
    {
        return $this->session->loged;
    }
    public function logout()
    {
        $this->session->loged = false;
        return true;
    }
    public function userinfo()
    {
        return $this->session->user;
    }
    public function login($code)
    {
        $query = $this->db->where("code", $code)->get("sp_code")->row_array();
        if (!is_null($query)) {
            $data = [
                "status" => 1,
                "msg" => "登录成功"
            ];
            $this->session->loged = true;
            $this->session->user = [
                "admin" => false,
                "name" => $code,
                "stall" => explode(",", $query["stall"])
            ];
        } else {
            $data = [
                "status" => -1,
                "msg" => "登录失败"
            ];
        }
        return $data;
    }
}
