<?php
$nombre = $_POST['nombre']; 
$cargo = $_POST['cargo']; 
$telf = $_POST['telf']; 
$company = $_POST['company']; 

// Redragon
if($company == '1') {
$logo = '<img src="https://redragonla.s3.sa-east-1.amazonaws.com/rd90x.png" style="
width: 90px;
padding-right: 15px;
padding-left: 15px;
">';
$web = '<a style="font-size:12px;color:#5F6971;font-style: italic;" href="http://www.redragonla.com">www.redragonla.com</a>';
$social = '<div style="
margin-top: 3px;
">
        <a href="https://www.facebook.com/RedragonAR"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/facebook.png" style="
    width: 15px;
"></a> 
        <a href="https://www.instagram.com/RedragonAR/"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/instagram.png" style="
    width: 15px;
"></a>
         <a href="https://twitter.com/RedragonAR"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/twitter.png" style="
    width: 15px;
"></a> 
         <a href="https://www.youtube.com/Redragonlatam"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/youtube.png" style="
    width: 15px;
"></a> 
        </div>';

} else 
//  Latamly
if($company == '2') {
    $logo = '<img src="https://latamly.s3.sa-east-1.amazonaws.com/latamly90x.png" style="
    width: 90px;
    padding-right: 15px;
    padding-left: 15px;
">';
    $web = '<a style="font-size:12px;color:#5F6971;font-style: italic;" href="http://www.latamly.com">www.latamly.com</a>';
    $social = '';

} else 
// Colorful
if($company == '3') {
    $logo = '<img src="https://redragonla.s3.sa-east-1.amazonaws.com/colorful.jpg" style="width: 90px; padding-right: 15px; padding-left: 15px;">';
    $web = '<a style="font-size:12px;color:#5F6971;font-style: italic;" href="https://en.colorful.cn/">colorful.cn/</a>';
    $social = '<div style="
    margin-top: 3px;
    ">
            <a href="https://www.facebook.com/ColorfulGlobal"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/facebook.png" style="
        width: 15px;
    "></a>
             <a href="https://twitter.com/Colorful_Tech"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/twitter.png" style="
        width: 15px;
    "></a> 
             <a href="https://www.youtube.com/channel/UCFCrgPOCH14pVVMMH2Nw-bA"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/youtube.png" style="
        width: 15px;
    "></a> 
            </div>';
} else 
// XP-PEN
if($company == '4') {   
    $logo = '<img src="https://redragonla.s3.sa-east-1.amazonaws.com/xp-pen120x.jpg" style="
    width: 90px;
    padding-right: 15px;
    padding-left: 15px;
">';
    $web = '<a style="font-size:12px;color:#5F6971;font-style: italic;" href="http://www.xppen.com.ar">xppen.com.ar</a>';
    $social = '<div style="
    margin-top: 3px;
    ">
            <a href="https://www.facebook.com/xppenLA/"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/facebook.png" style="
        width: 15px;
    "></a> 
            <a href="https://www.instagram.com/xppenLA/"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/instagram.png" style="
        width: 15px;
    "></a>
             <a href="https://twitter.com/XPPen"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/twitter.png" style="
        width: 15px;
    "></a> 
             <a href="https://www.youtube.com/channel/UCbm03OZVj08Fdo8QtVh8Y3Q"><img src="https://redragonla.s3.sa-east-1.amazonaws.com/youtube.png" style="
        width: 15px;
    "></a> 
            </div>';
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>Generador de firmas</title>


    <style>


      
    </style>

  </head>
  <body>

    <table style="border-top-width:3px;border-top-style:solid;border-top-color:#A6ACAF;font-family:Arial;line-height: 15px;padding-top: 5px;"><tbody style="
    ">
    <tr style="">
        <td width="90" valign="middle" style="
            border-right: solid 1px gray;
        ">

<?php echo $logo;?>
        
        </td>
        <td width="10">
        &nbsp;
        </td>
        <td width="300" valign="middle">
        <span style="font-size: 12px;color:#1B232A;font-weight: bold;"><?php echo $nombre;?></span><br>
        <span style="font-size: 12px;color:#A6ACAF;font-style: normal;"><?php echo $cargo;?></span>
        <br>
        <b><span style="font-size: 12px;color:#A6ACAF;"><?php echo $telf;?></span></b>
        <br>
   <?php echo $web;?> 
        <br>
 <?php echo $social;?>
        </td>
        </tr>
        </tbody></table>




   
  </body>
</html>