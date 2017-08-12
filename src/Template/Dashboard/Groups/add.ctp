<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Criar novo Grupo
        <small>de amigo secreto</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
            <!-- general form elements disabled -->
            <?= $this->Form->create($group) ?>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Grupo de Amigo Secreto</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <small>Campos * são obrigatórios</small>
                    </div>

                    <!-- text input -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Identificador* </label>
                            <?= $this->Form->text('id',['class'=>'form-control','readonly'=>true,'value'=>$id]) ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Nome* </label>
                            <?= $this->Form->text('name',['class'=>'form-control','placeholder'=>'Nome']) ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Descrição* </label>
                        <?= $this->Form->textArea('description', ['rows'=>'3','maxlength'=>255,'id'=>'description','placeholder'=>'Descrição','class'=>'form-control'])?>
                        <div class="help-block"> <span id="charleft">255</span> caractere(s) restantes</div>
                    </div>

                    <div class="col-md-12">
                        <!-- select -->
                        <div class="form-group">
                            <label>Sugestão de Valor</label>
                            <?= $this->Form->select('max_value',
                                ['Até $30'=>'Até $30','Até $60'=>'Até $60','Até $100'=>'Até $100','Até $150'=>'Até $150','Até $200'=>'Até $200','Acima de $200'=>'Acima de $200'],
                                ['empty'=>'Valor máximo de gasto','class'=>'form-control text-center'])?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?= $this->Form->submit(__('Cadastrar'),['class'=>'btn btn-info btn-lg'])?>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>
<?= $this->start('scripts') ?>

<script>
    $(document).ready(function(){
        var textArea = $("#description");
        var helpLength = $("#charleft");
        var maxLength = 255;
        textArea.keyup(function(){
            helpLength.html(maxLength - $(this).val().length);
        });
    })
</script>
<?= $this->end() ?>
<!-- /.content -->