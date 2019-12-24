<h3><i class="fa fa-th-list"></i> Relatórios</h3>
<hr>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Geral</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"><i class="fa fa-file-pdf-o"></i> <a style="text-decoration: none;" class="tipo-relatorios" data-tipo-relatorio="inscritos" data-toggle="modal" href='#modalEventos'>Todos inscritos</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">Pagantes</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"><i class="fa fa-file-pdf-o"></i> <a style="text-decoration: none;" class="tipo-relatorios" data-tipo-relatorio="pagantes" data-toggle="modal" href='#modalEventos'>Pagantes</a></li>
					<li class="list-group-item"><i class="fa fa-file-pdf-o"></i> <a style="text-decoration: none;" class="tipo-relatorios" data-tipo-relatorio="fichascadastrais" data-toggle="modal" href='#modalEventos'>Fichas cadastrais</a></li>
					<li class="list-group-item"><i class="fa fa-file-pdf-o"></i> <a style="text-decoration: none;" class="tipo-relatorios" data-tipo-relatorio="termosdeuso" data-toggle="modal" href='#modalEventos'>Termos de uso</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Não Pagantes</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"><i class="fa fa-file-pdf-o"></i> <a style="text-decoration: none;" class="tipo-relatorios" data-tipo-relatorio="naopagantes" data-toggle="modal" href='#modalEventos'>Não Pagantes</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var tipo = '';
	$(function()
	{
		$('.tipo-relatorios').click(function(event)
		{
			tipo = $(this).data('tipo-relatorio');
			console.log(tipo);
		});
		$('.relatorios').click(function(event)
		{
			var id = $(this).data('evento-id');
			var url = base_url+'relatorios/'+tipo+'/'+id;
			window.open(url, '_blank');
		});
	});
</script>
<script type="text/javascript">
	$(function()
	{

	});
</script>
<div class="modal fade" id="modalEventos">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Selecione um evento para relatório</h4>
			</div>
			<div class="modal-body">
				<br>
				<div class="list-group">
					<?php
						foreach ($eventos as $evento)
						{
							echo '<a href="javascript:void(0);" data-evento-id="'.$evento->id.'" class="list-group-item relatorios"><i class="fa fa-book"></i> '.$evento->nome.'</a>';
						}
					?>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Fechar</button>
			</div>
		</div>
	</div>
</div>