<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script> -->
    <?=$this->Html->charset()?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?=$cakeDescription?>:
        <?=$this->fetch('title')?>
    </title>
    <?=$this->Html->meta('icon')?>

    <?=$this->fetch('meta')?>

    <?=$this->Html->css('../vendor/bootstrap/css/bootstrap.min.css')?>
    <?=$this->Html->css('../vendor/metisMenu/metisMenu.min.css')?>
    <?=$this->Html->css('../dist/css/sb-admin-2.css')?>
    <?=$this->Html->css('../vendor/font-awesome/css/font-awesome.min.css')?>

    <?=$this->Html->script('../vendor/jquery/jquery.min.js')?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

    <?=$this->Html->script('../vendor/bootstrap/js/bootstrap.min.js')?>
    <?=$this->Html->script('../vendor/metisMenu/metisMenu.min.js')?>
    <?=$this->Html->script('../vendor/datatables/js/jquery.dataTables.min.js')?>
    <?=$this->Html->script('../vendor/datatables-plugins/dataTables.bootstrap.min.js')?>
    <?=$this->Html->script('../vendor/datatables-responsive/dataTables.responsive.js')?>
    <?=$this->Html->script('../dist/js/sb-admin-2.js')?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">繋ぐ。 <?php echo($this->request->session()->read('Auth.User.name')); ?></a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller'=>'top', 'action'=>'index']); ?>"><i class="fa fa-dashboard"></i>トップ</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i>CF生駒<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Notice', 'action'=>'index','department'=>'2']); ?>">お知らせ</a></li>
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Activity', 'action'=>'index','department'=>'2']); ?>">活動履歴</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i>CF奈良<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Notice', 'action'=>'index','department'=>'3']); ?>">お知らせ</a></li>
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Activity', 'action'=>'index','department'=>'3']); ?>">活動履歴</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i>CF大和郡山<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Notice', 'action'=>'index','department'=>'4']); ?>">お知らせ</a></li>
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Activity', 'action'=>'index','department'=>'4']); ?>">活動履歴</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i>CF三郷<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Notice', 'action'=>'index','department'=>'5']); ?>">お知らせ</a></li>
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Activity', 'action'=>'index','department'=>'5']); ?>">活動履歴</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i>その他<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Notice', 'action'=>'index','department'=>'1']); ?>">お知らせ</a></li>
                            <li><a href="<?php echo $this->Url->build(['controller'=>'Activity', 'action'=>'index','department'=>'1']); ?>">活動履歴</a></li>
                        </ul>
                    </li>
                    <?php if (is_null($this->request->session()->read('Auth.User.id'))) {} else {
                        if($this->request->session()->read('Auth.User.role') == 1){?>
                            <li>
                                <a href="<?php echo $this->Url->build(['controller'=>'users', 'action'=>'index']); ?>"><i class="fa fa-user"></i>ユーザ一覧</a>
                            </li>
                        <?php }?>
                            <li>
                                <a href="<?php echo $this->Url->build(['controller'=>'Events', 'action'=>'index']); ?>"><i class="fa fa-info-circle"></i>お知らせ投稿</a>
                            </li>
                            <li>
                                <a href="<?php echo $this->Url->build(['controller'=>'Histories', 'action'=>'index']); ?>"><i class="fa fa-history"></i>活動履歴投稿</a>
                            </li>
                            <li>
                                <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'logout']); ?>"><i class="fa fa-power-off"></i>ログアウト</a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$this->fetch('title')?></h1>
                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?=$this->Flash->render()?>
            <?=$this->fetch('content')?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>