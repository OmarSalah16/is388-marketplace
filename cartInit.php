<?php

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
  $_SESSION['Qcart'] = [];
	$_SESSION['role'] = "guest";
}

?>
