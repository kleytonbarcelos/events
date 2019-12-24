<?=form_open('Configuracoes/salvar', array('id'=>'formConfiguracoes', 'role'=>'form'))?>
	<div class="msg"></div>
	<div class="form-group form-group-sm">
		<div class="checkbox"><label><input type="checkbox" id="txtReceberNotificacoes" name="txtReceberNotificacoes" data-field-db="<?=sha1('receber_notificacoes')?>" value="<?=set_value('txtReceberNotificacoes')?>"> Receber Notificações</label></div>
		<small class="msg-erro text-danger"></small>
	</div>
	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
<?=form_close()?>
<script type="text/javascript">
	$(function()
	{
		$('#formConfiguracoes').on('submit', function(event)
		{
			event.preventDefault();
			var $form = $(this);
			var $button_submit = $form.find('button:submit');
			$button_submit.data('loading-text', '<i class="fa fa-circle-o-notch fa-spin"></i> Carregando...');
			$button_submit.button('loading');
			//#######################################################################################
			// FIX para correção de erros de enviar input:checbox VAZIOS juntos com os outros campos via ajax.
			var campos = $form.serialize()+'&'+$form.find('input:checkbox').map(function(i, e)
			{
				if( $(e).prop('checked') == false )
				{
					$(e).prop('value', 'off');
					$(e).prop('checked', false);
					return $(e).prop('name')+'=';
				}
				else
				{
					$(e).prop('value', 'on');
					$(e).prop('checked', true);
				}
			}).get().join('&');
			//#######################################################################################
			$.ajax(
			{
				url: $form.attr('action'),
				type: $form.attr('method'),
				data: campos,
				dataType: 'json',
			})
			.done(function(data) //success
			{
				//console.log("success");
				$button_submit.button('reset');

				if(data.status == 1)
				{
					alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);
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
					});
					$('.msg')
					.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
					.show();

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