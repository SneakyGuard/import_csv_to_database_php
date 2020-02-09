<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

	function __construct ()
	{	
		parent::__construct();
		$this->load->helper('url');
		#$this->load->library('database');
	}

	public function uploadView()
	{   
        $this->load->view('include-template/header.php');   
        $this->load->view('Upload/upload_form.php');
        $this->load->view('include-template/footer.php');
	}
	public function uploadSubmit()
	{	

		if(!empty($_FILES['image_up']['name']))
        { 	
        	$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/file-upload-in-codeigniter-with-progressbar/images/'; 
        	$config['allowed_types'] = '*'; 
        	$this->load->library('upload', $config);
        	$file_name   		=   $_FILES['image_up']['name'];
            $file_extension     =   pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_extension  =   array('jpg','jpeg','png');

            if(in_array($file_extension,$allowed_extension))
            {
            	if ($this->upload->do_upload('image_up'))
            	{
            		echo base_url().'images/'.$file_name;
            	}
            	else
            	{
            		echo 'somethig went !wrong';
            	}	
            }
            else
            {
            	echo 'please upload valid file';
            }	
        }	
	}
}
