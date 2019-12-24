<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conta Recuperada</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Olá, <strong><?=$nome?></strong></p>
                <p>Segue a nova senha para acesso a sua Conta.</p>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-2">Email:</div>
                            <div class="col-sm-10"><strong><?=$email?></strong></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">Senha:</div>
                            <div class="col-sm-10"><strong><?=$senha?></strong></div>
                        </div>
                    </div>
                </div>
                <p>Atenciosamente,</p>
                <address>
                    <strong>Contato FCJJE</strong><br>
                    <a href="mailto:contato@inscricaosegura.com">contato@inscricaosegura.com</a><br>
                    <abbr title="Telefone">T:</abbr> (28) 98112-0370
                </address>
            </div>
        </div>
    </div>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>