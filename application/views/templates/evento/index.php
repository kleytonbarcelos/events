<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title></title>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>											<!-- JQUERY 1.11.3 -->

	<script src='<?=base_url()?>assets/libs/moment/min/moment-with-locales.min.js'></script>														<!-- MOMENT JS -->

	<!-- <script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script> -->																<!-- JS LOCAL -->

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


	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-fileinput/css/fileinput.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/plugins/purify.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/themes/fa/theme.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-fileinput/js/locales/pt-BR.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/ckeditor/config.js"></script>


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

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/summernote/dist/summernote.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/dist/summernote.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/dist/lang/summernote-pt-BR.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/libs/summernote/config.js"></script>

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

	<!-- Fonts -->
	<link href="<?=base_url()?>assets/fonts/Josefin_Sans/style.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/logo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		body
		{
			background:url('<?=base_url()?>assets/img/1.jpg');
			font-family: 'Josefin Sans', sans-serif;
			font-size: 16px;
		}
	</style>
	
	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var base_url_controller = '<?=base_url().$this->router->fetch_class()?>/';
	</script>
</head>
<body>
	<br>
    <div class="container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand" href="javascript:void(0);">
					<img src="<?=base_url()?>assets/img/logo-black-m.png">
					<!-- <div class="logo_branca"><i class="fa fa-lock"></i> <span class="inscricao">Inscrição</span><span class="segura">Segura</span><span class="com">.com</span></div> -->
				</a>
				<ul class="nav navbar-nav pull-right">
					<li class="">
						<a href="javascript:history.go(-1);"><i class="fa fa-arrow-left"></i> Voltar</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="panel panel-default">
			<div class="panel-body">
				<?=$conteudo?>
			</div>
		</div>
	</div>
</body>
</html>
