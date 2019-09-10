<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Malumot */

$this->title = 'Guruhni o\'zgartirish : ' . ' ' . $model->group->name;
$this->params['breadcrumbs'][] = ['label' => 'Malumots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="malumot-update">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
