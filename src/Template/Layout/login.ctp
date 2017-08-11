
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AmigoX | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Loads all the css -->
    <?= $this->Html->css(['/bootstrap/css/bootstrap.min.css','/fontawesome/css/font-awesome.min.css','/adminlte/css/AdminLTE.css','/adminlte/plugins/iCheck/square/blue.css'])?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

  <!-- /.login-logo -->



<?= $this->fetch('content') ?>


<!-- jQuery 3 -->
<?= $this->Html->script(['/adminlte/plugins/jQuery/jquery3.min.js','/bootstrap/js/bootstrap.js','/adminlte/plugins/iCheck/icheck.js'])?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
