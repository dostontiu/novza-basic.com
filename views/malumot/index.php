<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MalumotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Malumots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="malumot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Malumot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'name',
            'p_number',
            'd_birth',
            // 'gender',
            // 'ex_date',
            // 'is_date',
            // 'today',
            // 'sent',
            // 'group_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
