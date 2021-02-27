<?php
include "isLoggedIn.php";
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] != "HR") {
		header("Location: denied");
}
}
?>
