<?php
date_default_timezone_set('Asia/Manila');
    class Sales_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function getAllStocks(){
            $dept=$this->session->dept;
            if($this->session->dept=="admin" || $this->session->dept=="FRONT OFFICE"){
                $result=$this->db->query("SELECT * FROM stocks ORDER BY `description` ASC");
            }else{
                $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' ORDER BY `description` ASC");
            }
            return $result->result_array();
        }
        public function save_stocks(){
            $code=$this->input->post('code');
            $description=$this->input->post('description');
            $quantity=$this->input->post('quantity');
            $sellingprice=$this->input->post('sellingprice');
            $dept=$this->input->post('department');
            $category=$this->input->post('category');
            $check=$this->db->query("SELECT * FROM stocks WHERE `description`='$description' AND code <> '$code'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($code==""){
                    $code=date('YmdHis');
                    $result=$this->db->query("INSERT INTO stocks SET code='$code',`description`='$description',quantity='$quantity',sellingprice='$sellingprice',dept='$dept',category='$category'");
                }else{
                    $result=$this->db->query("UPDATE stocks SET `description`='$description',sellingprice='$sellingprice',dept='$dept',category='$category' WHERE code='$code'");
                }            
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllCategory(){
            $result=$this->db->query("SELECT category FROM stocks GROUP BY category ORDER BY category ASC");
            return $result->result_array();
        }
        public function delete_stocks($code){
            $result=$this->db->query("DELETE FROM stocks WHERE code='$code'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function add_stock_quantity(){
            $code=$this->input->post('code');
            $refno=$this->input->post('refno');
            $quantity=$this->input->post('quantity');
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $row=$query->row_array();
            $itemqty=$row['quantity'];
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $newqty=$itemqty+$quantity;
            if($quantity > 0){                
                $addResult=$this->db->query("INSERT INTO stock_in SET code='$code',trans_id='$refno',quantity='$quantity',datearray='$date',timearray='$time'");
                if($addResult){
                    $result=$this->db->query("UPDATE stocks SET quantity='$newqty' WHERE code='$code'");
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }        

        }
        public function save_stock_image(){
            $code=$this->input->post('code');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE stocks SET img='$imgContent' WHERE code='$code'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }else{
                    return false;
            }
        }
        public function getAllStocksByCategory($category){
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                if($category=="all"){
                    $result=$this->db->query("SELECT * FROM stocks GROUP BY category ORDER BY `description` ASC LIMIT 1");
                }else{
                    $result=$this->db->query("SELECT * FROM stocks WHERE category='$category' GROUP BY category ORDER BY `description` ASC");
                }
            }else{
                if($category=="all"){
                    $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' GROUP BY category ORDER BY `description` ASC LIMIT 1");
                }else{
                    $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' AND category='$category' GROUP BY category ORDER BY `description` ASC");
                }
            }
            return $result->result_array();
        }

        public function getAllStocksCategory(){
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                    $result=$this->db->query("SELECT * FROM stocks GROUP BY category ORDER BY category ASC");
            }else{
                    $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' GROUP BY category ORDER BY category ASC");
            }
            return $result->result_array();
        }
        public function getItemByCategory($category){
            $searchme=$this->session->searchme;
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                if($category=="all" || $category==""){
                    if($searchme==""){
                        $result=$this->db->query("SELECT * FROM stocks ORDER BY `description` ASC LIMIT 3");
                    }else{
                        $result=$this->db->query("SELECT * FROM stocks WHERE `description` LIKE '%$searchme%' OR category LIKE '%$searchme%' ORDER BY `description` ASC");
                    }
                }else{
                    if($searchme==""){
                        $result=$this->db->query("SELECT * FROM stocks WHERE category='$category' ORDER BY `description` ASC LIMIT 3");
                    }else{
                        $result=$this->db->query("SELECT * FROM stocks WHERE category='$category' AND `description` LIKE '%$searchme%' OR category LIKE '%$searchme%' ORDER BY `description` ASC");
                    }
                }
            }else{
                if($category=="all" || $category==""){
                    if($searchme==""){
                        $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' ORDER BY `description` ASC");
                    }else{
                        $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' AND `description` LIKE '%$searchme%' ORDER BY `description` ASC");
                    }
                }else{
                    if($searchme==""){
                        $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' AND category='$category' ORDER BY `description` ASC");
                    }else{
                        $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' AND category='$category' AND `description` LIKE '%$searchme%' ORDER BY `description` ASC");
                    }
                }
            }
            return $result->result_array();
        }
        public function getAllPunchedItems($refno){
            $result=$this->db->query("SELECT so.*,s.description FROM stock_ordered so INNER JOIN stocks s ON s.code=so.code WHERE so.trans_id='$refno' AND so.status='pending'");
            return $result->result_array();
        }
        public function cancel_transaction($refno){
            $result=$this->db->query("DELETE FROM stock_ordered WHERE trans_id='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function add_item($code,$refno){
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $item=$query->row_array();

            $check=$this->db->query("SELECT * FROM stock_ordered WHERE trans_id='$refno' AND code='$code'");
            if($check->num_rows()>0){
                $row=$check->row_array();
                $newqty=$row['quantity']+1;
                $disc=$newqty*$row['discount'];
                if($newqty <= $item['quantity']){
                    $result=$this->db->query("UPDATE stock_ordered SET quantity='$newqty',discount='$disc' WHERE trans_id='$refno' AND code='$code'");
                }
            }else{
                $result=$this->db->query("INSERT INTO stock_ordered SET trans_id='$refno',code='$code',quantity='1',sellingprice='$item[sellingprice]',discount='0'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function change_qty(){
            $id=$this->input->post('id');
            $quantity=$this->input->post('quantity');
            $query=$this->db->query("SELECT * FROM stock_ordered WHERE id='$id'");
            $row=$query->row_array();
            $qry=$this->db->query("SELECT * FROM stocks WHERE code='$row[code]'");
            $res=$qry->row_array();
            $soh=$res['quantity'];
            $d=$row['discount']/$row['quantity'];
            $disc=$quantity*$d;
            if($quantity <= $soh){
                $result=$this->db->query("UPDATE stock_ordered SET quantity='$quantity',discount='$disc' WHERE id='$id'");   
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function remove_order($id){
            $result=$this->db->query("DELETE FROM stock_ordered WHERE id='$id'");
            return true;
        }
        public function add_single_discount(){
            $id=$this->input->post('id');
            $discount=$this->input->post('discount');
            $type=$this->input->post('type');
            $query=$this->db->query("SELECT * FROM stock_ordered WHERE id='$id'");
            $row=$query->row_array();

            if($type=="percent"){
                $discount = ($row['sellingprice'] * ($discount/100))*$row['quantity'];
            }
            $result=$this->db->query("UPDATE stock_ordered SET discount='$discount' WHERE id='$id'");
            return true;
        }
        public function add_discount(){
            $id=$this->input->post('refno');
            $discount=$this->input->post('discount');
            $query=$this->db->query("SELECT * FROM stock_ordered WHERE trans_id='$id'");
            $items=$query->result_array();

            foreach($items as $row){
                $disc = ($row['sellingprice'] * ($discount/100)) * $row['quantity'];
                $result=$this->db->query("UPDATE stock_ordered SET discount='$disc' WHERE id='$row[id]'");
            }
            return true;
        }
        public function remove_all_discount($refno){
            $result=$this->db->query("UPDATE stock_ordered SET discount='0' WHERE trans_id='$refno'");
            return true;
        }
        public function tendered($refno){
            $result=$this->db->query("SELECT * FROM tendered WHERE trans_id='$refno'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function save_payment(){
            $refno=$this->input->post('refno');
            $amount=$this->input->post('amount');
            $type=$this->input->post('type');
            $trantype=$this->input->post('trantype');
            $controlno=$this->input->post('controlno');
            $transno=$this->input->post('transno');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM stock_ordered WHERE trans_id='$refno'");
            $items=$query->result_array();
            foreach($items as $item){
                if($type=="charge"){
                    $amt=($item['quantity']*$item['sellingprice']) - $item['discount'];
                    $query=$this->db->query("SELECT * FROM stocks WHERE code='$item[code]'");
                    $row1=$query->row_array();
                    $this->db->query("INSERT INTO charged_item SET res_id='$transno',refno='$refno',`description`='$row1[description]',amount='$amt',datearray='$date',timearray='$time',fullname='$fullname'");
                }
                $result=$this->db->query("INSERT INTO stock_out SET trans_id='$refno',code='$item[code]',quantity='$item[quantity]',sellingprice='$item[sellingprice]',discount='$item[discount]',datearray='$date',timearray='$time',paymentmode='$type',`status`='paid',fullname='$fullname',control_no='$controlno',trantype='$trantype',res_id='$transno'");
                $query=$this->db->query("SELECT * FROM stocks WHERE code='$item[code]'");
                $row=$query->row_array();
                $oldqty=$row['quantity'];
                $newqty=$oldqty-$item['quantity'];
                $this->db->query("UPDATE stocks SET quantity='$newqty' WHERE code='$item[code]'");
            }
            if($result){
                $this->db->query("INSERT INTO tendered SET trans_id='$refno',amount='$amount'");                
                $this->db->query("UPDATE stock_ordered SET `status`='paid' WHERE trans_id='$refno'"); 
                return true;
            }else{
                return false;
            }
        }
        public function emptyOrder(){
            $result=$this->db->query("DELETE FROM stock_ordered WHERE `status`='paid'");
        }
        public function getSales($refno){
            $result=$this->db->query("SELECT so.*,s.description,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.trans_id='$refno'");
            return $result->result_array();
        }
        public function getAllSales($date){
            $result=$this->db->query("SELECT * FROM stock_out WHERE datearray='$date' GROUP BY trans_id ORDER BY id DESC");
            return $result->result_array();
        }
        public function getAllRequestFBS($refno){
            $result=$this->db->query("SELECT rc.*, s.description FROM room_charge rc INNER JOIN stocks s ON s.code=rc.code WHERE rc.res_id='$refno' ORDER BY id DESC");
            return $result->result_array();
        }
        public function save_room_charges(){
            $id=$this->input->post('id');
            $refno=$this->input->post('refno');
            $quantity=$this->input->post('quantity');
            $code=$this->input->post('code');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $item=$query->row_array();
            if($item['quantity'] >= $quantity){
                if($id==""){                    
                    $result=$this->db->query("INSERT INTO room_charge SET res_id='$refno',trans_id='',code='$code',quantity='$quantity',sellingprice='$item[sellingprice]',`status`='pending',datearray='$date',timearray='$time',fullname='$fullname'");
                }else{
                    $result=$this->db->query("UPDATE room_charge SET quantity='$quantity' WHERE id='$id'");
                }
            }            
            if($result){                
                return true;
            }else{
                return false;
            }
        }
        public function remove_request_item($id){
            $result=$this->db->query("DELETE FROM room_charge WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function finalize_order($id){
            $refno="FBS".date('YmdHis');
            $result=$this->db->query("UPDATE room_charge SET trans_id='$refno' WHERE res_id='$id' AND trans_id=''");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllRoomCharges(){
            $result=$this->db->query("SELECT rc.*,r.res_fullname,rm.room_type,rm.room_color,p.description as pack FROM room_charge rc INNER JOIN reservation r ON r.res_id=rc.res_id LEFT JOIN room rm ON rm.id=r.res_room_id LEFT JOIN package p ON p.id=r.res_room_id WHERE rc.status='pending' AND rc.trans_id <> '' GROUP BY rc.trans_id ORDER BY id DESC");
            return $result->result_array();
        }
        public function getRoomCharges($refno){
            $result=$this->db->query("SELECT rc.*,s.description FROM room_charge rc INNER JOIN stocks s ON s.code=rc.code WHERE rc.status='pending' AND rc.trans_id='$refno' ORDER BY rc.id DESC");
            return $result->result_array();
        }
        public function getRoomChargesDetails($refno){
            $result=$this->db->query("SELECT rc.*,s.description FROM room_charge rc INNER JOIN stocks s ON s.code=rc.code WHERE rc.trans_id='$refno' ORDER BY rc.id DESC");
            return $result->result_array();
        }
        public function save_room_charges_qty(){
            $id=$this->input->post('id');
            $refno=$this->input->post('refno');
            $resid=$this->input->post('reserve_id');
            $quantity=$this->input->post('quantity');
            $code=$this->input->post('code');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $item=$query->row_array();
            if($item['quantity'] >= $quantity){
                if($id==""){                    
                    $result=$this->db->query("INSERT INTO room_charge SET res_id='$resid',trans_id='$refno',code='$code',quantity='$quantity',sellingprice='$item[sellingprice]',`status`='pending',datearray='$date',timearray='$time',fullname='$fullname'");
                }else{
                    $result=$this->db->query("UPDATE room_charge SET quantity='$quantity' WHERE id='$id'");
                }
            }            
            if($result){                
                return true;
            }else{
                return false;
            }
        }
        public function cancel_room_charges($refno){
            $result=$this->db->query("UPDATE room_charge SET `status`='cancel' WHERE trans_id='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function proceed_request($refno,$resid,$fn){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM room_charge WHERE trans_id='$refno'");
            $res=$query->result_array();
            $amount=0;
            foreach($res as $item){
                $result=$this->db->query("INSERT INTO stock_out SET trans_id='$refno',code='$item[code]',quantity='$item[quantity]',sellingprice='$item[sellingprice]',discount='0',fullname='$fullname',datearray='$date',timearray='$time',trantype='Room Service',`status`='paid',control_no='Room Service',paymentmode='charge',res_id='$resid'");
                $query=$this->db->query("SELECT * FROM stocks WHERE code='$item[code]'");
                $row=$query->row_array();
                $oldqty=$row['quantity'];
                $desc=$row['description'];
                $newqty=$oldqty-$item['quantity'];
                $this->db->query("UPDATE stocks SET quantity='$newqty' WHERE code='$item[code]'");
                $amount += $item['quantity']*$item['sellingprice'];
                $amt=$item['quantity']*$item['sellingprice'];
                $this->db->query("INSERT INTO charged_item SET res_id='$resid',refno='$refno',`description`='$desc',amount='$amt',datearray='$date',timearray='$time',fullname='$fullname'");
            }
            if($result){
                $this->db->query("UPDATE room_charge SET `status`='confirmed' WHERE trans_id='$refno'");
                $this->db->query("INSERT INTO tendered SET trans_id='$refno',amount='$amount'");                                                
                return true;
            }else{
                return false;
            }
        }
        public function getAllSalesByDept($dept,$category){
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            if($dept=="all"){
                if($category=="all"){
                    $result=$this->db->query("SELECT so.*,s.description,s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");
                }else{
                    $result=$this->db->query("SELECT so.*,s.description,s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' AND s.category='$category' ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");
                }                
            }else{
                if($category=="all"){
                    $result=$this->db->query("SELECT so.*,s.description,s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' AND s.dept='$dept' ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");
                }else{
                    $result=$this->db->query("SELECT so.*,s.description,s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' AND s.dept='$dept' AND s.category='$category' ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");
                }                
            }            
            return $result->result_array();
        }

        public function getSalesByDept($dept,$startdate,$enddate){            
            if($dept=="all"){
                    $result=$this->db->query("SELECT s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' GROUP BY s.category ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");
            }else{
                    $result=$this->db->query("SELECT s.dept,s.category FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' AND s.dept='$dept' GROUP BY s.category ORDER BY s.dept ASC,s.category ASC,so.datearray ASC");                
            }            
            return $result->result_array();
        }
        public function getSalesByCategory($dept,$category,$startdate,$enddate){
            $result=$this->db->query("SELECT so.* FROM stock_out so INNER JOIN stocks s ON s.code=so.code WHERE so.datearray BETWEEN '$startdate' AND '$enddate' AND s.dept='$dept' AND s.category='$category'");
            return $result->result_array();
        }

        public function getAllSalesByBooking($startdate,$enddate){               
                $result=$this->db->query("SELECT res_fullname,res_downpayment as amount,res_mode_payment,res_book_date as datearray,discount FROM reservation WHERE res_book_date BETWEEN '$startdate' AND '$enddate'");
                return $result->result_array();            
        }
        public function getAllSalesByCheckout($startdate,$enddate){               
                $result=$this->db->query("SELECT r.res_fullname,rd.res_amount_paid as amount,r.res_date_depart as datearray,rd.res_amount_due as discount FROM reservation_details rd INNER JOIN reservation r ON r.res_id=rd.res_id WHERE r.res_date_depart BETWEEN '$startdate' AND '$enddate'");
                return $result->result_array();            
        }
        public function edit_stock_quantity(){
            $code=$this->input->post('code');
            $refno=$this->input->post('refno');
            $quantity=$this->input->post('quantity');
            $oldqty=$this->input->post('oldqty');
            $diff=$quantity-$oldqty;
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $row=$query->row_array();
            $itemqty=$row['quantity'];
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $newqty=$itemqty+$diff;
            if($quantity > 0){                
                $addResult=$this->db->query("INSERT INTO stock_in SET code='$code',trans_id='$refno',quantity='$diff',datearray='$date',timearray='$time',fullname='$fullname'");
                if($addResult){
                    $result=$this->db->query("UPDATE stocks SET quantity='$newqty' WHERE code='$code'");
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }        

        }
        public function getHoldList(){
            $result=$this->db->query("SELECT * FROM stock_ordered WHERE `status`='hold' GROUP BY trans_id ORDER BY trans_id ASC");
            return $result->result_array();
        }
        public function holdtransaction($refno){
            $result=$this->db->query("UPDATE stock_ordered SET `status`='hold' WHERE trans_id='$refno'");            
        }
        public function resumetransaction($refno){
            $result=$this->db->query("UPDATE stock_ordered SET `status`='pending' WHERE trans_id='$refno'");            
        }
    }
?>