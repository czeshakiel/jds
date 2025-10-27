<html>
    <head>
        <title>Reservation Report</title>
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
        <h2><?=$type;?> REPORT</h2>
        <table width="100%" border="0">
            <tr>
                <td><b>Date: <?=date('m/d/Y',strtotime($startdate));?> to <?=date('m/d/Y',strtotime($enddate));?></b></td>                        
            </tr>    
        </table> 
        <table width="100%" border="1" cellpadding="1" style="border-collapse:collapse; font-size:14px;">
            <tr>
                <td align="center" width="5%"><b>#</b></td>
                <td align="center" width="10%"><b>Booked Date</b></td>
                <td align="center" width="10%"><b>Reservation ID</b></td>
                <td align="center" width="20%"><b>Room</b></td>
                <td align="center" width="10%"><b>No. of Guest</b></td>
                <td align="center" width="10%"><b>Arrival Date</b></td>
                <td align="center" width="10%"><b>Departure Date</b></td>
            </tr>
            <?php
            $x=1;
            foreach($items as $item){
                if($item['room_type']==""){
                    $room_type = $item['description'];
                }else{
                    $room_type=$item['room_type'];
                }
                echo "<tr>";
                    echo "<td align='center'>$x.</td>";
                    echo "<td align='center'>".date('m/d/Y',strtotime($item['res_book_date']))."</td>";
                    echo "<td align='center'>".$item['res_id']."</td>";
                    echo "<td align='left'>".$room_type." ".$item['room_color']."</td>";
                    echo "<td align='center'>".$item['res_no_guest']."</td>";
                    echo "<td align='center'>".date('m/d/Y',strtotime($item['res_date_arrive']))."</td>";
                    echo "<td align='center'>".date('m/d/Y',strtotime($item['res_date_depart']))."</td>";
                echo "</tr>";
                $x++;
            }
            ?>
        </table>
</div>
</center>
</body>
</html>