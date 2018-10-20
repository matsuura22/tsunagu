<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\History $history
 */
$this->assign('title', '活動履歴');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                活動履歴編集
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->Form->create($history) ?>
                            <fieldset>
                                <div class="form-group">
                                    <?=$this->Form->input('title', array('type' => 'text', 'label' => 'タイトル:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('subtitle', array('type' => 'text', 'label' => 'サブタイトル:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('content', array('type' => 'textarea', 'label' => '本文:', 'class' => 'form-control'));?>
                                    <?=$this->Form->input('pdfcontent', array('type' => 'text', 'label' => 'pdf本文:', 'class' => 'form-control','maxlength'=>'53'));?>
                                    <?=$this->Form->input('pdfUrl', array('type' => 'hidden','class' => 'form-control', 'value'=>$history->pdfUrl));?>
                                    <label for="role">日付:</label>
                                        <?=$this->Form->input('postDate', array( 'type' => 'datetime','label'=>'',
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
                        <button type="submit" class="btn btn-lg btn-success btn-block">登録</button>
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