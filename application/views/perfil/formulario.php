<?php
	$titulo_formulario = ( $this->router->fetch_method() == 'cadastrar' ) ? '<strong><i class="fa fa-plus-square"></i>&nbsp;Pefil</strong><span class="pull-right">v. 3.03.01</span>' : '<strong><i class="glyphicon glyphicon-edit"></i>&nbsp;Pefil</strong>';
?>
<?=form_open_multipart('clientes/salvar', array('id'=>'formPerfil', 'role'=>'form'))?>
	<input type="hidden" id="id" name="id" data-field-db="id" value="<?=$this->session->dados_usuario->id?>">
	<div class="col-md-12">
		<h4><?=$titulo_formulario?></h4>
		<hr>
		<div class="msg"></div>
		<div role="tabpanel">
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active">
					<a href="#dados_pessoais" aria-controls="dados_pessoais" role="tab" data-toggle="tab"><strong><i class="fa fa-user"></i> Dados Pessoais</strong> <small class="cont pull-right"></small></a>
				</li>
				<li role="presentation">
					<a href="#dados_medicos" aria-controls="dados_medicos" role="tab" data-toggle="tab"><strong><i class="fa fa-heart"></i> Dados Médicos</strong> <small class="cont pull-right"></small></a>
				</li>
				<li role="presentation">
					<a href="#dados_adicionais" aria-controls="dados_adicionais" role="tab" data-toggle="tab"><strong><i class="fa fa-th-list"></i> Dados Adicionais</strong> <small class="cont pull-right"></small></a>
				</li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="dados_pessoais">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="txtNome" class="control-label">Nome</label>
								<input type="text" class="form-control" id="txtNome" name="txtNome" data-field-db="<?=sha1('clientes.nome')?>" placeholder="Nome">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtSexo" class="control-label">Sexo</label>
								<select class="form-control" id="txtSexo" name="txtSexo" data-field-db="<?=sha1('clientes.sexo')?>" data-live-search="false" data-style="btn-sm btn-default">
									<option value=""></option>
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
								</select>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtDataNascimento" class="control-label">Data nascimento</label>
								<div class="input-group date datetimepicker-data">
									<input type="text" class="form-control inputmask-data" id="txtDataNascimento" name="txtDataNascimento" data-field-db="<?=sha1('clientes.datanascimento')?>" placeholder="Data nascimento">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtCpf" class="control-label">Cpf</label>
								<input type="text" class="form-control inputmask-cpf" id="txtCpf" name="txtCpf" data-field-db="<?=sha1('clientes.cpf')?>" placeholder="Cpf">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtRg" class="control-label">Rg</label>
								<input type="text" class="form-control" id="txtRg" name="txtRg" data-field-db="<?=sha1('clientes.rg')?>" placeholder="Rg">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtCelular" class="control-label">Celular</label>
								<input type="text" class="form-control inputmask-celular" id="txtCelular" name="txtCelular" placeholder="Celular" data-field-db="<?=sha1('clientes.celular')?>">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtTelefone" class="control-label">Telefone (casa)</label>
								<input type="text" class="form-control inputmask-celular" id="txtTelefone" name="txtTelefone" data-field-db="<?=sha1('clientes.telefone')?>" placeholder="Telefone">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtTelefoneTrabalho" class="control-label">Telefone (trabalho)</label>
								<input type="text" class="form-control inputmask-celular" id="txtTelefoneTrabalho" name="txtTelefoneTrabalho" data-field-db="<?=sha1('clientes.telefonetrabalho')?>" placeholder="Telefone (Trabalho)">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtCep" class="control-label">CEP</label>
								<input type="text" class="form-control inputmask-cep" id="txtCep" name="txtCep" data-field-db="<?=sha1('clientes.cep')?>" placeholder="CEP">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="txtEndereco" class="control-label">Endereço</label>
								<input type="text" class="form-control" id="txtEndereco" name="txtEndereco" data-field-db="<?=sha1('clientes.endereco')?>" placeholder="Endereço">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtNumero" class="control-label">Número</label>
								<input type="text" class="form-control" id="txtNumero" name="txtNumero" data-field-db="<?=sha1('clientes.numero')?>" placeholder="Número">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtComplemento" class="control-label">Complemento</label>
								<input type="text" class="form-control" id="txtComplemento" name="txtComplemento" data-field-db="<?=sha1('clientes.complemento')?>" placeholder="Complemento">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtBairro" class="control-label">Bairro</label>
								<input type="text" class="form-control" id="txtBairro" name="txtBairro" data-field-db="<?=sha1('clientes.bairro')?>" placeholder="Bairro">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-sm">
								<label for="txtCidade" class="control-label">Cidade</label>
								<input type="text" class="form-control" id="txtCidade" name="txtCidade" data-field-db="<?=sha1('clientes.cidade')?>" placeholder="Cidade">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-sm">
								<label for="txtUf" class="control-label">UF</label>
								<select class="form-control" id="txtUf" name="txtUf" data-field-db="<?=sha1('clientes.uf')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goias</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<hr>
					<h3><i class="fa fa-lock"></i> Segurança</h3>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Atenção!</strong> Informe e-mail e senha, para login seguro nos próximos acessos.
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="txtEmail" class="control-label">E-mail</label>
								<div class="input-group">
									<div class="input-group-addon"><strong>@</strong></div>
									<input type="text" class="form-control" id="txtEmail" name="txtEmail" readonly="readonly" data-field-db="<?=sha1('clientes.email')?>" placeholder="E-mail">
								</div>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-sm">
								<label for="txtSenha" class="control-label">Senha</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-key"></i></div>
									<input type="password" class="form-control" id="txtSenha" name="txtSenha" data-field-db="<?=sha1('clientes.senha')?>" placeholder="Senha">
								</div>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-sm">
								<label for="txtSenhaRepetir" class="control-label">Confirmação de Senha</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-key"></i></div>
									<input type="password" class="form-control" id="txtSenhaRepetir" name="txtSenhaRepetir" data-field-db="<?=sha1('clientes.senha')?>" placeholder="Confirmação de Senha">
								</div>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dados_medicos">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtAsma" class="control-label">Possui ASMA?</label>
								<select class="form-control" id="txtAsma" name="txtAsma" data-field-db="<?=sha1('clientes.asma')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtDiabetes" class="control-label">Possui Diabetes?</label>
								<select class="form-control" id="txtDiabetes" name="txtDiabetes" data-field-db="<?=sha1('clientes.diabetes')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtDisturbioCardiaco" class="control-label">Possui disturbio cardíaco</label>
								<select class="form-control" id="txtDisturbioCardiaco" name="txtDisturbioCardiaco" data-field-db="<?=sha1('clientes.disturbiocardiaco')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtDisturbioPressaoAlta" class="control-label">Possui disturbio de pressão alta</label>
								<select class="form-control" id="txtDisturbioPressaoAlta" name="txtDisturbioPressaoAlta" data-field-db="<?=sha1('clientes.disturbiopressaoalta')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtDisturbioGastrico" class="control-label">Possui disturbio gástrico?</label>
								<select class="form-control" id="txtDisturbioGastrico" name="txtDisturbioGastrico" data-field-db="<?=sha1('clientes.disturbiogastrico')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtDisturbioUrinario" class="control-label">Possui disturbio urinário?</label>
								<select class="form-control" id="txtDisturbioUrinario" name="txtDisturbioUrinario" data-field-db="<?=sha1('clientes.disturbiourinario')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtConvulcoes" class="control-label">Possui convulções?</label>
								<select class="form-control" id="txtConvulcoes" name="txtConvulcoes" data-field-db="<?=sha1('clientes.convulcoes')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtPerdaConciencia" class="control-label">Possui perda de conciência?</label>
								<select class="form-control" id="txtPerdaConciencia" name="txtPerdaConciencia" data-field-db="<?=sha1('clientes.perdaconciencia')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtAlergiaMedicamento" class="control-label">Possui alergia à medicamento?</label>
								<select data-resposta-secundaria="true" class="form-control" id="txtAlergiaMedicamento" name="txtAlergiaMedicamento" data-field-db="<?=sha1('clientes.alergiamedicamento')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
								<div><input type="text" class="form-control none" id="txtAlergiaMedicamentoResposta" name="txtAlergiaMedicamentoResposta" data-field-db="<?=sha1('clientes.alergiamedicamentoresposta')?>" placeholder="Qual?"></div>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtOutrasDoencas" class="control-label">Possui outras doenças?</label>
								<select data-resposta-secundaria="true" class="form-control" id="txtOutrasDoencas" name="txtOutrasDoencas" data-field-db="<?=sha1('clientes.outrasdoencas')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
								<div><input type="text" class="form-control none" id="txtOutrasDoencasResposta" name="txtOutrasDoencasResposta" data-field-db="<?=sha1('clientes.outrasdoencasresposta')?>" placeholder="Qual?"></div>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtUsoRegularMedicamento" class="control-label">Usa medicamento regularmente?</label>
								<select data-resposta-secundaria="true" class="form-control" id="txtUsoRegularMedicamento" name="txtUsoRegularMedicamento" data-field-db="<?=sha1('clientes.usoregularmedicamento')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
								<div><input type="text" class="form-control none" id="txtUsoRegularMedicamentoResposta" name="txtUsoRegularMedicamentoResposta" data-field-db="<?=sha1('clientes.usoregularmedicamentoresposta')?>" placeholder="Qual?"></div>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtRestricaoAlimentar" class="control-label">Alguma restrição alimentar?</label>
								<select data-resposta-secundaria="true" class="form-control" id="txtRestricaoAlimentar" name="txtRestricaoAlimentar" data-field-db="<?=sha1('clientes.restricaoalimentar')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
								<div><input type="text" class="form-control none" id="txtRestricaoAlimentarResposta" name="txtRestricaoAlimentarResposta" data-field-db="<?=sha1('clientes.restricaoalimentarresposta')?>" placeholder="Qual?"></div>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtTipoSanguineo" class="control-label">Tipo sanguineo</label>
								<select class="form-control" id="txtTipoSanguineo" name="txtTipoSanguineo" data-field-db="<?=sha1('clientes.tiposanguineo')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value="">Não sei</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dados_adicionais">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtPlanoSaude" class="control-label">Possui plano de saúde?</label>
								<select data-resposta-secundaria="true" class="form-control" id="txtPlanoSaude" name="txtPlanoSaude" data-field-db="<?=sha1('clientes.planosaude')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="nao">Não</option>
									<option value="sim">Sim</option>
								</select>
								<div><input type="text" class="form-control none" id="txtPlanoSaudeResposta" name="txtPlanoSaudeResposta" data-field-db="<?=sha1('clientes.planosauderesposta')?>" placeholder="Qual?"></div>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="txtPessoaProxima" class="control-label">Pessoa próxima (parente/amigo)</label>
								<input type="text" class="form-control" id="txtPessoaProxima" name="txtPessoaProxima" data-field-db="<?=sha1('clientes.pessoaproxima')?>" placeholder="Pessoa próxima (parente/amigo)">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtPessoaProximaTelefone" class="control-label">Telefone</label>
								<input type="text" class="form-control inputmask-celular" id="txtPessoaProximaTelefone" name="txtPessoaProximaTelefone" data-field-db="<?=sha1('clientes.pessoaproximatelefone')?>" placeholder="Telefone">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-group-sm">
								<label for="txtPessoaProximaTelefone" class="control-label">Celular</label>
								<input type="text" class="form-control inputmask-celular" id="txtPessoaProximaCelular" name="txtPessoaProximaCelular" data-field-db="<?=sha1('clientes.pessoaproximacelular')?>" placeholder="Celular">
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group form-group-sm">
								<label for="txtObservacao" class="control-label">Deseja relatar alguma observação?</label>
								<textarea class="form-control" id="txtObservacao" rows="5" name="txtObservacao" data-field-db="<?=sha1('clientes.observacao')?>" placeholder="Deseja relatar alguma observação?"><?=set_value('txtObservacao')?></textarea>
								<small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
							    <label for="txtCamisa" class="control-label">Camisa</label>
								<select class="form-control" id="txtCamisa" name="txtCamisa" data-field-db="<?=sha1('clientes.camisa')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
									<option value=""></option>
									<option value="P">P</option>
									<option value="M">M</option>
									<option value="G">G</option>
									<option value="GG">GG</option>
									<option value="XG">XG</option>
								</select>
							    <small class="msg-erro text-danger"></small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Salvar</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function getvaluesinputs(controller, id)
		{
			$.ajax(
			{
				url: base_url+controller+'/getvaluesinputs',
				type: 'POST',
				data: 'id='+id,
				dataType: 'json',
				success: function(data)
				{
					$.each(data.inputs, function(input, value)
					{
						$element = $('[data-field-db="'+input+'"]');
						if( $element.length )
						{
							if( $element.prop('type') == 'checkbox' )
							{
								console.log($element.attr('name')+' (checkbox): '+value);
								console.log('CHECK: '+value);
								if(value==1)
								{
									$element.prop('checked', true);
								}
								else
								{
									$element.prop('checked', false);
								}
							}
							else if( $element.prop('type') == 'select-one' ) //select
							{
								console.log($element.attr('name')+' (select): '+value);
								$element.val(value).trigger('change');
							}
							else // text|hidden|password|textarea|etc...
							{
								if( $element.prop('type') == 'file' )
								{
									console.log($element.attr('name')+' (file): '+value);
									//$element.val(value);
								}
								else if( $element.prop('type') == 'hidden' )
								{
									console.log($element.attr('name')+' (hidden): '+value);
									$element.val(value);
								}
								else if( $element.prop('type') == 'textarea' )
								{
									console.log($element.attr('name')+' (textarea): '+value);
									$element.val(value);
								}
								else
								{
									console.log($element.attr('name')+' (outhers): '+value);
									$element.val(value);
								}
								//############################################################### Exceção para campos TYPEAHEAD
								if( $element.data('callback') )
								{
									$element.trigger('callback');
								}
								if( $element.hasClass('inputmask-data') )
								{
									$element.val( date_to_br(value) );
								}
							}
						}
					});
				}
			});
		}
		setTimeout(function()
		{
			getvaluesinputs('clientes', $('#id').val());
		}, 500);
		function clear_inputs_modal()
		{
			$('#formPerfil').find(':text, :password, :file, textarea').val('');
			$('#formPerfil').find(':radio, :checkbox').attr("checked",false);
			$('#formPerfil').find('select').val('');
			clear_form_erros();
		}
		function clear_form_erros()
		{
			$('.msg').html('');
			$('.msg-erro').html('');
			$('.has-error').removeClass('has-error');
			$('.modal-msg').html('');
			$('.nav-tabs').find('.cont').html(''); // Limpa contadores de erros (NAVTABS)
			$('.nav-tabs a:first').tab('show');
		}
		$(function()
		{
			$('[data-resposta-secundaria="true"]').on('change', function(event)
			{
				event.preventDefault();
				if( $(this).val() == 'sim' )
				{
					$(this).parents('.form-group').eq(0).find('input').show();
				}
				else
				{
					$(this).parents('.form-group').eq(0).find('input').val('').hide();
				}
			});
			$('#formPerfil').on('submit', function(event)
			{
				event.preventDefault();

				clear_form_erros();

				var $form = $(this);
				var $button_submit = $form.find('button:submit');
				$button_submit.data('loading-text', '<i class="fa fa-circle-o-notch fa-spin"></i> Carregando...');
				$button_submit.button('loading');
					//################################################################################################ // FIX ENVIAR FORM NORMAL OU UPLOAD
				var $data;
				var contentType = "application/x-www-form-urlencoded";
				var processData = true;
					//################################################################################################
				if( $form.attr('enctype') == 'multipart/form-data' )
				{
					$('[class^="ckeditor"]').each(function(index, el)
					{
						var name = $(el).attr('name');
						CKEDITOR.instances[name].updateElement();
					});
					
					var $data = new FormData( $form.get(0) );
					var contentType = false;
					var processData = false;
					//################################################################################################
					// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
					$form.find('input:checkbox').each(function(index, el)
					{
						console.log( $(el).prop('checked') );
						if( $(el).prop('checked') == false )
						{
							value = ($(el).data('value')) ? $(el).data('value') : 'off';
							$(el).prop('value', value);
							$(el).prop('checked', false);
							$data.append( $(el).prop('name'), 0 );
						}
						else
						{
							value = ($(el).data('value')) ? $(el).data('value') : 'on';
							$(el).prop('value', value);
							$(el).prop('checked', true);
							$data.append( $(el).prop('name'), 1 );
						}
					});
					//################################################################################################
					//$data.append('txtCAMPO', 'txtCAMPO_VALUE');
				}
				else
				{
					//################################################################################################
					// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
					var $data = $form.serialize()+'&'+$form.find('input:checkbox').map(function(i, e)
					{
						if( $(e).prop('checked') == false )
						{
							value = ($(e).data('value')) ? $(e).data('value') : 'off';
							$(e).prop('value', value);
							$(e).prop('checked', false);
							return $(e).prop('name')+'=0';
						}
						else
						{
							value = ($(e).data('value')) ? $(e).data('value') : 'on';
							$(e).prop('value', '1');
							$(e).prop('checked', true);
						}
					}).get().join('&');
					//################################################################################################
				}
				$.ajax(
				{
					url: $form.attr('action'),
					type: $form.attr('method'),
					data: $data,
					dataType: 'json',
					cache : false,
					contentType: contentType,
					processData: processData,
				})
				.done(function(data) //success
				{
					//console.log("success");
					$button_submit.button('reset');

					if(data.status == 1)
					{
						//alert_success('.msg', data.msg);
						alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);
						if(data.acao=='cadastrar')
						{
							window.location.href=base_url_controller;
						}
					}
					else
					{
						var LinkNavTabs = '';
						var cont = 0;
						var msg = '';
						$.each(data.erros, function(campo, valor)
						{
							var Input = $('[name='+campo+']');
							//Input.nextAll('.msg-erro').eq(0).html(valor);
							Input.parents('.form-group').eq(0).addClass('has-error');
							msg += '<div><small>'+valor+'</small></div>';

							LinkNavTabs = Input.parents('.tab-pane').eq(0).prop('id');
							if(LinkNavTabs)
							{
								var ElementCont = $('.nav-tabs a[aria-controls="'+LinkNavTabs+'"]').find('.cont');
								cont = parseInt( ElementCont.text() );
								if( isNaN(cont) )
								{
									cont=1;
								}
								else
								{
									cont = cont + 1;
								}
								ElementCont.html('<span class="badge">'+cont+'</span>'); //.html('<span class="label label-warning">'+cont+'</span>');
								cont = 0;
							}
						});
						$('.msg')
						.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
						.show();

						if(LinkNavTabs)
						{
							$element = null;
							$tab = null;
							$('.nav-tabs').find('.cont').each(function(index, el)
							{
								if( $(el).text().length > 0 )
								{
									$element = $(el);
									return false;
								}
							});
							//console.log('tab: '+$element.parents('a').attr('aria-controls'));
							$element.parents('a').tab('show');
						}
					}
				})
				.fail(function()
				{
					//console.log("error");
					$button_submit.button('reset');
				})
				.always(function()
				{
					//console.log("complete");
					$button_submit.button('reset');
				});
			});
		});
	</script>
<?=form_close()?>