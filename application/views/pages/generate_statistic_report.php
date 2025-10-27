<html>
    <head>
        <title>Visitor Statistic Report</title>
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
        <h2><?=$type;?> STATISTIC REPORT</h2>
        <table width="100%" border="0">
            <tr>
                <td><b>Date: <?=date('M d, Y',strtotime($startdate));?> to <?=date('M d, Y',strtotime($enddate));?></b></td>                        
            </tr>    
        </table>
        <table width="100%" border="0" cellpadding="1" style="border-collapse:collapse; font-size:20px;">           
            <?php            
            $adult=0;
            $child=0;
            $senior=0;
            foreach($items as $item){
                $adult += $item['res_no_guest_adult'];
                $child += $item['res_no_guest_child'];
                $senior += $item['res_no_guest_senior'];
            }
            ?>
            <tr>
                <td align="center"><b>Visitor(S)</b></td>
                <td align="center"><b>No.</b></td>
            </tr>
            <tr>
                <td><b>Adult:</b></td> <td align="center"><b><?=$adult;?></b></td>
            </tr>
            <tr>
                <td><b>Children:</b></td> <td align="center"><b><?=$child;?></b></td>
            </tr>
            <tr>
                <td><b>Senior/PWD:</b></td> <td align="center"><b><?=$senior;?></b></td>
            </tr>
        </table>
</div>
</center>
</body>
</html>