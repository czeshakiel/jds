<div style="width:250px; font-family:Arial;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="text-align:center;"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($info['company_logo']);?>" width='150' height="75" alt='Image'></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <center><b>SALES RECEIPT</b></center>
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
        $loginuser="";
        foreach($sales as $item){
            $datearray=$item['datearray'];
            $timearray=$item['timearray'];
            $loginuser=$item['fullname'];
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
        <tr>
            <td><b>Amount Tendered:</b></td>
            <td align="right"><b><?=number_format($tendered['amount'],2);?></b></td>
        </tr>
        <tr>
            <td><b>Change:</b></td>
            <td align="right"><b><?=number_format($tendered['amount']-($subtotal-$totaldiscount),2);?></b></td>
        </tr>
    </table>
    <hr style="border:1px dashed black;">
    <center><b>THANK YOU</b></center>
    <?php
    $code = $refno;

    // Define Code 39 character patterns
    $patterns = [
    '0' => '101001101101', '1' => '110100101011', '2' => '101100101011',
    '3' => '110110010101', '4' => '101001101011', '5' => '110100110101',
    '6' => '101100110101', '7' => '101001011011', '8' => '110100101101',
    '9' => '101100101101', 'A' => '110101001011', 'B' => '101101001011',
    'C' => '110110100101', 'D' => '101011001011', 'E' => '110101100101',
    'F' => '101101100101', 'G' => '101010011011', 'H' => '110101001101',
    'I' => '101101001101', 'J' => '101011001101', 'K' => '110101010011',
    'L' => '101101010011', 'M' => '110110101001', 'N' => '101011010011',
    'O' => '110101101001', 'P' => '101101101001', 'Q' => '101010110011',
    'R' => '110101011001', 'S' => '101101011001', 'T' => '101011011001',
    'U' => '110010101011', 'V' => '100110101011', 'W' => '110011010101',
    'X' => '100101101011', 'Y' => '110010110101', 'Z' => '100110110101',
    '-' => '100101011011', '.' => '110010101101', ' ' => '100110101101',
    '$' => '100100100101', '/' => '100100101001', '+' => '100101001001',
    '%' => '101001001001', '*' => '100101101101'
];

// Add start/stop *
$barcodeText = '*' . $code . '*';

// Build binary pattern
$binary = '';
foreach (str_split($barcodeText) as $char) {
    if (!isset($patterns[$char])) {
        die("Invalid character in code: $char");
    }
    $binary .= $patterns[$char] . '0';
}

// Create barcode image
$barWidth = 2;
$barHeight = 80;
$width = strlen($binary) * $barWidth;
$height = 120;

$image = imagecreate($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Draw bars
$x = 0;
for ($i = 0; $i < strlen($binary); $i++) {
    if ($binary[$i] === '1') {
        imagefilledrectangle($image, $x, 10, $x + $barWidth - 1, 10 + $barHeight, $black);
    }
    $x += $barWidth;
}

// Add label text
imagestring($image, 4, ($width / 2) - (strlen($code) * 4), $barHeight + 20, $code, $black);

// Capture image as Base64 string
ob_start();
imagepng($image);
$pngData = ob_get_clean();
$base64 = base64_encode($pngData);
imagedestroy($image);
    ?>
    <center>
    <img src='data:image/png;base64,<?=$base64;?>' alt='Barcode for <?=$code;?>' width="80%" height="50">
    </center>
<hr style="border:1px dashed black;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
    <tr>
        <td width="30%" align="left"><?=date('m/d/Y',strtotime($datearray));?></td>
        <td width="30%" align="center"><?=date('h:i A',strtotime($timearray));?></td>
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