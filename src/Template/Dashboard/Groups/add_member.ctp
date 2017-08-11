<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <a href="<?= $this->Url->build(['_name'=>'groups.view','id'=>$group['id']]) ?>"><?= h($group->name )?></a> - Adicionar Membros
    </h1>

</section>

<section class="content">
    <?= $this->Flash->render()?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Membros para adicionar</h3>
                </div>
                <div class="box-body">
                    <?php if(count($usersNotInGroup) > 0 ): ?>
                        <?php foreach ($usersNotInGroup as $unig):?>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="box box-warning">
                                    <div class="box-body box-profile">
                                        <?= $this->Html->image('profile_default.png',['alt'=>$unig['name'],'class'=>'profile-user-img img-responsive img-circle']) ?>
                                        <h3 class="profile-username text-center"><?= h($unig['name']) ?></h3>
                                        <p class="text-center">
                                            <?= $this->Form->create(null,['url'=>$this->Url->build(['_name'=>'groups.addMember','id'=>$group['id'],'uid'=>$unig['id']])])?>
                                                <button type="submit" class="btn btn-flat btn-block btn-success">Adicionar</button>
                                            <?= $this->Form->end() ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else:?>
                        <p class="lead text-center text-danger"><i class="fa fa-frown-o fa-lg"></i> Nenhum membro disponível para adicionar</p>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>