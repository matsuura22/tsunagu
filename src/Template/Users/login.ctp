<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * 
 */
$this->assign('title', 'ログイン');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <?=$this->Flash->render()?>
            <?=$this->Form->create()?>
            <fieldset>
                <div class="form-group">
                <?=$this->Form->input('mail', array('type' => 'email', 'label' => 'ログインid', 'class' => 'form-control'));?>
                </div>
                <div class="form-group">
                <?=$this->Form->input('password', array('type' => 'password', 'label' => 'パスワード', 'class' => 'form-control', 'placeholder' => 'Password'));?>
                </div>
                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>

            </fieldset>
            <?=$this->Form->end()?>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>