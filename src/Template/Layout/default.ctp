<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        AmigoX
    </title>
    <?= $this->Html->css(['/bootstrap/css/bootstrap.min.css','/fontawesome/css/font-awesome.min.css','/adminlte/css/AdminLTE.css','/adminlte/css/skins/skin-blue.css'])?>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?= $this->fetch('css') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>X</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Amigo</b>X</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <!--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>-->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <?php if($invites->count() > 0): ?>
                                <span class="label label-warning"><?= $invites->count() ?></span>
                            <?php endif;?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Você tem <?= $invites->count() ?> convite(s) para grupos</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <?php if($invites->count() > 0 ): ?>
                                    <ul class="menu">
                                    <?php foreach($invites as $invite): ?>
                                        <li>
                                            <a href="<?= $this->Url->build(['_name'=>'groups.invites']) ?>"><i class="fa fa-envelope text-aqua"></i><?= $invite->group->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <ul class="menu">
                                        <li><a href="#" class="text-red"><i class="fa fa-times"></i> Nenhum Convite</a></li>
                                    </ul>
                                <?php endif; ?>
                            </li>

                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-calendar"></i>
                            <?php if($eventNotifications->count() > 0 && $eventNotifications->count() < 10): ?>
                                <span class="label label-danger"><?= $eventNotifications->count() ?></span>
                            <?php endif; ?>
                            <?php if($eventNotifications->count() >= 10): ?>
                                <span class="label label-danger">9+</span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Você tem <?= $eventNotifications->count() ?> novo(s) evento(s)</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <!-- inner menu: contains the actual data -->
                                    <?php if($eventNotifications->count() > 0 ): ?>
                                        <ul class="menu">
                                            <?php foreach($eventNotifications as $notification): ?>
                                                <li>
                                                    <a href="<?= $this->Url->build(['_name'=>'groups.viewEvent','eid'=>$notification->event_id]) ?>"><i class="fa fa-clock-o text-muted"></i> <?= $notification->event->name ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <ul class="menu">
                                            <li><a href="#" class="text-red"><i class="fa fa-times"></i> Nenhum Evento</a></li>
                                        </ul>
                                    <?php endif; ?>
                                    <!-- end task item -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="hidden-xs"><?= h($user['name'])?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>

                                <p>
                                    <?= h($user['name'])?>

                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= $this->Url->build(['_name'=>'do.logout']) ?>" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?= $this->Html->image('profile_default.png',['alt'=>'profile','class'=>'img-circle']) ?>
                </div>
                <div class="pull-left info">
                    <p><?= h($user['name'])?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Procurar Presentes...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu de navegação</li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-gift"></i> <span>Grupos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= $this->Url->build(['_name'=>'groups.index'])?>"><i class="fa fa-list"></i> Ver meus Grupos</a></li>
                        <li><a href="<?= $this->Url->build(['_name'=>'groups.add.form']) ?>"><i class="fa fa-plus-circle"></i> Criar novo</a></li>
                    </ul>
                </li>
                <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->fetch('content') ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Amigox - Criado por =JD=. Tema e layout by<a href="https://adminlte.io">Almsaeed Studio</a>.</strong>
    </footer>
    <?= $this->Html->script(['/adminlte/plugins/jQuery/jquery3.min.js','/bootstrap/js/bootstrap.js','/adminlte/js/app.js','/adminlte/plugins/iCheck/icheck.js'])?>
    <?= $this->fetch('scripts') ?>
</body>
</html>
