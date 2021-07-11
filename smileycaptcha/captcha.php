<?php

$q= rand(1,3);
//echo $q;
echo '<body style="background-color:orange">';
echo '<h1 style="color:green">Smiley Captcha</h1>';
if($q==1)
{




echo "<form method=\"post\" action=\"verify.php\">\n";
require_once('recaptchalib.php');
$publickey = "6LemlN0SAAAAADYIcXOws7rymqPQTpOrpivo5bmP"; // you got this from the signup page
echo recaptcha_get_html($publickey);
echo "<tr><td align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Check CAPTCHA\"></td></tr>\n";




}


else
{

ob_start();
session_start();



if (!isset($_POST['submit'])){



    echo "<form method=\"post\" action=\"captcha.php\">\n";
    echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";

    echo "<tr><td align=\"center\"><img src=\"image.php\" width=300 height=200> </td></tr>\n";







/*
    if ($_SESSION['mode'] == 1)
    {
    echo "<tr><td>Type The Random CAPTCHA Letters in the  Top Left Corner in the Box</td></tr>\n";
    }

    else {

    echo "If you Like the Ad, Click the Like Button below to Solve Captcha.";
	echo " You can also post if you Type the challenge described in the image in the Box";
    $posturl =$_SESSION['adurl'];

    echo '<div id="fb-root"></div>';

		    echo "<script type='text/javascript'>
		      window.fbAsyncInit = function() {
			   FB.init({appId: 140038042803966, status: true, cookie: true, xfbml: true});
			   FB.Event.subscribe('edge.create', function(href, widget) {

	           function SetCookie(cookieName,cookieValue) { var today = new Date(), expire = new Date(), nDays=1;expire.setTime(today.getTime() + 600000);document.cookie = cookieName+'='+escape(cookieValue)+ ';expires='+expire.toGMTString();SetCookie('flag',1};
			   });
			   };







			  (function() {
			   var e = document.createElement('script');
			   e.type = 'text/javascript';
			   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
			   e.async = true;
			   document.getElementById('fb-root').appendChild(e);
	           }());

		      </script>";


     echo '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href=$posturl send="true" layout="button_count" width="450" show_faces="false" font="arial"></fb:like>';

    }
*/
    echo "<tr><td align=\"right\"><input type=\"text\" name=\"image\"></td></tr>\n";
    echo "<tr><td align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Check CAPTCHA\"></td></tr>\n";
    echo "</table></form>\n";
}else {

	    $image = $_POST['image'];
		    if ($_SESSION['mode'] == 1)
		    {
		    if(strcasecmp($image, $_SESSION['string']) == 0 || strcasecmp("Correct",$_SESSION['string']) == 0){
		        echo "<b>Great success!</b>\n";
		        $myFile = "Addata.txt";
			    $fh = fopen($myFile, 'a') or die("can't open file");
			    $stringData = $_SESSION['id'].":".$image."\n";
				fwrite($fh, $stringData);
		        fclose($fh);

		   }else {
		        echo "<em>Failure!</em>\n";
		    }
		    }
		   else {

		   if(strcasecmp($image, $_SESSION['string']) == 0 || strcasecmp("Correct",$_SESSION['string']) == 0){
		           echo "<b>Great success!</b>\n";
		           $myFile = "Addata.txt";
			       $fh = fopen($myFile, 'a') or die("can't open file");
			       $stringData = $_SESSION['id'].":".$image."\n";
			       fwrite($fh, $stringData);
		           fclose($fh);


		       }else {
		           echo "<em>Failure!</em>\n";
		    }

        }

	}

	session_unset();
	session_destroy();
	ob_end_flush();
}
	?>





