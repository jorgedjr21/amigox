<div class="login-box">
    <div class="login-logo">
        <a href="<?= $this->Url->build('/');?>"><b>Amigos</b> X</a>
    </div>
    <!-- /.login-logo -->
    <?= $this->Flash->render();?>
    <div class="login-box-body">
        <p class="login-box-msg">Crie sua conta e comece a usar</p>
        <?php
            //dd($errors)
        $this->Form->unlockField('preferences');


        ?>

        <?= $this->Form->create(null,['type'=>'post','url'=>$url])?>
        <div class="form-group has-feedback">
            <?= $this->Form->text('name', ['type'=>'name','class'=>'form-control','placeholder'=>'Nome*'])?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->text('email', ['type'=>'email','class'=>'form-control','placeholder'=>'Email*'])?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->password('password', ['class'=>'form-control','placeholder'=>'Senha*'])?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <hr>
        <p class="login-box-msg">Suas preferências</p>
        <div class="form-group has-feedback">
            <input type="checkbox" name="preferences[]" value="Eletrônicos"> Eletrônicos
            <input type="checkbox" name="preferences[]" value="Roupas"> Roupas
            <input type="checkbox" name="preferences[]" value="Acessórios"> Acessórios
            <input type="checkbox" name="preferences[]" value="Vale Presente"> Vale Presente
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->select('max_value',
                ['Até $30'=>'Até $30','Até $60'=>'Até $60','Até $100'=>'Até $100','Até $150'=>'Até $150','Até $200'=>'Até $200','Acima de $200'=>'Acima de $200'],
                ['empty'=>'Valor máximo de gasto','class'=>'form-control text-center'])?>
        </div>
        <div class="row">

            <!-- /.col -->
            <div class="col-xs-12">
                <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
                <?= $this->Form->submit(__('Registrar'), ['class'=>'btn btn-lg btn-primary btn-block btn-flat'])?>
            </div>
            <!-- /.col -->
        </div>
        <?= $this->Form->end()?>
        <!-- /.social-auth-links -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->