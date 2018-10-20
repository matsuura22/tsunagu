<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * 
 */
$this->assign('title', $CodeForName.'活動履歴');
?>
<div class="row">
    <div class="col-lg-12">
        <?php foreach ($histories as $history): ?>
            <div class="<?php echo($panel); ?>">
                <div class="panel-heading">
                    <?php echo($CodeForName); ?> <?=h($history->title)?> <?=h($history->subtitle)?>
                </div>
                <div class="panel-body">
                    <p>◯日時<br/>
                        <?php echo($history->postDate->format('Y年m月d日')); ?>
                    </p>
                    <p>本文
                    <?= $this->Text->autoParagraph(h($history->content)); ?>
                    </p>
                </div>    
                <div class="panel-footer">
                    <a href="<?php echo $this->Url->build(['action'=>'pdf','pdfUrl'=>$history->pdfUrl]); ?>" target="_blank">PDFはこちら</a>
                </div>
            </div>
        <?php endforeach;?>       
    </div>
    <!-- /.col-lg-12 -->
</div>