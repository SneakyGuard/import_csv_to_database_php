<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('center_model');
        //Do your magic here
    }
    

    public function index()
    {
        $data = array();
        $content = $this->load->view('upload/index_form',$data,true);
        $this->load->view('template/template1',array('content'=>$content));
    }

    public function get_file(){

        $f = array('year','month','idno','sname','name','lname','n_office','n_suboffice','province','bank_code','bank_name','bank_brcode','bank_brname','bank_id','money','money_lost','m_pos','m_pos_lost','m_19','m_20','m_helpchild','m_22','m_23','m_oth','m_tt','tax','m_27','m_28','m_house','m_educate','m_car','m_dead','m_33','m_34','p_oth','p_tt','m_net','date_att','type');
        $config['upload_path']          = './upload/temp_upload/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 100;
        $config['file_name']             = date('YdmHis');

        $this->load->library('upload', $config);
        $this->upload->do_upload('files');
        $file_upload=$this->upload->data();
        $file_handle = fopen(base_url('upload/temp_upload/').$file_upload['file_name'], "r");
        $data = array();
        $i = 0;
        while (!feof($file_handle) ) {
        $line_of_text = fgets($file_handle);
        $data[$i] = explode('$', $line_of_text);
        $temp_data = $data[$i];
        $data[$i] = array();
        foreach($temp_data as $index=> $row){
            $data[$i][$f[$index]] =  iconv( 'TIS-620','UTF-8' ,$row);
        }
        $i++;
        }
        
        fclose($file_handle);
   
        $this->load->model('center_model');
        $this->center_model->import_db($data);

        }


}

/* End of file Center.php */
