<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Amigox | by =JD=</title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css(['/bootstrap/css/bootstrap.min.css','/bootstrap/css/jumbotron-narrow.css'])?>

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="/">Home</a></li>
                <li role="presentation"><a href="<?= $this->Url->build(['_name'=>'login.index'])?>">Login</a></li>
                <li role="presentation"><a href="<?= $this->Url->build(['_name'=>'register.index'])?>">Cadastro</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Amigo X</h3>
    </div>

    <div class="jumbotron">
        <h1>Amigox</h1>
        <p class="lead">Faça os sorteios dos seus grupos de amigo secreto automaticamente. Marque sessões e se divirta com seus amigos.</p>
        <p><a class="btn btn-lg btn-success" href="<?= $this->Url->build(['_name'=>'register.index'])?>" role="button">Cadastrar agora!</a></p>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Sorteio Automático</h4>
            <p>O Sorteio do amigo secreto é feito automaticamente pelo sistema. Não perca tempo com isso!</p>

            <h4>Crie Grupos</h4>
            <p>Crie os grupos de amigos secretos de maneira fácil e rápida</p>

        </div>

        <div class="col-lg-6">
            <h4>Marque Eventos</h4>
            <p>Marque os eventos de amigo secreto e notifique seus amigos!</p>

            <h4>Envie Mensagens</h4>
            <p>Envie mensagens aos grupos de amigos secreto e fique por dentro das novidades!</p>

        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2016 AmigoX | Criado por =JD=</p>
    </footer>

</div> <!-- /container -->


</html>
