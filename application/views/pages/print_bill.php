<html>
    <head>
        <title>Final Billing</title>
        <link rel="shortcut icon" href="<?=base_url('design/img/jdslogo.jpg');?>">
    </head>
<body>
<center>
<div style="width:768px; font-family:Times New Roman;">
    <table width="100%" border="0">
        <tr>
            <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='200' height="100" alt='Image'></td>
            <td align="right" width="25%">
                <h1>INVOICE</h1>
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
            <td><b>Ref. No.: <?=$reserve['res_id'];?><br>Check in Date: <?=date('m/d/Y',strtotime($reserve['res_date_arrive']));?><br>Source: <?=$reserve['res_source'];?></b></td>
        </tr>      
        <tr>
            <td><h4><?=$reserve['res_address'];?></h4></td>
        </tr>
    </table>
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
            <td valign="top"><b><?=$reserve['room_type'];?> - <?=$reserve['room_color'];?></b><br><?=date('d-M-Y',strtotime($reserve['res_date_arrive']));?> to <?=date('d-M-Y',strtotime($reserve['res_date_depart']));?></td>
            <td valign="top"><b><?=$reserve['res_no_nights'];?> Night(s) @ <?=number_format($reserve['res_room_rate'],2);?></b><br><font style="font-size:14px;"><?=$reserve['res_no_guest_adult'];?> Adult / <?=$reserve['res_no_guest_child'];?> Child /<?=$reserve['res_no_guest_senior'];?> Senior/PWD</font></td>
            <td valign="top" align="center"><?=$reserve['res_no_nights'];?></td>
            <?php
            if($reserve['res_no_nights']=="0"){
                $no=1;
            }else{
                $no=$reserve['res_no_nights'];
            }            
            ?>
            <td valign="top" align="right"><?=number_format($no*$reserve['res_room_rate'],2);?></td>
        </tr>
        <tr>
            <td></td>
            <td><b>Extra Charges/Services</b></td>
            <td colspan="2"></td>
        </tr>
        <?php
        $och=0;
        foreach($charges as $item){
            $och += $item['amount'];
            echo "<tr>";
                echo "<td></td>";
                echo "<td style='text-indent:10px;'>$item[description]</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td align='right'>".number_format($item['amount'],2)."</td>";
            echo "</tr>";
        }
        $paid=0;
        $disc=0;
        $disc1=0;
        $paid1=0;
        $weekend=0;
        $weekday=0;
        $query=$this->db->query("SELECT * FROM room WHERE id='$reserve[res_room_id]'");
        $r=$query->row_array();

        $room_weekend=$r['room_rate_weekend'];
        $room_weekday=$r['room_rate_weekday'];
        if($reserve['res_no_nights'] > 1){
            for($w=0;$w<$reserve['res_no_nights'];$w++){
                if(date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) == 5 || date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) == 6 || date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive'])))==0){
                $weekend +=$room_weekend;
                }
                if(date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) >= 1 && date('w',strtotime($w.' day',strtotime($reserve['res_date_arrive']))) <= 4){
                $weekday +=$room_weekday;
                }
            }
        }else{
            $weekday = $reserve['res_room_rate'];       
        }
        if($payment){
            $paid=$payment['res_amount_paid'];
            $disc=$payment['res_amount_due'];
        }
        if($checkin){
            $paid1=$checkin['amount'];
            $disc1=($weekend+$weekday)-$reserve['res_downpayment']-$checkin['amount'];
        }
        ?>        
        <tr style="border-top:1px solid black;">
            <td colspan="5">&nbsp;</td>            
        </tr>
    </table>      
        <table width="100%" border="0">
            <tr>
                <td align="right" width="80%"><b>Amount Due:</b></td>
                <td align="right"><b><?=number_format($no*$reserve['res_room_rate'],2);?></b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Extra Charges:</b></td>
                <td align="right"><b><?=number_format($och,2);?></b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Downpayment:</b></td>
                <td align="right"><b>(<?=number_format($reserve['res_downpayment'],2);?>)</b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Discount:</b></td>
                <td align="right" style="border-top:1px solid black; border-bottom:1px solid black;"><b>(<?=number_format($disc+$disc1,2);?>)</b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Total Amount Due:</b></td>
                <td align="right" style="border-top:1px solid black;"><b><?=number_format($och+($no*$reserve['res_room_rate'])-$reserve['res_downpayment']-$disc-$disc1,2);?></b></td>
            </tr>            
            <tr>
                <td align="right" width="80%"><b>Amount Paid:</b></td>
                <td align="right" style="border-top:1px solid black; border-bottom:1px solid black;"><b>(<?=number_format($paid-$disc+$paid1,2);?>)</b></td>
            </tr>
            <tr>
                <td align="right" width="80%"><b>Amount Payable:</b></td>
                <td align="right"><b><?=number_format($och+($no*$reserve['res_room_rate'])-$reserve['res_downpayment']-$paid-$paid1-$disc1,2);?></b></td>
            </tr>
        </table>
</div>
</center>
</body>
</html>