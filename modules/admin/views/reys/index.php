<?php

use yii\helpers\Html;
use app\models\Malumot;
use yii\helpers\Url;
use app\models\Group;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reyslar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">
    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>
    <h6 class="text-right"><?= Html::a('Yangi reys yaratish  <i class="glyphicon glyphicon-plus"></i>','reys/create',['class'=>'add-item btn btn-success btn-lg']) ?></h6>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($reys as $rey):?>
                    <?php
                    $groupCount = Group::find()->select('id')->where(['reys_id' => $rey->id])->all();
                    $g = ArrayHelper::map($groupCount,'id','id');
                    $activePeople = Malumot::find()->where(['in', 'group_id', $g])->count();
                    $prot = $activePeople*100/$rey->count_people;
                    $malumots = Malumot::find()->where(['in', 'group_id', $g])->andWhere(['not', ['function_id' => 1]])->all();
                    foreach ($malumots as $malumot) {
                        $function_count[$malumot->function->name]+=1;
                    }
                    ?>
                    <div role="tabpanel" class="tab-pane fade active in" id="">
                        <div class="tab-collapse clearfix">
                            <div data-toggle="collapse" href="#<?='collapse'.$rey->name?>" aria-expanded="false" aria-controls="collapseExample" class="collapse-link collapsed">
                                <span class="reys"><?= $rey->name ?> - Reys</span>
                                <span class="count_people"><?= $rey->count_people ?> ta ziyoratchi</span><br>
                                <span class="arrive_date"><?=$rey->air_place.'dan uchish kuni : ' .date('d.m.Y',strtotime($rey->arrive_date)) ?></span><br>
                                <span class="depart_date"><?=$rey->air_place.'ga kelish : ' .date('d.m.Y',strtotime($rey->depart_date)) ?></span>
                                <span class="progs">
                                    <div class="prog c100 p<?=(int)$prot?> <?=((int)$prot==100)?'orange':'green'?>">
                                        <span title="Reysda <?=$activePeople?> ta ziyoratchi bor. Yana bu reysga <?=$rey->count_people-$activePeople?> ta ziyoratchi kiritishingiz kerak">
                                            <?=(int)$prot?>%
                                        </span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </span>
                                <!--<span style="float: right" class="function_count">
                                    <?php /*foreach ($function_count as $func => $value){
                                        echo $func.'-'.$value.'<br>';
                                    }
                                    $function_count = false;
                                    */?>
                                </span>-->
                            </div>
                        </div>
                        <div class="collapse col-group" id="<?='collapse'.$rey->name?>" aria-expanded="false" style="height: 0px;">
                            <?php foreach ($groups as $group):?>
                                <?php if ($rey->name ==$group->reys->name):?>
                                    <?php $count = Malumot::find()->where(['group_id'=>$group->id])->count(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="<?=Url::to(['group/view', 'id'=>$group->id])?>">
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
</div>