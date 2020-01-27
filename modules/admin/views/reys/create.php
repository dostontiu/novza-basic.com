<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reys */
/* @var $modelGroups yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Yangi reys qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reys-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelGroups' => $modelGroups,
    ]) ?>

</div>
