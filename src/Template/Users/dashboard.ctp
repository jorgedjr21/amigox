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

</section>
<!-- /.content -->