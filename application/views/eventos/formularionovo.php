<?php
	// if(!$dados)
	// {
	// 	echo '
	// 		<div class="alert alert-danger">
	// 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 			Usuário não encontrado
	// 		</div>
	// 		<br><button class="btn btn-default" onclick="'.base_url('Eventos/index').'"><i class="fa fa-arrow-left"></i> Voltar</button>
	// 	';
	// }
	$titulo_formulario = ( $this->router->fetch_method() == 'cadastrar' ) ? '<strong><i class="fa fa-plus-square"></i>&nbsp;Cadastro de Evento</strong>' : '<strong><i class="glyphicon glyphicon-edit"></i>&nbsp;Editar Evento</strong>';
?>
<?=form_open_multipart('eventos/salvar', array('id'=>'formEventos', 'role'=>'form'))?>
	<input type="hidden" id="id" name="id" data-field-db="id" value="<?=$dados->id?>">
	<h4><?=$titulo_formulario?></h4>
	<hr>
	<div class="msg"></div>
	<script type="text/javascript">
		$(function()
		{
			$('.delete-banner').click(function(event)
			{
				$('.div_banner_setted').hide();
				$('.div_banner_new').show();

				$.ajax(
				{
					url: base_url_controller+'delete_banner',
					type: 'POST',
					data: 'id=<?=$dados->id?>',
					dataType: 'json',
					success: function(data)
					{
				
					}
				});
			});
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
	<div class="div_banner_setted well" <?php if(!$dados->banner){echo 'style="display:none"';} ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtArquivo" class="control-label">Banner (atual)</label>
					<img src="<?=base_url().'upload/'.$dados->banner?>" class="img-responsive">
				</div>
				<a class="btn btn-danger btn-sm delete-banner" href="javascript:void(0);"><i class="fa fa-trash"></i> Excluir</a>
			</div>
		</div>
	</div>
	<div class="div_banner_new well" <?php if($dados->banner){echo 'style="display:none"';} ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtArquivo" class="control-label">Banner</label>
					<input type="file" class="fileinput" id="txtArquivo" name="txtArquivo" data-show-upload="false" data-show-caption="true" data-field-db="<?=sha1('eventos.banner')?>" data-preview-file-type="text">
					<small class="msg-erro text-danger"></small>
				</div>
			</div>
			<div class="col-md-6">
				<div class="alert alert-warning">
					<small>A imagem escolhida deve estar em formato <strong>JPG, GIF, ou PNG</strong> e ter no máximo <strong>2MB</strong>. A dimensão recomendada é de <strong>800 x 400 pixels</strong>. Imagens com altura ou largura diferentes destas podem ser redimensionadas.</small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group form-group-sm">
				<label for="txtNome" class="control-label">*Nome</label>
				<input type="text" class="form-control" id="txtNome" name="txtNome" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.nome')?>" placeholder="Nome">
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group form-group-sm">
				<label for="txtUrl" class="control-label">Página</label>
				<div class="input-group">
					<span class="input-group-addon font-12"><?=base_url()?><span class="url"></span></span>
					<input type="text" class="form-control" id="txtUrl" name="txtUrl" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.url')?>">
					<span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
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
					<input type="text" class="form-control inputmask-data" id="txtData" name="txtData" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.data')?>" placeholder="Data do evento">
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
					<input type="text" class="form-control moeda" id="txtValor" name="txtValor" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.valor')?>" placeholder="0,00">
				</div>
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group form-group-sm">
				<label for="txtLocal" class="control-label">Local</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
					<input type="text" class="form-control" id="txtLocal" name="txtLocal" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.local')?>" placeholder="Local">
				</div>
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group form-group-sm">
				<label for="txtResumo" class="control-label">Resumo</label>
				<textarea class="form-control" id="txtResumo" rows="5" name="txtResumo" data-field-db="<?=sha1('eventos.resumo')?>" placeholder="Resumo"></textarea>
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group form-group-sm">
				<label for="txtDescricao" class="control-label">Descrição do Evento</label>
				<textarea class="form-control ckeditor" rows="5" id="txtDescricao" name="txtDescricao" autocomplete="off" spellcheck="false" dir="auto" data-field-db="<?=sha1('eventos.descricao')?>" placeholder="Descrição do evento"></textarea>
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Fechar</button>
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Salvar</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function clear_inputs_modal()
		{
			$('#formEventos').find(':text, :password, :file, textarea').val('');
			$('#formEventos').find(':radio, :checkbox').attr("checked",false);
			$('#formEventos').find('select').val('');
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
		setTimeout(function()
		{
			getvaluesinputs('eventos', $('#id').val());
		}, 500);
		$(function()
		{
			$('#formEventos').on('submit', function(event)
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
function getvaluesinputs(url, id)
{
	$.ajax(
	{
		url: base_url+url+'/getvaluesinputs',
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
						$element.val(value).trigger('change');
					}
					else // text|hidden|passord|textarea|etc...
					{
						$element.val(value);
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
	</script>
<?=form_close()?>