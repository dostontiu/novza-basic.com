<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Malumot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="malumot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_birth')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ex_date')->textInput() ?>

    <?= $form->field($model, 'is_date')->textInput() ?>

    <?= $form->field($model, 'today')->textInput() ?>

    <?= $form->field($model, 'sent')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
