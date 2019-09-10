<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MahramName */

$this->title = Yii::t('app', 'Yangi mahram turini qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahram Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahram-name-create">
<div class="col-md-6">
    <h1><?= Html::encode($this->title) ?> : </h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
