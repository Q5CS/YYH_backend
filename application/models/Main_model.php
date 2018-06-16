<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("User_model");
        $this->load->library('session');
    }
    public function stallIdToName()
    {
        $stalls = $this->User_model->userinfo()["stall"];
        $result = [];
        foreach ($stalls as $t) {
            $query = $this->db->where("id", $t)->get("stalls")->row_array();
            array_push($result, [
                "id" => $t,
                "name" => $query["name"]
            ]);
        }
        return $result;
    }
    public function stallIdToName2($sid)
    {
        $query = $this->db->where("id", $sid)->get("stalls")->row_array();
        return $query['name'];
    }
    public function save($id, $title, $content) {
        date_default_timezone_set('Asia/Shanghai');
        $data = [
            "sid" => $id,
            "title" => $title,
            "content" => $content,
            "user" => $this->User_model->userinfo()["name"],
            "time" => time()
        ];
        $t = $this->db->insert("records", $data);
        if($t) {
            return "succ";
        } else {
            exit(500);
        }
    }
    public function getContent($sid) {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->where("sid", $sid)->get("records")->row_array();
        return $query["content"];
    }
    public function get($sid) {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->where("sid", $sid)->get("records")->row_array();
        $data = [
            "title" => $query["title"],
            "content" => $query["content"]
        ];
        return $data;
    }
    public function getAll() {
        $query = $this->db->query("SELECT * FROM (SELECT s1.sid, s1.title, s1.content, s1.time FROM records s1 LEFT JOIN records s2 ON s1.sid = s2.sid AND s1.time < s2.time WHERE s2.id IS NULL) AS t;")->result_array();
	return $query;
    }
}
