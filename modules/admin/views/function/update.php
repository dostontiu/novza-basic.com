<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Function1 */

$this->title = 'Vazifani tahrirlash : '. $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Function1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="function1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
