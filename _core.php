<?php

$cookie_name = "library_staff";
$expiry_cookie_name = "library_staff_exp";
$cookie_duration = (60 * 60 * 24 * 400); # 400 days is spec max
$domain = "lehigh.edu";

if (isset($_GET["set"])) {
  $old_exp = intval($_COOKIE[$expiry_cookie_name]) ?? 0;
  $new_exp = time() + $cookie_duration;
  if ($old_exp < $new_exp - 60) {
    setcookie($cookie_name, $cookie_value, $new_exp, "/", $domain);
    setcookie($expiry_cookie_name, $new_exp, $new_exp, "/", $domain);
    header("Refresh:0");
  }
}
elseif (isset($_GET["unset"]) && 
  (isset($_COOKIE[$cookie_name]) || isset($_COOKIE[$expiry_cookie_name]))) {
  setcookie($cookie_name, "", time() - 3600, "/", $domain);
  setcookie($expiry_cookie_name, "", time() - 3600, "/", $domain);
  header("Refresh:0");
}

if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
}
else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}

?>

<ul>
<li>
<a href="?set">Set the Library Staff cookie to <?=$cookie_value?>.</a>
</li>
<li>
  <a href="?unset">Unset the Library Staff cookie.</a>
</li>
</ul>

