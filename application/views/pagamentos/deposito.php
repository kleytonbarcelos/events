<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Depósito Bancário</title>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/functions.js"></script>

	<!-- BOOTSTRAP 3.7.3 -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap-theme.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/font-awesome/css/font-awesome.min.css">

	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var base_url_controller = '<?=base_url().$this->router->fetch_class()?>/';
	</script>
</head>
<body>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-credit-card"></i> DEPÓSITO OU TRANSFERÊNCIA BANCÁRIA</h3>
				</div>
				<div class="panel-body">
					<br>
					<div class="text-center"><img src="<?=base_url()?>assets/img/logocaixa.jpg"></div>
					<br>
					<table class="table table-striped table-hover table-bordered table-condensed">
						<tbody>
							<tr>
								<td><strong>AGÊNCIA:</strong></td><td>0557</td>
							</tr>
							<tr>
								<td><strong>OPERAÇÃO:</strong></td><td>001</td>
							</tr>
							<tr>
								<td><strong>CONTA CORRENTE:</strong></td><td>7134-7</td>
							</tr>
							<tr>
								<td><strong>CPF:</strong></td><td>002.279.877-30</td>
							</tr>
							<tr>
								<td><strong>TITULAR:</strong></td><td>JORGE ADRIANO PEIXOTO DE OLIVEIRA</td>
							</tr>
							<tr>
								<td><strong>VALOR:</strong></td><td>R$ <span class="valor_fatura"><?=$dados_evento->valor?></span></td>
							</tr>
						</tbody>
					</table>
					<hr>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><i class="fa fa-exclamation-triangle"></i> Aviso!</strong>
						<br><br>
						Após o depósito ou transferência, enviar um e-mail para <a href="mailto:contatoecotrilhas@gmail.com"><strong>contatoecotrilhas@gmail.com</strong></a> com os seguintes dados:
						<br><br>
						<p>NOME: <strong><?=$dados_cliente->nome?></strong></p>
						<p>CPF: <strong><?=$dados_cliente->cpf?></strong></p>
						<p>INSCRIÇÃO: <strong><?=$dados_fatura->id?></strong></p>
						<p>COMPROVANTE: <strong>Foto ou comprovante escaneado</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		setTimeout(function()
		{
			$('.valor_fatura').text( number_format($('.valor_fatura').text(), 2, ',', '.') );
		}, 1000);
	</script>
</body>
</html>