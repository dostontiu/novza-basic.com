<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reys */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Reys',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelGroups' => $modelGroups,
    ]) ?>

</div>
