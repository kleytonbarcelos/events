<div class="row">
	<div class="col-md-6">
		<a class="btn btn-block btn-default btn_relatorio_termos_de_uso"><i class="fa fa-file-pdf-o fa-fw"></i> Gerar relátório (termos de uso)</a>
	</div>
</div>
<script type="text/javascript">
	$(function()
	{
		$('.btn_relatorio_termos_de_uso').on('click', function(event)
		{
			event.preventDefault();
			mpdf('.termos_de_uso', 'margin_top=10&margin_left=10&margin_right=10&margin_bottom=10&title=Relatório - Termos de uso');
		});
	});
</script>
<br><br>
<div class="termos_de_uso" style="display: none;">
	<?php
		if($evento->fundo)
		{
			echo '<background>'.base_url().'assets/uploads/'.$evento->fundo.'</background>';
		}
		$pg=1;
		foreach ($dados as $key => $value)
		{
			$termos = str_replace(
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

						'{EVENTO_NOME}',
						'{EVENTO_URL}',
						'{EVENTO_VALOR}',
						'{EVENTO_BANNER}',
						'{EVENTO_LOGO}',
						'{EVENTO_LOCAL}',
						'{EVENTO_DATA}',
					),
					array(
						$value->inscricao,
						$value->nome,
						$value->datanascimento,
						$value->sexo,
						$value->cpf,
						$value->rg,
						$value->celular,
						$value->telefone,
						$value->endereco,
						$value->numero,
						$value->complemento,
						$value->bairro,
						$value->cidade,
						$value->uf,
						$value->cep,


						$evento->nome,
						$evento->url,
						$evento->valor,
						'<img src="assets/uploads/'.$evento->banner.'">',
						'<img src="assets/uploads/'.$evento->logo.'">',
						$evento->local,
						date_to_br($evento->data),
					),
					$evento->termos
				);
			?>
			<div style="clear:both"></div>
			<br><br>
			<?php
				echo $termos;
				//if($pg==10){break;}
				if(sizeof($dados) != $pg){echo '<pagebreak />';}
				$pg++;
		}
	?>
	<footer>
		<p style="border-top:1px solid #ccc;padding-bottom:5px;"></p>
		<table width="100%" style="vertical-align: bottom; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
			<tr>
				<td width="33%" valign="top"><span style="font-weight: bold; font-style: italic;"><!-- {DATE d/m/Y} --></span></td>
				<td width="33%" valign="top" align="center">
					<img src="<?=base_url()?>assets/img/logo-white-m.png">
				</td>
				<td width="33%" valign="top" align="right" style="font-weight: bold; font-style: italic;"><!-- {PAGENO} --></td>
			</tr>
		</table>
	</footer>
</div>