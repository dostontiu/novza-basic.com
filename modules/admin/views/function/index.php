<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Function1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vazifalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="function1-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?><br> <?= Html::a(Yii::t('app', 'Yangi Vazifa qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?></h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
