<?php
$cookie_name = "library_staff";
$domain = "lehigh.edu";

if (isset($_GET["set"]) && !isset($_COOKIE[$cookie_name])) {
  setcookie($cookie_name, 1, time() + (60 * 60 * 24 * 365 * 20), "/", $domain);
  header("Refresh:0");
}
elseif (isset($_GET["unset"]) && isset($_COOKIE[$cookie_name])) {
  setcookie($cookie_name, "", time() - 3600, "/", $domain);
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
  <a href="?set">Set the Library Staff cookie.</a>
</li>
<li>
  <a href="?unset">Unset the Library Staff cookie.</a>
</li>
</ul>

