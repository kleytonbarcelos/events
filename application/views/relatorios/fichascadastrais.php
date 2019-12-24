<div class="row">
	<div class="col-md-6">
		<a class="btn btn-block btn-default btn_relatorio_dados_cadastrais"><i class="fa fa-file-pdf-o fa-fw"></i> Gerar relátório (dados cadastrais)</a>
	</div>
</div>
<script type="text/javascript">
	$(function()
	{
		$('.btn_relatorio_dados_cadastrais').on('click', function(event)
		{
			event.preventDefault();
			mpdf('.dados_cadastrais', 'margin_top=55&title=Relatório - Ficha cadastral&font_size=10');
		});
	});
</script>
<br><br>
<div class="dados_cadastrais" style="display: none;">
	<header>
		<div style="float: right;width: 50px;text-align: right;font-size: 12px;">{PAGENO}</div>
		<div style="border-bottom: 1px solid #ddd;padding-bottom:15px; font-weight: bold;">
			<table>
				<tbody>
					<tr>
						<td valign="top"><img src="<?=base_url()?>assets/uploads/<?=$evento->logo?>" width="100"></td>
						<td valign="top" style="padding-left: 30px;">
							<h3><i class="fa fa-file-o"></i> Relatório - Ficha Cadastral</h3>
							<h4><?=$evento->nome?></h4>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</header>
	<?php
		$pg=1;
		foreach ($dados as $key => $value)
		{
			?>
			<table width="100%">
				<tbody>
					<tr>
						<td style="font-size: 16px;"><span style="font-weight: bold;">Inscrição</span>: <?=$value->inscricao?></td>
						<td style="font-size: 16px;"><span style="font-weight: bold;">Camisa (tamanho): </span><?=$value->camisa?></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="280"><span style="font-weight: bold;">Nome</span>:</td>
						<td><?=$value->nome?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Data de Nascimento</span>:</td>
						<td><?=$value->datanascimento?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Sexo</span>:</td>
						<td><?=$value->sexo?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">CPF</span>:</td>
						<td><?=$value->cpf?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">RG</span>:</td>
						<td><?=$value->rg?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Celular</span>:</td>
						<td><?=$value->celular?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Telefone</span>:</td>
						<td><?=$value->telefone?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Telefone Trabalho</span>:</td>
						<td><?=$value->telefonetrabalho?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">E-mail</span>:</td>
						<td><?=$value->email?></td>
					</tr>
					<tr>
						<td valign="top"><span style="font-weight: bold;">Endereço</span>:</td>
						<td><?=$value->endereco?>, <?=$value->numero?>. <?=$value->complemento?>. <?=$value->bairro?>. <?=$value->cidade?>/<?=$value->uf?> - CEP: <?=$value->cep?></td>
					</tr>
					<tr>
						<td valign="top"><span style="font-weight: bold;">Observação</span>:</td>
						<td><?=$value->observacao?></td>
					</tr>
					<tr>
						<td colspan="2"><div style="border-top: 1px solid #ddd;">&nbsp;</div></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Asma</span></td>
						<td><?=$value->asma?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Diabetes</span></td>
						<td><?=$value->diabetes?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Disturbios Cardíacos</span></td>
						<td><?=$value->disturbiocardiaco?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Disturbios Pressão Alta</span></td>
						<td><?=$value->disturbiopressaoalta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Disturbios Gástrico</span></td>
						<td><?=$value->disturbiogastrico?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Disturbios  Urinário</span></td>
						<td><?=$value->disturbiourinario?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Convulções</span></td>
						<td><?=$value->convulcoes?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Perda de Consciência</span></td>
						<td><?=$value->perdaconciencia?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Alergia à Medicamento</span></td>
						<td><?=$value->alergiamedicamento?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Alergia à Medicamento (Resposta) </span></td>
						<td><?=$value->alergiamedicamentoresposta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Outros Doênças</span></td>
						<td><?=$value->outrasdoencas?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Outros Doênças (Resposta)</span></td>
						<td><?=$value->outrasdoencasresposta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Uso de Medicamento</span></td>
						<td><?=$value->usoregularmedicamento?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Uso de Medicamento (Resposta)</span></td>
						<td><?=$value->usoregularmedicamentoresposta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Restrição Alimentar</span></td>
						<td><?=$value->restricaoalimentar?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Restrição Alimentar (Resposta)</span></td>
						<td><?=$value->restricaoalimentarresposta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Tipo Sanguíneo</span></td>
						<td><?=$value->tiposanguineo?></td>
					</tr>
					<tr>
						<td colspan="2"><div style="border-top: 1px solid #ddd;">&nbsp;</div></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Plano de Saúde</span></td>
						<td><?=$value->planosaude?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Plano de Saúde (Resposta)</span></td>
						<td><?=$value->planosauderesposta?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Pessoa Próxima</span></td>
						<td><?=$value->pessoaproxima?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Pessoa Próxima Telefone</span></td>
						<td><?=$value->pessoaproximatelefone?></td>
					</tr>
					<tr>
						<td><span style="font-weight: bold;">Pessoa Próxima Celular</span></td>
						<td><?=$value->pessoaproximacelular?></td>
					</tr>
				</tbody>
			</table>
			<?php
			//if($pg==10){break;}
			if(sizeof($dados) != $pg){echo '<pagebreak>';}
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