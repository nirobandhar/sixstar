<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("model_myclass", "mmc", TRUE);
        $this->load->model('model_table', "mt", TRUE);
    }
    public function index()  {
        $data['title'] = "Login";
        $this->load->view('Administrator/login', $data);
    }
    function procedure(){
        $user = mysql_real_escape_string($this->input->post('txtUserName'));
        $pass = md5($this->input->post('txtPassword'));
        $x = "SELECT tbl_user.*,tbl_brunch.* from tbl_user left join tbl_brunch on tbl_brunch.brunch_id = tbl_user.userBrunch_id where tbl_user.User_Name ='$user' AND tbl_user.User_Password ='$pass'";
        $sql = mysql_query($x);
        $d = mysql_fetch_array($sql); 
        
        if($d['Status'] == "a"){
            if ($d['UserType'] =='a') {
                $sdata['userId'] = $d['User_SlNo'];
                $sdata['BRANCHid'] = $d['userBrunch_id'];
                $sdata['FullName'] = $d['FullName'];
                $sdata['User_Name'] = $d['User_Name'];
                $sdata['accountType'] = $d['UserType'];
                $sdata['userBrunch'] = $d['Brunch_sales'];
                $sdata['Brunch_name'] = $d['Brunch_name'];
                $this->session->set_userdata($sdata);
                redirect('Administrator');
            }/*else{
                $sdata['userId'] = $d['User_SlNo'];
                $sdata['BRANCHid'] = $d['userBrunch_id'];
                $sdata['FullName'] = $d['FullName'];
                $sdata['User_Name'] = $d['User_Name'];
                $sdata['accountType'] = $d['UserType'];
                $sdata['userBrunch'] = $d['Brunch_sales'];
                $sdata['Brunch_name'] = $d['Brunch_name'];
                $this->session->set_userdata($sdata);
                redirect('page');
            }*/
            
        }
        else{
            $sdata['st'] = "Invalid Username or Password";
            $this->load->view('login', $sdata);
        }
    }
    public function forgotpassword()  {
        $data['title'] = "Forgot Password";
        $this->load->view('Administrator/ForgotPassword', $data);
    }
    public function logout(){
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('User_Name');
        $this->session->unset_userdata('accountType');
        //$this->session->unset_userdata('useremail');
        redirect("Administrator/login");
    }

}
