
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($reys as $rey):?>
                <div role="tabpanel" class="tab-pane fade active in" id="">
                    <div class="tab-collapse clearfix">
                        <div data-toggle="collapse" href="#<?='collapse'.$rey->name?>" aria-expanded="false" aria-controls="collapseExample" class="collapse-link collapsed">
                            <span class="reys"><?= $rey->name ?> - Reys</span>
                            <span class="count_people"><?= $rey->count_people ?> ta ziyoratchi</span><br>
                            <span class="arrive_date">Toshkentdan uchish kuni : <?= date('d.m.Y H:i',strtotime($rey->arrive_date)) ?></span><br>
                            <span class="depart_date">Toshkentga kelish kuni : <?= date('d.m.Y H:i',strtotime($rey->depart_date)) ?></span>
                        </div>
                    </div>
                    <div class="collapse col-group" id="<?='collapse'.$rey->name?>" aria-expanded="false" style="height: 0px;">
                        <?php foreach ($groups as $group):?>
                            <?php if ($rey->name ==$group->reys->name):?>
                                <?php $count = \app\models\Malumot::find()->where(['group_id'=>$group->id])->count(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?=\yii\helpers\Url::to(['group/view', 'id'=>$group->id])?>">
                                            <span class="reys"><?=$group->name?></span>
                                            <span class="fa fa-users text-success text-right btn-lg text-right"> <?=$group->count_people?> ta</span>
                                            <p class="reys text-info"><?=$group->region->name?></p>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?=$count*100/$group->count_people?>%">
                                                <div class="speed text-danger" title="Guruhga <?=$count?> ta ziyoratchi kirgan" ><?=$count?>
                                                </div>
                                            </div>
                                            <div class="speed text-success" title="Guruhga yana <?=$group->count_people-$count?> ta ziyoratchi kiritilishi kerak"><?=$group->count_people-$count?></div>
                                        </div>
                                    </div>

                                </div>
                            <?php endif;?>
                        <?php endforeach; ?>
                        <?php $reysnum = $rey->name ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>