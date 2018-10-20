<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * 
 */
$this->assign('title', '繋ぐ。');
?>
<div class="row">
    <div class="col-lg-12">
        <?php if(count($cfikoma->toArray())>0){ ?>
        <div class="panel panel-green">
            <div class="panel-heading">
                Code For 生駒 
            </div>
            <div class="panel-body">
            <img class="img-rounded" height="100px" src="<?php echo($cfikoma->toArray()['0']['imgUrl']); ?>" align="right">
                <p>◯日時<br/>
                <?php echo($cfikoma->toArray()['0']['startDate']->format('Y年m月d日 H:i')); ?>
                </p>
                <p>◯場所<br/>
                <a href="<?php echo($cfikoma->toArray()['0']['placeUrl']); ?>" target="_blank"><?php echo($cfikoma->toArray()['0']['place']); ?></a>
                </p>
                <p>◯概要
                <?= $this->Text->autoParagraph(h($cfikoma->toArray()['0']['overView'])); ?>
                </p>
            </div>    
            <div class="panel-footer">
                <a href="<?php echo($cfikoma->toArray()['0']['url']); ?>" target="_blank">詳細はこちら</a>
            </div>
        </div>
        <?php } if(count($cfnara->toArray())>0){ ?>
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Code For 奈良
            </div>
            <div class="panel-body">
            <img class="img-rounded" height="100px" src="<?php echo($cfnara->toArray()['0']['imgUrl']); ?>" align="right">
                <p>◯日時<br/>
                <?php echo($cfnara->toArray()['0']['startDate']->format('Y年m月d日 H:i')); ?>
                </p>
                <p>◯場所<br/>
                <a href="<?php echo($cfnara->toArray()['0']['placeUrl']); ?>" target="_blank"><?php echo($cfnara->toArray()['0']['place']); ?></a>
                </p>
                <p>◯概要
                <?= $this->Text->autoParagraph(h($cfnara->toArray()['0']['overView'])); ?>
                </p>
            </div>    
            <div class="panel-footer">
                <a href="<?php echo($cfnara->toArray()['0']['url']); ?>" target="_blank">詳細はこちら</a>
            </div>
        </div>
        <?php } if(count($cfyamatokoriyama->toArray())>0){ ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                Code For 大和郡山
            </div>
            <div class="panel-body">
            <img class="img-rounded" height="100px" src="<?php echo($cfyamatokoriyama->toArray()['0']['imgUrl']); ?>" align="right">
                <p>◯日時<br/>
                <?php echo($cfyamatokoriyama->toArray()['0']['startDate']->format('Y年m月d日 H:i')); ?>
                </p>
                <p>◯場所<br/>
                <a href="<?php echo($cfyamatokoriyama->toArray()['0']['placeUrl']); ?>" target="_blank"><?php echo($cfyamatokoriyama->toArray()['0']['place']); ?></a>
                </p>
                <p>◯概要
                <?= $this->Text->autoParagraph(h($cfyamatokoriyama->toArray()['0']['overView'])); ?>
                </p>
            </div>    
            <div class="panel-footer">
                <a href="<?php echo($cfyamatokoriyama->toArray()['0']['url']); ?>" target="_blank">詳細はこちら</a>
            </div>
        </div>
        <?php } if(count($cfsango->toArray())>0){ ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                Code For 三郷
            </div>
            <div class="panel-body">
            <img class="img-rounded" height="100px" src="<?php echo($cfsango->toArray()['0']['imgUrl']); ?>" align="right">
                <p>◯日時<br/>
                <?php echo($cfsango->toArray()['0']['startDate']->format('Y年m月d日 H:i')); ?>
                </p>
                <p>◯場所<br/>
                <a href="<?php echo($cfsango->toArray()['0']['placeUrl']); ?>" target="_blank"><?php echo($cfsango->toArray()['0']['place']); ?></a>
                </p>
                <p>◯概要
                <?= $this->Text->autoParagraph(h($cfsango->toArray()['0']['overView'])); ?>
                </p>
            </div>    
            <div class="panel-footer">
                <a href="<?php echo($cfsango->toArray()['0']['url']); ?>" target="_blank">詳細はこちら</a>
            </div>
        </div>
        <?php } if(count($cfex->toArray())>0){ ?>
        <div class="panel panel-warning">
            <div class="panel-heading">
                その他
            </div>
            <div class="panel-body">
            <img class="img-rounded" height="100px" src="<?php echo($cfex->toArray()['0']['imgUrl']); ?>" align="right">
                <p>◯日時<br/>
                <?php echo($cfex->toArray()['0']['startDate']->format('Y年m月d日 H:i')); ?>
                </p>
                <p>◯場所<br/>
                <a href="<?php echo($cfex->toArray()['0']['placeUrl']); ?>" target="_blank"><?php echo($cfex->toArray()['0']['place']); ?></a>
                </p>
                <p>◯概要
                <?= $this->Text->autoParagraph(h($cfex->toArray()['0']['overView'])); ?>
                </p>
            </div>    
            <div class="panel-footer">
                <a href="<?php echo($cfex->toArray()['0']['url']); ?>" target="_blank">詳細はこちら</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- /.col-lg-12 -->
</div>