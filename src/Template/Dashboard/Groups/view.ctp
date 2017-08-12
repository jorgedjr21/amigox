<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= h($group->name )?> - Informações, membros e ações
    </h1>

</section>

<!-- Main content -->
<section class="content">

    <?= $this->Flash->render()?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-5 col-sm-12">
                        <p><strong>Descrição do grupo: </strong> <br><?= h($group['description'])?></p>
                        <p><strong>Valor sugerido de presente: </strong> <?php echo !empty($group['max_value']) ? $group['max_value'] : 'Sem sugestão'?></p>
                        <p><strong>Total de membros: </strong> <?= $usersFromGroup->count() ?></p>
                        <p>
                            <small>Todo grupo deve ter pelo menos 4 membros para que o sorteio possa ser realizado. <br>A sessão de amigo secreto só pode ser marcada após o sorteio do grupo</small>
                        </p>
                    </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="row">
                                <p class="lead text-center">Seu amigo secreto:</p>
                            </div>
                            <?php
                            if(is_null($group->lottery)):
                            ?>
                                <div class="row">
                                    <p class="lead text-center text-aqua">Sorteio ainda não realizado</p>
                                </div>
                                <?php else: ?>
                                    <div class="row text-center" >
                                        <div class="col-md-6 col-sm-12" style="border-right: 2px dashed dodgerblue">
                                            <?= $this->Html->image('profile_default.png',['alt'=>'nome','class'=>'profile-user-img img-responsive img-circle']) ?>
                                            <p class="text-muted text-center"><?= h($myFriend->name)?></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                <?php foreach($myFriend->preferences as $pref):?>
                                                    <span class="label label-info"><?= h($pref) ?></span>
                                                <?php endforeach; ?>
                                            </p>
                                            <p><strong>Gasto preferencial:</strong> <?= h($myFriend->max_value) ?></p>
                                        </div>
                                    </div>
                            <?php endif; ?>
                        </div>

                    <?php if($creator['user_id'] == $user['id']): ?>
                    <div class="col-md-offset-2 col-md-2 col-sm-12 text-center">
                        <div class="btn-group-vertical">
                            <a href="<?= $this->Url->build(['_name'=>'groups.view.addMember','id'=>$group['id']])?>" class="btn btn-success btn-lg btn-block">Adicionar Membros</a>
                            <?php
                            if($usersFromGroup->count() >= 4 && $usersFromGroup->count() % 2 == 0 ): ?>
                                <?php if(is_null($myFriend)): ?>
                                    <a href="<?= $this->Url->build(["_name"=>"groups.sort","id"=>$group["id"]]) ?>" class="btn btn-info btn-lg btn-block">Realizar Sorteio</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-info btn-lg btn-block" data-toggle="tooltip" data-placement="bottom" title="Sorteio já foi realizado" disabled>Sorteio Realizado</a>
                                <?php endif;?>
                            <?php else: ?>
                                <a href="#" class="btn btn-info btn-lg btn-block" data-toggle="tooltip" data-placement="bottom" title="Não é possivel realizar o sorteio" disabled>Realizar Sorteio</a>
                            <?php endif; ?>

                            <?php if(is_null($myFriend)): ?>
                                <a href="#" class="btn bg-maroon btn-lg btn-block" data-toggle="tooltip" data-placement="bottom" title="Só é possivel marcar uma sessão de amigo secreto após o sorteio do grupo" disabled="">Marcar Encontro</a>
                            <?php else: ?>
                                <a href="<?= $this->Url->build(['_name'=>'groups.events.new','id'=>$group['id']])?>" class="btn bg-maroon btn-lg btn-block">Marcar Encontro</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
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
                    <?php if($userG->_matchingData['UsersGroup']->role == 2): ?>
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