<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Convites para grupos
    </h1>

</section>

<section class="content">
    <?= $this->Flash->render() ?>
    <div class="row">
        <?php if($invites->count() <= 0) :?>
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-body text-center">
                    <p class="lead text-red">Você está sem convites para grupos no momento!</p>
                </div>
            </div>
        </div>
        <?php else: ?>

            <?php foreach($invites as $invite):?>
            <div class="col-md-2 col-sm-4 col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?= $invite->group->name?>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="<?= $this->Url->build([
                                '_name'=>'groups.handleInvites',
                                'gid'=>$invite->group->id,
                                '?' =>['type'=>'accept']])?>" class="btn btn-success btn-block"><i class="fa fa-thumbs-up"></i> Aceitar</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="<?= $this->Url->build([
                                '_name'=>'groups.handleInvites',
                                'gid'=>$invite->group->id,
                                '?' =>['type'=>'reject']])?>" class="btn btn-danger btn-block"><i class="fa fa-thumbs-up"></i> Rejeitar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
</section>