    <div class="login-box">
        <div class="login-logo">
            <a href="<?= $this->Url->build('/');?>"><b>Amigos</b> X</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Logue para aproveitar</p>
            <?= $this->Flash->render() ?>

            <?= $this->Form->create(null,['url'=>$url])?>
                <div class="form-group has-feedback">
                    <?= $this->Form->text('email', ['type'=>'email','class'=>'form-control','placeholder'=>'Email'])?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <?= $this->Form->password('password', ['class'=>'form-control','placeholder'=>'Senha'])?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-4 pull-right">
                        <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
                        <?= $this->Form->submit(__('Logar'), ['class'=>'btn btn-primary btn-block btn-flat'])?>
                    </div>
                    <!-- /.col -->
                </div>
            <?= $this->Form->end()?>
            <!-- /.social-auth-links -->

            Não é membro?<a href="<?= $url ?>" class="text-center"> Registre-se agora!</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->