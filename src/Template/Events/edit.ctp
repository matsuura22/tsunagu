<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
$this->assign('title', 'お知らせ');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                お知らせ編集
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->Form->create($event) ?>
                            <fieldset>
                                <div class="form-group">
                                    <?=$this->Form->input('title', array('type' => 'text', 'label' => 'タイトル:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('subtitle', array('type' => 'text', 'label' => 'サブタイトル:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('overView', array('type' => 'textarea', 'label' => '本文:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('place', array('type' => 'text', 'label' => '場所:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('placeUrl', array('type' => 'text', 'label' => '場所URL:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('url', array('type' => 'text', 'label' => '詳細URL:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('imgUrl', array('type' => 'text', 'label' => '画像URL:', 'class' => 'form-control'));?>
                                    <label for="role">日付:</label>
                                        <?=$this->Form->input('startDate', array( 'type' => 'datetime','label'=>'',
                                            'dateFormat' => 'YMD',
                                            'monthNames' => false,
                                            'separator' => '/',
                                            'minYear' => date('Y'),
                                            'maxYear' => date('Y')+1,
                                            'default' => date('Y-m-d'), 'class' => 'form-control'));?>
                                    <?=$this->Form->input('user_id', array('type' => 'hidden','class' => 'form-control', 'value'=>$key_user_id));?>
                                    <?=$this->Form->input('department', array('type' => 'hidden','class' => 'form-control', 'value'=>$key_user_department));?>                                
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

