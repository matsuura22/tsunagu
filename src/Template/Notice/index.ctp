<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * 
 */
$this->assign('title', $CodeForName.' お知らせ');
?>
<div class="row">
    <div class="col-lg-12">
        <?php foreach ($events as $event): ?>
            <div class="<?php echo($panel); ?>">
                <div class="panel-heading">
                    <?php echo($CodeForName); ?> <?=h($event->title)?> <?=h($event->subtitle)?>
                </div>
                <div class="panel-body">
                    <img class="img-rounded" height="100px" src="<?php echo($event->imgUrl); ?>" align="right">
                    <p>◯日時<br/>
                    <?php echo($event->startDate->format('Y年m月d日 H:i')); ?>
                    </p>
                    <p>◯場所<br/>
                    <a href="<?php echo($event->placeUrl); ?>" target="_blank"><?= h($event->place) ?></a>
                    </p>
                    <p>◯概要
                    <?= $this->Text->autoParagraph(h($event->overView)); ?>
                    </p>
                </div>    
                <div class="panel-footer">
                    <a href="<?php echo($event->url); ?>" target="_blank">詳細はこちら</a>
                </div>
            </div>
        <?php endforeach;?>       
    </div>
    <!-- /.col-lg-12 -->
</div>