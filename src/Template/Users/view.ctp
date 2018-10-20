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
                ユーザ詳細
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td>ログインid</td>
                                        <td><?= h($user->mail) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>名前</td>
                                        <td><?= h($user->name) ?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>権限</td>
                                        <td> <?php if (($user->role) == '1') {echo ('管理者');} else {echo ('一般');}?></td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td>部署</td>
                                        <td> 
                                            <?php
                                                if (($user->department)== '1'){
                                                    echo ('管理者');
                                                }elseif(($user->department) == '2') {
                                                    echo ('Code For 生駒');
                                                }elseif(($user->department) == '3') {
                                                    echo ('Code For 奈良');
                                                }elseif(($user->department) == '4') {
                                                    echo ('Code For 大和郡山');
                                                }elseif(($user->department) == '5') {
                                                    echo ('Code For 三郷');
                                                }
                                            ?>
                                        </td>
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
