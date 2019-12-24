<?=form_open_multipart('pagamentos/salvabaixaboleto', array('id'=>'formPagamentos', 'role'=>'form'))?>
	<div class="well">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="txtArquivo" class="control-label">Insira o arquivo de retorno</label>
					<input type="file" id="txtArquivo" name="txtArquivo" data-show-upload="false" data-show-caption="true" data-preview-file-type="text">
					<small class="msg-erro text-danger"></small>
					<script type="text/javascript">
						$(function()
						{
							$('#txtArquivo').fileinput(
							{
								'showPreview' : false,
								'allowedFileExtensions' : ['ret'],
								// 'browseLabel': 'Procurar',
								// 'removeLabel': 'Remover',
								'lang': 'pt-BR',
							});
						});
					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left"><a href="<?=base_url()?>pagamentos/baixafatura" class="btn btn-primary btn-xs">Baixa Manual</a></div>
			<div class="pull-right">
				<button type="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> &nbsp;Processar retornos</button>
			</div>
		</div>
	</div>
<?=form_close()?>