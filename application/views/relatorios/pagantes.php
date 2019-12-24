<h4><i class="fa fa-th-list"></i> Relatório - Pagantes</h4>
<h5><strong><i class="fa fa-tag"></i> Evento:</strong> <?=$evento->nome?></h5>
<hr>
<table id="aaa" 
	data-toggle="table"

	data-search="true"
	data-search-align="left"

	data-show-columns="true"
	data-show-export="true"
    data-show-toggle="true"
    data-show-columns="true"

	data-pagination="true"

	data-icons-prefix="fa"
	data-icons="icons"
>
	<thead>
		<tr>
			<th data-sortable="true">Nome</th>
			<th data-sortable="true" data-visible="false">Cpf</th>
			<th data-sortable="true" data-visible="false">E-mail</th>
			<th data-sortable="true" data-visible="false">Celular</th>
			<th data-sortable="true" data-visible="false">Cidade</th>
			<th data-sortable="true" data-align="center">Status</th>
			<th data-sortable="true" data-halign="center" data-formatter="sumFormatter">R$</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$subtotal = 0;
			$total = 0;

			foreach ($dados as $key => $value)
			{
				$status = ($value->dados_fatura->status =='regular') ? '<span class="font-11 label label-success">Pago</span>' : '<span class="font-11 label label-warning">Pendente</span>';
				echo '
					<tr>
						<td>'.$value->nome.'</td>
						<td>'.$value->cpf.'</td>
						<td>'.$value->email.'</td>
						<td>'.$value->celular.'</td>
						<td>'.$value->cidade.'-'.$value->uf.'</td>
						<td>'.$status.'</td>
						<td class="text-center">'.decimal_to_br($value->dados_fatura->valor).'</td>
					</tr>
				';
				$subtotal += $value->dados_fatura->valor;
			}
			$total = $subtotal;
		?>
	</tbody>
</table>
<br>
<table data-toggle="table">
	<tbody>
		<tr>
			<td class="active" align="right">
				<div style="text-align: right;font-size:12px;">Nesta página (R$)</div>
				<div style="text-align: right;font-size:16px;">Total Geral (R$)</div>
			</td>
			<td class="active" align="left" style="padding-left: 20px;width: 150px;">
				<div style="text-align: left;font-size:12px;"><strong>R$ <span class="total"></span></strong></div>
				<div style="text-align: left;font-size:16px"><strong>R$ <span class="total_geral"></span></strong></div>
			</td>
		</tr>
	</tbody>
</table>
<br>
<a class="btn btn-default btn-sm" href="javascript:history.go(-1);"><i class="fa fa-arrow-left"></i> Voltar</a>
<a class="btn btn-default btn-sm" href="javascript:void(0);" onclick="$.print('.main');"><i class="fa fa-print"></i> Imprimir</a>
<script type="text/javascript">
	var total = 0;
	var total_geral = <?=$total?>;
	$('.total_geral').html( moeda_us_to_br(total_geral.toFixed(2)) );

	$('table').on('all.bs.table', function()
	{
		total = 0;
	});
	function sumFormatter(value)
	{
		num = value.replace(',', '.');
		total += parseInt(num);
		$('.total').html( moeda_us_to_br(total.toFixed(2)) );
		return value;
	}
	function moeda_us_to_br(valor)
	{
		valor = valor.toString().replace(/\D/g,"");
		valor = valor.toString().replace(/(\d)(\d{8})$/,"$1.$2");
		valor = valor.toString().replace(/(\d)(\d{5})$/,"$1.$2");
		valor = valor.toString().replace(/(\d)(\d{2})$/,"$1,$2");
		return valor;
	}
</script>