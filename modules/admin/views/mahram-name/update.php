<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MahramName */

$this->title = 'Mahram turini tahrirlash : '. $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahram Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mahram-name-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
