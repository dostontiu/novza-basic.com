<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Function1 */

$this->title = Yii::t('app', 'Yangi vazifa qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Function1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="function1-create">
<div class="col-md-5">
    <h1><?= Html::encode($this->title) ?> : </h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
