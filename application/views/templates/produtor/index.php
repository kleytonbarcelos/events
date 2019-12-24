<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">

	<title>Painel de Controle</title>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>

	<script src="<?=base_url()?>assets/libs/moment/min/moment-with-locales.min.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/libs/bootstrap/js/html5shiv.min.js"></script>
		<script src="<?=base_url()?>assets/libs/bootstrap/js/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?=base_url()?>assets/css/switch.css">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-table/dist/bootstrap-table.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/locale/bootstrap-table-pt-BR.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>
	<script src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/tableExport.js"></script>


	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-fileinput/css/fileinput.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/purify.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/themes/fa/theme.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/locales/pt-BR.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/config.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/config.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/fancyBox-3.0/dist/jquery.fancybox.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/fancyBox-3.0/dist/jquery.fancybox.min.js"></script>


	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.print/jQuery.print.js"></script>
	
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css">
	<script src="<?=base_url()?>assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-select/config.js"></script>

	<script src="<?=base_url()?>assets/libs/speakingurl/speakingurl.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/config.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
	<script src="<?=base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-touchspin/config.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/config.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/config.js"></script>

	<script src="<?=base_url()?>assets/libs/jquery-price-format/jquery.price_format.min.js"></script>
	<script src="<?=base_url()?>assets/libs/jquery-price-format/config.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/alertifyjs/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/alertifyjs/css/themes/default.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/alertifyjs/alertify.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/alertifyjs/config.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/iosCheckbox/iosCheckbox.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/iosCheckbox/iosCheckbox.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/iosCheckbox/config.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/css.css">

	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var base_url_controller = '<?=base_url().$this->router->fetch_class()?>/';
	</script>
</head>
<body>
	<style type="text/css">
		body
		{
			min-height: 2000px;
			padding-top: 70px;
			/*background-color: #fafafa;*/
		}
		.navbar-brand
		{
			margin-top: -4px !important;
			margin-left: -7px !important;
		}
		.main
		{
			padding-top: 12px;
		}
	</style>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url()?>">
						<img src="<?=base_url()?>assets/img/logo-black-m.png">
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="<?=base_url()?>home"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="<?=base_url()?>eventos"><i class="fa fa-th-list"></i> Eventos</a></li> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?=$this->session->dados_usuario->nome?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>perfil"><i class="fa fa-user"></i> Perfil</a></li>
								<li><a href="<?=base_url()?>configuracoes"><i class="fa fa-cog"></i> Configurações</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?=base_url()?>logoff"><i class="fa fa-power-off"></i> Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?=breadcrumb($this->router->fetch_class(), $this->router->fetch_method())?>
		<div class="row">
			<div class="sidebar col-md-3">
				<?php $this->load->view('templates/produtor/sidebar'); ?>
			</div>
			<div class="col-md-9 main">
				<?=$conteudo?>
			</div>
		</div>
	</div>
	<!-- ####################################################################################################### -->
	<!-- ####################################################################################################### -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/config.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-table/config.css">
</body>
</html>