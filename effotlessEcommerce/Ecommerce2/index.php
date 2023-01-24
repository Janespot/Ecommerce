<?php
require("./includes/config.inc.php");
include("./includes/header.html");
require(MYSQL);
?>
<h3>Welcome</h3>
<p>Welcome to Knowledge is Power, a site dedicated to keeping you up 
to date on the Web security and programming information you need to 
know. Blah, blah, blah. Yadda, yadda, yadda.</p>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include('./includes/login.inc.php');
}
include("./includes/footer.html");
?>