<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'ユーザ');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                ユーザ編集
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                        <?= $this->Form->create($user) ?>
    <fieldset>
    <div class="form-group">
    <?=$this->Form->input('mail', array('type' => 'email', 'label' => 'メール:', 'class' => 'form-control'));?>
    <?=$this->Form->input('password', array('type' => 'password', 'label' => 'パスワード:', 'class' => 'form-control'));?>
    <?=$this->Form->input('name', array('type' => 'text', 'label' => '名前:', 'class' => 'form-control'));?>
    <label for="role">権限:</label>
        <?=$this->Form->select ( "role",
            [ "1"=>"管理者","2"=> "一般"],array('class' => 'form-control') );?>
    <label for="role">権限:</label>
        <?=$this->Form->select ( "department",
            [ "1"=>"管理者","2"=> "Code For 生駒","3"=>"Code For 奈良","4"=>"Code For 大和郡山","5"=>"Code For 三郷"],array('class' => 'form-control') );?>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-lg btn-success btn-block">編集</button>

    <?= $this->Form->end() ?>
                            
                        </div>
                    </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>