<?php
	$tmp = explode(' ', $cliente->nome, 2);
	$nome = $tmp[0];
	$sobrenome = $tmp[1];
	$cliente->nome = $nome;
	$cliente->sobrenome = $sobrenome;
	
	$sandbox = false;
	$form_action = ($sandbox) ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
?>
<form action="<?=$form_action?>" method="post">
	<input type="hidden" name="business" value="contato@pixdata.com.br">
	<input type="hidden" name="cmd" value="_xclick">
	<INPUT TYPE="hidden" name="charset" value="utf-8">
	<input type="hidden" name="item_name" value="ECOTRILHAS VENDA NOVA DO IMIGRANTE / ES">
	<!--<input type="hidden" name="item_number" value="639548">-->
	<input type="hidden" name="amount" value="">
	<input type="hidden" name="currency_code" value="BRL">
	<input type="hidden" name="invoice" value="639548">

	<input type="hidden" name="cancel_return" value="<?=base_url()?>paypal/cancel_return">
	<input type="hidden" name="return" value="<?=base_url()?>paypal/return">
	<input type="hidden" name="notify_url" value="<?=base_url()?>paypal/notify_url">


	<input type="hidden" name="email" value="<?=$cliente->email?>">
	<input type="hidden" name="first_name" value="<?=$cliente->nome?>">
	<input type="hidden" name="last_name" value="<?=$cliente->sobrenome?>">
	<input type="hidden" name="address1" value="<?=$cliente->endereco.', '.$cliente->numero.'. '.$cliente->complemento?>">
	<input type="hidden" name="address2" value="<?=$cliente->bairro?>">
	<input type="hidden" name="city" value="<?=$cliente->cidade?>">
	<input type="hidden" name="state" value="<?=$cliente->uf?>">
	<input type="hidden" name="zip" value="<?=$cliente->cep?>">
	<input type="hidden" name="country" value="BR">
	<input type="hidden" name="night_phone_a" value="<?=$cliente->celular?>">
	<input type="hidden" name="night_phone_b" value="<?=$cliente->telefone?>">
	<input type="hidden" name="night_phone_c" value="<?=$cliente->telefonetrabalho?>">


	<!-- <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg"> -->
    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>