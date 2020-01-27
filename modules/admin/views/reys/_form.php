<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Reys */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelGroups yii\widgets\ActiveForm */
$regions = \app\models\Region::MapRegion();
?>

<div class="reys-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'reys_name')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'count_people')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'air_place')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'depart_date')->widget(\kartik\date\DatePicker::className(), [
     'language' => 'ru',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                ]
  ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'arrive_date')->widget(\kartik\date\DatePicker::className(), [
                'language' => 'ru',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                ]
            ]) ?>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h3>Guruhlar</h3></div>
            <div class="panel-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelGroups[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'name',
                        'region_id',
                        'count_people',
                    ],
                ]); ?>
                <div class="pull-right add">
                    <button type="button" class="add-item btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                <br>
                <br>
                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelGroups as $i => $modelGroup): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h2 class="panel-title pull-left">Guruh</h2>
                                <div class="pull-right">


                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelGroup->isNewRecord) {
                                    echo Html::activeHiddenInput($modelGroup, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?= $form->field($modelGroup, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelGroup, "[{$i}]region_id")->dropDownList($regions) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modelGroup, "[{$i}]count_people")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <br>
                                        <button type="button" class="remove-item btn btn-danger btn-sm"><i class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-1">
        <br>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Yaratish') : Yii::t('app', 'Tahrirlash'), ['class' => $model->isNewRecord ? 'btn-block btn-lg btn btn-success' : 'btn-block btn-lg btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
