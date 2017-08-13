<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Meu perfil
        <small>Amigox</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Flash->render(); ?>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-2 col-sm-6 col-xs-12">

                        <?= $this->Html->image($user->img_profile,['alt'=>'profile','class'=>'img-circle img-xlg']) ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h3>Meus Dados</h3>
                        <p>
                            <strong>Nome: </strong><?= __($user->name) ?>
                        </p>
                        <p>
                            <strong>Email: </strong><?= __($user->email) ?>
                        </p>
                        <p>
                            <strong>Preferencias: </strong> <?php foreach ($user->preferences as $preference): ?>
                            <span class="label bg-teal-gradient"><?= __($preference) ?></span>
                            <?php endforeach; ?>
                        </p>
                        <p>
                            <strong>Meu falor preferido: </strong> <?= __($user['max_value']) ?>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Atualizar imagem de perfil</h3>
                        <?= $this->Form->create(null,['type' => 'file']) ?>
                        <div class="form-group">
                            <?= $this->Form->file('img',['class'=>'form-control']) ?>
                        </div>
                        <?= $this->Form->submit(__('Atualizar'),['class'=>'btn btn-block bg-blue-gradient btn-lg']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->