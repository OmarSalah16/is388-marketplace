<?php

if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] != "admin") {
		header("Location: denied.php");
}
}
?>
