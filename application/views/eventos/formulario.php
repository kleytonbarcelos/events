<?php
	$titulo_formulario = ( $this->router->fetch_method() == 'cadastrar' ) ? '<strong><i class="fa fa-plus-square"></i>&nbsp;Cadastro de Evento</strong>' : '<strong><i class="glyphicon glyphicon-edit"></i>&nbsp;Editar Evento</strong>';
?>
<script type="text/javascript">
	$(function()
	{
		$('#formEventos').bind('callback', function(event, data)
		{
			if(data.status == 1)
			{
				// $.toast(
				// {
				// 	text: data.msg,
				// 	icon: 'success',
				// 	position: 'top-right',
				// 	hideAfter: 10000,
				// 	loader: false,
				// });
				alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);
				if(data.acao=='cadastrar')
				{
					window.location.href=base_url_controller;
				}
			}
			else
			{
				formajaxerros('#'+$(this).attr('id'), data.erros);
			}
		});
	});
</script>
<label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<br><br>
<?=form_open_multipart('eventos/salvar', array('id'=>'formEventos', 'class'=>'formajax', 'role'=>'form', 'data-callback'=>'true'))?>
	<input type="hidden" id="id" name="id" data-field-db="id" value="<?=$dados->id?>">
	<h4><?=$titulo_formulario?></h4>
	<hr>
	<div class="msg"></div>
	<div role="tabpanel">
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab_geral" aria-controls="tab_geral" role="tab" data-toggle="tab"><strong><i class="fa fa-server"></i> Geral</strong> <small class="cont pull-right"></small></a>
			</li>
			<li role="presentation">
				<a href="#tab_avancado" aria-controls="tab_avancado" role="tab" data-toggle="tab"><strong><i class="fa fa-file"></i> Avançado</strong> <small class="cont pull-right"></small></a>
			</li>
		</ul>
		<div class="tab-content" style="padding: 30px;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;border-left: 1px solid #ddd;">
			<div role="tabpanel" class="tab-pane active" id="tab_geral">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Banner <div class="pull-right"><a class="btn btn-danger btn-xs btn_excluir_banner" href="javascript:void(0);"><i class="fa fa-trash"></i></a></div></h3>
							</div>
							<div class="panel-body">
								<div class="arquivo_atual_banner" style="display:none">
									<div class="file"></div>
								</div>
								<div class="arquivo_novo_banner" style="display:none">
									<div class="form-group">
										<input type="file" class="fileinput" id="txtBanner" name="txtBanner" data-field-db="<?=sha1('eventos.banner')?>" data-show-preview="false" data-show-upload="false" data-show-caption="true" data-preview-file-type="image">
										<small class="msg-erro text-danger"></small>
									</div>
									<div class="alert alert-warning">
										<small>A imagem escolhida deve estar em formato <strong>JPG, GIF, ou PNG</strong> e ter no máximo <strong>2MB</strong>. A dimensão recomendada é de <strong>800 pixels de largura</strong>. Imagens com altura ou largura diferentes destas podem ser redimensionadas.</small>
									</div>
								</div>
								<script type="text/javascript">
									file = '<?=$dados->banner?>';
									if(file)
									{
										$('.arquivo_atual_banner').show().find('.file').html('<a href="'+base_url+'assets/uploads/'+file+'" data-fancybox="images"><img style="max-height:200px !important;" src="'+base_url+'assets/uploads/'+file+'" class="img-responsive"></a>');
									}
									else
									{
										$('.arquivo_novo_banner').show();
									}
									$(function()
									{
										$('.btn_excluir_banner').click(function(event)
										{
											$.ajax(
											{
												url: base_url_controller+'excluir_arquivo',
												type: 'POST',
												data: 'field=banner&id='+$('#id').val(),
												dataType: 'json',
												success: function(data)
												{
													if(data.status==1)
													{
														$('.arquivo_atual_banner').hide();
														$('.arquivo_novo_banner').show();
													}
												}
											});
										});
									});
								</script>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Logo <div class="pull-right"><a class="btn btn-danger btn-xs btn_excluir_logo" href="javascript:void(0);"><i class="fa fa-trash"></i></a></div></h3>
							</div>
							<div class="panel-body">
								<div class="arquivo_atual_logo" style="display:none">
									<div class="file"></div>
								</div>
								<div class="arquivo_novo_logo" style="display:none">
									<div class="form-group">
										<input type="file" class="fileinput" id="txtLogo" name="txtLogo" data-field-db="<?=sha1('eventos.logo')?>" data-show-preview="false" data-show-upload="false" data-show-caption="true" data-preview-file-type="image">
										<small class="msg-erro text-danger"></small>
									</div>
									<div class="alert alert-warning">
										<small>A imagem escolhida deve estar em formato <strong>JPG, GIF, ou PNG</strong> e ter no máximo <strong>1MB</strong>. A dimensão recomendada é de <strong>250 pixels de largura</strong>. Imagens com altura ou largura diferentes destas podem ser redimensionadas.</small>
									</div>
								</div>
								<script type="text/javascript">
									file = '<?=$dados->logo?>';
									if(file)
									{
										$('.arquivo_atual_logo').show().find('.file').html('<a href="'+base_url+'assets/uploads/'+file+'" data-fancybox="images"><img style="max-height:200px !important;" src="'+base_url+'assets/uploads/'+file+'" class="img-responsive"></a>');
									}
									else
									{
										$('.arquivo_novo_logo').show();
									}
									$(function()
									{
										$('.btn_excluir_logo').click(function(event)
										{
											$.ajax(
											{
												url: base_url_controller+'excluir_arquivo',
												type: 'POST',
												data: 'field=logo&id='+$('#id').val(),
												dataType: 'json',
												success: function(data)
												{
													if(data.status==1)
													{
														$('.arquivo_atual_logo').hide();
														$('.arquivo_novo_logo').show();
													}
												}
											});
										});
									});
								</script>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Fundo do Evento <div class="pull-right"><a class="btn btn-danger btn-xs btn_excluir_fundo" href="javascript:void(0);"><i class="fa fa-trash"></i></a></div></h3>
							</div>
							<div class="panel-body">
								<div class="arquivo_atual_fundo" style="display:none">
									<div class="file"></div>
								</div>
								<div class="arquivo_novo_fundo" style="display:none">
									<div class="form-group">
										<input type="file" class="fileinput" id="txtFundo" name="txtFundo" data-field-db="<?=sha1('eventos.fundo')?>" data-show-preview="false" data-show-upload="false" data-show-caption="true" data-preview-file-type="image">
										<small class="msg-erro text-danger"></small>
									</div>
									<div class="alert alert-warning">
										<small>A imagem escolhida deve estar em formato <strong>JPG, GIF, ou PNG</strong> e ter no máximo <strong>1MB</strong>. A dimensão recomendada é de <strong>800x1131 pixels</strong>. Imagens com altura ou largura diferentes destas podem ser redimensionadas.</small>
									</div>
								</div>
								<script type="text/javascript">
									file = '<?=$dados->fundo?>';
									if(file)
									{
										$('.arquivo_atual_fundo').show().find('.file').html('<a href="'+base_url+'assets/uploads/'+file+'" data-fancybox="images"><img style="max-height:200px !important;" src="'+base_url+'assets/uploads/'+file+'" class="img-responsive"></a>');
									}
									else
									{
										$('.arquivo_novo_fundo').show();
									}
									$(function()
									{
										$('.btn_excluir_fundo').click(function(event)
										{
											$.ajax(
											{
												url: base_url_controller+'excluir_arquivo',
												type: 'POST',
												data: 'field=fundo&id='+$('#id').val(),
												dataType: 'json',
												success: function(data)
												{
													if(data.status==1)
													{
														$('.arquivo_atual_fundo').hide();
														$('.arquivo_novo_fundo').show();
													}
												}
											});
										});
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group form-group-sm">
							<label for="txtNome" class="control-label">*Nome</label>
							<input type="text" class="form-control" id="txtNome" name="txtNome" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.nome')?>" placeholder="Nome" value="<?=set_value('txtNome', $dados->nome)?>">
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-sm">
							<label for="txtStatus" class="control-label">Status</label>
							<select class="form-control" id="txtStatus" name="txtStatus" data-field-db="<?=sha1('eventos.status')?>" data-live-search="true" data-style="btn-default btn-sm">
								<option value="publicado"<?php if($dados->status=='publicado'){echo ' selected';} ?>><span class="label label-success">Publicado</span></option>
								<option value="pausado"<?php if($dados->status=='pausado'){echo ' selected';} ?>><span class="label label-warning">Pausado</span></option>
								<option value="inscricoesencerradas"<?php if($dados->status=='inscricoesencerradas'){echo ' selected';} ?>><span class="label label-danger">Inscrições Encerradas</span></option>
							</select>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group form-group-sm">
							<label for="txtUrl" class="control-label">Página</label>
							<div class="input-group">
								<span class="input-group-addon font-12"><?=base_url()?><span class="url"></span></span>
								<input type="text" class="form-control" id="txtUrl" name="txtUrl" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.url')?>" value="<?=set_value('txtUrl', $dados->url)?>">
								<span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
								<script type="text/javascript">
									$(function()
									{
										$('#txtNome').on('keyup', function(event)
										{
											$element = $(this);
											$('#txtUrl').val( getSlug( $element.val() ) );
										});
										$('#txtUrl').on('blur', function(event)
										{
											$element = $(this);
											$element.val( getSlug( $element.val() ) );
											if(!$element.val())
											{
												$element.val( getSlug($('#txtNome').val()) );
											}
										});
									});
								</script>
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="txtData" class="control-label">Data do evento</label>
							<div class="input-group date datetimepicker-data">
								<input type="text" class="form-control inputmask-data" id="txtData" name="txtData" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.data')?>" placeholder="Data do evento" value="<?=set_value('txtData', date_to_br($dados->data))?>">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="txtValor" class="control-label">Valor</label>
							<div class="input-group">
								<span class="input-group-addon">R$</span>
								<input type="text" class="form-control moeda" id="txtValor" name="txtValor" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.valor')?>" placeholder="0,00" value="<?=set_value('txtValor', $dados->valor)?>">
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-sm">
							<label for="txtLocal" class="control-label">Local</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" class="form-control" id="txtLocal" name="txtLocal" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.local')?>" placeholder="Local" value="<?=set_value('txtLocal', $dados->local)?>">
							</div>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group form-group-sm">
							<label for="txtResumo" class="control-label">Resumo</label>
							<textarea class="form-control" id="txtResumo" rows="5" name="txtResumo" data-field-db="<?=sha1('eventos.resumo')?>" placeholder="Resumo"><?=set_value('txtResumo', $dados->resumo)?></textarea>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group form-group-sm">
							<label for="txtDescricao" class="control-label">Descrição do Evento</label>
							<textarea class="form-control ckeditor" rows="5" id="txtDescricao" name="txtDescricao" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.descricao')?>" placeholder="Descrição do evento"><?=set_value('txtDescricao', $dados->descricao)?></textarea>
							<small class="msg-erro text-danger"></small>
						</div>
					</div>
				</div>
				<!-- <div class="row none">
					<div class="col-md-12">
						<input type="button" class="btn btn-warning btn-sm btn-lotes" value="LOTES DE INGRESSOS">
						<script type="text/javascript">
							$(function()
							{
								$('.btn-lotes').click(function(event)
								{
									$('.lotes').toggle();
								});
								//######################################################################
								//######################################################################
								var $list_inputs = '.list_inputs';
								var $inputs = '.inputs';
								$('.add_inputs').on('click', function(event)
								{
									event.preventDefault();
									$clone = $($list_inputs).find($inputs+':last').clone();
									$clone.find('input').val('');
									$clone.appendTo($list_inputs);
								});
								$('body').on('click', '.delete_inputs', function(event)
								{
									event.preventDefault();
									console.log( $($list_inputs).find($inputs).size() );
									if($($list_inputs).find($inputs).size() > 1)
									{
										$(this).parents($inputs).eq(0).remove();
									}
								});
								//######################################################################
								//######################################################################
							});
						</script>
						<div class="lotes well none">
							<span class="btn btn-xs btn-success add_inputs"><i class="fa fa-plus"></i> Adicionar</span>
							<br><br>
							<div class="list_inputs">
								<div class="inputs">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-sm">
												<label for="txtNomeLote" class="control-label">Nome</label>
												<input type="text" class="form-control" name="txtNomeLote[]" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos_lotes.nome')?>" placeholder="Nome" value="<?=set_value('txtNomeLote')?>">
												<small class="msg-erro text-danger"></small>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group form-group-sm">
												<label for="txtValorLote" class="control-label">Valor</label>
												<input type="text" class="form-control moeda" name="txtValorLote[]" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos_lotes.valor')?>" placeholder="Valor" value="1500,00">
												<small class="msg-erro text-danger"></small>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group form-group-sm">
												<label for="txtQuantidadeLote" class="control-label">Quantidade</label>
												<input type="text" class="form-control quantidade" name="txtQuantidadeLote[]" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos_lotes.quantidade')?>" placeholder="Quantidade" value="<?=set_value('txtQuantidadeLote')?>">
												<small class="msg-erro text-danger"></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group form-group-sm">
												<label for="txtDataInicioLote" class="control-label">Data Início</label>
												<div class="input-group date datetimepicker-data">
													<input type="text" class="form-control inputmask-data" name="txtDataInicioLote[]" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos_lotes.data_inicio')?>" placeholder="Data Início Lote" value="<?=set_value('txtDataInicioLote')?>">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<small class="msg-erro text-danger"></small>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group form-group-sm">
												<label for="txtDataFimLote" class="control-label">Data Fim</label>
												<div class="input-group date datetimepicker-data">
													<input type="text" class="form-control inputmask-data" name="txtDataFimLote[]" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos_lotes.data_fim')?>" placeholder="Data Fim Lote" value="<?=set_value('txtDataFimLote')?>">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<small class="msg-erro text-danger"></small>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-sm pull-right">
												<label class="control-label"></label>
												<div class="input-group">
													<button type="button" style="margin-top:5px;" class="btn btn-default delete_inputs"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									</div>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_avancado">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title cursor-pointer" onclick="$('.panel-body-comprovante-inscricao').toggle('slow');"><i class="fa fa-ticket"></i> Comprovante de Inscrição</h3>
							</div>
							<div class="panel-body panel-body-comprovante-inscricao none">
								<div class="form-group form-group-sm">
									<textarea class="ckeditor" id="txtComprovanteInscricao" rows="5" name="txtComprovanteInscricao" data-field-db="<?=sha1('eventos.comprovanteinscricao')?>" placeholder="Comprovante de inscrição"><?=set_value('txtComprovanteInscricao', $dados->comprovanteinscricao)?></textarea>
									<small class="msg-erro text-danger"></small>
								</div>
								<a class="btn btn-default btn-xs" data-toggle="modal" href="#modalTags"><i class="fa fa-tags"></i> TAGS</a>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title cursor-pointer" onclick="$('.panel-body-termos').toggle('slow');"><i class="fa fa-check-circle"></i>	Termos de uso (aceite)</h3>
							</div>
							<div class="panel-body panel-body-termos none">
								<div class="form-group form-group-sm">
									<textarea class="ckeditor" id="txtTermos" rows="5" name="txtTermos" data-field-db="<?=sha1('eventos.termos')?>" placeholder="Termos"><?=set_value('txtTermos', $dados->termos)?></textarea>
									<small class="msg-erro text-danger"></small>
								</div>
								<a class="btn btn-default btn-xs" data-toggle="modal" href="#modalTags"><i class="fa fa-tags"></i> TAGS</a>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modalTags">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><i class="fa fa-tags"></i> TAGS</h4>
							</div>
							<div class="modal-body">
								<div class="alert alert-info">
									Insira a(s) tag(s) abaixo no TEXTO para obter um resultado personalizado.
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title cursor-pointer" onclick="$('.panel-body-tags-cliente').toggle();"><i class="fa fa-user"></i> CLIENTE</h4>
											</div>
											<div class="panel-body panel-body-tags-cliente none">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th width="150" class="font-11">VALOR</th>
															<th class="font-11">TAG</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="font-11">INSCRIÇÃO</td>
															<td class="font-11">{CLIENTE_INSCRICAO}</td>
														</tr>
														<tr>
															<td class="font-11">NOME</td>
															<td class="font-11">{CLIENTE_NOME}</td>
														</tr>
														<tr>
															<td class="font-11">DATA DE NASCIMENTO</td>
															<td class="font-11">{CLIENTE_DATA_NASCIMENTO}</td>
														</tr>
														<tr>
															<td class="font-11">SEXO</td>
															<td class="font-11">{CLIENTE_SEXO}</td>
														</tr>
														<tr>
															<td class="font-11">CPF</td>
															<td class="font-11">{CLIENTE_CPF}</td>
														</tr>
														<tr>
															<td class="font-11">RG</td>
															<td class="font-11">{CLIENTE_RG}</td>
														</tr>
														<tr>
															<td class="font-11">CELULAR</td>
															<td class="font-11">{CLIENTE_CELULAR}</td>
														</tr>
														<tr>
															<td class="font-11">TELEFONE</td>
															<td class="font-11">{CLIENTE_TELEFONE}</td>
														</tr>
														<tr>
															<td class="font-11">ENDERECO</td>
															<td class="font-11">{CLIENTE_ENDERECO}</td>
														</tr>
														<tr>
															<td class="font-11">NÚMERO</td>
															<td class="font-11">{CLIENTE_NUMERO}</td>
														</tr>
														<tr>
															<td class="font-11">COMPLEMENTO</td>
															<td class="font-11">{CLIENTE_COMPLEMENTO}</td>
														</tr>
														<tr>
															<td class="font-11">BAIRRO</td>
															<td class="font-11">{CLIENTE_BAIRRO}</td>
														</tr>
														<tr>
															<td class="font-11">CIDADE</td>
															<td class="font-11">{CLIENTE_CIDADE}</td>
														</tr>
														<tr>
															<td class="font-11">UF</td>
															<td class="font-11">{CLIENTE_UF}</td>
														</tr>
														<tr>
															<td class="font-11">CEP</td>
															<td class="font-11">{CLIENTE_CEP}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title cursor-pointer" onclick="$('.panel-body-tags-evento').toggle();"><i class="fa fa-th-list"></i> EVENTO</h4>
											</div>
											<div class="panel-body panel-body-tags-evento none">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th width="100" class="font-11">VALOR</th>
															<th class="font-11">TAG</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="font-11">NOME</td>
															<td class="font-11">{EVENTO_NOME}</td>
														</tr>
														<tr>
															<td class="font-11">URL</td>
															<td class="font-11">{EVENTO_URL}</td>
														</tr>
														<tr>
															<td class="font-11">VALOR</td>
															<td class="font-11">{EVENTO_VALOR}</td>
														</tr>
														<tr>
															<td class="font-11">BANNER</td>
															<td class="font-11">{EVENTO_BANNER}</td>
														</tr>
														<tr>
															<td class="font-11">LOGO</td>
															<td class="font-11">{EVENTO_LOGO}</td>
														</tr>
														<tr>
															<td class="font-11">LOCAL</td>
															<td class="font-11">{EVENTO_LOCAL}</td>
														</tr>
														<tr>
															<td class="font-11">DATA</td>
															<td class="font-11">{EVENTO_DATA}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row margin-top-20">
		<div class="col-md-12">
			<div class="pull-right">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Fechar</button>
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Salvar</button>
			</div>
		</div>
	</div>
<?=form_close()?>