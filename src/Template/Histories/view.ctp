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
                活動履歴詳細
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td>投稿者</td>
                                        <td><?= h($history->user->name) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>部署</td>
                                        <td> 
                                            <?php
                                                if (($history->department)== '1'){
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
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>タイトル</td>
                                        <td><?= h($history->title) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>サブタイトル</td>
                                        <td><?= h($history->subtitle) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>本文</td>
                                        <td><?= $this->Text->autoParagraph(h($history->content)); ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>画像URL</td>
                                        <td><a href="<?= h($history->imgUrl) ?>" target="_blank"><?= h($history->imgUrl) ?></a></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>PDF</td>
                                        <td>
                                        <a href="<?php echo $this->Url->build(['action'=>'pdf',$history->id]); ?>">PDF</a></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>投稿日
                                        </td>
                                        <td><?= h($history->postDate) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>