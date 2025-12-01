<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{

        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);                 
        }  
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $dept=$this->input->post('dept');
            $data=$this->General_model->authenticate($username,$password,$dept);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'dept' => $dept,
                    'access' => $data['Access'],
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            }else{
                $this->session->set_flashdata('error','Invalid Username and password!');
                redirect(base_url());
            }
        }
        public function logout(){
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('dept');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            if($this->input->post('month')=="" && $this->input->post('year')==""){
                $data['month'] = date('m');
                $data['year'] = date('Y');
            }else{
                $data['month'] = $this->input->post('month');
                $data['year'] = $this->input->post('year');
            }
            if($this->session->dept=="CAFE" || $this->session->dept=="FOOD KIOSK" || $this->session->dept=="SOUVENIR"){
                redirect(base_url('point_of_sale'));
            }
            if($this->session->dept=="HOUSEKEEPING"){
                redirect(base_url('manage_housekeeping'));
            }
            $data['booked'] = $this->Reservation_model->getReservation('booked');
            $data['checkin'] = $this->Reservation_model->getReservation('checkedin');
            $data['checkout'] = $this->Reservation_model->getReservation('checkedout');
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        } 
        public function manage_department(){
            $page = "manage_department";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['department'] = $this->General_model->getAllDepartment();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_department(){
            $save=$this->General_model->save_department();
            if($save){
                $this->session->set_flashdata('success','Department details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save department details!');
            }
            redirect(base_url('manage_department'));
        }
        public function delete_department($id){
            $save=$this->General_model->delete_department($id);
            if($save){
                $this->session->set_flashdata('success','Department details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete department details!');
            }
            redirect(base_url('manage_department'));
        }
        public function manage_users(){
            $page = "manage_users";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['users'] = $this->General_model->getAllUsers();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_users(){
            $save=$this->General_model->save_users();
            if($save){
                $this->session->set_flashdata('success','User details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user details!');
            }
            redirect(base_url('manage_users'));
        }
        public function delete_users($id){
            $save=$this->General_model->delete_users($id);
            if($save){
                $this->session->set_flashdata('success','User details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete user details!');
            }
            redirect(base_url('manage_users'));
        }
        public function manage_info(){
            $page = "manage_info";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_info(){
            $save=$this->General_model->save_info();
            if($save){
                $this->session->set_flashdata('success','Company details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save company details!');
            }
            redirect(base_url('manage_info'));
        }
        public function save_logo(){
            $save=$this->General_model->save_logo();
            if($save){
                $this->session->set_flashdata('success','Company logo successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save company logo!');
            }
            redirect(base_url('manage_info'));
        }
        public function manage_room(){
            $page = "manage_room";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_room(){
            $save=$this->General_model->save_room();
            if($save){
                $this->session->set_flashdata('success','Room details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save room details!');
            }
            redirect(base_url('manage_room'));
        }
        public function fetchRoom(){
            $id=$this->input->post('id');
            $data=$this->General_model->fetchRoom($id);            
            echo json_encode($data);            
        }
        public function save_room_image(){
            $save=$this->General_model->save_room_image();
            if($save){
                $this->session->set_flashdata('success','Room Picture successfull updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update room picture!');
            }
            redirect(base_url('manage_room'));
        }
        public function delete_room($id){
            $save=$this->General_model->delete_room($id);
            if($save){
                $this->session->set_flashdata('success','Room details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete room details!');
            }
            redirect(base_url('manage_room'));
        }
        public function manage_package(){
            $page = "manage_package";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['packages'] = $this->General_model->getPackages();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_package(){
            $save=$this->General_model->save_package();
            if($save){
                $this->session->set_flashdata('success','Package details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save package details!');
            }
            redirect(base_url('manage_package'));
        }
        public function delete_package($id){
            $save=$this->General_model->delete_package($id);
            if($save){
                $this->session->set_flashdata('success','Package details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete package details!');
            }
            redirect(base_url('manage_package'));
        }
        public function view_available($date){
            $page = "view_available";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $data['packages'] = $this->General_model->getPackages();
            $data['datearray'] = $date;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_reservation(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->save_reservation();
            if($save){
                redirect(base_url('manage_reservation/room'));   
            }else{
                $this->session->set_flashdata('failed','Unable to save reservation details!');
                redirect(base_url('view_available/'.$date));
            }
        }
        public function save_reservation_package(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->save_reservation_package();
            if($save){
                redirect(base_url('manage_reservation/package'));   
            }else{
                $this->session->set_flashdata('failed','Unable to save reservation details!');
                redirect(base_url('view_available/'.$date));
            }
        }
        public function manage_reservation($type){
            $page = "manage_reservation";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['booked'] = $this->Reservation_model->getReservationByType('booked',$type);
            $data['checkedin'] = $this->Reservation_model->getReservation('checkedin');   
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function print_reg_form($id){
            $page = "print_reg_form";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);                  
            $this->load->view('pages/'.$page,$data);                           
        }
        public function print_voucher($id){
            $page = "print_voucher";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);                  
            $this->load->view('pages/'.$page,$data);                           
        }
        public function manage_housekeeping(){
            $page = "manage_housekeeping";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function change_room_hk_status(){
            $save=$this->Reservation_model->change_room_hk_status();
            if($save){
                $this->session->set_flashdata('success','Room HK status successfull updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update room HK status!');
            }
            redirect(base_url('manage_housekeeping'));
        }
        public function update_reservation(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->update_reservation();
            if($save){
                $this->session->set_flashdata('success','Reservation details successfully updated!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to update reservation details!');                
            }
            redirect(base_url('manage_reservation/room'));
        }
        public function update_reservation_package(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->update_reservation_package();
            if($save){
                $this->session->set_flashdata('success','Reservation details successfully updated!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to update reservation details!');                
            }
            redirect(base_url('manage_reservation/package'));
        }
        public function cancel_reservation(){
            $refno=$this->input->post('refno');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->Reservation_model->checkUser($username,$password);
            if($check){
                $save=$this->Reservation_model->cancel_reservation($refno);
                if($save){
                    $this->session->set_flashdata('success','Reservation successfully cancelled!');
                }else{
                    $this->session->set_flashdata('failed','Unable to cancel reservation!');
                }
            }else{
                $this->session->set_flashdata('failed','You are not authorized!');
            }
            redirect(base_url('manage_reservation/room'));
        }
        public function undo_payment(){
            $refno=$this->input->post('refno');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->Reservation_model->checkUserPayment($username,$password);
            if($check){
                $save=$this->Reservation_model->undo_payment($refno);
                if($save){
                    $this->session->set_flashdata('success','Payment successfully cancelled!');
                }else{
                    $this->session->set_flashdata('failed','Unable to cancel payment!');
                }
            }else{
                $this->session->set_flashdata('failed','You are not authorized!');
            }
            redirect(base_url('reservation_details/'.$refno));
        }
        public function check_in(){
            $save=$this->Reservation_model->check_in();
            if($save){
                $this->session->set_flashdata('success','Checked in successfully!');
            }else{
                $this->session->set_flashdata('failed','Unable to check in!');
            }
            redirect(base_url('manage_reservation/room'));
        }
        public function check_out($id){
            $save=$this->Reservation_model->check_out($id);
            if($save){
                $this->session->set_flashdata('success','Checked out successfully!');
            }else{
                $this->session->set_flashdata('failed','Unable to check out!');
            }
            redirect(base_url('manage_reservation/room'));
        }
        public function reservation_details($id){
            $page = "reservation_details";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}            
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);    
            $data['charges'] = $this->Reservation_model->getAllCharges($id);
            $data['payment'] = $this->Reservation_model->getPayment($id);
            $data['checkin'] = $this->Reservation_model->getCheckInPayment($id);
            $data['refno'] = $id;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_charges(){
            $refno=$this->input->post('refno');
            $save=$this->Reservation_model->save_charges();
            if($save){
                $this->session->set_flashdata('success','Item successfully charged!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to charge item!');                
            }
            redirect(base_url('reservation_details/'.$refno));
        }
        public function bill_payment(){
            $refno=$this->input->post('refno');
            $save=$this->Reservation_model->bill_payment();
            if($save){
                $this->session->set_flashdata('success','Payment successfully posted!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to post payment!');                
            }
            redirect(base_url('reservation_details/'.$refno));
        }
        public function delete_charges(){
            $refno=$this->input->post('refno');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->Reservation_model->checkUserCharges($username,$password);
            if($check){
                $save=$this->Reservation_model->delete_charges();
                if($save){
                    $this->session->set_flashdata('success','Charged item successfully deleted!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to delete charged item!');                
                }
            }else{
                $this->session->set_flashdata('failed','You are not authorized!');                
            }            
            redirect(base_url('reservation_details/'.$refno));
        }

        public function manage_stocks(){
            $page = "manage_stocks";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['stocks'] = $this->Sales_model->getAllStocks();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_stocks(){
            $refno=$this->input->post('refno');
            $save=$this->Sales_model->save_stocks();
            if($save){
                $this->session->set_flashdata('success','Stock details successfully saved!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to save stock details!');                
            }
            redirect(base_url('manage_stocks'));
        }
        public function delete_stocks($code){
            $refno=$this->input->post('refno');
            $save=$this->Sales_model->delete_stocks($code);
            if($save){
                $this->session->set_flashdata('success','Stock details successfully deleted!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to delete stock details!');                
            }
            redirect(base_url('manage_stocks'));
        }
        public function manage_stock_quantity(){
            $page = "manage_stock_quantity";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['stocks'] = $this->Sales_model->getAllStocks();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function add_stock_quantity(){            
            $save=$this->Sales_model->add_stock_quantity();
            if($save){
                $this->session->set_flashdata('success','Stock quantity details successfully added!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to add stock quantity details!');                
            }
            redirect(base_url('manage_stock_quantity'));
        }
        public function edit_stock_quantity(){            
            $save=$this->Sales_model->edit_stock_quantity();
            if($save){
                $this->session->set_flashdata('success','Stock quantity details successfully added!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to add stock quantity details!');                
            }
            redirect(base_url('manage_stock_quantity'));
        }
        public function save_stock_image(){
            $save=$this->Sales_model->save_stock_image();
            if($save){
                $this->session->set_flashdata('success','Stock Picture successfull updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update stock picture!');
            }
            redirect(base_url('manage_stocks'));
        }
        public function point_of_sale(){
            $page = "point_of_sale";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            if($this->session->refno){
                $refno=$this->session->refno;                
            }else{
                $refno="";
            }
            if($this->session->type){
                $type=$this->session->type;
            }else{
                $type="all";
            }
            $data['category'] = $this->Sales_model->getAllStocksByCategory($type);
            $data['refno'] = $refno;
            $data['tender'] = $this->Sales_model->tendered($refno);
            $data['type'] = $this->Sales_model->getAllStocksCategory();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer',$data);               
        }
        public function new_transaction(){
            $refno=date('YmdHis');
            $this->session->set_userdata('refno',$refno);
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('searchme');
            $this->Sales_model->emptyOrder();            
            redirect(base_url('point_of_sale'));
        }
        public function cancel_transaction($refno){
            $this->Sales_model->cancel_transaction($refno);
            $this->session->unset_userdata('refno');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('searchme');
            redirect(base_url('point_of_sale'));
        }
        public function add_item($code){
            if($this->session->refno){
                $refno=$this->session->refno;
                $add=$this->Sales_model->add_item($code,$refno);
                echo "<script>";
                if($add){
                    
                }else{
                    echo "alert('Insufficient quantity!');";
                }
                    echo "window.location='".base_url('point_of_sale')."';";
                echo "</script>";   
            }

           
        }
        public function change_qty(){
            $result=$this->Sales_model->change_qty();
            echo "<script>";
            if($result){
                
            }else{
                echo "alert('Insufficient quantity!');";
            }
                echo "window.location='".base_url('point_of_sale')."';";
            echo "</script>";
        }

        public function remove_order(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->Reservation_model->checkUser($username,$password);
            if($check){
                $this->Sales_model->remove_order($id); 
            }else{

            }            
            redirect(base_url('point_of_sale'));
        }
        public function add_single_discount(){
            $this->Sales_model->add_single_discount();
            redirect(base_url('point_of_sale'));
        }
        public function add_discount(){
            $this->Sales_model->add_discount();
           redirect(base_url('point_of_sale'));
        }
        public function remove_all_discount($refno){
            $this->Sales_model->remove_all_discount($refno);
            redirect(base_url('point_of_sale'));
        }
        public function save_payment(){
            $save=$this->Sales_model->save_payment();
            echo "<script>";
            if($save){
                echo "alert('Payment successfully saved!');";
            }else{
                echo "alert('Amount tendered must be greater than or equal to the amount to be paid!');";
            }
                echo "window.location='".base_url('point_of_sale')."';";
            echo "</script>";
        }
        public function print_receipt($id){
            $page = "print_receipt";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['sales'] = $this->Sales_model->getSales($id);
            $data['refno'] = $id;
            $data['tendered'] = $this->Sales_model->tendered($id);
            $this->load->view('pages/'.$page,$data);                           
        }
        public function track_invoice(){
            $page = "track_invoice";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=date('Y-m-d');
            $data['sales'] = $this->Sales_model->getAllSales($date);
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function track_invoice_search(){
            $page = "track_invoice";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=$this->input->post('datearray');
            $data['sales'] = $this->Sales_model->getAllSales($date);
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function print_order_slip($id){
            $page = "print_order_slip";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['sales'] = $this->Sales_model->getSales($id);
            $data['refno'] = $id;
            $data['tendered'] = $this->Sales_model->tendered($id);
            $this->load->view('pages/'.$page,$data);                           
        }
        public function request_fbs($id){
            $page = "request_fbs";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}            
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);    
            $data['charges'] = $this->Sales_model->getAllRequestFBS($id);
            $data['refno'] = $id;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_room_charges(){
            $refno=$this->input->post('refno');
            $save=$this->Sales_model->save_room_charges();
            if($save){
                $this->session->set_flashdata('success','Item successfully added!');
            }else{
                $this->session->set_flashdata('failed','Unable to add item!');
            }
            redirect(base_url('request_fbs/'.$refno));
        }
        public function remove_request_item($id,$refno){
                $save=$this->Sales_model->remove_request_item($id);
                if($save){
                    $this->session->set_flashdata('success','Requested item successfully removed!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to remove requested item!');                
                }
            redirect(base_url('request_fbs/'.$refno));
        }
        public function finalize_order($refno){
                $save=$this->Sales_model->finalize_order($refno);
                if($save){
                    $this->session->set_flashdata('success','Requested item successfully finalized!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to finalize requested item!');                
                }
            redirect(base_url('request_fbs/'.$refno));
        }
        public function room_charges(){
            $page = "room_charges";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=date('Y-m-d');
            $data['sales'] = $this->Sales_model->getAllRoomCharges();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }

        public function view_room_charges($refno,$resid,$fullname){
            $page = "view_room_charges";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=date('Y-m-d');
            $data['charges'] = $this->Sales_model->getRoomChargesDetails($refno);
            $data['refno'] = $refno;
            $data['reserve_id'] = $resid;
            $data['fullname'] = $fullname;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function remove_room_charge_item($id,$refno,$resid,$fullname){
                $save=$this->Sales_model->remove_request_item($id);
                if($save){
                    $this->session->set_flashdata('success','Requested item successfully removed!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to remove requested item!');                
                }
            redirect(base_url('view_room_charges/'.$refno."/".$resid."/".$fullname));
        }
        public function save_room_charge_qty(){
                $refno=$this->input->post('refno');
                $resid=$this->input->post('reserve_id');
                $fullname=$this->input->post('fullname');
                $save=$this->Sales_model->save_room_charges();
                if($save){
                    $this->session->set_flashdata('success','Requested item quantity successfully updated!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to update requested item quantity!');                
                }
            redirect(base_url('view_room_charges/'.$refno."/".$resid."/".$fullname));
        }
        public function room_charges_save(){
            $refno=$this->input->post('refno');
            $resid=$this->input->post('reserve_id');
            $fullname=$this->input->post('fullname');
            $save=$this->Sales_model->save_room_charges_qty();
            if($save){
                $this->session->set_flashdata('success','Item successfully added!');
            }else{
                $this->session->set_flashdata('failed','Unable to add item!');
            }
            redirect(base_url('view_room_charges/'.$refno."/".$resid."/".$fullname));
        }

        public function cancel_room_charges($refno,$resid,$fullname){
                $save=$this->Sales_model->cancel_room_charges($refno);
                if($save){
                    $this->session->set_flashdata('success','Requested items successfully cancelled!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to cancel requested items!');                
                }
            redirect(base_url('view_room_charges/'.$refno."/".$resid."/".$fullname));
        }
        public function proceed_request($refno,$resid,$fullname){
                $save=$this->Sales_model->proceed_request($refno,$resid,$fullname);
                if($save){
                    $this->session->set_flashdata('success','Requested items successfully confirmed!');                   
                }else{
                    $this->session->set_flashdata('failed','Unable to confirm requested items!');                
                }
            redirect(base_url('view_room_charges/'.$refno."/".$resid."/".$fullname));
        }

        public function print_bill($id){
            $page = "print_bill";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);  
            $data['charges'] = $this->Reservation_model->getAllCharges($id);
            $data['payment'] = $this->Reservation_model->getPayment($id);
            $data['checkin'] = $this->Reservation_model->getCheckInPayment($id);            
            $this->load->view('pages/'.$page,$data);                           
        }
        public function sales_report(){
            $page = "sales_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=date('Y-m-d');
            $data['department'] = $this->General_model->getAllDepartment();
            $data['category'] = $this->Sales_model->getAllCategory();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function generate_sales_report(){
            $page = "generate_sales_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $dept=$this->input->post('department');
            $category=$this->input->post('category');
            $data['info'] = $this->General_model->getSettings();
            if($dept=="FRONT OFFICE" && $category=="book" && $this->session->dept=="admin"){
                $data['sales'] = array();
                $data['sales_res'] = $this->Sales_model->getAllSalesByBooking($startdate,$enddate);
            }else if($dept=="FRONT OFFICE" && $category=="final" && $this->session->dept=="admin"){
                $data['sales_res'] = $this->Sales_model->getAllSalesByCheckout($startdate,$enddate);
                $data['sales'] = array();
            }else{
                $data['sales'] = $this->Sales_model->getAllSalesByDept($dept,$category);
                $data['sales_res'] = array();
                if($dept=="FOOD KIOSK" || $dept=="SOUVENIR"){
                    $page="generate_sales_report_cafe";
                }
            }            
            $data['startdate'] = $startdate;
            $data['enddate'] = $enddate;
            $data['dept'] = $dept;
            $data['category'] = $category;
            $this->load->view('pages/'.$page,$data);                           
        }
        public function generate_sales_summary_report(){
            $page = "generate_sales_summary_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $dept=$this->input->post('department');    
            $begdate1=date('Y-m',strtotime($startdate))."-01";
            $begdate2=date('Y-m',strtotime('-1 day',strtotime($startdate)));
            $data['info'] = $this->General_model->getSettings();
            if($dept=="FRONT OFFICE"){
                $data['sales'] = array();
                $data['sales_res'] = 1;
            }else{
                $data['sales'] = $this->Sales_model->getSalesByDept($dept,$startdate,$enddate);
                $data['sales_res'] = array();
            }            
            $data['startdate'] = $startdate;
            $data['enddate'] = $enddate;
            $data['dept'] = $dept;            
            $this->load->view('pages/'.$page,$data);                           
        }
        public function booking_report(){
            $page = "booking_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $date=date('Y-m-d');
            $data['department'] = $this->General_model->getAllDepartment();
            $data['category'] = $this->Sales_model->getAllCategory();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }

        public function generate_booking_report(){
            $page = "generate_booking_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $type=$this->input->post('type');
            $data['info'] = $this->General_model->getSettings(); 
            $data['items'] = $this->Reservation_model->getAllReservation($type,$startdate,$enddate);         
            $data['startdate'] = $startdate;
            $data['enddate'] = $enddate;
            if($type=="booked"){
                $data['type'] = "BOOKING";
            }else if($type=="checkedin"){
                $data['type'] = "CHECKED IN";
            }else{
                $data['type'] = "CHECKED OUT";
            }
            $this->load->view('pages/'.$page,$data);                           
        }
        public function change_category($type){
            $this->session->unset_userdata('searchme');
            $this->session->set_userdata('type',str_replace('%20',' ',$type));
            redirect(base_url('point_of_sale'));
        }
        public function search_item(){
            $description=$this->input->post('searchme');
            $this->session->set_userdata('searchme',$description);
            redirect(base_url('point_of_sale'));
        }
        public function save_notes(){
            $save=$this->General_model->save_notes();
            echo "<script>";
                echo "window.history.back();";
            echo "</script>";
        }
        public function generate_statistic_report(){
            $page = "generate_statistic_report";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $month=$this->input->post('month');
            $year=$this->input->post('year');
            $type=$this->input->post('type');
            if($type=="monthly"){
                $startdate=$year."-".$month."-01";
                $enddate=date('Y-m-t',strtotime($year."-".$month));
                $type="MONTHLY";
            }            
            if($type=="yearly"){
                $startdate=$year."-01-01";
                $enddate=$year."-12-31";
                $type="YEARLY";
            }
            $data['info'] = $this->General_model->getSettings(); 
            $data['items'] = $this->Reservation_model->getAllStatistic($startdate,$enddate);         
            $data['startdate'] = $startdate;
            $data['enddate'] = $enddate;
            $data['type'] = $type;
            $this->load->view('pages/'.$page,$data);                           
        }
}
?>
