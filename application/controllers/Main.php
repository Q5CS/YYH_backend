<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Main_model');
    }
    public function index()
    {
        if (!$this->User_model->loged()) {
            redirect('main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('main.js');
        $data['logged'] = $this->User_model->loged();
        $data['user'] = $this->User_model->userinfo();
        $data['stalls'] = $this->Main_model->stallIdToName();
        $this->load->view('global/header', $data);
        $this->load->view('main/main', $data);
        $this->load->view('global/footer', $data);
    }
    public function get($id)
    {
        echo json_encode($this->Main_model->get($id));
    }
    public function getAll()
    {
        echo json_encode($this->Main_model->getAll());
    }
    public function login()
    {
        if ($this->User_model->loged()) {
            redirect('main/index');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('login.js');
        $data['logged'] = $this->User_model->loged();
        $this->load->view('global/header', $data);
        $this->load->view('main/login');
        $this->load->view('global/footer', $data);
    }
    public function edit($id)
    {
        if (!$this->User_model->loged()) {
            redirect('main/login');
		}
		if(!in_array($id, $this->User_model->userinfo()["stall"])) {
			redirect('main/index');
		}
        $data['add_css'] = array();
        $data['add_js'] = array('../layer/layer.js', '../wangeditor/wangEditor.min.js', 'edit.js?v=3');
        $data['logged'] = $this->User_model->loged();
		$data['user'] = $this->User_model->userinfo();
		$data['sid'] = $id;
		$data['name'] = $this->Main_model->stallIdToName2($id);
		$data['content'] = $this->Main_model->getContent($id);
        $this->load->view('global/header', $data);
        $this->load->view('main/edit', $data);
        $this->load->view('global/footer', $data);
    }
    
    public function uploadImg()
    {
		if (!$this->User_model->loged()) {
            redirect('main/login');
        }
        $config['upload_path'] = './upload/';
        $path = $config['upload_path'];
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5 * 1024;
        $this->load->library('upload', $config);
        
        $result = [];
        foreach ($_FILES as $fieldname => $fileObject) {  //fieldname is the form field name
            if (!empty($fileObject['name'])) {
                $config['file_name'] = $this->getMillisecond();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload($fieldname)) {
                    $data = [
                        "errno" => -1,
                        "msg" => $this->upload->display_errors()
                    ];
                    exit(json_encode($data));
                } else {
                    array_push($result, "https://cdn-yyh2018.qz5z.ren/admin/" . "upload/" . $this->upload->data('file_name') . "!1");
                }
            }
        }
        $data = [
            "errno" => 0,
            "data" => $result
        ];
        echo json_encode($data);
    }
    private function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1)+floatval($t2))*1000);
    }
    public function save()
    {
		if (!$this->User_model->loged()) {
            redirect('main/login');
        }
		$id = $this->input->post("id");
		$title = $this->input->post("title");
        $content = $this->input->post("content");
        $this->Main_model->save($id, $title, $content);
    }
}
