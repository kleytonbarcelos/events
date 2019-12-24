<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<!-- Identify your business so that you can collect the payments. -->
	<input type="hidden" name="business" value="contato-facilitator@pixdata.com.br">

	<!-- Specify a Buy Now button. -->
	<input type="hidden" name="cmd" value="_xclick">

	<!-- Specify details about the item that buyers will purchase. -->
	<input type="hidden" name="item_name" value="Inscrição Segura - Evento: ECOTRILHAS CAPARAO 2017">
	<input type="hidden" name="item_number" value="PRO4321">
	<input type="hidden" name="amount" value="65.00">
	<input type="hidden" name="currency_code" value="BRL">
	<!-- Display the payment button. -->
	<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png">
	<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>




<?php
$paypal_url='https://www.paypal.com/cgi-bin/webscr';
$paypal_id='your_seller_id'; // Business email ID
?>

<html>
<body>
	<div class="product_div">
	<p class="image"><img src="product1.jpg"/></p>
	<p class="name">Sample Product 1</p>
	<p class="price">Price:$10</p>

	<div class="paypal_button">
	<form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
	<input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="item_name" value="Sample Product 1">
	<input type="hidden" name="item_number" value="1">
	<input type="hidden" name="credits" value="300">
	<input type="hidden" name="userid" value="1">
	<input type="hidden" name="amount" value="10">
	<input type="hidden" name="cpp_header_image" value="http://sample_site.com/images/product1.jpg">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="handling" value="0">
	<input type="hidden" name="cancel_return" value="http://sample_site.com/cancel.php">
	<input type="hidden" name="return" value="http://sample_site.com/success.php">
	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	</div>
	</div>
</body>
</html>