<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= h($group->name )?> - Informações, Membros e Ações
    </h1>

</section>

<!-- Main content -->
<section class="content">

    <?= $this->Flash->render()?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-10 col-sm-12">
                        <p><strong>Descrição do grupo: </strong> <br><?= h($group['description'])?></p>
                        <p><strong>Valor sugerido de presente: </strong> <?php echo !empty($group['max_value']) ? $group['max_value'] : 'Sem sugestão'?></p>
                        <p><strong>Total de membros: </strong> <?= count($usersFromGroup) ?></p>
                        <p>
                            <small>Este grupo deve ter mais de 2 e um número par de membros para que o sorteio possa ser realizado!</small>
                        </p>
                    </div>
                    <div class="col-md-2 col-sm-12 text-center">
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-info btn-lg btn-block">Adicionar Membros</a>
                            <?php echo (count($usersFromGroup) > 4 && count($usersFromGroup) % 2 == 0) ? '<a href="#" class="btn btn-info btn-lg btn-block">Realizar Sorteio</a>' :
                                '<a href="#" class="btn btn-info btn-lg btn-block" data-toggle="tooltip" data-placement="bottom" title="Não é possivel realizar o sorteio" disabled>Realizar Sorteio</a>' ?>

                            <a href="#" class="btn btn-info btn-lg btn-block" disabled="">Marcar Encontro</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


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

    <h3 class="page-header">Mensagens e Comentários</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-success">
                <div class="box-body"></div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->