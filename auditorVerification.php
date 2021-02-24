<?php
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] != "auditor") {
		header("Location: ../denied.php");
}
}
?>
