<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\History[]|\Cake\Collection\CollectionInterface $histories
 */
$this->assign('title', '活動履歴');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                活動履歴一覧
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                            <th scope="col" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"><?=$this->Paginator->sort('user_id')?></th>
                                            <th scope="col" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"><?=$this->Paginator->sort('department')?></th>
                                            <th scope="col" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"><?=$this->Paginator->sort('title')?></th>
                                            <th scope="col" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"><?=$this->Paginator->sort('subtitle')?></th>
                                            <th scope="col" class="actions"><?=__('動作')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($histories as $history): ?>
                                        <tr class="gradeA odd" role="row">
                                            <td><?=h($history->user->name)?></td>
                                            <td>
                                                <?php
                                                    if (($history->department) == '1'){
                                                        echo ('管理者');
                                                    }elseif(($history->department) == '2') {
                                                        echo ('Code For 生駒');
                                                    }elseif(($history->department) == '3') {
                                                        echo ('Code For 奈良');
                                                    }elseif(($history->department) == '4') {
                                                        echo ('Code For 大和郡山');
                                                    }elseif(($history->department) == '5') {
                                                        echo ('Code For 三郷');
                                                    }
                                                ?>
                                            </td>
                                            <td><?=h($history->title)?></td>
                                            <td><?=h($history->subtitle)?></td>
                                            <td class="actions">
                                                [<?=$this->Html->link(__('詳細表示'), ['action' => 'view', $history->id])?>]
                                                [<?=$this->Html->link(__('編集'), ['action' => 'edit', $history->id])?>]
                                                [<?=$this->Form->postLink(__('削除'), ['action' => 'delete', $history->id], ['confirm' => __('削除します。宜しいですか？ {0}?', $history->id)])?>]
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <?=$this->Paginator->first('<< ' . __('最初'))?>
                                    <?=$this->Paginator->prev('< ' . __('前'))?>
                                    <?=$this->Paginator->numbers()?>
                                    <?=$this->Paginator->next(__('次') . ' >')?>
                                    <?=$this->Paginator->last(__('最後') . ' >>')?>
                                </ul>
                                <p><?=$this->Paginator->counter(['format' => __('ページ {{page}} / {{pages}},表示 {{current}} / {{count}} ')])?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <a href="<?php echo $this->Url->build(['controller'=>'Histories', 'action'=>'add']); ?>"><button type="button" class="btn btn-success">新規活動履歴</button></a>
        
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
