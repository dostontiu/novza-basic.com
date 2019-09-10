<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;
use app\models\Malumot;
use app\models\Function1;
use app\models\MahramName;

/* @var $this yii\web\View */
/* @var $model app\models\Malumot */
/* @var $form yii\widgets\ActiveForm */
if (!Yii::$app->session->get('group')) {
    Yii::$app->session->set('group', '1');
}
$groups = Group::find()->all();
$minigroups = $groups;
$count = $panel->count();
$mahrams = Malumot::find()->where(['group_id'=>Yii::$app->session->get('group')])->andWhere(['gender'=>'1'])->all();
$findOne = Malumot::find()->where(['group_id'=>Yii::$app->session->get('group')])->andWhere(['user_id'=>Yii::$app->user->identity["id"]])->orderBy(['id'=>SORT_DESC])->one();
$functions = Function1::find()->all();
$mahram_names = MahramName::find()->all();
?>
<br>
<div class="malumot-add">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <form action="change-group" method="get" name="group">
                    <?php foreach ($groups as $group):?>
                        <?php if ($group->id==Yii::$app->session->get('group')): ?>
                            <div class="col-md-3 col-sm-6">
                                <select disabled name="" class="form-control">
                                    <option><?=$group->reys->name?> - Reys</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <select disabled name="reys" class="form-control">
                                    <option><?=$group->region->name?></option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <select name="id" class="form-control">
                                    <?php foreach ($minigroups as $minigroup):?>
                                        <option value="<?=$minigroup->id?>" <?=($minigroup->id==Yii::$app->session->get('group'))?'selected':''?>><?=$minigroup->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <?= Html::submitButton('O\'zgartirish', ['class' => 'btn btn-primary btn-block btn-sm']) ?>
                                <?php $count_people = $group->count_people ?>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </form>
            </div>
            <?php if ($count_people >= $count): ?>
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="col-md-10">
                        <?= $form->field($model, 'read')->textarea(['rows' => 4]) ?>
                    </div>
                <div class="col-md-2">
                    <?= Html::submitButton('Saqlash', ['class' => 'btn saqlash btn-primary btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
                <?php  echo $this->render('last') ?>
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty($messages)): ?>
                        <pre class="bg-danger">
                            <?php print_r($messages)?>
                        </pre>
                    <?php endif;?>
                    <?php if(Yii::$app->session->hasFlash('success')): ?>
                        <h3 class="alert alert-success alert-dismissible text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?=Yii::$app->session->getFlash('success'); ?>
                        </h3>
                    <?php elseif (Yii::$app->session->hasFlash('error')): ?>
                        <h3 class="alert alert-danger alert-dismissible text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?=Yii::$app->session->getFlash('error'); ?>
                        </h3>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <?php if ($count!=0): ?>
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Oxirgi kiritilgan ziyoratchi haqida ma'lumot</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-7">
                            <ul class="list-group text-success">
                                <li class="list-group-item">Familiyasi : <b><?=$findOne['surname']?></b></li>
                                <li class="list-group-item">Ismi : <b><?=$findOne['name']?></b></li>
                                <li class="list-group-item">Pasport raqami : <b><?=$findOne['p_number']?></b></li>
                                <li class="list-group-item">Tug'ilgan kuni : <b><?=date('d.m.Y',strtotime($findOne['d_birth']))?></b></li>
                                <li class="list-group-item">Pasport berilgan vaqti : <b><?=date('d.m.Y',strtotime($findOne['is_date']))?></b></li>
                                <li class="list-group-item">Pasport tugash muddati : <b><?=date('d.m.Y',strtotime($findOne['ex_date']))?></b></li>
                                <li class="list-group-item">Qachon kiritilganligi : <b><?=date('d.m.Y H:i:s',strtotime($findOne['today']))?></b></li>
                                <li class="list-group-item">Kim kiritganligi : <i><?=Yii::$app->user->identity['name']?></i></li>
                                <li class="list-group-item"><b class="glyphicon <?=($findOne['gender'])?'glyphicon-triangle-bottom':'glyphicon-triangle-top'?>"></b></li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-info">
                                <?= (file_exists("img/inch/{$findOne['p_number']}.jpg"))?Html::img("/img/inch/{$findOne['p_number']}.jpg",['style'=>'max-width:180px',]):Html::img("/img/dump/nophoto.png",['style'=>'max-width:220px',]);?>
                                <input name="img" style="float: left" class="" type="file" id="img">
                            </div>
                            <form action="last" method="get">
                                <input type="hidden" name="id" value="<?=$findOne['id']?>">
                                <?php if ($findOne['gender']==0 && date('Y', strtotime($findOne['d_birth']))>=1973): ?>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <select name="mahram_name_id" class="form-control">
                                                <option value="<?=null?>">Mahram</option>
                                                <?php foreach ($mahram_names as $mahram_name):?>
                                                    <option value="<?=$mahram_name->id?>" <?=($findOne['mahram_name_id']==$mahram_name->id)?'selected':''?>><?=$mahram_name->name?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-xs-7">
                                            <select name="mahram_id" class="form-control">
                                                <option value="<?=null?>">Mahram kimligi</option>
                                                <?php foreach ($mahrams as $mahram):?>
                                                    <option value="<?=$mahram->id?>" <?=($findOne['mahram_id']==$mahram->id)?'selected':''?>><?=$mahram->surname.' '.$mahram->name.' @ '.$mahram->p_number?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <select name="function_id" class="form-control">
                                    <?php foreach ($functions as $function):?>
                                        <option value="<?=$function->id?>" <?=($findOne['function_id']==$function->id)?'selected':''?>><?=$function->name?></option>
                                    <?php endforeach;?>
                                </select>
                                <textarea name="address" class="form-control" placeholder="Yashash joyi haqida ma'lumot" rows="3"><?=$findOne['address']?></textarea>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <input name="tel_number" type="text" class="form-control" id="tel" value="<?=$findOne['tel_number']?>" placeholder="Telefon raqami">
                                    </div>
                                    <div class="col-xs-5">
                                        <?= Html::submitButton('Tahrirlash', ['class' => 'btn btn-info btn-block']) ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php else:?>
                    <div class="jumbotron">
                        <h1 class="text-danger">Guruhda ziyoratchilar<br> yo'q</h1>
                        <p>Guruhga yana <?=$count_people?> ta ziyoratchi<br> kiritilishi kerak</p>
                        <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
                    </div>
                <?php endif;?>
            </div>
            <?php else:?>
                <br>
                <br>
                <div class="alert alert-success jumbotron" role="alert">
                    <h1 class="text-center text-danger">Guruhda ziyoratchilar to'liq</h1>
                    <br>
                </div>
            <?php endif;?>
        </div>
        <div class="col-md-5">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success"><span class="badge"><?=$count_people?></span>Guruhdagi ziyoratchilarning umumiy soni</li>
                <li class="list-group-item list-group-item-info"><span class="badge"><?=$count?></span>Hozirda guruhdagi ziyoratchilar soni</li>
                <li class="list-group-item list-group-item-danger"><span class="badge"><?=$count_people-$count?></span>Guruhga yana kiritish kerak</li>
            </ul>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?=$count/$count_people*100?>%">
                    <div class="speed text-danger" title="Guruhga <?=$count?> ta ziyoratchi kirgan" ><?=$count?></div>
                </div>
                <div class="speed text-success" title="Guruhga yana <?=$count_people-$count?> ta ziyoratchi kiritilishi kerak"><?=$count_people-$count?></div>
            </div>
            <?php if ($count!=0): ?>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Familiya</th>
                    <th>Ism</th>
                    <th>Pasport raqam</th>
                    <th>Tugilgan kun</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($panel->all() as $val):?>
                <?php $img = (file_exists("img/inch/{$val->p_number}.jpg"))?Html::img("/img/inch/{$val->p_number}.jpg",['class'=>'img-table-add',]):Html::img("/img/dump/nophoto.png",['class'=>'img-table-add-nophoto']);?>
                <tr>
                    <th scope="row"><?=++$id?></th>
                    <td><?=$val->surname?></td>
                    <td><?=$val->name?></td>
                    <td><?=$val->p_number?></td>
                    <td><?= date('d.m.Y',strtotime($val->d_birth)) ?></td>
                    <td><?=$img?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <?php else:?>
            <div class="jumbotron">
                <h1 class="text-danger">Guruhda ziyoratchilar yo'q</h1>
                <p>Guruhga yana <?=$count_people?> ta ziyoratchi kiritilishi kerak</p>
            </div>
            <?php endif;?>
        </div>
    </div>    
</div>