<?= $this->start('css') ?>
    <?= $this->Html->css('/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') ?>
    <?= $this->Html->css('/adminlte/plugins/datepicker/datepicker3.css') ?>
<?= $this->end() ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= h($group->name )?> - Novo Evento
    </h1>

</section>

<!-- Main content -->
<section class="content">

<?= $this->Flash->render()?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <?= $this->Form->create(); ?>
                <div class="box-header">
                    <h3 class="box-title">Novo Evento <small>Campos com * são obrigatórios</small></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Identificador* </label>
                            <?= $this->Form->text('id',['class'=>'form-control','value'=>uniqid(),'readonly']) ?>
                        </div>
                        <div class="form-group">
                            <label>Nome do Evento* </label>
                            <?= $this->Form->text('name',['class'=>'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label>Endereço*</label>
                            <?= $this->Form->text('address',['class'=>'form-control','placeholder'=>'Avenida Paulista 999 - São Paulo, SP']) ?>
                            <div class="help-block text-orange">Não esqueça de colocar o endereço completo</div>
                        </div>
                        <div class="form-group">
                            <label>Descrição* </label>
                            <?= $this->Form->textArea('description',['id'=>'description','class'=>'form-control','maxLength'=>255, 'rows'=>3]) ?>
                            <div class="help-block"> <span id="charleft">255</span> caractere(s) restantes</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Horário* </label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <?= $this->Form->text('time',['class'=>'form-control','id'=>'timepicker']) ?>
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Data* </label>
                            <div class="input-group">
                                <?= $this->Form->text('date',['class'=>'form-control','id'=>'datepicker']) ?>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="box-footer">
                    <?= $this->Form->submit('Criar Evento',['class'=>'btn btn-success btn-flat btn-lg'])?>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>

<?= $this->start('scripts') ?>
<?= $this->Html->script('/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') ?>
<?= $this->Html->script(['/adminlte/plugins/datepicker/bootstrap-datepicker.js','/adminlte/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js']) ?>
<script>
    $(document).ready(function(){
        $('#timepicker').timepicker({
            showInputs: false,
            showMeridian: false,
            minuteStep: 30,
            template:'dropdown'
        });

        $('#datepicker').datepicker({
            autoclose: true,
            format:'dd/mm/yyyy',
            language:'pt-BR'
        })

        var textArea = $("#description");
        var helpLength = $("#charleft");
        var maxLength = 255;
        textArea.keyup(function(){
            helpLength.html(maxLength - $(this).val().length);
        });
    })
</script>
<?= $this->end() ?>