<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php if(!$canSee): ?>
            Você não participa deste grupo
        <?php else: ?>
            <?= h($group->name )?> - Informações, membros e ações
        <?php endif; ?>
    </h1>

</section>

<!-- Main content -->
<section class="content">

    <?= $this->Flash->render()?>

    <?php if(!$canSee): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="box box-solid box-warning">
                        <div class="box-body text-center">
                            <p class="lead text-red">Você não está participando deste grupo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-4 col-sm-12">
                            <p><strong>Descrição do grupo: </strong> <br><?= h($group['description'])?></p>
                            <p><strong>Valor sugerido de presente: </strong> <?php echo !empty($group['max_value']) ? $group['max_value'] : 'Sem sugestão'?></p>
                            <p><strong>Total de membros: </strong> <?= $usersFromGroup->count() ?></p>
                            <p>
                                <small>Todo grupo deve ter pelo menos 4 membros para que o sorteio possa ser realizado. <br>A sessão de amigo secreto só pode ser marcada após o grupo atingir esta quantidade de membros</small>
                            </p>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?php
                            if($groupEvents->count() <= 0):
                                ?>
                                <div class="row">
                                    <p class="lead text-center text-aqua">Este grupo ainda não tem eventos marcados</p>
                                </div>
                            <?php else: ?>
                                <div class="row" >
                                    <div class="col-md-12 text-center">
                                        <p class="lead" style="border-bottom: 1px solid #c4c4c4">Próximos eventos</p>
                                    </div>
                                    <div class="col-md-12">
                                        <?php foreach($groupEvents as $event):?>
                                            <ul>
                                                <li><a href="<?= $this->Url->build(['_name'=>'groups.viewEvent','eid'=>$event->event_id]) ?>">
                                                        <?= $event->_matchingData['Event']->name ?> -
                                                        <?= $this->Time->format($event->_matchingData['Event']->datetime,'dd/MM/YYYY H:mm',null,'America/Sao_Paulo')?> -
                                                        <?= $event->_matchingData['Event']->address ?>
                                                    </a>
                                                </li>
                                            </ul>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if($creator['user_id'] == $user['id']): ?>
                            <div class="col-md-2 col-sm-12 text-center">
                                <div class="btn-group-vertical">
                                    <a href="<?= $this->Url->build(['_name'=>'groups.view.addMember','id'=>$group['id']])?>" class="btn btn-success btn-lg btn-block">Adicionar Membros</a>

                                    <?php if($usersFromGroup->count() >= 4 && $usersFromGroup->count() % 2 == 0 ): ?>
                                        <a href="<?= $this->Url->build(['_name'=>'groups.events.new','id'=>$group['id']])?>" class="btn bg-maroon btn-lg btn-block">Marcar Encontro</a>
                                    <?php else: ?>
                                        <a href="#" class="btn bg-maroon btn-lg btn-block" data-toggle="tooltip" data-placement="bottom" title="Só é possivel marcar uma sessão de amigo secreto após o sorteio do grupo" disabled="">Marcar Encontro</a>
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
                            <?= $this->Html->image($userG['img_profile'],['alt'=>$userG['name'],'class'=>'profile-user-img img-responsive img-circle']) ?>
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
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mensagens</h3>
                    </div>
                    <div class="box-footer box-comments">
                        <?php foreach ($messages as $message): ?>
                            <div class="box-comment">
                                <!-- User image -->
                                <?= $this->Html->image($message->user->img_profile,['alt'=>'Usuario','class'=>'img-circle img-md']) ?>
                                <div class="comment-text">
                          <span class="username">
                            <?= $message->user->name?> - <small class="text-muted"><?= $this->Time->format($message->datetime,'dd/MM/YYYY - H:mm',null)?></small>
                          </span>
                                    <!-- /.username -->
                                    <?= nl2br($message->message) ?>
                                    <!-- /.comment-text -->
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="page-header">Deixe a sua mensagem</h3>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="box box-success">
                    <div class="box-footer">
                        <?= $this->Form->create(null,['url'=>$this->Url->build(['_name'=>'groups.sendMessage','id'=>$group['id']])]) ?>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="">
                                <?= $this->Html->image($user['img_profile'],['alt'=>$user['name'],'class'=>'profile-user-img img-responsive img-circle']) ?>
                                <h3 class="profile-username text-center"><?= h($user['name']) ?></h3>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mensagem* </label>
                                <?= $this->Form->textArea('message',['id'=>'message','class'=>'form-control', 'rows'=>3]) ?>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <?= $this->Form->submit(__('Enviar Mensagem'),['class'=>'btn btn-success btn-lg btn-flat btn-block'])?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php
                    $this->Paginator->options(['url'=>['_name'=>'groups.view','id'=>$group['id']]]);
                    echo $this->Paginator->counter(array(
                        'format' => __('Página {{page}} de {{pages}}, mostrando {{current}} mensagens de {{count}}.')
                    ));
                    ?>
                    <ul class="pagination pull-right">
                        <?php
                        echo $this->Paginator->first(__('Primeira', true), array('tag' => 'li', 'escape' => false), array('type' => "button", 'class' => "btn btn-default"));
                        echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
                        echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->last(__('Último', true), array('tag' => 'li', 'escape' => false), array('type' => "button", 'class' => "btn btn-default"));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<!-- /.content -->