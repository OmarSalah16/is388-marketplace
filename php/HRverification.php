<?php 

if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] != "hr") {
		header("Location: ../denied.html");
}

?>