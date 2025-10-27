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
        <h2>SALES REPORT</h2>
        <table width="100%" border="0">
            <tr>
                <td><b>Department: <?=$dept;?></b></td>                        
            </tr> 
            <tr>
                <td><b>Category: <?=$category;?></b></td>                        
            </tr> 
            <tr>
                <td><b>Date: <?=date('m/d/Y',strtotime($startdate));?> to <?=date('m/d/Y',strtotime($enddate));?></b></td>                        
            </tr>    
        </table> 
        <table width="100%" border="1" cellpadding="1" style="border-collapse:collapse; font-size:14px;">
            <tr>
                <td align="center" width="5%"><b>#</b></td>
                <td align="center" width="10%"><b>Date</b></td>
                <td align="center" width="10%"><b>Dept</b></td>
                <td align="center" width="10%"><b>Category</b></td>
                <td align="center" width="30%"><b>Description</b></td>
                <td align="center" width="5%"><b>Qty</b></td>
                <td align="center" width="10%"><b>Price</b></td>
                <td align="center" width="10%"><b>Discount</b></td>
                <td align="center" width="10%"><b>Total</b></td>
            </tr>
            <?php
            $x=1;
            $totalamount=0;
            $gcash=0;
                $credit=0;
                $charge=0;
            foreach($sales as $item){
                
                $srp=$item['sellingprice'];
                    $disc=$item['discount'];
                if($item['paymentmode']=="cash"){
                    
                }else{
                    if($item['paymentmode']=="gcash"){
                        $gcash += ($item['quantity']*$item['sellingprice'])-$item['discount'];
                    }
                    if($item['paymentmode']=="card"){
                        $credit += ($item['quantity']*$item['sellingprice'])-$item['discount'];
                    }
                    if($item['paymentmode']=="charge"){
                        $charge += ($item['quantity']*$item['sellingprice'])-$item['discount'];
                    }                   
                }

                $totalamount += ($item['quantity']*$srp)-$disc;
                echo "<tr>";
                    echo "<td align='center'>$x.</td>";
                    echo "<td align='center'>$item[datearray]</td>";
                    echo "<td align='center'>$item[dept]</td>";
                    echo "<td align='center'>$item[category]</td>";
                    echo "<td align='left'>$item[description] - $item[paymentmode]</td>";
                    echo "<td align='center'>$item[quantity]</td>";
                    echo "<td align='right'>".number_format($srp,2)."</td>";
                    echo "<td align='right'>".number_format($disc,2)."</td>";
                    echo "<td align='right'>".number_format(($item['quantity']*$srp)-$disc,2)."</td>";
                echo "</tr>";
                $x++;
            }
            foreach($sales_res as $item){            
                $totalamount += $item['amount']-$item['discount'];
                if($item['amount']>0){
                echo "<tr>";
                    echo "<td align='center'>$x.</td>";
                    echo "<td align='center'>$item[datearray]</td>";
                    echo "<td align='center'>FO</td>";
                    echo "<td align='center'>Reservation</td>";
                    echo "<td align='left'>$item[res_fullname]</td>";
                    echo "<td align='center'>1</td>";
                    echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                    echo "<td align='right'>".number_format($item['discount'],2)."</td>";
                    echo "<td align='right'>".number_format($item['amount']-$item['discount'],2)."</td>";
                echo "</tr>";
                $x++;
                }
            }
            ?>
            <tr>
                <td colspan="8" align="right"><b>Total</b></td>
                <td align="right"><b><?=number_format($totalamount,2);?></b></td>
            </tr>
        </table>
        <p align="right"><b>Total Sales : <?=number_format($totalamount,2);?></b><br>
            <b>GCash : <?=number_format($gcash,2);?></b><br>
            <b>Credit/Debit : <?=number_format($credit,2);?></b><br>
            <b>Charged:   <?=number_format($charge,2);?></b><br><br>
            <b style="font-size:20px;">Cash on Hand: <?=number_format($totalamount-$gcash-$credit-$charge,2);?></b>
        </p>        
</div>
</center>
</body>
</html>