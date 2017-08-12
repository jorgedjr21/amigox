<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= h($event->name )?> - Informações
    </h1>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <?= $this->Flash->render() ?>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Informações do Evento</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-4 col-sm-12">
                        <p>
                            <strong>Descrição do evento: </strong><br>
                            <?= nl2br($event->description)?>
                        </p>
                        <p>
                            <strong>Local: </strong> <?= __($event->address)?>
                        </p>
                        <p>
                            <strong>Data e Hora: </strong> <?= $this->Time->format($event->datetime,'dd/MM/YYYY - H:mm',null,'America/Sao_Paulo')?>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?php if(!is_null($myFriend)): ?>
                        <div class="col-md-4 col-sm-12">
                            <?= $this->Html->image('profile_default.png',['alt'=>$myFriend->name,'class'=>'profile-user-img img-responsive img-circle']) ?>
                            <h3 class="profile-username text-center"><?= h($myFriend->name) ?></h3>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <p><strong>Preferencias: </strong>
                                <?php foreach ($myFriend['preferences'] as $preference): ?>
                                <span class="label bg-aqua-gradient"><?= __($preference) ?></span>
                                <?php endforeach; ?>
                            </p>
                            <p>
                                <strong>Valor Sugerido: </strong> <?= __($myFriend['max_value']) ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?php if(is_null($lottery)): ?>
                            <p class="lead text-orange text-center">O Sorteio ainda não foi realizado</p>
                            <?php if(!is_null($creator) && $creator->user_id == $user['id']):?>

                                    <?= $this->Form->create(null,['class'=>'text-center','url'=>$this->Url->build(['_name'=>'groups.sort','id'=>$creator->group_id,'eid'=>$event->id])])?>
                                    <?= $this->Form->submit('Sortear Amigos',['class'=>'btn btn-flat bg-maroon btn-lg']); ?>
                                    <?= $this->Form->end();?>
                            <?php endif;?>

                        <?php else:?>
                            <p class="lead text-aqua">Sorteio já realizado. <br> <i class="fa fa-arrow-left fa-lg"></i> Veja seu amigo secreto ao lado. </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>