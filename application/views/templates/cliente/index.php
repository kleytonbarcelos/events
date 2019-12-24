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

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>											<!-- JQUERY 1.11.3 -->

	<script src='<?=base_url()?>assets/libs/moment/min/moment-with-locales.min.js'></script>														<!-- MOMENT JS -->

	<script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>																<!-- JS LOCAL -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/functions.js"></script>																<!-- JS LOCAL -->

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap.min.css">														<!-- BOOTSTRAP 3 (CSS) -->
	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap-theme.min.css">										<!-- BOOTSTRAP 3 (CSS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.min.js"></script>											<!-- BOOTSTRAP 3 (JS) -->
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/libs/bootstrap/js/html5shiv.min.js"></script>
		<script src="<?=base_url()?>assets/libs/bootstrap/js/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/font-awesome/css/font-awesome.min.css">													<!-- FONTAWESOME -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-table/dist/bootstrap-table.min.css">							<!-- BOOTSTRA-TABLE (CSS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>							<!-- BOOTSTRA-TABLE (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/locale/bootstrap-table-pt-BR.min.js"></script>				<!-- BOOTSTRA-TABLE (PT-BR) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>	<!-- BOOTSTRA-TABLE (PLUGIN - EXPORT) -->
	<script src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/tableExport.js"></script>														<!-- TABLEEXPORT -->
	<!--<script type="text/javascript" src="http://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script> <-->					<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/tableExport.js"></script>-->												<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/jquery.base64.js"></script>-->											<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script type="text/javascript" src="<?=base_url()?>assets/libs/html2canvas/dist/html2canvas.min.js"></script>-->							<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script type="text/javascript" src="<?=base_url()?>assets/libs/html2canvas/dist/html2canvas.svg.min.js"></script>-->						<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script type="text/javascript" src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/jspdf/libs/sprintf.js"></script>-->				<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script type="text/javascript" src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/jspdf/jspdf.js"></script>-->						<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->
	<!--<script type="text/javascript" src="<?=base_url()?>assets/libs/tableExport.jquery.plugin/jspdf/libs/base64.js"></script>-->					<!-- TABLEEXPORT (BOOTSTRAP-TABLE) -->

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/fancyBox-3.0/dist/jquery.fancybox.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/fancyBox-3.0/dist/jquery.fancybox.min.js"></script>


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
	

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/config.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.js"></script>


	<!-- <link rel="stylesheet" href="dist/switchery.css" />
	<script src="dist/switchery.js"></script> -->


	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.print/jQuery.print.js"></script>
	
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css">
	<script src="<?=base_url()?>assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-select/config.js"></script>

	<script src="<?=base_url()?>assets/libs/speakingurl/speakingurl.min.js"></script>
	
	<script src="<?=base_url()?>assets/libs/jquery-price-format/jquery.price_format.min.js"></script>
	<script src="<?=base_url()?>assets/libs/jquery-price-format/config.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
	<script src="<?=base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap-touchspin/config.js"></script>

<!-- 	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/summernote/dist/summernote.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/dist/summernote.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/dist/lang/summernote-pt-BR.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/config.js"></script> -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">	<!-- BOOTSTRAP-DATETIMEPICKER (CSS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>		<!-- BOOTSTRAP-DATETIMEPICKER (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/config.js"></script>									<!-- BOOTSTRAP-DATETIMEPICKER (JS - CONFIG) -->

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>				<!-- JQUERY INPUTMASK (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/config.js"></script>											<!-- JQUERY INPUTMASK CONFIG (JS) -->

	<link href='<?=base_url()?>assets/libs/fullcalendar/2.9.1/fullcalendar.css' rel='stylesheet' />													<!-- FULL CALENDAR (CSS) -->
	<link href='<?=base_url()?>assets/libs/fullcalendar/2.9.1/fullcalendar.print.css' rel='stylesheet' media='print' />								<!-- FULL CALENDAR (CSS) -->
	<script src='<?=base_url()?>assets/libs/fullcalendar/2.9.1/fullcalendar.min.js'></script>														<!-- FULL CALENDAR (JS) -->
	<script src='<?=base_url()?>assets/libs/fullcalendar/2.9.1/lang/pt-br.js'></script>																<!-- FULL CALENDAR (PT-BR) -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/alertifyjs/css/alertify.min.css">										<!-- ALERTIFY (CSS) -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/alertifyjs/css/themes/default.min.css">									<!-- ALERTIFY (CSS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/alertifyjs/alertify.min.js"></script>											<!-- ALERTIFY (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/alertifyjs/config.js"></script>													<!-- ALERTIFY (CONFIG) -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/css.css">																<!-- CSS LOCAL -->

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
						<!-- <div class="logo_branca"><i class="fa fa-lock"></i> <span class="inscricao">Inscrição</span><span class="segura">Segura</span><span class="com">.com</span></div> -->
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?=$this->session->dados_usuario->nome?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>perfil"><i class="fa fa-user"></i> Perfil</a></li>
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
			<div class="col-md-3">
				<ul class="list-group" style="margin-top:12px;">
					<a class="list-group-item<?php if( $this->controller=='home' || empty($this->controller)){echo ' active';} ?>" href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a>
					<a class="list-group-item<?php if( $this->controller=='inscricoes'){echo ' active';} ?>" href="<?=base_url()?>inscricoes"><i class="fa fa-th-list fa-fw"></i></i>&nbsp; Minhas Inscrições</a>
					<a class="list-group-item<?php if( $this->controller=='perfil'){echo ' active';} ?>" href="<?=base_url()?>perfil"><i class="fa fa-user fa-fw"></i></i>&nbsp; Perfil</a>
				</ul>
			</div>
			<div class="col-md-9">
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