<?php
  require_once('recaptchalib.php');
  $privatekey = "6LemlN0SAAAAAJ4mCcAOjc5P24JtJSm9wC1k2kH1";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    echo "<b>Great success!</b>\n";
  }
  ?>