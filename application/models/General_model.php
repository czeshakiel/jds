<?php
date_default_timezone_set('Asia/Manila');
    class General_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function authenticate($username,$password,$dept){
            if($dept=="admin"){
                $result=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND `password`='$password'");
            }else{
                $result=$this->db->query("SELECT * FROM `user` WHERE username='$username' AND `password`='$password' AND dept='$dept'");
            }
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllDepartment(){
            $result=$this->db->query("SELECT * FROM department ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function save_department(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $check=$this->db->query("SELECT * FROM department WHERE `description`='$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO department(`description`) VALUES('$description')");
                }else{
                    $result=$this->db->query("UPDATE department SET `description`='$description' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function delete_department($id){
            $result=$this->db->query("DELETE FROM department WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM user ORDER BY `fullname` ASC");
            return $result->result_array();
        }
        public function save_users(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $fullname=$this->input->post('fullname');
            $department=$this->input->post('department');
            $access=$this->input->post('access');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM user WHERE `username`='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO user(`username`,`password`,`fullname`,`dept`,datearray,timearray,Access) VALUES('$username','$password','$fullname','$department','$date','$time','$access')");
                }else{
                    $result=$this->db->query("UPDATE user SET `username`='$username',`password`='$password',fullname='$fullname',dept='$department',Access='$access' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function delete_users($id){
            $result=$this->db->query("DELETE FROM user WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSettings(){
            $result=$this->db->query("SELECT * FROM settings");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        
        public function save_info(){
            $company_name=$this->input->post('company_name');
            $company_address=$this->input->post('company_address');
            $company_email=$this->input->post('company_email');
            $company_contactno=$this->input->post('company_contactno');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM settings");
            if($check->num_rows()>0){
                $result=$this->db->query("UPDATE settings SET company_name='$company_name',company_address='$company_address',company_email='$company_email',company_contactno='$company_contactno',datearray='$date',timearray='$time'");
            }else{
                $result=$this->db->query("INSERT INTO settings SET company_name='$company_name',company_address='$company_address',company_email='$company_email',company_contactno='$company_contactno',datearray='$date',timearray='$time'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_logo(){
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE settings SET company_logo='$imgContent'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }else{
                    return false;
            }
        }
        public function getRooms(){
            $result=$this->db->query("SELECT * FROM room");
            return $result->result_array();
        }
        public function save_room(){
            $room_id=$this->input->post('id');
            $room_color=$this->input->post('room_color');
            $room_type=$this->input->post('room_type');
            $room_rate_weekday=$this->input->post('room_rate_weekday');
            $room_rate_weekend=$this->input->post('room_rate_weekend');
            $room_excess=$this->input->post('room_excess');
            $room_inclusion=$this->input->post('room_inclusion');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $user=$this->session->fullname;
            $check=$this->db->query("SELECT * FROM room WHERE room_color='$room_color' AND room_type='$room_type' AND id <> '$room_id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($room_id==""){
                    $result=$this->db->query("INSERT INTO room SET room_color='$room_color',room_type='$room_type',room_rate_weekday='$room_rate_weekday',room_rate_weekend='$room_rate_weekend',room_excess='$room_excess',room_inclusion='$room_inclusion',room_hk_status='dirty',room_fo_status='vacant'");
                }else{
                    $result=$this->db->query("UPDATE room SET room_color='$room_color',room_type='$room_type',room_rate_weekday='$room_rate_weekday',room_rate_weekend='$room_rate_weekend',room_excess='$room_excess',room_inclusion='$room_inclusion' WHERE id='$room_id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }            
        }
        public function fetchRoom($id){
            $result=$this->db->query("SELECT * FROM room WHERE id='$id'");
            return $result->result_array();
        }
        public function save_room_image(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE room SET room_image='$imgContent' WHERE id='$id'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }else{
                    return false;
            }
        }
        public function delete_room($id){
            $result=$this->db->query("DELETE FROM room WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
         public function getPackages(){
            $result=$this->db->query("SELECT * FROM package");
            return $result->result_array();
        }
         public function save_package(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $rate=$this->input->post('rate');            
            $package_inclusion=$this->input->post('package_inclusion');
            $check=$this->db->query("SELECT * FROM package WHERE `description`='$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO package SET `description`='$description',rate='$rate',package_inclusion='$package_inclusion'");
                }else{
                    $result=$this->db->query("UPDATE package SET `description`='$description',rate='$rate',package_inclusion='$package_inclusion' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }            
        }
        public function save_notes(){
            $text=$this->input->post('notes');
            $check=$this->db->query("SELECT * FROM notes");
            if($check->num_rows()>0){
                $result=$this->db->query("UPDATE notes SET notes='$text'");
            }else{
                $result=$this->db->query("INSERT INTO notes SET notes='$text'");
            }
            return true;
        }
        public function getNotes(){
            $result=$this->db->query("SELECT * FROM notes");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
    }
?>