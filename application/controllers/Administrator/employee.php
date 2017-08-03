<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Employee extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->brunch = $this->session->userdata('BRANCHid');

        $access = $this->session->userdata('userId');

         if($access == '' ){

            redirect("login");

        }

        $this->load->model("model_myclass", "mmc", TRUE);

        $this->load->model('model_table', "mt", TRUE);

    }

    public function index()  {

        $data['title'] = "Employee";

        $data['content'] = $this->load->view('Administrator/employee/add_employee', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    //Designation

    public function designation()  {

        $data['title'] = "Add Designation";

        $data['content'] = $this->load->view('Administrator/employee/designation', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    public function insert_designation()  {

        $mail = $this->input->post('Designation');

        $query = $this->db->query("SELECT Designation_Name from tbl_designation where Designation_Name = '$mail'");

        

        if($query->num_rows() > 0){

            $data['exists'] = "This Name is Already Exists";

            $this->load->view('Administrator/ajax/designation', $data);

        }

        else{

            $data = array(

                "Designation_Name"       =>$this->input->post('Designation', TRUE),

                "AddBy"                  =>$this->session->userdata("FullName"),

                "AddTime"                =>date("Y-m-d h:i:s")

                );

            $this->mt->save_data('tbl_designation',$data);

            $this->load->view('Administrator/ajax/designation');

        }

    }

    public function designationedit($id)  {

        $data['title'] = "Edit Designation";

        $fld = 'Designation_SlNo';

        $data['selected'] = $this->mt->select_by_id('tbl_designation', $id,$fld);

        $data['content'] = $this->load->view('Administrator/edit/designation_edit', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    public function designationupdate(){

        $id = $this->input->post('id');

        $fld = 'Designation_SlNo';

            $data = array(

                "Designation_Name"                  =>$this->input->post('Designation', TRUE),

                "UpdateBy"                          =>$this->session->userdata("FullName"),

                "UpdateTime"                        =>date("Y-m-d h:i:s")

            );

            $this->mt->update_data("tbl_designation", $data, $id,$fld);

    } 

    public function designationdelete(){

        $fld = 'Designation_SlNo';

        $id = $this->input->post('deleted');

        $this->mt->delete_data("tbl_designation", $id, $fld);

        $this->load->view('Administrator/ajax/designation');

        

    } 

    //^^^^^^^^^^^^^^^^^^^^^^^^^

    //

    public function depertment()  {

        $data['title'] = "Add Depertment";

        $data['content'] = $this->load->view('Administrator/employee/depertment', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    public function insert_depertment()  {

        $mail = $this->input->post('Depertment');

        $query = $this->db->query("SELECT Department_Name from tbl_department where Department_Name = '$mail'");

        

        if($query->num_rows() > 0){

            $data['exists'] = "This Name is Already Exists";

            $this->load->view('Administrator/ajax/depertment', $data);

        }

        else{

            $data = array(

                "Department_Name"        =>$this->input->post('Depertment', TRUE),

                "AddBy"                  =>$this->session->userdata("FullName"),

                "AddTime"                =>date("Y-m-d h:i:s")

                );

            $this->mt->save_data('tbl_department',$data);

            $this->load->view('Administrator/ajax/depertment');

        }

    }

    public function depertmentedit($id)  {

        $data['title'] = "Edit Depertment";

        $fld = 'Department_SlNo';

        $data['selected'] = $this->mt->select_by_id('tbl_department', $id,$fld);

        $data['content'] = $this->load->view('Administrator/edit/depertment_edit', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    public function depertmentupdate(){

        $id = $this->input->post('id');

        $fld = 'Department_SlNo';

            $data = array(

                "Department_Name"             =>$this->input->post('Depertment', TRUE),

                "UpdateBy"                    =>$this->session->userdata("FullName"),

                "UpdateTime"                  =>date("Y-m-d h:i:s")

            );

            $this->mt->update_data("tbl_department", $data, $id,$fld);  

    } 

    public function depertmentdelete(){

        $fld = 'Department_SlNo';

        $id = $this->input->post('deleted');

        $this->mt->delete_data("tbl_department", $id, $fld);

        $this->load->view('Administrator/ajax/depertment');

        

    }

    //^^^^^^^^^^^^^^^^^^^^

    public function emplists()  {

        $data['title'] = "Add Depertment";

        $data['content'] = $this->load->view('Administrator/employee/list', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    // fancybox add 

    public function fancybox_depertment()  {

        $this->load->view('Administrator/employee/em_depertment');

    }

    public function fancybox_insert_depertment()  {

        $mail = $this->input->post('Depertment');

        $query = $this->db->query("SELECT Department_Name from tbl_department where Department_Name = '$mail'");

        

        if($query->num_rows() > 0){

            $data['exists'] = "This Name is Already Exists";

            $this->load->view('Administrator/ajax/fancybox_depertmetn', $data);

        }

        else{

            $data = array(

                "Department_Name"        =>$this->input->post('Depertment', TRUE),

                "AddBy"                  =>$this->session->userdata("FullName"),

                "AddTime"                =>date("Y-m-d h:i:s")

                );

            $this->mt->save_data('tbl_department',$data);

            $this->load->view('Administrator/ajax/fancybox_depertmetn');

        }

    }

    //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    // fancybox add 

    public function fancybox_designation()  {

        $this->load->view('Administrator/employee/em_designation');

    }

    public function fancybox_insert_designation()  {

        $mail = $this->input->post('Designation');

        $query = $this->db->query("SELECT Designation_Name from tbl_designation where Designation_Name = '$mail'");

        

        if($query->num_rows() > 0){

            $data['exists'] = "This Name is Already Exists";

            $this->load->view('Administrator/ajax/fancybox_designation', $data);

        }

        else{

            $data = array(

                "Designation_Name"        =>$this->input->post('Designation', TRUE),

                "AddBy"                  =>$this->session->userdata("FullName"),

                "AddTime"                =>date("Y-m-d h:i:s")

                );

            $this->mt->save_data('tbl_designation',$data);

            $this->load->view('Administrator/ajax/fancybox_designation');

        }

    }

    //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    // Employee Insert

    public function employee_insert(){

        $data=array();

        $this->load->library('upload');

        $config['upload_path'] = './uploads/employeePhoto_org/';

        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $config['max_size'] = '10000';

        $config['image_width']= '4000';

        $config['image_height']= '4000';

        $this->upload->initialize($config);

         

        $data['Designation_ID']=  $this->input->post('em_Designation',true);

        $data['Department_ID']=  $this->input->post('em_Depertment',true);

        $data['Employee_ID']=  $this->input->post('Employeer_id',true);

        $data['Employee_Name']=  $this->input->post('em_name',true);

        $data['Employee_JoinDate']=  $this->input->post('em_Joint_date');

        $data['Employee_Gender']=  $this->input->post('Gender',true);

        $data['Employee_BirthDate']=  $this->input->post('em_dob',true);

        $data['Employee_ContactNo']=  $this->input->post('em_contact',true);

        $data['Employee_Email']=  $this->input->post('ec_email',true);

        $data['Employee_MaritalStatus']=  $this->input->post('Marital',true);

        $data['Employee_FatherName']=  $this->input->post('em_father',true);

        $data['Employee_MotherName']=  $this->input->post('mother_name',true);

        $data['Employee_PrasentAddress']=  $this->input->post('em_Present_address',true);

        $data['Employee_PermanentAddress']=  $this->input->post('em_Permanent_address',true);

        $data['AddBy']=  $this->session->userdata("FullName");

        $data['Employee_brinchid']=  $this->session->userdata("BRANCHid");
		$data['Employee_NID']=  	 $this->input->post('nid',true);
		$data['religion']=  $this->input->post('religion',true);
		$data['nationality']=  $this->input->post('national',true);
		$data['bloodgrp']=  $this->input->post('bp',true);
		$data['height']=  $this->input->post('height',true);
		$data['notes']=  $this->input->post('notes',true);

        $data['AddTime']=  date("Y-m-d h:i:s");



        $this->upload->do_upload('em_photo');

        $images = $this->upload->data();

        $data['Employee_Pic_org'] = $images['file_name'];



        $config['image_library'] = 'gd2';

        $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;

        $config['new_image'] = 'uploads/'.'employeePhoto_thum/'.$this->upload->file_name;

        $config['maintain_ratio'] = FALSE;

        $config['width'] = 165;

        $config['height'] = 175;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

        $data['Employee_Pic_thum'] = $this->upload->file_name;



        $this->mt->save_data('tbl_employee', $data);

        $this->load->view('Administrator/ajax/add_employee');

    }

    public function employee_edit($id)  {

        $data['title'] = "Edit Employee";

        $query = "SELECT tbl_employee.*,tbl_department.*,tbl_designation.* FROM tbl_employee left join tbl_department on tbl_department.Department_SlNo=tbl_employee.Department_ID left join tbl_designation on tbl_designation.Designation_SlNo=tbl_employee.Designation_ID  where tbl_employee.Employee_SlNo = '$id'";

        $data['selected'] = $this->mt->edit_by_id($query);

        $data['content'] = $this->load->view('Administrator/edit/employee_edit', $data, TRUE);

        $this->load->view('Administrator/index', $data);

    }

    

    public function employee_Update(){

       

        $id= $this->input->post('iidd');

        $fld = 'Employee_SlNo';

        $this->load->library('upload');

        $config['upload_path'] = './uploads/employeePhoto_org/';

        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $config['max_size'] = '10000';

        $config['image_width']= '4000';

        $config['image_height']= '4000';

        $this->upload->initialize($config);



        $data['Designation_ID']=  $this->input->post('em_Designation',true);

        $data['Department_ID']=  $this->input->post('em_Depertment',true);

        $data['Employee_ID']=  $this->input->post('Employeer_id',true);

        $data['Employee_Name']=  $this->input->post('em_name',true);

        $data['Employee_JoinDate']=  $this->input->post('em_Joint_date');

        $data['Employee_Gender']=  $this->input->post('Gender',true);

        $data['Employee_BirthDate']=  $this->input->post('em_dob',true);

        $data['Employee_ContactNo']=  $this->input->post('em_contact',true);

        $data['Employee_Email']=  $this->input->post('ec_email',true);

        $data['Employee_MaritalStatus']=  $this->input->post('Marital',true);

        $data['Employee_FatherName']=  $this->input->post('em_father',true);

        $data['Employee_MotherName']=  $this->input->post('mother_name',true);

        $data['Employee_PrasentAddress']=  $this->input->post('em_Present_address',true);

        $data['Employee_PermanentAddress']=  $this->input->post('em_Permanent_address',true);

        $data['Employee_brinchid']=  $this->session->userdata("BRANCHid");

        $data['AddBy']=  $this->session->userdata("FullName");
		$data['Employee_NID']=  	 $this->input->post('nid',true);
		$data['religion']=  $this->input->post('religion',true);
		$data['nationality']=  $this->input->post('national',true);
		$data['bloodgrp']=  $this->input->post('bp',true);
		$data['height']=  $this->input->post('height',true);
		$data['notes']=  $this->input->post('notes',true);


        $data['AddTime']=  date("Y-m-d h:i:s");

        

        $xx = $this->mt->select_by_id("tbl_employee", $id,$fld);



        $image=$this->upload->do_upload('em_photo');

        $images = $this->upload->data();

        

        if($image != ""){            

            if($xx['Employee_Pic_thum'] && $xx['Employee_Pic_org']){

            unlink("./uploads/employeePhoto_thum/".$xx['Employee_Pic_thum']);

            unlink("./uploads/employeePhoto_org/".$xx['Employee_Pic_org']);

            }

            $data['Employee_Pic_org'] = $images['file_name'];

            

            $config['image_library'] = 'gd2';

            $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;

            $config['new_image'] = 'uploads/'.'employeePhoto_thum/'.$this->upload->file_name;

            $config['maintain_ratio'] = FALSE;

            $config['width'] = 165;

            $config['height'] = 175;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $data['Employee_Pic_thum'] = $this->upload->file_name;                 

        }else{

           

            $data['Employee_Pic_org'] = $xx['Employee_Pic_org'];

            $data['Employee_Pic_thum'] = $xx['Employee_Pic_thum'];

         }

        

        $this->mt->update_data("tbl_employee", $data, $id, $fld);

    }

    public function employee_Delete(){

        $fld = 'Employee_SlNo';

        $id = $this->input->post('deleted');

        $xx = $this->mt->select_by_id("tbl_employee", $id,$fld);

        if($xx['Employee_Pic_thum'] && $xx['Employee_Pic_org']) {

            @unlink("./uploads/employeePhoto_thum/".$xx['Employee_Pic_thum']);

            @unlink("./uploads/employeePhoto_org/".$xx['Employee_Pic_org']);

        }

        $this->mt->delete_data("tbl_employee", $id,$fld);

        $this->load->view('Administrator/ajax/employee_list');

    }

        

   

}

