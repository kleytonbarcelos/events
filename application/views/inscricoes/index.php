<h4><i class="fa fa-th-list"></i> Minhas Inscrições</h4>
<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Inscrição</th>
			<th>Evento</th>
			<th>Status</th>
			<th class="text-center"><i class="fa fa-cogs"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($eventos as $evento)
			{
				if($evento->status =='regular')
				{
					$status = '<span class="label label-success font-center">Regular</span>';
					$acoes .= '<a class="btn btn-primary btn-xs" title="comprovante de inscrição" data-toggle="tooltip" href="javascript:void(0);" onclick="mpdf(\'.comprovante_evento_'.$evento->id.'\', \'margin_top=15&title=Comprovante de inscrição\');"><i class="fa fa-file-pdf-o"></i></a>';
				}
				else
				{
					$status = '<span class="label label-danger">Pendente</span>';
					//$acoes .= '<a class="btn btn-primary btn-xs" title="Gerar novo boleto" data-toggle="tooltip" target="_blank" href="'.base_url().'boletos/imprimir/'.$evento->inscricao.'"><i class="fa fa-barcode"></i></a>';
					$acoes .= '<a class="btn btn-primary btn-xs" title="Gerar novo boleto" data-toggle="tooltip" target="_blank" href="'.base_url().'pagamentos/deposito/'.$evento->inscricao.'"><i class="fa fa-barcode"></i></a>';
				}
				echo '
						<tr>
							<td>'.$evento->inscricao.'</td>
							<td>'.$evento->nome.'</td>
							<td>'.$status.'</td>
							<td class="text-center">'.$acoes.'</td>
						</tr>
				';
				$acoes = '';
			}
		?>
	</tbody>
</table>
<?php
	foreach ($eventos as $evento)
	{
		if($evento->status =='regular')
		{
			?>
			<div class="none comprovante_evento_<?=$evento->id?>">
				<?php
					$evento->comprovanteinscricao = str_replace(
							array(
								'{CLIENTE_INSCRICAO}',
								'{CLIENTE_NOME}',
								'{CLIENTE_DATA_NASCIMENTO}',
								'{CLIENTE_SEXO}',
								'{CLIENTE_CPF}',
								'{CLIENTE_RG}',
								'{CLIENTE_CELULAR}',
								'{CLIENTE_TELEFONE}',
								'{CLIENTE_ENDERECO}',
								'{CLIENTE_NUMERO}',
								'{CLIENTE_COMPLEMENTO}',
								'{CLIENTE_BAIRRO}',
								'{CLIENTE_CIDADE}',
								'{CLIENTE_UF}',
								'{CLIENTE_CEP}',
								'{CLIENTE_CAMISA}',

								'{EVENTO_NOME}',
								'{EVENTO_URL}',
								'{EVENTO_VALOR}',
								'{EVENTO_BANNER}',
								'{EVENTO_LOGO}',
								'{EVENTO_LOCAL}',
								'{EVENTO_DATA}',
							),
							array(
								$evento->inscricao,
								$cliente->nome,
								$cliente->datanascimento,
								$cliente->sexo,
								$cliente->cpf,
								$cliente->rg,
								$cliente->celular,
								$cliente->telefone,
								$cliente->endereco,
								$cliente->numero,
								$cliente->complemento,
								$cliente->bairro,
								$cliente->cidade,
								$cliente->uf,
								$cliente->cep,
								$cliente->camisa,


								$evento->nome,
								$evento->url,
								$evento->valor,
								'<img src="assets/uploads/'.$evento->banner.'">',
								'<img src="assets/uploads/'.$evento->logo.'">',
								$evento->local,
								date_to_br($evento->data),
							),
							$evento->comprovanteinscricao
					);
					echo $evento->comprovanteinscricao;
				?>
				<footer>
					<p style="border-top:1px solid #ccc;padding-bottom:5px;"></p>
					<table width="100%" style="vertical-align: bottom; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
						<tr>
							<td width="33%" valign="top"><span style="font-weight: bold; font-style: italic;"><!-- {DATE d/m/Y} --></span></td>
							<td width="33%" valign="top" class="text-center">
								<img src="<?=base_url()?>assets/img/logo-white-m.png">
							</td>
							<td width="33%" valign="top" align="right" style="font-weight: bold; font-style: italic;"><!-- {PAGENO} --></td>
						</tr>
					</table>
				</footer>
			</div>
			<?php
		}
	}
?>