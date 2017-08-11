<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= h($group->name )?>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <?= $this->Flash->render()?>
    <h3 class="page-header">Membros</h3>
    <div class="row">
        <?php foreach($usersFromGroup as $userG):?>
        <div class="col-md-2 col-sm-4 col-xs-12">
            <div class="box box-info">
                <div class="box-body box-profile">
                    <?= $this->Html->image('profile_default.png',['alt'=>$userG['name'],'class'=>'profile-user-img img-responsive img-circle']) ?>
                    <h3 class="profile-username text-center"><?= h($userG['name']) ?></h3>
                    <?php if($userG['id'] == $user['id']): ?>
                    <p class="text-muted text-center">Criador</p>
                    <?php else: ?>
                    <p class="text-muted text-center">Membro</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <h3 class="page-header">Mensagems e Comentários</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-success">
                <div class="box-body"></div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->