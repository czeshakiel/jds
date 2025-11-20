<html>
    <head>
        <title>Reservation Voucher</title>
        <link rel="shortcut icon" href="<?=base_url('design/img/jdslogo.jpg');?>">
    </head>
<body>
<center>
<div style="width:768px; font-family:Times New Roman;">
    <table width="100%" border="0">
        <tr>
            <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='200' height="100" alt='Image'></td>
            <td align="right" width="25%">
                <h1>CONFIRMED</h1>
            </td>
        </tr>
        <tr>
            <td><h4><?=$info['company_address'];?><br><?=$info['company_contactno'];?></h4></td>
            <td align="left"><b>Date: <?=date('m/d/Y');?><br>Time: <?=date('h:i A');?><br>Printed by: <?=$this->session->fullname;?></b><td>
        </tr>
        <tr>
            <td><h4><?=$info['company_email'];?></h4></td>
        </tr>
        <tr>
            <td><h4><?=$reserve['res_fullname'];?><br><?=$reserve['res_contactno'];?></h4></td>
            <td><b>Ref. No.: <?=$reserve['res_id'];?><br>Booking Date: <?=date('m/d/Y',strtotime($reserve['res_book_date']));?><br>Source: <?=$reserve['res_source'];?></b></td>
        </tr>      
        <tr>
            <td><h4><?=$reserve['res_address'];?></h4></td>
        </tr>
    </table>
    <?php
    if($reserve['room_type']==""){
        $room_type=$reserve['description'];
    }else{
        $room_type=$reserve['room_type']." - ".$reserve['room_color'];
    }
    $weekend=0;
    $weekday=0;
    $end=0;
    $day=0;
    $day1="";
    $day2="";
    $description="";

       
        if($reserve['res_date_arrive']==$reserve['res_date_depart']){
            $query=$this->db->query("SELECT * FROM package WHERE id='$reserve[res_room_id]'");
            $r=$query->row_array();
            $room_weekday=$r['rate'];
            $room_weekend=$r['rate'];
            $room_type=$r['description'];
        }else{
            $query=$this->db->query("SELECT * FROM room WHERE id='$reserve[res_room_id]'");
            $r=$query->row_array();
            $room_weekday=$r['room_rate_weekday'];
             $room_weekend=$r['room_rate_weekend'];
             $room_type=$r['room_type']." - ".$r['room_color'];
        }  
    //if($reserve['res_no_nights'] > 1){
        for($w=0;$w<$reserve['res_no_nights'];$w++){
            if(date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) == 5 || date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) == 6 || date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive'])))==0){
               $weekend =$room_weekend;
               $end++;               
            }
            if(date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) >= 1 && date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) <= 4){
               $weekday =$room_weekday;
               $day++;
            }
        }
    // }else{
    //    $weekday = $reserve['res_room_rate'];       
    // }
    $rate1="";$rate2="";
    if($end > 0){
        $rate1=$end." Night(s) @ ".number_format($weekend,2)."<br>";
    }
    if($day > 0){
        $rate2=$day." Night(s) @ ".number_format($weekday,2)."<br>";
    }        
    ?>
    <table width="100%" border="0" style="border-collapse:collapse;" cellpadding="1" cellspacing="0">
        <tr style="border-top:1px solid black; border-bottom:1px solid black;">
            <td width="15%" align="center" valign="top"><b>Res No.</b></td>
            <td width="30%" align="left" valign="top"><b>Item Details</b></td>
            <td width="25%" align="left" valign="top"><b>Rate Information</b></td>
            <td width="5%" align="center" valign="top"><b>Qty</b></td>
            <td width="15%" align="right" valign="top"><b>Amount</b></td>
        </tr>
        <tr>
            <td valign="top"><?=$reserve['res_id'];?></td>
            <td valign="top"><b><?=$room_type;?></b><br><?=date('d-M-Y',strtotime($reserve['res_date_arrive']));?> to <?=date('d-M-Y',strtotime($reserve['res_date_depart']));?></td>
            <td valign="top"><b><?=$rate1;?><?=$rate2;?></b><br><font style="font-size:14px;"><?=$reserve['res_no_guest_adult'];?> Adult / <?=$reserve['res_no_guest_child'];?> Child /<?=$reserve['res_no_guest_senior'];?> Senior/PWD</font></td>
            <td valign="top" align="center">1</td>
            <?php
            if($reserve['res_no_nights']=="0"){
                $no=1;
            }else{
                $no=$reserve['res_no_nights'];
            }            
            ?>
            <td valign="top" align="right"><?=number_format(($weekday*$day)+($weekend*$end),2);?></td>
        </tr>
        <tr style="border-top:1px solid black;">
            <td colspan="5">&nbsp;</td>            
        </tr>
    </table>      
        <table width="100%" border="0">
            <tr>
                <td align="right" width="80%"><b>Amount Due:</b></td>
                <td align="right"><b><?=number_format(($weekday*$day)+($weekend*$end),2);?></b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Downpayment:</b></td>
                <td align="right"><b><?=number_format($reserve['res_downpayment'],2);?></b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Total Amount:</b></td>
                <td align="right"><b><?=number_format(($weekday*$day)+($weekend*$end)-$reserve['res_downpayment'],2);?></b></td>
            </tr>
        </table>
</div>
</center>
</body>
</html>