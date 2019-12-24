<?=form_open_multipart('cadastro/salvar', array('id'=>'formInscricao', 'role'=>'form'))?>
	<input type="hidden" id="id" name="id" data-field-db="id" value="">
	<input type="hidden" name="evento_id" data-field-db="id" value="<?=$evento_id?>">
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
							<input type="text" class="form-control uppercase" id="txtNome" name="txtNome" data-field-db="<?=sha1('nome')?>" placeholder="Nome" value="<?=set_value('txtNome')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtSexo" class="control-label">Sexo</label>
							<select class="form-control" id="txtSexo" name="txtSexo" data-field-db="<?=sha1('sexo')?>" data-live-search="false" data-style="btn-sm btn-default">
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
								<input type="text" class="form-control inputmask-data" id="txtDataNascimento" name="txtDataNascimento" data-field-db="<?=sha1('datanascimento')?>" placeholder="Data nascimento" value="<?=set_value('txtDataNascimento')?>">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtCpf" class="control-label">Cpf</label>
							<input type="text" class="form-control inputmask-cpf" id="txtCpf" name="txtCpf" data-field-db="<?=sha1('cpf')?>" placeholder="Cpf" value="<?=set_value('txtCpf')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtRg" class="control-label">Rg</label>
							<input type="text" class="form-control" id="txtRg" name="txtRg" data-field-db="<?=sha1('rg')?>" placeholder="Rg" value="<?=set_value('txtRg')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtCelular" class="control-label">Celular</label>
							<input type="text" class="form-control inputmask-celular" id="txtCelular" name="txtCelular" placeholder="Celular" data-field-db="<?=sha1('celular')?>" value="<?=set_value('txtCelular')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtTelefone" class="control-label">Telefone (casa)</label>
							<input type="text" class="form-control inputmask-telefone" id="txtTelefone" name="txtTelefone" data-field-db="<?=sha1('telefone')?>" placeholder="Telefone" value="<?=set_value('txtTelefone')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtTelefoneTrabalho" class="control-label">Telefone (trabalho)</label>
							<input type="text" class="form-control inputmask-telefone" id="txtTelefoneTrabalho" name="txtTelefoneTrabalho" data-field-db="<?=sha1('telefonetrabalho')?>" placeholder="Telefone (Trabalho)" value="<?=set_value('txtTelefoneTrabalho')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtCep" class="control-label">CEP</label>
							<input type="text" class="form-control inputmask-cep" id="txtCep" name="txtCep" data-field-db="<?=sha1('cep')?>" placeholder="CEP" value="<?=set_value('txtCep')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-sm">
							<label for="txtEndereco" class="control-label">Endereço</label>
							<input type="text" class="form-control uppercase" id="txtEndereco" name="txtEndereco" data-field-db="<?=sha1('endereco')?>" placeholder="Endereço" value="<?=set_value('txtEndereco')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtNumero" class="control-label">Número</label>
							<input type="text" class="form-control" id="txtNumero" name="txtNumero" data-field-db="<?=sha1('numero')?>" placeholder="Número" value="<?=set_value('txtNumero')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtComplemento" class="control-label">Complemento</label>
							<input type="text" class="form-control uppercase" id="txtComplemento" name="txtComplemento" data-field-db="<?=sha1('complemento')?>" placeholder="Complemento" value="<?=set_value('txtComplemento')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtBairro" class="control-label">Bairro</label>
							<input type="text" class="form-control uppercase" id="txtBairro" name="txtBairro" data-field-db="<?=sha1('bairro')?>" placeholder="Bairro" value="<?=set_value('txtBairro')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="txtCidade" class="control-label">Cidade</label>
							<input type="text" class="form-control uppercase" id="txtCidade" name="txtCidade" data-field-db="<?=sha1('cidade')?>" placeholder="Cidade" value="<?=set_value('txtCidade')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="txtUf" class="control-label">UF</label>
							<select class="form-control" id="txtUf" name="txtUf" data-field-db="<?=sha1('uf')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
					<div class="col-md-4">
						<div class="form-group form-group-sm">
							<label for="txtEmail" class="control-label">E-mail</label>
							<div class="input-group">
								<div class="input-group-addon"><strong>@</strong></div>
								<input type="text" class="form-control lowercase" id="txtEmail" name="txtEmail" data-field-db="<?=sha1('email')?>" placeholder="E-mail" value="<?=set_value('txtEmail')?>">
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtSenha" class="control-label">Senha</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="password" class="form-control" id="txtSenha" name="txtSenha" data-field-db="<?=sha1('clientes.senha')?>" placeholder="Senha" value="<?=set_value('txtSenha')?>">
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtSenhaRepetir" class="control-label">Confirmação de Senha</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="password" class="form-control" id="txtSenhaRepetir" name="txtSenhaRepetir" data-field-db="<?=sha1('clientes.senha')?>" placeholder="Confirmação de Senha" value="<?=set_value('txtSenhaRepetir')?>">
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
							<select class="form-control" id="txtAsma" name="txtAsma" data-field-db="<?=sha1('asma')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtDiabetes" name="txtDiabetes" data-field-db="<?=sha1('diabetes')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtDisturbioCardiaco" name="txtDisturbioCardiaco" data-field-db="<?=sha1('disturbiocardiaco')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtDisturbioPressaoAlta" name="txtDisturbioPressaoAlta" data-field-db="<?=sha1('disturbiopressaoalta')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtDisturbioGastrico" name="txtDisturbioGastrico" data-field-db="<?=sha1('disturbiogastrico')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtDisturbioUrinario" name="txtDisturbioUrinario" data-field-db="<?=sha1('disturbiourinario')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtConvulcoes" name="txtConvulcoes" data-field-db="<?=sha1('convulcoes')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select class="form-control" id="txtPerdaConciencia" name="txtPerdaConciencia" data-field-db="<?=sha1('perdaconciencia')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select data-resposta-secundaria="true" class="form-control" id="txtAlergiaMedicamento" name="txtAlergiaMedicamento" data-field-db="<?=sha1('alergiamedicamento')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
								<option value=""></option>
								<option value="nao">Não</option>
								<option value="sim">Sim</option>
							</select>
							<div><input type="text" class="form-control none" id="txtAlergiaMedicamentoResposta" name="txtAlergiaMedicamentoResposta" data-field-db="<?=sha1('clientes.alergiamedicamentoresposta')?>" placeholder="Qual?" value="<?=set_value('txtAlergiaMedicamentoResposta')?>"></div>
						    <small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-group-sm">
						    <label for="txtOutrasDoencas" class="control-label">Possui outras doenças?</label>
							<select data-resposta-secundaria="true" class="form-control" id="txtOutrasDoencas" name="txtOutrasDoencas" data-field-db="<?=sha1('outrasdoencas')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
								<option value=""></option>
								<option value="nao">Não</option>
								<option value="sim">Sim</option>
							</select>
							<div><input type="text" class="form-control none" id="txtOutrasDoencasResposta" name="txtOutrasDoencasResposta" data-field-db="<?=sha1('clientes.outrasdoencasresposta')?>" placeholder="Qual?" value="<?=set_value('txtOutrasDoencasResposta')?>"></div>
						    <small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-sm">
						    <label for="txtUsoRegularMedicamento" class="control-label">Usa medicamento regularmente?</label>
							<select data-resposta-secundaria="true" class="form-control" id="txtUsoRegularMedicamento" name="txtUsoRegularMedicamento" data-field-db="<?=sha1('usoregularmedicamento')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
								<option value=""></option>
								<option value="nao">Não</option>
								<option value="sim">Sim</option>
							</select>
							<div><input type="text" class="form-control none" id="txtUsoRegularMedicamentoResposta" name="txtUsoRegularMedicamentoResposta" data-field-db="<?=sha1('clientes.usoregularmedicamentoresposta')?>" placeholder="Qual?" value="<?=set_value('txtUsoRegularMedicamentoResposta')?>"></div>
						    <small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-sm">
						    <label for="txtRestricaoAlimentar" class="control-label">Alguma restrição alimentar?</label>
							<select data-resposta-secundaria="true" class="form-control" id="txtRestricaoAlimentar" name="txtRestricaoAlimentar" data-field-db="<?=sha1('restricaoalimentar')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
								<option value=""></option>
								<option value="nao">Não</option>
								<option value="sim">Sim</option>
							</select>
							<div><input type="text" class="form-control none" id="txtRestricaoAlimentarResposta" name="txtRestricaoAlimentarResposta" data-field-db="<?=sha1('clientes.restricaoalimentarresposta')?>" placeholder="Qual?" value="<?=set_value('txtRestricaoAlimentarResposta')?>"></div>
						    <small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-group-sm">
						    <label for="txtTipoSanguineo" class="control-label">Tipo sanguineo</label>
							<select class="form-control" id="txtTipoSanguineo" name="txtTipoSanguineo" data-field-db="<?=sha1('tiposanguineo')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
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
							<select data-resposta-secundaria="true" class="form-control" id="txtPlanoSaude" name="txtPlanoSaude" data-field-db="<?=sha1('planosaude')?>"><!--  data-live-search="false" data-style="btn-default btn-sm"> -->
								<option value=""></option>
								<option value="nao">Não</option>
								<option value="sim">Sim</option>
							</select>
							<div><input type="text" class="form-control none" id="txtPlanoSaudeResposta" name="txtPlanoSaudeResposta" data-field-db="<?=sha1('clientes.restricaoalimentarresposta')?>" placeholder="Qual?" value="<?=set_value('txtPlanoSaudeResposta')?>"></div>
						    <small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-sm">
							<label for="txtPessoaProxima" class="control-label">Pessoa próxima (parente/amigo)</label>
							<input type="text" class="form-control" id="txtPessoaProxima" name="txtPessoaProxima" data-field-db="<?=sha1('clientes.pessoaproxima')?>" placeholder="Pessoa próxima (parente/amigo)" value="<?=set_value('txtPessoaProxima')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtPessoaProximaTelefone" class="control-label">Telefone</label>
							<input type="text" class="form-control inputmask-celular" id="txtPessoaProximaTelefone" name="txtPessoaProximaTelefone" data-field-db="<?=sha1('clientes.pessoaproximatelefone')?>" placeholder="Telefone" value="<?=set_value('txtPessoaProximaTelefone')?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group form-group-sm">
							<label for="txtPessoaProximaTelefone" class="control-label">Celular</label>
							<input type="text" class="form-control inputmask-celular" id="txtPessoaProximaCelular" name="txtPessoaProximaCelular" data-field-db="<?=sha1('clientes.pessoaproximacelular')?>" placeholder="Celular" value="<?=set_value('txtPessoaProximaCelular')?>">
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
<!-- 				<div class="row">
					<div class="col-md-12">
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-group-sm">
						    <label for="txtCamisa" class="control-label">Camisa</label>
							<select class="form-control" id="txtCamisa" name="txtCamisa" data-field-db="<?=sha1('camisa')?>">
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
				</div> -->
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Fechar</button>
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Salvar</button>
			</div>
		</div>
	</div>
<?=form_close()?>
<script type="text/javascript">
	function clear_inputs_modal()
	{
		$('#formInscricao').find(':text, :password, :file, textarea').val('');
		$('#formInscricao').find(':radio, :checkbox').attr("checked",false);
		$('#formInscricao').find('select').val('');
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
		$(function()
		{
			$('#formInscricao').on('submit', function(event)
			{
				event.preventDefault();

				clear_form_erros();

				for (var i in CKEDITOR.instances){CKEDITOR.instances[i].updateElement()}

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
					var $data = new FormData( $form.get(0) );
					var contentType = false;
					var processData = false;
					//$data.append('txtCAMPO', 'txtCAMPO_VALUE');
					//################################################################################################
					// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
					$form.find('input:checkbox').each(function(index, el)
					{
						if( $(el).prop('checked') == false )
						{
							$data.append($(el).prop('name'), 0);
						}
						else
						{
							$data.append($(el).prop('name'), 1);
						}
					});
					//################################################################################################
				}
				else
				{
					//################################################################################################
					// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
					var $data = $form.serialize()+'&'+$form.find('input:checkbox').map(function(i, e)
					{
						if( $(e).prop('checked') == false )
						{
							return $(e).prop('name')+'=0';
						}
						else
						{
							return $(e).prop('name')+'=1';
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
				.done(function(data)
				{
					$button_submit.button('reset');

					if(data.status == 1)
					{
						window.location.href=base_url+'boleto/'+data.numerodocumento;
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
								ElementCont.html('<span class="badge">'+cont+'</span>');
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
				.fail(function() //error
				{
					$button_submit.button('reset');
				})
				.always(function() //complete
				{
					$button_submit.button('reset');
				});
			});
		});
	})
</script>