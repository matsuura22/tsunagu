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
                お知らせ詳細
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
                                        <td><?= h($event->user->name) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>部署</td>
                                        <td> 
                                            <?php
                                                if (($event->department)== '1'){
                                                    echo ('管理者');
                                                }elseif(($event->department) == '2') {
                                                    echo ('Code For 生駒');
                                                }elseif(($event->department) == '3') {
                                                    echo ('Code For 奈良');
                                                }elseif(($event->department) == '4') {
                                                    echo ('Code For 大和郡山');
                                                }elseif(($event->department) == '5') {
                                                    echo ('Code For 三郷');
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>タイトル</td>
                                        <td><?= h($event->title) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>サブタイトル</td>
                                        <td><?= h($event->subtitle) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>開始日</td>
                                        <td><?= h($event->startDate) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>概要</td>
                                        <td><?= $this->Text->autoParagraph(h($event->overView)); ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>場所</td>
                                        <td><?= h($event->place) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>場所URL</td>
                                        <td><a href="<?= h($event->placeUrl) ?>" target="_blank"><?= h($event->placeUrl) ?></a></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>詳細URL</td>
                                        <td><a href="<?= h($event->url) ?>" target="_blank"><?= h($event->url) ?></a></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>画像URL</td>
                                        <td><a href="<?= h($event->imgUrl) ?>" target="_blank"><?= h($event->imgUrl) ?></a></td>
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
