<?php
    $nombre = $_REQUEST['nombre'];
    $cargo= $_REQUEST['cargo'];
    $telf = $_REQUEST['telf'];
    $correo = $_REQUEST['coreo'];
    $company = $_REQUEST['company'];
    $separator = $_REQUEST['separador'];
    $direccion = $_REQUEST['country'];
        
    if (!empty($_REQUEST['interno'])) {    
    $interno = '| Interno: '.$_REQUEST['interno']; } else {
    $interno = ''; }
    
    if (!empty($_REQUEST['skype'])) {    
    $skype = '| Skype: '.$_REQUEST['skype']; } else {
    $skype = ''; }
    

    
    if($company == '1') {
        $img = '<img src="https://montironi.com/sign/logo.png" style="width: 179px;padding-right: 15px;padding-left: 15px;padding-bottom: 6px;"><br><br>';
        $fb = '<a href="https://www.facebook.com/MontironiFord"><img src="https://montironi.com/sign/fb.png" style="width: 17px;"></a>';
        $ig = '<a href="https://www.instagram.com/montironi.ford/"><img src="https://montironi.com/sign/ig.png" style="width: 17px;"></a>';
        $yt = '<a href="https://www.youtube.com/user/MontironiAutomotores"><img src="https://montironi.com/sign/yt.png" style="width: 17px;"></a>';
        $in = '<a href="https://linkedin.com/company/montironi-automotores-sa"><img src="https://montironi.com/sign/in.png" style="width: 17px;"></a>';
        $web = '<a href="https://montironiford.com.ar/">www.montironiford.com.ar</a>';
        $razon = 'Montironi Automotores S.A.C.I.F.I.A';
        $color = '#0c5790';
        
    } else if($company == '2') { 
        $img = '<img src="https://montironi.com/sign/logo2.png" style="width: 179px;padding-right: 15px;padding-left: 15px;padding-bottom: 6px;"><br><br>';
        $fb = '<a href="https://www.facebook.com/MontironiFiat/"><img src="https://montironi.com/sign/fb2.png" style="width: 17px;"></a>';
        $ig = '<a href="https://www.instagram.com/montironi.fiat/"><img src="https://montironi.com/sign/ig2.png" style="width: 17px;"></a>';
        $yt = '<a href="https://www.youtube.com/channel/UCeDr83GQGvKAMOWso3fjS9Q"><img src="https://montironi.com/sign/yt2.png" style="width: 17px;"></a>';
        $in = '<a href="https://linkedin.com/company/montironi-automotores-sa"><img src="https://montironi.com/sign/in2.png" style="width: 17px;"></a>';
        $web = '<a href="https://montironifiat.com.ar/">www.montironifiat.com.ar</a>';
        $razon = 'Pinerolo S.A.';
        $color = '#b60e33';
        
    } else if($company == '3') { 
        $img = '<img src="https://montironi.com/sign/logo3.png" style="width: 179px;padding-right: 15px;padding-left: 15px;padding-bottom: 6px;"><br><br>';
        $fb = '<a href="https://www.facebook.com/Automont.Hyundai"><img src="https://montironi.com/sign/fb3.png" style="width: 17px;"></a>';
        $ig = '<a href="https://www.instagram.com/automont.hyundai/"><img src="https://montironi.com/sign/ig3.png" style="width: 17px;"></a>';
        $yt = '<a href="https://www.youtube.com/channel/UC3FkKJS4766xRhGkB7q3fEQ"><img src="https://montironi.com/sign/yt3.png" style="width: 17px;"></a>';
        $in = '<a href="https://linkedin.com/company/montironi-automotores-sa"><img src="https://montironi.com/sign/in3.png" style="width: 17px;"></a>';
        $web = '<a href="https://automonthyundai.com.ar/">www.automonthyundai.com.ar</a>';
        $razon = 'Automont S.A.';
        $color = '#737373';
}

    if (isset($separator)) {
    $sep = 'border-top-width:2px;border-top-style:solid;border-top-color:'.$color.';'; } else {
    $sep = 'border:none;';
    }

    if($direccion == '1') {
        $telf_gen = 'Tel. 0351-4888050 ';
        $dir = 'Av. Monseñor P. Cabrera 4600 - Córdoba';
    } else 
    if($direccion == '2') {
        $telf_gen = 'Tel. 03525-442516';
        $dir = 'Pedro J. Frías 175 - Jesús María, Córdoba';
    } else
    if($direccion == '3') {
        $telf_gen = 'Tel. 03572-469500';
        $dir = 'San Martin 160, Oncativo, Córdoba';        
    } else 
    if($direccion == '4') {
        $telf_gen = 'Tel. 0351-4888000 ';
        $dir = 'Av. Caraffa 1842 - Córdoba';
    } else 
    if($direccion == '5') {
        $telf_gen = 'Tel. 03525-442100';
        $dir = 'Pedro J. Frías 85 - Jesús María, Córdoba';  
    } else 
    if($direccion == '6') {
        $telf_gen = 'Tel. 0351-4888000';
        $dir = 'San Martin 200, Oncativo, Córdoba';    
    } else 
    if($direccion == '7') {
        $telf_gen = 'Tel. 0351-4888000';
        $dir = 'Av. Illia 100, Villa Domínguez - Villa Carlos Paz, Córdoba';    
    } else 
    if($direccion == '8') {
        $telf_gen = 'Tel. 0358-4631111';
        $dir = 'Ruta Lateral A005, Complejo Mercomax Local 2 - Río Cuarto, Córdoba';            
    } else 
    if($direccion == '9') {
        $telf_gen = 'Tel. 0351-44888040';
        $dir = 'Av. Monseñor Pablo Cabrera 4921, Córdoba';               
    } else 
    if($direccion == '10') {
        $telf_gen = 'Tel. 0358-4631111';
        $dir = 'Ruta Lateral A005, Complejo Mercomax Local 2 - Río Cuarto, Córdoba';           
    } else 
    if($direccion == '11') {
        $telf_gen = 'Tel. 0351-4888060 ';
        $dir = 'Av. Monseñor P. Cabrera 4935 - Córdoba';        
    } else 
    if($direccion == '12') {
        $telf_gen = 'Tel. 03525-442519';
        $dir = 'Pedro J. Frías 175 - Jesús María, Córdoba';        
    } else 
    if($direccion == '13') {
        $telf_gen = 'Tel. 0351-4888080 ';
        $dir = 'Av. Caraffa 1868 - Córdoba';        
    } else 
    if($direccion == '14') {
        $telf_gen = 'Tel. 0351-4896699 ';
        $dir = 'Av. Monseñor P. Cabrera 4935 - Córdoba';      
    } else 
    if($direccion == '15') {
        $telf_gen = 'Tel. 0351-4888088 ';
        $dir = 'Av. Monseñor P. Cabrera 4935 - Córdoba';      
    }
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Generador de firmas - Montironi</title>
<style></style>
</head>
<body>
<table style="<?php echo $sep;?> font-family:Arial;line-height: 15px;padding-top: 5px;">
    <tbody>
<tr>
<td width="250" valign="top" style="text-align: right;">
<?php echo $img;?>
<div style="padding-right: 15px;">
<span style="font-size: 12px;color:<?php echo $color;?>;font-style: normal;"><?php echo $telf_gen;?><?php echo $interno;?></span><br>
<span style="font-size: 12px;color:<?php echo $color;?>;font-style: normal;"><?php echo $dir;?></span><br>
<span style="font-size: 12px;color:<?php echo $color;?>;font-style: normal;"><?php echo $web;?></span><br>
</div>
</td><td width="10" style="border-right: solid 1px <?php echo $color;?>;">
&nbsp;
</td>
<td width="10">
&nbsp;
</td>
<td width="250" valign="top">
<span style="font-size: 16px;color:<?php echo $color;?>;font-weight: bold;"><?php echo $nombre;?></span><br>
<span style="font-size: 12px;color:<?php echo $color;?>font-style: normal;"><?php echo $cargo;?></span><br><br>
<span style="font-size: 12px;color:<?php echo $color;?>;font-style: normal;"><a href="<?php echo 'mailto:'.$correo;?>"><?php echo $correo;?></a></span><br>
<span style="font-size: 12px;color:<?php echo $color;?>;font-style: normal;"><a href="<?php echo 'tel:'.$telf;?>"><?php echo $telf;?></a></span><br>
<div style="margin-top: 0px;">
<?php echo $fb;?>
<?php echo $ig;?>
<?php echo $yt;?>
<?php echo $in;?>
</div> </td>
</tr></tbody></table>
<table style="font-family:Arial;line-height: 15px;padding-top: 5px;">
    <tbody>
<tr>   

<td width="400">
    <p style="font-size: 10px;color:gray;font-weight: normal;">El ahorro del papel nos ayuda a proteger el medio ambiente, imprimí sólo si es necesario.</p>
    <p style="font-size: 10px;color:gray;font-weight: normal;">ESTRICTAMENTE CONFIDENCIAL. El contenido de este correo electrónico y sus anexos son estrictamente confidenciales y propiedad de <?php echo $razon;?>. No pueden ser utilizados o divulgados por alguien que no sea un destinatario designado. Si ha recibido este correo 
      electrónico por error, notifique al remitente respondiendo a este correo electrónico insertando la palabra "Mal dirigido" como mensaje 
      elimine el mensaje actual.</p>
    </td>
    <td></td>
</tr>
</tbody></table>
</body>
</html>

<?php   ?>