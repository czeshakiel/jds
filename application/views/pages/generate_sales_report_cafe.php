<div style="width:250px; font-family:Arial;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="text-align:center;"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='150' height="75" alt='Image'></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <center><b>SALES REPORT</b></center>
    <hr style="border:1px dashed black;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
        <tr>
            <td style="text-align:center; width:10%;"><b>Qty</b></td>
            <td width="60%"><b>Item Description</b></td>
            <td style="text-align:right; width:15%;"><b>Price</b></td>            
            <td style="text-align:right; width:15%;"><b>Total</b></td>
        </tr>
        <?php
        $items=0;
        $subtotal=0;
        $totaldiscount=0;
        $datearray="";
        $timearray="";
        $loginuser=$this->session->fullname;
        foreach($sales as $item){
            $datearray=$item['datearray'];
            $timearray=$item['timearray'];
            //$loginuser=$item['fullname'];
            $items += $item['quantity'];
            $total=$item['sellingprice']*$item['quantity'];
            $subtotal += $total;
            $totaldiscount += $item['discount'];
            echo "<tr>";
                echo "<td align='center'>$item[quantity]</td>";
                echo "<td align='left'>$item[description]</td>";
                echo "<td align='right'>".number_format($item['sellingprice'],2)."</td>";
                echo "<td align='right'>".number_format($total,2)."</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td align="center" colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" colspan="4"><b><?=$items;?>x item(s) sold</b></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
        <tr>
            <td><b>Sub Total:</b></td>
            <td align="right"><b><?=number_format($subtotal,2);?></b></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
        <tr>
            <td><b>Discount:</b></td>
            <td align="right"><b><?=number_format($totaldiscount,2);?></b></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
        <tr>
            <td><b>Total:</b></td>
            <td align="right"><b><?=number_format($subtotal-$totaldiscount,2);?></b></td>
        </tr>
    </table>
    
<hr style="border:1px dashed black;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
    <tr>
        <td width="30%" align="left"><?=date('m/d/Y');?></td>
        <td width="30%" align="center"><?=date('h:i A');?></td>
        <td width="40%" align="right"><?=$loginuser;?></td>
    </tr>
</table>
<br>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
    <tr>
        <td width="20%">&nbsp;</td>
        <td width="60%" align="center" style="border-top:1px solid black;">Signature</td>        
        <td width="20%">&nbsp;</td>
    </tr>
</table>
</div>