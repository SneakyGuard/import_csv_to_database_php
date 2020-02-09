<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Center_model extends CI_Model {

    function import_db($db){
        return $this->db->insert_batch('saraly_slip', $db);
    }

}

/* End of file Center_model.php */
