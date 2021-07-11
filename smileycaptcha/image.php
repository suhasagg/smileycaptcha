<?php
session_start();


$q=rand(1,4);

if ($q==1){
$k= rand(40,48);
$n = $k.'.gif';
//list($width, $height) = getimagesize($n);
//$newWidth=350;
//$newHeight=300;
//$image = imagecreatefromgif($n); // open image
//$img = imagecreatetruecolor($newWidth, $newHeight);
//imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

}

else {
$k = rand(1,39);
$n = $k.'.jpg';

list($width, $height) = getimagesize($n);
$newWidth=$width;
$newHeight=$height;
$image = imagecreatefromjpeg($n); // open image
$img1 = imagecreatetruecolor($newWidth, $newHeight);
//imagecopyresampled($image, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

}





if ($q ==1){
$i = 1;
    $filename = "keyword.txt";
    $fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
    while ( ! feof( $fp ) ) {
    $line = fgets( $fp, 1024 );
    if($i == $k)
    break;
    $i++;
    }
    $line=trim($line);
    $_SESSION['string'] = $line;

$j = 1;
    $filename1 = "adurls.txt";
    $fp1 = fopen( $filename1, "r" ) or die("Couldn't open $filename1");
    while ( ! feof( $fp1 ) ) {
    $line1 = fgets( $fp1, 1024 );
    if($j == $k)
    break;
    $j++;
    }
    $line1=trim($line1);
    $_SESSION['adurl'] = $line1;

}

else
{
$i = 1;
    $filename = "keyword.txt";
    $fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
    while ( ! feof( $fp ) ) {
    $line = fgets( $fp, 1024 );
    if($i == $k)
    break;
    $i++;
    }
    $line=trim($line);
    $_SESSION['string'] = $line;

$j = 1;
    $filename1 = "adurls.txt";
    $fp1 = fopen( $filename1, "r" ) or die("Couldn't open $filename1");
    while ( ! feof( $fp1 ) ) {
    $line1 = fgets( $fp1, 1024 );
    if($j == $k)
    break;
    $j++;
    }
    $line1=trim($line1);
    $_SESSION['adurl'] = $line1;



}

$_SESSION['mode'] = $q;
$_SESSION['id'] = $n;

// CONFIG


if($q==1)
{

header('Content-type: image/gif');
echo file_get_contents($n);
}

else

{
imagejpeg($image);

imagedestroy($image);
}

?>
