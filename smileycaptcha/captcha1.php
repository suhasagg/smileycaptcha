<?php

echo "<form method=\"post\" action=\"verify.php\">\n";
require_once('recaptchalib.php');
$publickey = "6LemlN0SAAAAADYIcXOws7rymqPQTpOrpivo5bmP"; // you got this from the signup page
echo '<body style="background-color:orange">';
echo '<h1 style="color:green">Smiley Captcha</h1>';
echo recaptcha_get_html($publickey);
echo "<tr><td align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Check CAPTCHA\"></td></tr>\n";

?>