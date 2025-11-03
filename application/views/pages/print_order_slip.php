<style type="text/css">   
    @media print {
      #non-printable {
        display: none;
      }
      #printable {
        display: block;
      }
    }
  </style>
<div style="width:250px; font-family:Arial;" id="printable">
   <?php
   $bar=0;
   $kitchen=0;
   $trtype="";
   $tblno="";
   $date="";
   $time="";
   foreach($sales as $item){
    if($item['category']=="Beverages"){
        $bar++;
    }else{
        $kitchen++;
    }
    $trtype=$item['trantype'];
    $tblno=$item['control_no'];
    $date=$item['datearray'];
    $time=$item['timearray'];
   }
   if($kitchen > 0){
    ?>
    <table width="100%" border="0" style="font-family:Arial;">
        <tr>
            <td><b>ORDER SLIP - KITCHEN</b></td>
        </tr>
        <tr>
            <td><b>TR Type: <?=$trtype;?></b></td>
        </tr>
        <tr>
            <td><b>Table No.: <?=$tblno;?></b></td>
        </tr>
        <tr>
            <td><b>Waiter: N/A</b></td>
        </tr>
   </table>
   <hr style="border:2px dashed black;">
   <table width="100%" border="0" style="font-family:Arial;">
        <tr>
            <td><b>Description</b></td>
        </tr>
   </table>
   <hr style="border:2px dashed black;">
   <table width="100%" border="0" style="font-family:Arial;">
        <?php
        foreach($sales as $item){
            if($item['category'] <> 'Beverages'){
            echo "<tr>";
                echo "<td><b>$item[quantity] $item[description]</b></td>";
            echo "</tr>";
            }
        }
        ?>        
   </table>
   <hr style="border:2px dashed black;">
   <b>Date: <?=date('m/d/Y',strtotime($date));?></b><br>
   <b>Time: <?=date('h:i A',strtotime($time));?></b>
    <?php
   }
   if($kitchen==0){

   }else{
    echo "<br><br><br>";
   }
   
   if($bar > 0){
    ?>
    <table width="100%" border="0" style="font-family:Arial;">
        <tr>
            <td><b>ORDER SLIP - BAR</b></td>
        </tr>
        <tr>
            <td><b>TR Type: <?=$trtype;?></b></td>
        </tr>
        <tr>
            <td><b>Table No.: <?=$tblno;?></b></td>
        </tr>
        <tr>
            <td><b>Waiter: N/A</b></td>
        </tr>
   </table>
   <hr style="border:2px dashed black;">
   <table width="100%" border="0" style="font-family:Arial;">
        <tr>
            <td><b>Description</b></td>
        </tr>
   </table>
   <hr style="border:2px dashed black;">
   <table width="100%" border="0" style="font-family:Arial;">
        <?php
        foreach($sales as $item){
            if($item['category'] == 'Beverages'){
            echo "<tr>";
                echo "<td><b>$item[quantity] $item[description]</b></td>";
            echo "</tr>";
            }
        }
        ?>        
   </table>
   <hr style="border:2px dashed black;">
   <b>Date: <?=date('m/d/Y',strtotime($date));?></b><br>
   <b>Time: <?=date('h:i A',strtotime($time));?></b>
    <?php
   }
   ?>
</div>
<br><br><br>
<button type="button" onclick="window.print();" id="non-printable">Print Receipt</button>