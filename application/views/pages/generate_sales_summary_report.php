<html>
    <head>
        <title>Sales Report</title>
        <link rel="shortcut icon" href="<?=base_url('design/img/jdslogo.jpg');?>">
    </head>
<body>
<center>
<div style="width:760px; font-family:Times New Roman;">    
        <table width="100%" border="0">
            <tr>
                <td width="200"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='200' height="100" alt='Image'></td>        
                <td><h3><b>JARDIN DE SEÑORITA</b><br><small><?=$info['company_address'];?><br><?=$info['company_contactno'];?><br><?=$info['company_email'];?></small></h3></td>
            </tr>    
        </table> 
        <h2>SALES SUMMARY REPORT</h2>
        <table width="100%" border="0">
            <tr>
                <td><b>Department: <?=$dept;?></b></td>                        
            </tr>             
            <tr>
                <td><b>Date: <?=date('m/d/Y',strtotime($startdate));?> to <?=date('m/d/Y',strtotime($enddate));?></b></td>                        
            </tr>    
        </table> 
        <table width="100%" border="0" cellpadding="1" style="border-collapse:collapse; font-size:14px;">
            <tr>                                
                <td align="center" width="20%"><b>Dept</b></td>
                <td align="center" width="20%"><b>Category</b></td>
                <td align="center" width="20%"><b>Begin</b></td>
                <td align="center" width="20%"><b>Today</b></td>
                <td align="center" width="20%"><b>End</b></td>                
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <?php
            $totalamount=0;
            $totaldiscount=0;
            $totalamountbeg=0;
            $totaldiscountbeg=0;
            foreach($sales as $item){
                $st=$item['dept'];
                $cat=$item['category'];
                $query=$this->Sales_model->getSalesByCategory($st,$cat,$startdate,$enddate);
                $total=0;
                foreach($query as $row){
                    $total += $row['quantity']*$row['sellingprice'];
                    $totaldiscount += $row['discount'];
                }
                $totalamount += $total;   
                $begdate1=date('Y-m-',strtotime($startdate))."01";
                $begdate2=date('Y-m-d',strtotime('-1 day',strtotime($startdate)));                
                $querybeg=$this->Sales_model->getSalesByCategory($st,$cat,$begdate1,$begdate2);
                $totalbeg=0;                
                foreach($querybeg as $row){
                    $totalbeg += $row['quantity']*$row['sellingprice'];
                    $totaldiscountbeg += $row['discount'];
                }                             
                if($begdate1==$startdate){
                    $totalbeg=0;                    
                }
                $totalamountbeg += $totalbeg;   
                echo "<tr>";
                    echo "<td>$item[dept]</td>";
                    echo "<td>$item[category]</td>";
                    echo "<td align='right'>".number_format($totalbeg,2)."</td>";
                    echo "<td align='right'>".number_format($total,2)."</td>";
                    echo "<td align='right'>".number_format($total+$totalbeg,2)."</td>";
                echo "</tr>";
            }
            if($sales_res==1){
                $query=$this->Sales_model->getAllSalesByBooking($startdate,$enddate);
                $total=0;
                foreach($query as $row){
                    $total += $row['amount'];                    
                }
                $totalamount += $total;
                $begdate1=date('Y-m-',strtotime($startdate))."01";
                $begdate2=date('Y-m-d',strtotime('-1 day',strtotime($startdate)));
                $querybeg=$this->Sales_model->getAllSalesByBooking($begdate1,$begdate2);
                $totalbeg=0;
                foreach($querybeg as $row){
                    $totalbeg += $row['amount'];                                         
                }
                if($begdate1==$startdate){
                    $totalbeg=0;                    
                }
                $totalamountbeg += $totalbeg; 
                echo "<tr>";
                    echo "<td>FO</td>";
                    echo "<td>Booking</td>";
                    echo "<td align='right'>".number_format($totalbeg,2)."</td>";
                    echo "<td align='right'>".number_format($total,2)."</td>";
                    echo "<td align='right'>".number_format($total+$totalbeg,2)."</td>";
                echo "</tr>";

                $query=$this->Sales_model->getAllSalesByCheckout($startdate,$enddate);
                $total=0;
                foreach($query as $row){
                    $total += $row['amount']; 
                     $totaldiscount += $row['discount'];                   
                }
                $totalamount += $total;
                $begdate1=date('Y-m-',strtotime($startdate))."01";
                $begdate2=date('Y-m-d',strtotime('-1 day',strtotime($startdate)));
                $querybeg=$this->Sales_model->getAllSalesByCheckout($begdate1,$begdate2);
                $totalbeg=0;
                foreach($querybeg as $row){
                    $totalbeg += $row['amount'];  
                     $totaldiscountbeg += $row['discount'];                  
                }
                if($begdate1==$startdate){
                    $totalbeg=0;                    
                }
                $totalamountbeg += $totalbeg; 
                echo "<tr>";
                    echo "<td>FO</td>";
                    echo "<td>Checkout</td>";
                    echo "<td align='right'>".number_format($totalbeg,2)."</td>";
                    echo "<td align='right'>".number_format($total,2)."</td>";
                    echo "<td align='right'>".number_format($total+$totalbeg,2)."</td>";
                echo "</tr>";
            }
                if($totaldiscountbeg > 0 || $totaldiscount > 0){
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td>DISCOUNT</td>";
                    echo "<td align='right'>(".number_format($totaldiscountbeg,2).")</td>";
                    echo "<td align='right'>(".number_format($totaldiscount,2).")</td>";
                    echo "<td align='right'>(".number_format($totaldiscountbeg+$totaldiscount,2).")</td>";
                echo "</tr>";
                }
            ?> 
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr>
                <td align="center"><b>Total</b></td>
                <td><b></b></td>
                <td align="right"><b><?=number_format($totalamountbeg-$totaldiscountbeg,2);?></b></td>
                <td align="right"><b><?=number_format($totalamount-$totaldiscount,2);?></b></td>
                <td align="right"><b><?=number_format($totalamountbeg-$totaldiscountbeg+$totalamount-$totaldiscount,2);?></b></td>
            </tr>         
        </table>              
</div>
</center>
</body>
</html>