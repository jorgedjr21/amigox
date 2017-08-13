<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sua página
        <small>Amigox</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= h($myGroups) ?></h3>

                    <p>Meus Grupos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= $this->Url->build(['_name'=>'groups.index'])?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>Está procurando presentes?</h3>
            <p class="lead">Utilize o campo abaixo para procurar o presente ideal para o seu amigo secreto!</p>
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="text" name="q" id="dashsearch" class="form-control input-lg" placeholder="Buscar Presentes...">
                    <span class="input-group-btn">
                        <button type="button" name="search" id="btnsearchdash" class="btn btn-flat bg-yellow-gradient">
                          <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?= $this->start('scripts') ?>
<script>
    $(document).ready(function(){
        var btnSearch = $("#btnsearchdash");
        var searchUrl = "http://www.buscape.com.br/cprocura?produto=";
        var q = $("#dashsearch");

        btnSearch.click(function(){

            window.open(searchUrl+q.val(),'_blank');
            q.val('');
        })
    })
</script>
<?= $this->end() ?>