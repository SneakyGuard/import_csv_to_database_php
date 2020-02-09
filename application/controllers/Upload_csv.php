<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_csv extends CI_Controller {

    public function index()
    {
        $data = array();
        $content = $this->load->view('upload_csv/upload_csv',$data,true);
        $this->load->view('template/template1',array('content'=>$content));   
    }

    public function get_file(){
        ini_set("memory_limit","1024M");
        set_time_limit(3600);
         $csv = $_FILES['files']['tmp_name'];
         $data = array();
         $arr_name = $this->set_arr2();
        $file = fopen($csv,"r");
        $i =0;
        while(! feof($file))
        {
         $data_csv= fgetcsv($file);
          //print_r($data_csv);exit();
         

          
         if ((is_array($data_csv) || is_object($data_csv)))
         {
        if($data_csv[0] != ''){

         foreach($data_csv as $index => $row){
            //  if($index>64){
            //     break;
            //  }
        //     print_r($row);
        //    exit();
        if($i!=0){
            $data[$i][$arr_name[$index]] = $row;
        }

        }
      
    //   $this->db->insert('allocate', $data);
    // exit();
    //   $this->db->insert('wto', $data);
        }
    }
         
        $i++;
      
        }

        
        fclose($file);
        // $this->db->insert_batch('wto', $data);
        $this->db->insert_batch('update_pri_allow_list',$data);
        //  echo "<pre>";
        // print_r($data);
        // echo "</pre><br>";
        // exit(); 
    }

    public function set_arr2(){
       $data = Array
        (
            'Allow_Key',
            'RiceEUPeriod',
            'RiceEUType'
        );

return $data;
    }

    public function set_arr(){
        $data = Array
        (    
             'invh_run_auto',
             'Allow_Key',
             'Allow_ID',
             'Company_ID',
             'Allow_Type',
             'Sell_Key',
             'Country_Recieve_Name',
             'Submit_Count',
             'Export_Type',
             'FormType',
             'IsCanceled',
             'IsTransferRice',
             'Product_Code',
             'form_type',
             'reference_code1',
             'reference_code2',
             'company_taxno',
             'company_address',
             'company_province',
             'company_country',
             'company_tax',
             'company_phone',
             'company_fax',
             'request_person',
             'card_id',
             'Pay_by',
             'currency_rate',
             'currency_code',
             'destination_address',
             'destination_province',
             'destination_phone',
             'destination_fax',
             'dest_receive_country',
             'ob_name',
             'ob_address',
             'ship_by',
             'port_name',
             'vasel_name',
             'attach_file',
             'create_date',
             'sent_date',
             'acknowledge_date',
             'invoice_no1',
             'invoice_date1',
             'reason',
             'reason_eu',
             'company_name',
             'approve_date',
             'expire_date',
             'factory_taxid',
             'ob_company',
             'ob_country',
             'destination_taxid',
             'destination_company',
             'destination_country',
             'H',
             'site_id',
             'form_no',
             'edi_status_id',
             'tran_no',
             'tran_date',
             'tran_status',
             'due_date',
             'is_quota',
             'receive_con',
        );
        return $data;
    }

}

/* End of file Upload_csv.php */
