<div class="msg"></div>
<div id="toolbar">
	<button class="btn btn-sm btn-primary" onclick="cadastrar()"><i class="fa fa-plus"></i> Cadastrar</button>
	<button class="btn btn-sm btn-danger btn_delete" disabled><i class="fa fa-trash"></i> Excluir</button>
</div>
<table
	id="tableClientes"
	data-toggle="table"
	data-toolbar="#toolbar"
	data-click-to-select="true"
	data-classes="table table-striped table-hover bootstrap-table"

	data-url="<?=$this->base_url_controller?>bootstrap_table"

	data-show-export="true"
	data-show-refresh="true"
	data-show-toggle="true"
	data-show-columns="true"

	data-detail-view="false"

	data-icons-prefix="fa"
	data-icons="icons"
	data-icon-size="sm"

	data-pagination="true"
	data-side-pagination="server"
	data-page-list="[5, 10, 20, 50, 100, 200]"
	data-search="true"
	data-query-params="queryParams"

	data-sort-name="nome"
	>
	<thead>
		<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="nome" data-sortable="true" data-formatter="formatter_editar">Nome</th>
			<th data-field="cpf" data-sortable="true">Cpf</th>
			<th data-field="celular" data-sortable="true">Celular</th>
			<!-- <th data-field="acoes" data-align="center" data-formatter="formatter_acoes" class="col-md-1">Editar</th> -->
		</tr>
	</thead>
</table>
<script type="text/javascript">
	//############################################## BOOTSTRAP-TABLE (Início) ###############################################
	//#######################################################################################################################
	var $table_clientes = $('#tableClientes');
	var	$btn_delete = $('.btn_delete');
	function queryParams(params)
	{
		params.like_search = 'all'; // 'all' ou 'nome|cpf|celular'
		return params;
	}
	$(function()
	{
		$table_clientes.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function()
		{
			$btn_delete.prop('disabled', !$table_clientes.bootstrapTable('getSelections').length);
		});
		$btn_delete.click(function()
		{
			var ids = $.map($table_clientes.bootstrapTable('getSelections'), function (row)
			{
				return row.id;
			});
			alertify.confirm('<strong><i class="fa fa-exclamation-circle"></i>&nbsp;Confirmação</strong>', '<strong>Você realmente deseja excluir este(s) registro(s) ?</strong>', function()
			{
				$.ajax(
				{
					url: base_url_controller+'excluir',
					type: 'POST',
					data: 'id='+ids,
					dataType: 'json',
					success: function(data)
					{
						if( data.status == 1 )
						{
							alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);

							$table_clientes.bootstrapTable('remove',
							{
								field: 'id',
								values: ids
							});
							$btn_delete.prop('disabled', true);
							$table_clientes.bootstrapTable('refresh');
						}
						else
						{
							alertify.error('<i class="fa fa-remove"></i> '+data.msg);
						}
					}
				});
			}, function()
			{

			});
		});
	});
	function reset_click_to_select()
	{
		setTimeout(function()
		{
			$table_clientes.bootstrapTable('uncheckAll').find('.selected').removeClass('selected'); // Limpando a linha selecionada
		}, 1);
	}
	function formatter_editar(value, row, index)
	{
		return '<span>'+row.nome+'</span><button class="pull-right btn btn-success btn-xs" onclick="javascript:editar('+row.id+')"><i class="fa fa-pencil"></i></button>';
	}
	function formatter_acoes(value, row, index)
	{
		return '<span class="label label-success" onclick="javascript:editar('+row.id+')"><i class="fa fa-pencil"> Editar</i></span>'
		// return [
		// '<button class="btn btn-xs btn-default" onclick="javascript:editar('+row.id+')"><i class="fa fa-pencil"> Editar</i></button>',
		// ].join('');
	}
	//################################################ BOOTSTRAP-TABLE (Fim) ###############################################
	//######################################################################################################################
	function clear_inputs_modal()
	{
		$('#formClientes').find(':text, :password, :file, textarea').val('');
		$('#formClientes').find(':radio, :checkbox').attr("checked",false);
		$('#formClientes').find('select').val('');
		clear_erros_modal();
	}
	function clear_erros_modal()
	{
		$('.msg-erro').html('');
		$('.has-error').removeClass('has-error');
		$('.modal-msg').html('');

		if( $('.nav-tabs').size() > 0 )
		{
			$('.nav-tabs').find('.cont').html(''); // Limpa contadores de erros (NAVTABS)
			$('.nav-tabs a:first').tab('show');
		}
	}
	function cadastrar()
	{
		$('#modalCadastraClientes .modal-title').html('<strong><i class="fa fa-plus-square"></i>&nbsp;Cadastro de Cliente</strong>');
		$('#modalCadastraClientes').modal('show');

		$('input[name="id"]').val('');

		clear_erros_modal();
	}
	function editar(id) //Preenche os campos do formulário apartir do DB
	{
		reset_click_to_select();
		clear_erros_modal();
		$('input[name="id"]').val(id);
		$('#modalCadastraClientes .modal-title').html('<strong><i class="glyphicon glyphicon-edit"></i>&nbsp;Editar Cliente</strong>');
		$.ajax(
		{
			url: base_url_controller+'getvaluesinputs',
			type: 'POST',
			data: 'id='+id,
			dataType: 'json',
			success: function(data)
			{
				$('#modalCadastraClientes').modal('show');

				$.each(data.inputs, function(campo, valor)
				{
					$element = $('[data-field-db='+campo+']');

					if( $element.prop('type') == 'text' )
					{
						$element.val(valor);
					}
					else if( $element.prop('type') == 'checkbox' )
					{
						if(valor=='on')
						{
							$element.prop('checked', true);
							$element.prop('value', 'on');
						}
						else
						{
							$element.prop('checked', false);
							$element.prop('value', 'off');
						}
					}
					else if( $element.prop('type') == 'select-one' )
					{
						$element.selectpicker('val',valor);
					}
					else
					{
						$element.val(valor);
					}
				});
			}
		});
	}
	$(function()
	{
		$('#modalCadastraClientes').on('hide.bs.modal', function(e)
		{
			clear_inputs_modal();
		});
		$('#formClientes').on('submit', function(event)
		{
			event.preventDefault();
			var $form = $(this);
			var $button_submit = $form.find('button:submit');
			$button_submit.data('loading-text', '<i class="fa fa-circle-o-notch fa-spin"></i> Carregando...');
			$button_submit.button('loading');
			clear_erros_modal();
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
				$button_submit.button('reset');

				if(data.status == 1)
				{
					//alert_success('.msg', data.msg);
					alertify.success('<i class="fa fa-check-circle-o"></i> '+data.msg);
					$('#tableClientes').bootstrapTable('refresh', {url: base_url_controller+'bootstrap_table'});
					$('#modalCadastraClientes').modal('hide');
				}
				else
				{
					var LinkNavTabs = '';
					var cont = 0;
					var msg = '';
					$.each(data.erros, function(campo, valor)
					{
						var Input = $('[name='+campo+']');
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
						ElementCont.html('<span class="badge">'+cont+'</span>');
						cont = 0;
					});
					$('.modal-msg')
					.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
					.show();

					if( $form.find('.nav-tabs').size() > 0 )
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
<div class="modal fade" id="modalCadastraClientes">
	<div class="modal-dialog">
		<div class="modal-content">
			<?=form_open('Clientes/salvar', array('id'=>'formClientes', 'role'=>'form'))?>
			<input type="hidden" name="id" value="" data-field-db="id">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h5 class="modal-title"><strong><i class="fa fa-plus-square"></i>&nbsp;Cadastro de Cliente</strong></h5>
			</div>
			<div class="modal-body">
				<div role="tabpanel">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active">
							<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Geral <small class="cont pull-right"></small></a>
						</li>
						<li role="presentation">
							<a href="#dadoscomplementares" aria-controls="dadoscomplementares" role="tab" data-toggle="tab">Dados complementares <small class="cont pull-right"></small></a>
						</li>
						<li role="presentation">
							<a href="#convenio" aria-controls="convenio" role="tab" data-toggle="tab">Convênio <small class="cont pull-right"></small></a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">

						</div>
						<div role="tabpanel" class="tab-pane" id="convenio">

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Salvar</button>
			</div>
			<?=form_close()?>
		</div>
	</div>
</div>
