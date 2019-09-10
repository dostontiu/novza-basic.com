<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Malumot */

$this->title = 'Create Malumot';
$this->params['breadcrumbs'][] = ['label' => 'Malumots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="malumot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
