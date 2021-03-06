<?php 
if (! defined('BASEPATH')){exit('No Direct Script Access is allowed');}

class User_model Extends CI_Model{

function __Construct(){
	parent :: __construct();
    $this->load->helper('common_functions');
}

function get_access(){
    $role_id=$this->session->userdata('role_id');
    $query=$this->db->query("SELECT * FROM user_role_options WHERE section = 'User' AND role_id='$role_id' AND (r_insert = 1 OR r_view = 1 OR r_edit=1 OR r_approvals = 1 OR r_export = 1)");
    return $query->result();
}

function get_data($status='', $id=''){
    if($status!=""){
        $cond=" where status='".$status."'";
    } else {
        $cond="";
    }

    if($id!=""){
        if($cond=="") {
            $cond=" where id='".$id."'";
        } else {
            $cond=$cond." and id='".$id."'";
        }
    }

    $sql = "select A.*, B.role_name from 
            (select * from user_master".$cond.") A 
            left join 
            (select * from user_role_master) B 
            on (A.role_id=B.id) 
            order by modified_on desc";
    $query=$this->db->query($sql);
    return $query->result();
}

function save_data($id=''){
    $now=date('Y-m-d H:i:s');
    $curusr=$this->session->userdata('session_id');
    
    $data = array(
        'first_name' => $this->input->post('first_name'),
        'middle_name' => $this->input->post('middle_name'),
        'last_name' =>  $this->input->post('last_name'),
        'email_id' => $this->input->post('email_id'),
        'password' =>  $this->input->post('password'),
        'mobile' => $this->input->post('mobile'),
        'role_id' => $this->input->post('role_id'),
        'status' => $this->input->post('status'),
        'remarks' => $this->input->post('remarks'),
        'modified_by' => $curusr,
        'modified_on' => $now
    );

    if($id==''){
        $data['created_by']=$curusr;
        $data['created_on']=$now;

        $this->db->insert('user_master',$data);
        $id=$this->db->insert_id();
        $action='User Created.';
    } else {
        $this->db->where('id', $id);
        $this->db->update('user_master',$data);
        $action='User Modified.';
    }

    $logarray['table_id']=$id;
    $logarray['module_name']='User';
    $logarray['cnt_name']='User';
    $logarray['action']=$action;
    $this->user_access_log_model->insertAccessLog($logarray);
}

function check_email_availablity(){
    $id=$this->input->post('id');
    $email_id=$this->input->post('email_id');

    // $id="";

    $query=$this->db->query("SELECT * FROM user_master WHERE id!='".$id."' and email_id='".$email_id."'");
    $result=$query->result();

    if (count($result)>0){
        return 1;
    } else {
        return 0;
    }
}

}
?>