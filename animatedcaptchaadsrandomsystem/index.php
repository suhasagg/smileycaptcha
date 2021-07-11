<?php
ob_start();
session_start();

/*
This Animated Gif Captcha system is brought to you courtesy of ...
josh@betteradv.com                                    ==> Josh Storz
http://www.querythe.net/Animated-Gif-Captcha/         ==> Download Current Version

OOP (PHP 4 & 5) Interface by ...
krakjoe@krakjoe.info                                  ==> J Watkins

The GIFEncoder class was written by ...
http://gifs.hu                                        ==>  L�szl� Zsidi
http://www.phpclasses.org/browse/package/3163.html    ==>  Download Current Version

This file is part of QueryThe.Net's AnimatedCaptcha Package.

    QueryThe.Net's AnimatedCaptcha is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.

    QueryThe.Net's AnimatedCaptcha is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with QueryThe.Net's AnimatedCaptcha; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA */

include "GIFEncoder.class.php";

// get random numbers & operator and make sure the answer is >= 0
$k = 0 ;
$l= rand(1,4);

if($l == 1)
{
while($k == 0)
  {
    $rand1 = rand(1, 9);  // 1st number (1-9)
    $rand3 = rand(1, 9);  // 2nd number (1-9)
    $rand2 = rand(0, 2);  // operator (-,+,*)
    $rand4 = rand(11, 14); //Advertisement image
    if (($rand2 != 0) || ($rand3 < $rand1))
      {
        $k = 1 ;
      }
  }

// set sessions for numbers, operator & answer.  Only $_SESSION['answer'] is necessary.  Others are for displaying full equation if you desire.
    $_SESSION['r1'] = $rand1 ;
    $_SESSION['r3'] = $rand3 ;

    if ($rand2 == 0)      {$_SESSION['r2'] = " - " ; $_SESSION['answer'] = $rand1 - $rand3 ;}
    elseif ($rand2 == 1)  {$_SESSION['r2'] = " + " ; $_SESSION['answer'] = $rand1 + $rand3 ;}
    else                  {$_SESSION['r2'] = " * " ; $_SESSION['answer'] = $rand1 * $rand3 ;}

// build the frame images and elapsed time to show in 2 arrays

  //  $path='frames';
  //  $frames [ ] = sprintf( '%s/%d.gif',$path ,$rand4 );  // Intro message " Prove you are human ... "
  //  $time [ ] = 260;

  // random number & elapsed time of frames to *hopefully* make a cracker's life tougher
  //  $i = 0;
  //  $loop = rand(0, 20);  // total number of frames in loop loop

    $n = "frames/" .$rand4. ".gif";
    list($width, $height) = getimagesize($n);
	$newWidth=150;
	$newHeight=150;
	$img1 = imagecreatefromgif($n); // open image
	$img = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagegif($img, "frames/" .$rand4. ".gif");
//	 $frames [] = imagegif($img);
//	 $time [] = 120;

    $frames [ ] = "frames/" .$rand4. ".gif";
    $time [ ] = 120;

  // set 1st random number
    $frames [ ] = "frames/" .$rand1. ".gif";  // 1st number (0-9)
    $time [ ] = 140;

  // set frame for operator
    if ($rand2 == 0)      {$frames [ ] = "frames/minus.gif";}
    elseif ($rand2 == 1)  {$frames [ ] = "frames/plus.gif";}
    else                  {$frames [ ] = "frames/times.gif";}
    $time [ ] = 140;

  // set 2nd random number
    $frames [ ] = "frames/" .$rand3. ".gif";  // 2nd number (0-9)
    $time [ ] = 140;


  // set final frame for equals
    $frames [ ] = "frames/equals.gif" ; // Ending message " equals    = "
    $time [ ] = 280;  // equals frame time (100 = 1 second)

// encode the gif using the class to avoid gd dependencies
    $gif = new GIFEncoder	(
    							$frames, // frames array
    							$time, // elapsed time array
    							0, // loops (0 = infinite)
    							2, // disposal
    							0, 0, 0, // rgb of transparency
    							"url" // source type
    		);

// display the image
$fp = fopen('frames/animegif.gif', 'w');
 fwrite($fp, $gif->GetAnimation());
 fclose($fp);

}

if($l == 2)

{



 $v = rand(1,4);


function RenderFrame($a)
{

$q= rand(1,7);
global $g ;
$g = $q;

if ($q==2){
$n = 'frames/0.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
}

else {
global $v;
//$k = rand(1,4);
$n = "frames/".$v.'.'.'jpg';
# $n ='7.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

}



$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img,150,150,150);
$red = imagecolorallocate($img, 255, 0, 0);
$pink = imagecolorallocate($img, 200, 0, 150);
$green = imagecolorallocate($img, 0, 255, 0);
$blue = imagecolorallocate($img, 0, 0, 255);

for($i=1;$i<=rand(1,5);$i++){
    $color = (rand(1,2) == 1) ? $pink : $red;
    imageline($img,rand(5,50),rand(5,40), rand(5,150)+5,rand(5,80)+5, $color);
}

imagefill($img, 0, 0, $white);

$l=rand(97,122);
global $string1;
global $string2;
global $string3;
global $string4;
global $color1;
global $color2;
$string = chr($l);
$string1.=$string;

if($a == 0)
{
$color = $black;
}

if($a == 1)
{
$color = $blue;
}

if($a == 2)
{
$color = $green;
}





if( $color == $black)
{
$string2.=$string;
$color1 = $color;
$color2= "Black";
}

if($color == $blue)
{
$string3.=$string;
$color1= $color;
$color2 = "Blue";
}

if($color == $green)
{
$string4.=$string;
$color1= $color;
$color2 = "Green";
}


imagettftext($img, 35, 0, rand(10,80),rand(40,100) , $color, "frames/calibri.ttf", $string);
return $img;

}






$m=0;

for ($frame=0; $frame<3; $frame++) {
  $image = RenderFrame($frame);
  ob_start();
  imagegif($image);
  $frames[]=ob_get_contents();
/*
    if($m==){
  $framed[]=400;
  $m=1;
  }
  else{
  $framed[]=180;
  }
*/

  if($g!=2){
    $framed[]=500;
    }
    else{
    $framed[]=180;
  }

  ob_end_clean();
}


 $d=rand(1,3);

 if($d == 1)
 {
 $color2 = "Black";
 }

 if($d == 2)
 {
 $color2 = "Blue";
 }

 if($d == 3)
 {
 $color2 = "Green";
 }

 if ($color2 == "Black")
     $_SESSION['answer'] = $string2;

     if ($color2 == "Blue")
     $_SESSION['answer'] = $string3;

     if ($color2 == "Green")
    $_SESSION['answer'] = $string4;


 $gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
 // display the image
 $fp = fopen('frames/animegif.gif', 'w');
  fwrite($fp, $gif->GetAnimation());
  fclose($fp);

}



if($l==3)
{


$v = rand(1,4);


function RenderFrame($a)
{

$q= rand(1,7);
global $g ;
$g = $q;

if ($q==2){
$n = 'frames/0.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
}

else {
global $v;
//$k = rand(1,4);
$n = "frames/".$v.'.'.'jpg';
# $n ='7.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

}



$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img,150,150,150);
$red = imagecolorallocate($img, 255, 0, 0);
$pink = imagecolorallocate($img, 200, 0, 150);


for($i=1;$i<=rand(1,5);$i++){
    $color = (rand(1,2) == 1) ? $pink : $red;
    imageline($img,rand(5,50),rand(5,40), rand(5,150)+5,rand(5,80)+5, $color);
}

imagefill($img, 0, 0, $white);

$l=rand(97,122);
global $string1;
$string = chr($l);
$string1.=$string;
$color = (rand(1,2) == 1) ? $black : $pink;
imagettftext($img, 35, 0, rand(10,80),rand(40,100) , $black, "frames/calibri.ttf", $string);
return $img;

}


#$image = RenderFrame();
$m=0;
for ($frame=0; $frame<3; $frame++) {
  $image = RenderFrame($frame);
  ob_start();
  imagegif($image);
  $frames[]=ob_get_contents();
  if($m==0){
  $framed[]=400;
  $m=1;
  }
  else{
  $framed[]=180;
  }
  ob_end_clean();
}


  $_SESSION['answer'] = $string1;

 $gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');



 $fp = fopen('frames/animegif.gif', 'w');
  fwrite($fp, $gif->GetAnimation());
  fclose($fp);

}



if($l ==4)
{

$v = rand(1,4);


function RenderFrame($a)
{

$q= rand(1,7);
global $g ;
$g = $q;

if ($q==2){
$n = 'frames/0.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
}

else {
global $v;
//$k = rand(1,4);
$n = "frames/".$v.'.'.'jpg';
# $n ='7.jpg';
list($width, $height) = getimagesize($n);
$newWidth=200;
$newHeight=200;
$img1 = imagecreatefromjpeg($n); // open image
$img = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($img, $img1, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

}




$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img,150,150,150);
$red = imagecolorallocate($img, 255, 0, 0);
$pink = imagecolorallocate($img, 200, 0, 150);


for($i=1;$i<=rand(1,5);$i++){
    $color = (rand(1,2) == 1) ? $pink : $red;
    imageline($img,rand(5,50),rand(5,40), rand(5,150)+5,rand(5,80)+5, $color);
}

imagefill($img, 0, 0, $white);

$l=rand(97,122);
global $string1;
$string = chr($l);
$string1.=$string;
$color = (rand(1,2) == 1) ? $black : $pink;
imagettftext($img, 35, 0, rand(10,80),rand(40,100) , $black, "frames/calibri.ttf", $string);
return $img;

}


#$image = RenderFrame();
$m=0;
for ($frame=0; $frame<3; $frame++) {
  $image = RenderFrame($frame);
  ob_start();
  imagegif($image);
  $frames[]=ob_get_contents();
  if($m==0){
  $framed[]=400;
  $m=1;
  }
  else{
  $framed[]=180;
  }
  ob_end_clean();
}


 $w = rand(1,2);
 global $string2;
 $string2='';
 for ($i=0; $i<$w+1; $i++) {
 $string2 .= $string1;
 }

 $_SESSION['answer'] = $string2;

 $gif = new GIFEncoder($frames,$framed,$w,2,0,0,0,'bin');
 $fp = fopen('frames/animegif.gif', 'w');
  fwrite($fp, $gif->GetAnimation());
  fclose($fp);



}


if (!isset($_POST['submit'])){
    echo "<form method=\"post\" action=\"captcha.php\">\n";
    echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
    if($l==1)
    {
    echo "<tr><td>Type The Answer to the Math expression  in the Box</td></tr>\n";
    }
    if($l==2)
    {
    echo "<tr><td>Type The $color2  Animated Letter You See in the Animated Image Below Into the Box</td></tr>\n";
    }
    if($l==3)
    {
    echo "<tr><td>Type The Black Animated Letters You See Below Into the Box in the sequence they appear excluding repeated sequence</td></tr>\n";
    }

    if($l==4)
    {
    echo "<tr><td>Type The Black Animated Letters You See Below Into the Box in the sequence they appear including repeated sequence</td></tr>\n";
    }
    echo "<tr><td align=\"center\"><img src=\"animegif.gif\"></td></tr>\n";
    echo "<tr><td align=\"right\"><input type=\"text\" name=\"image\"></td></tr>\n";
    echo "<tr><td align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Check CAPTCHA\"></td></tr>\n";
    echo "</table></form>\n";
}


ob_end_flush();

?>
