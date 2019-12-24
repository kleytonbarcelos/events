<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?=$evento->nome?></title>


	<!-- ################################################################################################# -->
	<!-- ####################################   TAGS FACEBOOK (Início) ################################### -->
	<?php
		$og_image = base_url().'assets/uploads/'.$evento->banner;
		$og_image_attr = getimagesize($og_image);
	?>
	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="<?=base_url().$evento->url?>">
	<meta property="og:title" content="<?=$evento->nome?>">
	<meta property="og:site_name" content="Inscrição Segura">
	<meta property="og:description" content="<?=$evento->resumo?>">
	<meta property="og:image" content="<?=$og_image?>">
	<meta property="og:image:type" content="<?=$og_image_attr['mime']?>">
	<meta property="og:image:width" content="<?=$og_image_attr[0]?>">
	<meta property="og:image:height" content="<?=$og_image_attr[1]?>">

	<!-- CASO SEJA UM SITE NORMAL -->
	<meta property="og:type" content="website">

	<!-- CASO SEJA UM ARTIGO -->
	<!-- <meta property="og:type" content="article">
	<meta property="article:author" content="Autor do artigo">
	<meta property="article:section" content="Seção do artigo">
	<meta property="article:tag" content="Tags do artigo">
	<meta property="article:published_time" content="date_time"> -->
	<!-- ################################################################################################# -->
	<!-- ################################################################################################# -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/css.css">

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/functions.js"></script>

	<script src='<?=base_url()?>assets/libs/moment/min/moment-with-locales.min.js'></script>														<!-- MOMENT JS -->

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>				<!-- JQUERY INPUTMASK (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery.inputmask/config.js"></script>											<!-- JQUERY INPUTMASK CONFIG (JS) -->

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">	<!-- BOOTSTRAP-DATETIMEPICKER (CSS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>		<!-- BOOTSTRAP-DATETIMEPICKER (JS) -->
	<script type="text/javascript" src="<?=base_url()?>assets/libs/bootstrap-datetimepicker/config.js"></script>									<!-- BOOTSTRAP-DATETIMEPICKER (JS - CONFIG) -->

	<script type="text/javascript" src="<?=base_url()?>/assets/libs/js-cookie/src/js.cookie.js"></script>


	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/jquery-toast-plugin/config.css">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery-toast-plugin/dist/jquery.toast.min.js"></script>


	<!-- BOOTSTRAP 3.7.3 -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap-theme.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libs/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/Passion_One/style.css">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/evento.css">

	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var base_url_controller = '<?=base_url().$this->router->fetch_class()?>/';
		Cookies.set('evento_id', <?=$evento->id?>);
		Cookies.set('evento_nome', '<?=$evento->nome?>');
		Cookies.set('evento_status', '<?=$evento->status?>');
		Cookies.set('evento_valor', <?=$evento->valor?>);
	</script>
</head>
<body>
	<div class="menu">
		<img class="logo" src="<?=base_url()?>assets/img/logo-black-m.png">
		<div class="inscrever">
			<a class="btn btn-sm btn-success btn_inscricao" role="button"><i class="fa fa-edit"></i> Inscrever</a>
		</div>
	</div>
	<div class="conteudo">
		<div class="line">
			<h1><?=$evento->nome?></h1>
			<div><?=$evento->resumo?></div>
		</div>
		<div class="line line-banner">
			<img src="<?=base_url().'assets/uploads/'.$evento->banner?>" class="img-responsive">
		</div>
		<div class="line">
			<h3><i class="fa fa-map-marker"></i> Local</h3>
			<?=$evento->local?>
		</div>
		<div class="line">
			<h3><i class="fa fa-th-list"></i> Descrição do evento</h3>
			<?=$evento->descricao?>
		</div>
	</div>
	<div class="modal fade" id="modalIdentificacao">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-user"></i> Identificação</h4>
				</div>
				<div class="modal-body">
					<div class="row row-identificacao margin-top-20">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">JÁ SOU CADASTRADO</h3>
								</div>
								<div class="panel-body" style="min-height: 220px;">
									<?=form_open_multipart('login/verifica', array('id'=>'formLogin', 'class'=>'formajax', 'role'=>'form', 'data-callback'=>'true'))?>
									<div class="row">
										<div class="col-md-12">
											<div class="msg"></div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group form-group-sm">
														<label for="txtUsuario" class="control-label">E-mail</label>
														<input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="E-mail">
														<small class="msg-erro text-danger"></small>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group form-group-sm">
														<label for="txtSenha" class="control-label">Senha</label>
														<input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Senha">
														<small class="msg-erro text-danger"></small>
													</div>
												</div>
											</div>
											<script type="text/javascript">
												$(function()
												{
													$('#formLogin').bind('callback', function(event, data)
													{
														var form_send = '#'+$(this).attr('id');
														if(data.status == 1)
														{
															if(data.cliente_tipo=='cliente')
															{
																Cookies.set('cliente_id', data.cliente_id);
																Cookies.set('cliente_nome', data.cliente_nome);
																Cookies.set('cliente_primeironome', data.cliente_primeironome);
																Cookies.set('cliente_sobrenome', data.cliente_sobrenome);
																Cookies.set('cliente_email', data.cliente_email);
																Cookies.set('cliente_tipo', data.cliente_tipo);
																Cookies.set('cliente_endereco', data.cliente_endereco);
																Cookies.set('cliente_numero', data.cliente_numero);
																Cookies.set('cliente_complemento', data.cliente_complemento);
																Cookies.set('cliente_bairro', data.cliente_bairro);
																Cookies.set('cliente_cidade', data.cliente_cidade);
																Cookies.set('cliente_uf', data.cliente_uf);
																Cookies.set('cliente_cep', data.cliente_cep);
																Cookies.set('cliente_celular', data.cliente_celular);
																Cookies.set('cliente_telefone', data.cliente_telefone);
																Cookies.set('cliente_telefonetrabalho', data.cliente_telefonetrabalho);

																$('#modalIdentificacao').modal('hide');

																check_inscricao();
															}
															else
															{
																$.toast(
																{
																	text: 'Você não pode se inscrever neste evento com esse tipo de usuário. Cadastre-se como cliente para concluir essa operação.',
																	icon: 'error',
																	position: 'top-right',
																	hideAfter: 10000,
																	//loader: false,
																});
															}
														}
														else
														{
															if(data.erros)
															{
																formajaxerros(form_send, data.erros);
															}
															else
															{
																$(form_send).find('.msg')
																.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.msg+'</div>')
																.show();
															}
														}
													});
												});
											</script>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="pull-left"><small><i class="fa fa-lock"></i> Esqueceu sua senha? <a target="_blanck" href="<?=base_url()?>login/recuperacaodesenha">Clique aqui.</a></small></div>
											<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-sign-in"></i> Login</button>
										</div>
									</div>
									<?=form_close()?>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="border-left: 1px solid #fafafa;">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">QUERO ME CADASTRAR</h3>
								</div>
								<div class="panel-body" style="min-height: 220px;">
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-info">
												<strong>Aviso!</strong> Caso você ainda não tenha cadastro, clique no botão abaixo para continuar.
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-success pull-right" data-toggle="modal" href="#modalCadastro"><i class="fa fa-plus-square"></i> Preencher Cadastro</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalCadastro">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<script type="text/javascript">
					$(function()
					{
						$('#formCadastro').bind('callback', function(event, data)
						{
							if(data.status == 1 && data.acao == 'cadastrar' )
							{
								Cookies.set('cliente_id', data.cliente_id);
								Cookies.set('cliente_nome', data.cliente_nome);
								Cookies.set('cliente_primeironome', data.cliente_primeironome);
								Cookies.set('cliente_sobrenome', data.cliente_sobrenome);
								Cookies.set('cliente_email', data.cliente_email);
								Cookies.set('cliente_tipo', data.cliente_tipo);
								Cookies.set('cliente_endereco', data.cliente_endereco);
								Cookies.set('cliente_numero', data.cliente_numero);
								Cookies.set('cliente_complemento', data.cliente_complemento);
								Cookies.set('cliente_bairro', data.cliente_bairro);
								Cookies.set('cliente_cidade', data.cliente_cidade);
								Cookies.set('cliente_uf', data.cliente_uf);
								Cookies.set('cliente_cep', data.cliente_cep);
								Cookies.set('cliente_celular', data.cliente_celular);
								Cookies.set('cliente_telefone', data.cliente_telefone);
								Cookies.set('cliente_telefonetrabalho', data.cliente_telefonetrabalho);

								$('#modalCadastro').modal('hide');
								$('#modalIdentificacao').modal('hide');
								finaliza_inscricao();
							}
							else
							{
								formajaxerros('#'+$(this).attr('id'), data.erros);
							}
						});
					});
				</script>
				<?=form_open_multipart('clientes/salvar', array('id'=>'formCadastro', 'class'=>'formajax', 'role'=>'form', 'data-callback'=>'true'))?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Inscrição</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id" data-field-db="id" value="">
					<input type="hidden" id="evento_id" name="evento_id" data-field-db="id" value="<?=$evento->id?>">
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
											<input type="text" class="form-control" id="txtEndereco" name="txtEndereco" data-field-db="<?=sha1('endereco')?>" placeholder="Endereço" value="<?=set_value('txtEndereco')?>">
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
											<input type="text" class="form-control" id="txtComplemento" name="txtComplemento" data-field-db="<?=sha1('complemento')?>" placeholder="Complemento" value="<?=set_value('txtComplemento')?>">
											<small class="msg-erro text-danger"></small>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group form-group-sm">
											<label for="txtBairro" class="control-label">Bairro</label>
											<input type="text" class="form-control" id="txtBairro" name="txtBairro" data-field-db="<?=sha1('bairro')?>" placeholder="Bairro" value="<?=set_value('txtBairro')?>">
											<small class="msg-erro text-danger"></small>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-sm">
											<label for="txtCidade" class="control-label">Cidade</label>
											<input type="text" class="form-control" id="txtCidade" name="txtCidade" data-field-db="<?=sha1('cidade')?>" placeholder="Cidade" value="<?=set_value('txtCidade')?>">
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
									<div class="col-md-6">
										<div class="form-group form-group-sm">
											<label for="txtEmail" class="control-label">E-mail</label>
											<div class="input-group">
												<div class="input-group-addon"><strong>@</strong></div>
												<input type="text" class="form-control lowercase" id="txtEmail" name="txtEmail" data-field-db="<?=sha1('email')?>" placeholder="E-mail" value="<?=set_value('txtEmail')?>">
											</div>
											<small class="msg-erro text-danger"></small>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-sm">
											<label for="txtSenha" class="control-label">Senha</label>
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-key"></i></div>
												<input type="password" class="form-control" id="txtSenha" name="txtSenha" data-field-db="<?=sha1('clientes.senha')?>" placeholder="Senha" value="<?=set_value('txtSenha')?>">
											</div>
											<small class="msg-erro text-danger"></small>
										</div>
									</div>
									<div class="col-md-3">
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
											<div class="resposta-secundaria display-none"><input type="text" class="form-control" id="txtAlergiaMedicamentoResposta" name="txtAlergiaMedicamentoResposta" data-field-db="<?=sha1('clientes.alergiamedicamentoresposta')?>" placeholder="Qual?" value="<?=set_value('txtAlergiaMedicamentoResposta')?>"></div>
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
											<div class="resposta-secundaria display-none"><input type="text" class="form-control" id="txtOutrasDoencasResposta" name="txtOutrasDoencasResposta" data-field-db="<?=sha1('clientes.outrasdoencasresposta')?>" placeholder="Qual?" value="<?=set_value('txtOutrasDoencasResposta')?>"></div>
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
											<div class="resposta-secundaria display-none"><input type="text" class="form-control" id="txtUsoRegularMedicamentoResposta" name="txtUsoRegularMedicamentoResposta" data-field-db="<?=sha1('clientes.usoregularmedicamentoresposta')?>" placeholder="Qual?" value="<?=set_value('txtUsoRegularMedicamentoResposta')?>"></div>
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
											<div class="resposta-secundaria display-none"><input type="text" class="form-control" id="txtRestricaoAlimentarResposta" name="txtRestricaoAlimentarResposta" data-field-db="<?=sha1('clientes.restricaoalimentarresposta')?>" placeholder="Qual?" value="<?=set_value('txtRestricaoAlimentarResposta')?>"></div>
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
											<div class="resposta-secundaria display-none"><input type="text" class="form-control" id="txtPlanoSaudeResposta" name="txtPlanoSaudeResposta" data-field-db="<?=sha1('clientes.restricaoalimentarresposta')?>" placeholder="Qual?" value="<?=set_value('txtPlanoSaudeResposta')?>"></div>
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
								<div class="row">
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
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div style="margin-bottom: 20px;">
						<input type="checkbox" name="aceite" class="aceite"> <small>Aceito os <a data-toggle="modal" href="#modalTermos">termos de uso</a> deste evento.</small>
						<script type="text/javascript">
							$(function()
							{
								$('#formCadastro [name="aceite"]').click(function()
								{
									if(this.checked == false)
									{
										$('#formCadastro').find('button:submit').attr('disabled', 'disabled');
									}
									else
									{
										$('#formCadastro').find('button:submit').removeAttr('disabled');
									}
								});
							})
						</script>
					</div>
					<button type="submit" class="btn btn-primary btn-sm" disabled><i class="fa fa-save"></i>&nbsp;Salvar</button>
				</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalFinalizaInscricao">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Inscrição</h4>
				</div>
				<div class="modal-body">
					<form name="formPagamento">
						<a class="pull-right btn btn-xs btn-warning" href="javascript:void(0);" onclick="logoff();"><i class="fa fa-sign-out"></i> sair</a>
						<h3>Olá <span class="nome"></span>,</h3>
						Escolha abaixo a opção para concluir sua inscrição.
						<hr>
						<h4>Pedido</h4>
						<span class="evento_nome"></span> - <span class="evento_valor font-bold"></span>
						<hr>
						<h4>Finalizar pedido</h4>
						<br>
						<!-- <div> -->
						<div style="display: none;">
							<input name="txtTipoFatura" value="boleto" type="radio" checked><img src="<?=base_url()?>assets/img/iconeboleto.png">
							&nbsp;
							|
							<strong>R$ <span class="valor_boleto"></span></strong>
							<script type="text/javascript">
								$('.valor_boleto').html( number_format(Cookies.get('evento_valor'),2, ',', '.') );
							</script>
						</div>
						<hr>
						<div>
							<input name="txtTipoFatura" value="deposito" type="radio" checked>&nbsp;&nbsp;<img src="<?=base_url()?>assets/img/iconedeposito.png">
							&nbsp;
							|
							<strong>R$ <span class="valor_boleto"></span></strong>
							<script type="text/javascript">
								$('.valor_boleto').html( number_format(Cookies.get('evento_valor'),2, ',', '.') );
							</script>
						</div>
						<hr>
						<div style="display: none;">
							<input name="txtTipoFatura" value="paypal" type="radio"><img src="<?=base_url()?>assets/img/iconepaypal4.png">
							&nbsp;
							<select name="parcelas_paypal">
								<option value="1">1x</option>
								<option value="2">2x</option>
								<option value="3">3x</option>
								<option value="4">4x</option>
								<option value="5">5x</option>
								<option value="6">6x</option>
								<option value="7">7x</option>
								<option value="8">8x</option>
								<option value="9">9x</option>
								<option value="10">10x</option>
							</select>
							&nbsp;
							|
							<strong>R$ <span class="valor_paypal"></span></strong>
							<script type="text/javascript">
								$('[name="parcelas_paypal"]').on('change', function(event)
								{
									event.preventDefault();
									setTimeout(function()
									{
										$('#formPaypal').find('[name="amount"]').val( parcelas_paypal(Cookies.get('evento_valor'), $('[name="parcelas_paypal"]').val()) );
										$('.valor_paypal').html( parcelas_paypal(Cookies.get('evento_valor'), $('[name="parcelas_paypal"]').val()) );
									}, 500);
								});
								$('[name="parcelas_paypal"]').trigger('change');
							</script>
							<?php
								// $tmp = explode(' ', $cliente->nome, 2);
								// $cliente->nome = $tmp[0];
								// $cliente->sobrenome = $tmp[1];
								$sandbox = false;
								$form_action = ($sandbox) ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
								$form_business = ($sandbox) ? 'contato-facilitator@pixdata.com.br' : 'contato@pixdata.com.br';
							?>
						</div>
						<div style="margin-bottom: 20px;">
							<input type="checkbox" name="aceite" class="aceite"> <small>Aceito os <a data-toggle="modal" href="#modalTermos">termos de uso</a> deste evento.</small>
							<script type="text/javascript">
								$(function()
								{
									$('#modalFinalizaInscricao [name="aceite"]').click(function()
									{
										if(this.checked == false)
										{
											$('.btn_criarfatura').attr('disabled', 'disabled');
										}
										else
										{
											$('.btn_criarfatura').removeAttr('disabled');
										}
									});
								})
							</script>
						</div>
						<a class="btn btn-primary btn-sm btn_criarfatura" data-fatura_tipo="" disabled><i class="fa fa-save"></i>&nbsp;Finalizar</a>
					</form>
					<form id="formPaypal" name="formPaypal" action="<?=$form_action?>" method="post" style="display: none;">

						<input type="hidden" name="cmd" value="_xclick">

						<input type="hidden" name="business" value="<?=$form_business?>">
						<INPUT TYPE="hidden" name="charset" value="UTF-8">
						<input type="hidden" name="lc" value="BR">
						<input type="hidden" name="country" value="BR">
						<input type="hidden" name="currency_code" value="BRL">

						<input type="hidden" name="item_name" value="">
						<input type="hidden" name="amount" value="">
						<input type="hidden" name="invoice" value="">


						<input type="hidden" name="tx" value="">
						<input type="hidden" name="at" value="pWT9NJtNKdHpIXMXFvLB5Tyni9pXNBaqez-l9ZgZdaTT2vKiLHjTqlRPq6a">



						<input type="hidden" name="cancel_return" value="<?=base_url()?>paypal/cancel">
						<input type="hidden" name="return" value="<?=base_url()?>paypal/return">
						<input type="hidden" name="notify_url" value="<?=base_url()?>paypal/notify">

						<input type="hidden" name="email" value="">
						<input type="hidden" name="first_name" value="">
						<input type="hidden" name="last_name" value="">
						<input type="hidden" name="address1" value="">
						<input type="hidden" name="address2" value="">
						<input type="hidden" name="city" value="">
						<input type="hidden" name="state" value="">
						<input type="hidden" name="zip" value="">
						<input type="hidden" name="night_phone_a" value="">
						<input type="hidden" name="night_phone_b" value="">
						<input type="hidden" name="night_phone_c" value="">

						<!-- <input type="image" name="submit" border="0" src="<?=base_url()?>assets/img/iconepaypal.png"> -->
						<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalTermos">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Termos de uso</h4>
				</div>
				<div class="modal-body">
					<div style="margin:10px;max-height: 400px;overflow-y: scroll;padding:20px;background-color: #fafafa">
						<?php
							$evento->termos = str_replace(
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
										'INSCRICAO',
										'NOME',
										'DATANASCIMENTO',
										'SEXO',
										'CPF',
										'RG',
										'CELULAR',
										'TELEFONE',
										'ENDERECO',
										'NUMERO',
										'COMPLEMENTO',
										'BAIRRO',
										'CIDADE',
										'UF',
										'CEP',
										'CAMISA',


										'NOME',
										'URL',
										'VALOR',
										'',
										'',
										'LOCAL',
										'',
									),
									$evento->termos
							);
							echo $evento->termos;
						echo $evento->termos;
						?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function logoff()
		{
			cookies_remove();
			setTimeout(function()
			{
				location.reload(true);
			}, 500);
		}
		function finaliza_inscricao()
		{
			$('#modalFinalizaInscricao').modal('show');
			$('#modalFinalizaInscricao').find('.nome').html(Cookies.get('cliente_primeironome'));
			$('#modalFinalizaInscricao').find('.evento_nome').html(Cookies.get('evento_nome'));
			$('#modalFinalizaInscricao').find('.evento_valor').html('R$ '+number_format(Cookies.get('evento_valor'), 2, ',', '.'));
		}
		function check_inscricao()
		{
			$.ajax(
			{
				url: base_url+'faturas/check_inscricao',
				type: 'POST',
				data: 'cliente_id='+Cookies.get('cliente_id')+'&evento_id='+Cookies.get('evento_id'),
				dataType: 'json',
				success: function(data)
				{
					if(data.inscricao==1)
					{
						if(data.fatura_status=='pendente')
						{
							$.toast(
							{
								text: data.msg,
								icon: 'info',
								position: 'top-right',
								hideAfter: 10000,
								loader: false,
							});
							finaliza_inscricao();
						}
						else
						{
							$.toast(
							{
								text: data.msg+'<br><br><a style="text-decoration:none;" class="pull-right" href="javascript:void(0);" onclick="logoff();"><i class="fa fa-sign-out"></i> sair</a>',
								icon: 'success',
								position: 'top-right',
								hideAfter: 10000,
								//loader: false,
							});
						}
					}
					else
					{
						finaliza_inscricao();
					}
				}
			});
		}
		$(function()
		{
			$('#txtEmail').on('blur', function(event)
			{
				event.preventDefault();
				$.ajax(
				{
					url: base_url+'clientes/check_email_existente',
					type: 'POST',
					data: 'txtEmail='+$('#txtEmail').val(),
					dataType: 'json',
					success: function(data)
					{
						if(data.status==1)
						{
							$.toast(
							{
								text: data.msg,
								icon: 'error',
								position: 'top-right',
								hideAfter: 10000,
								loader: false,
							});
						}
					}
				});
			});
			$('body').on('click', '.btn_criarfatura', function(event)
			{
				event.preventDefault();
				if( $('.btn_criarfatura').attr('disabled') != 'disabled' )
				{
					var fatura_tipo = $('input[name="txtTipoFatura"]:checked').val();
					
					$.ajax(
					{
						url: base_url+'faturas/criarfatura',
						type: 'POST',
						dataType: 'json',
						data: 'cliente_id='+Cookies.get('cliente_id')+'&evento_id='+Cookies.get('evento_id')+'&fatura_tipo='+fatura_tipo,
						success: function(data)
						{
							console.log(fatura_tipo);
							//Cookies.set('fatura_id', data.fatura_id);
							if(data.status==1)
							{
								if(fatura_tipo=='boleto')
								{
									window.location.href=base_url+'boleto/'+data.fatura_id;
								}
								else if(fatura_tipo=='deposito')
								{
									window.location.href=base_url+'pagamentos/deposito/'+data.fatura_id;
								}
								else if(fatura_tipo=='paypal')
								{
									$('#formPaypal').find('[name="invoice"]').val(Cookies.get('evento_id'));
									$('#formPaypal').find('[name="item_name"]').val(Cookies.get('evento_nome'));

									$('#formPaypal').find('[name="email"]').val(Cookies.get('cliente_email'));
									$('#formPaypal').find('[name="first_name"]').val(Cookies.get('cliente_primeironome'));
									$('#formPaypal').find('[name="last_name"]').val(Cookies.get('cliente_sobrenome'));
									$('#formPaypal').find('[name="address1"]').val(Cookies.get('cliente_endereco')+', '+Cookies.get('cliente_numero')+'. '+Cookies.get('cliente_complemento'));
									$('#formPaypal').find('[name="address2"]').val(Cookies.get('cliente_bairro'));
									$('#formPaypal').find('[name="city"]').val(Cookies.get('cliente_cidade'));
									$('#formPaypal').find('[name="state"]').val(Cookies.get('cliente_uf'));
									$('#formPaypal').find('[name="zip"]').val(Cookies.get('cliente_cep'));
									$('#formPaypal').find('[name="country"]').val('BR');
									$('#formPaypal').find('[name="night_phone_a"]').val(Cookies.get('cliente_celular'));
									$('#formPaypal').find('[name="night_phone_b"]').val(Cookies.get('cliente_telefone'));
									$('#formPaypal').find('[name="night_phone_c"]').val(Cookies.get('cliente_telefonetrabalho'));

									$('#formPaypal').trigger('submit');
								}
							}
							else // Fatura já existente
							{
								$('#modalFinalizaInscricao').find('.msg')
								.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.msg+'</div>')
								.show();
							}
						}
					});
				}
			});
			if( Cookies.get('evento_status') == 'inscricoesencerradas' )
			{
				$('.btn_inscricao').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-edit"></i> Inscrições encerreadas');
			}
			$('body').on('click', '.btn_inscricao', function(event)
			{
				event.preventDefault();

				if( Cookies.get('evento_status') == 'inscricoesencerradas' )
				{
					$.toast(
					{
						text: 'As inscrições para este evento estão encerrada.',
						icon: 'error',
						position: 'top-right',
						hideAfter: 10000,
						loader: false,
					});
					return false;
				}

				if( Cookies.get('cliente_id') )
				{
					check_inscricao();
				}
				else
				{
					$('#modalIdentificacao').modal('show');
				}
			});
		});
	</script>
<!-- 	<a class="btn btn-sm btn-default btn_showcookie"><i class="fa fa-edit"></i> show (cookies)</a>
	<a class="btn btn-sm btn-warning btn_clearcookie"><i class="fa fa-edit"></i> clear (cookies)</a>
	<script type="text/javascript">
		$('body').on('click', '.btn_showcookie', function(event)
		{
			event.preventDefault();
			cookies_show();
		});
		$('body').on('click', '.btn_clearcookie', function(event)
		{
			event.preventDefault();
			cookies_remove();
		});
	</script> -->
</body>
</html>