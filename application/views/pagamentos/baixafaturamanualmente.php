<?=form_open_multipart('pagamentos/salvabaixafatura', array('id'=>'formPagamentos', 'role'=>'form'))?>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group form-group-sm">
					<label for="txtNumeroDocumento" class="control-label">Número da Fatura</label>
					<input type="text" class="form-control" id="txtNumeroDocumento" name="txtNumeroDocumento" placeholder="Número da Faturato" required>
					<small class="msg-erro text-danger"></small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group form-group-sm">
					<label for="txtValor" class="control-label">Valor da Fatura</label>
					<input type="text" class="form-control moeda" id="txtValor" name="txtValor" placeholder="Valor" required>
					<small class="msg-erro text-danger"></small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<button type="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> &nbsp;Processar retornos</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		// function clear_inputs_modal()
		// {
		// 	$('#formPagamentos').find(':text, :password, :file, textarea').val('');
		// 	$('#formPagamentos').find(':radio, :checkbox').attr("checked",false);
		// 	$('#formPagamentos').find('select').val('');
		// 	clear_form_erros();
		// }
		// function clear_form_erros()
		// {
		// 	$('.msg').html('');
		// 	$('.msg-erro').html('');
		// 	$('.has-error').removeClass('has-error');
		// 	$('.modal-msg').html('');
		// 	$('.nav-tabs').find('.cont').html(''); // Limpa contadores de erros (NAVTABS)
		// 	$('.nav-tabs a:first').tab('show');
		// }
		// $(function()
		// {
		// 	$('#formPagamentos').on('submit', function(event)
		// 	{
		// 		event.preventDefault();

		// 		clear_form_erros();

		// 		var $form = $(this);
		// 		var $button_submit = $form.find('button:submit');
		// 		$button_submit.data('loading-text', '<i class="fa fa-circle-o-notch fa-spin"></i> Carregando...');
		// 		$button_submit.button('loading');
		// 			//################################################################################################ // FIX ENVIAR FORM NORMAL OU UPLOAD
		// 		var $data;
		// 		var contentType = "application/x-www-form-urlencoded";
		// 		var processData = true;
		// 			//################################################################################################
		// 		if( $form.attr('enctype') == 'multipart/form-data' )
		// 		{
		// 			$('[class^="ckeditor"]').each(function(index, el)
		// 			{
		// 				var name = $(el).attr('name');
		// 				CKEDITOR.instances[name].updateElement();
		// 			});
					
		// 			var $data = new FormData( $form.get(0) );
		// 			var contentType = false;
		// 			var processData = false;
		// 			//$data.append('txtCAMPO', 'txtCAMPO_VALUE');
		// 			//################################################################################################
		// 			// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
		// 			$form.find('input:checkbox').each(function(index, el)
		// 			{
		// 				if( $(el).prop('checked') == false )
		// 				{
		// 					$data.append($(el).prop('name'), 0);
		// 				}
		// 				else
		// 				{
		// 					$data.append($(el).prop('name'), 1);
		// 				}
		// 			});
		// 			//################################################################################################
		// 		}
		// 		else
		// 		{
		// 			//################################################################################################
		// 			// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
		// 			var $data = $form.serialize()+'&'+$form.find('input:checkbox').map(function(i, e)
		// 			{
		// 				if( $(e).prop('checked') == false )
		// 				{
		// 					return $(e).prop('name')+'=0';
		// 				}
		// 				else
		// 				{
		// 					return $(e).prop('name')+'=1';
		// 				}
		// 			}).get().join('&');
		// 			//################################################################################################
		// 		}
		// 		$.ajax(
		// 		{
		// 			url: $form.attr('action'),
		// 			type: $form.attr('method'),
		// 			data: $data,
		// 			dataType: 'json',
		// 			cache : false,
		// 			contentType: contentType,
		// 			processData: processData,
		// 		})
		// 		.done(function(data)
		// 		{
		// 			$button_submit.button('reset');

		// 			if(data.status == 1)
		// 			{
		// 				//alert_success('.msg', data.msg);
		// 				alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);
		// 				if(data.acao=='cadastrar')
		// 				{
		// 					window.location.href=base_url_controller;
		// 				}
		// 			}
		// 			else
		// 			{
		// 				var LinkNavTabs = '';
		// 				var cont = 0;
		// 				var msg = '';
		// 				$.each(data.erros, function(campo, valor)
		// 				{
		// 					var Input = $('[name='+campo+']');
		// 					//Input.nextAll('.msg-erro').eq(0).html(valor);
		// 					Input.parents('.form-group').eq(0).addClass('has-error');
		// 					msg += '<div><small>'+valor+'</small></div>';

		// 					LinkNavTabs = Input.parents('.tab-pane').eq(0).prop('id');
		// 					if(LinkNavTabs)
		// 					{
		// 						var ElementCont = $('.nav-tabs a[aria-controls="'+LinkNavTabs+'"]').find('.cont');
		// 						cont = parseInt( ElementCont.text() );
		// 						if( isNaN(cont) )
		// 						{
		// 							cont=1;
		// 						}
		// 						else
		// 						{
		// 							cont = cont + 1;
		// 						}
		// 						ElementCont.html('<span class="badge">'+cont+'</span>');
		// 						cont = 0;
		// 					}
		// 				});
		// 				$('.msg')
		// 				.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
		// 				.show();

		// 				if(LinkNavTabs)
		// 				{
		// 					$element = null;
		// 					$tab = null;
		// 					$('.nav-tabs').find('.cont').each(function(index, el)
		// 					{
		// 						if( $(el).text().length > 0 )
		// 						{
		// 							$element = $(el);
		// 							return false;
		// 						}
		// 					});
		// 					//console.log('tab: '+$element.parents('a').attr('aria-controls'));
		// 					$element.parents('a').tab('show');
		// 				}
		// 			}
		// 		})
		// 		.fail(function() //error
		// 		{
		// 			$button_submit.button('reset');
		// 		})
		// 		.always(function() //complete
		// 		{
		// 			$button_submit.button('reset');
		// 		});
		// 	});
		// });
	</script>
<?=form_close()?>