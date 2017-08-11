<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Meus grupos
        <small>de amigo secreto</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Meus Grupos</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Valor de gasto</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($groups as $group):?>
                        <tr class="text-center">
                            <td width="100"><?= h($group['id']) ?></td>
                            <td><?= h($group['name']) ?></td>
                            <td><?= h($group['max_value'])?></td>
                            <td><?= ($group->_matchingData['UsersGroup']->role == 2) ? 'Criador' : 'Membro' ?></td>
                            <td width="100"><a href="<?= $this->Url->build(['_name'=>'groups.view','id'=>$group['id']]) ?>" class="btn btn-success btn-sm">Mais Informações</a></td>
                        </tr>

                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <p class="text-center">
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página {{page}} de {{pages}}, mostrando {{current}} grupos de {{count}}.')
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
    </p>

</section>
<!-- /.content -->