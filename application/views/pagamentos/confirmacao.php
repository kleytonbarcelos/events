<div class="panel panel-info">
	<div class="panel-heading"><i class="fa fa-th-list"></i> Relatório de Pagamentos - Retono (<?=date('d/m/Y')?>)</div>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Documento</th>
				<th>Data pagamento</th>
				<th>Valor</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($dados as $key => $value)
				{
					echo '
						<tr>
							<td>'.$value->nome.'</td>
							<td>'.$value->email.'</td>
							<td>'.$value->dados_fatura->id.'</td>
							<td>'.date_to_br($value->dados_fatura->datapagamento).'</td>
							<td>R$ '.decimal_to_br($value->dados_fatura->valor).'</td>
						</tr>
					';
				}
			?>
		</tbody>
	</table>
</div>
<a href="<?=base_url()?>home" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>