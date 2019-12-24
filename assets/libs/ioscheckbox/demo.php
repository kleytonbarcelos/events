<div class="row">
	<div class="col-md-12">
		<div class="checkboxtermos">
			<div><strong>Termos</strong></div><input type="checkbox" class="ios" id="termos" name="termos">
			<script type="text/javascript">
				$('body').on('click', '.checkboxtermos .ios-ui-select', function(event)
				{
					event.preventDefault();
					$('.div_termos').toggle('slow');
				});
			</script>
		</div>
		<div class="div_termos<?php if(!$dados->url){echo ' display-none';} ?>">
			<div class="form-group form-group-sm">
				<textarea class="ckeditor" id="txtTermos" rows="5" name="txtTermos" data-field-db="<?=sha1('eventos.termos')?>" placeholder="Termos"><?=set_value('txtTermos', $dados->termos)?></textarea>
				<small class="msg-erro text-danger"></small>
			</div>
		</div>
	</div>
</div>