<?php
	echo '<pre>';
		print_r($_GET);
		print_r($_POST);
	echo '</pre>';
	exit;

	if($_GET['st']=="Completed")
	{
		$item_transaction = $_GET['tx'];
		$item_price = $_GET['amt']; 
		$item_currency = $_GET['cc'];
		$item_no = $_GET['invoice'];

		mysql_query("insert into payment_transaction values('','$item_transaction','$item_price','$item_currency','$item_no')");
		echo "Payment Done Successfully";
	}
?>