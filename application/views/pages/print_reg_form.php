<html>
    <head>
        <title>Registration Form</title>
        <link rel="shortcut icon" href="<?=base_url('design/img/jdslogo.jpg');?>">
    </head>
<body>
<?php
$cash="&nbsp;&nbsp;&nbsp;";$gcash="&nbsp;&nbsp;&nbsp;";$credit="&nbsp;&nbsp;&nbsp;";
if($reserve['res_mode_payment']=="cash"){
    $cash="&check;";
}
if($reserve['res_mode_payment']=="gcash"){
    $gcash="&check;";
}
if($reserve['res_mode_payment']=="credit"){
    $credit="&check;";
}
?>
<center>
<div style="width:768px; font-family:Times New Roman;">
    <table width="100%" border="0">
        <tr>
            <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='200' height="100" alt='Image'></td>
        </tr>
        <tr>
            <td><h3><?=$info['company_address'];?><br><?=$info['company_contactno'];?></h3></td>
        </tr>        
    </table>
    <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center" colspan="2"><h4><b style="color:red;">REGISTRATION FORM</b><br><b>Guest Profile</b></h4></td>
        </tr>
        <tr style="height:30px;">
            <td width="60%"><b>NAME: </b> <?=$reserve['res_fullname'];?></td>
            <td width="40%"><b>EMAIL: </b> <?=$reserve['res_email'];?></td>
        </tr>
        <tr style="height:30px;">
            <td width="60%"><b>CONTACT NO.: </b> <?=$reserve['res_contactno'];?></td>
            <td width="40%"><b>NATIONALITY: </b> <?=$reserve['res_nationality'];?></td>
        </tr>
        <tr style="height:30px;">
            <td colspan="2"><b>ADDRESS: </b> <?=$reserve['res_address'];?></td>
        </tr>        
    </table>
    <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center" colspan="3"><h4><b style="color:red;">STAY INFORMATION</b></h4></td>
        </tr>
        <tr style="height:30px;">
            <td width="40%"><b>NO. OF NIGHTS: </b> <?=$reserve['res_no_nights'];?></td>
            <td width="25%"><b>RATE: </b> <?=number_format($reserve['res_room_rate'],2);?></td>
            <td width="35%"><b>NO. OF GUEST: <br></b> <?=$reserve['res_no_guest_adult'];?> Adult / <?=$reserve['res_no_guest_child'];?> Child / <?=$reserve['res_no_guest_senior'];?> Senior/PWD</td>
        </tr>
        <tr style="height:30px;">
            <td width="35%"><b>DATE OF ARRIVAL: </b> <?=$reserve['res_date_arrive'];?></td>
            <td colspan="2"><b>ROOM TYPE: </b> <?=$reserve['room_type'];?></td>            
        </tr>
        <tr style="height:30px;">
            <td width="35%"><b>DATE OF DEPARTURE: </b> <?=$reserve['res_date_depart'];?></td>
            <td colspan="2"><b>ROOM COLOR: </b> <?=$reserve['room_color'];?></td>            
        </tr>
    </table>
    <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center"><h4><b style="color:red;">MODE OF PAYMENT</b></h4></td>
        </tr>
        <tr style="height:70px;">
            <td style="padding-left:50px;"><b>[ <?=$cash;?> ] CASH PAYMENT</b><br>
                <b>[ <?=$gcash;?> ] GCASH</b><br>
                <b>[ <?=$credit;?> ] DEBIT/CREDIT PAYMENT</b>
            </td>
        </tr>
    </table>
    <p align="left">
        <b>NOTICE TO GUEST</b>
        <ul style="text-align:justify;">
            <li>Guest will be charged epr night</li>
            <li>Check in time is 2:00 PM on the day of arrival, and the checkout time is 11:00 AM on the day of deaprture.</li>
            <li>Inviting strangers into guest rooms to use the facilities/amenities is prohibited. For security reasons, joiners must register at reception before entering the room.</li>
            <li>Pet may not bring into the room</li>
            <li>Extension of your stay without reservation is subject to room availability.</li>
            <li>Guest shall be liable for any damage/loss of any equipment.</li>
            <li>Unwashable satins, rips or tears on linens or towel will be charged to your bill.</li>
            <li>Smoking is strictly not allowed in the room.</li>
            <li>Bringing illegal item, exotic animals are prohibited.</li>
        </ul>
    <p align="right">
        <b>I hereby agree to abide with the hotel rules & regulations</b><br><br>_________________________________________________
    </p>    
</div>
</center>
</body>
</html>