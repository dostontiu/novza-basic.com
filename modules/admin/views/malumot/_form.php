<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Group;
use app\models\Function1;
use app\models\MahramName;
use app\models\Malumot;

/* @var $this yii\web\View */
/* @var $model app\models\Malumot */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin();
$dataGroup = ArrayHelper::map(Group::find()->all(), 'id', 'name');
$dataFunction = ArrayHelper::map(Function1::find()->all(), 'id','name');
$dataMahramNameId = ArrayHelper::map(MahramName::find()->all(), 'id', 'name');
$dataMahramId = ArrayHelper::map(Malumot::find()->where(['group_id'=>$model->group_id])->andWhere(['gender'=>'1'])->all(), 'id','p_number','surname');
?>

<div class="malumot-form">
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'group_id')->dropDownList($dataGroup)->label('Guruhni tanlang') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'function_id')->dropDownList($dataFunction)->label('Vazifasini tanlang') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tel_number')->label('Telefon raqami') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'address')->textarea(['rows'=>4])->label('Manzili') ?>
        </div>
        <div class="col-md-4">
            <?php if ($model->gender==0 && date('Y', strtotime($model->d_birth))>=1973): ?>
                <?= $form->field($model, 'mahram_name_id')->dropDownList([''=>'Mahrami yo\'q',$dataMahramNameId])->label('Mahram') ?>
                <?= $form->field($model, 'mahram_id')->dropDownList([''=>'Mahrami yo\'q',$dataMahramId])->label('Mahramining ismi') ?>
            <?php else: ?>
                <br>
                <br>
            <?php endif; ?>
            <?= Html::submitButton('O\'zgartirish', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<pre>
        <?php
        print_r($dataMahramId);
        ?>
    </pre>