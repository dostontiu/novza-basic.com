<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id = 0;
?>
<div class="group-view">
    <div class="row">
        <div class="col-md-4">
            <h1><?= Html::encode($this->title) ?> guruhi</h1>
            <p>
                <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Haqiqatdan ham bu guruhni o\'chirmoqchimisiz?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <div class="col-md-7">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'reys_id',
                    'region_id',
                    'count_people',
                ],
            ]) ?>
        </div>
    </div>
    
    <div class="row">
    <?php if ($malumots):?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Familiya</th>
                <th>Ism</th>
                <th>Pasport raqam</th>
                <th>Tug'ilgan kun</th>
                <th>Pasport berilgan</th>
                <th>Pasport muddati</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($malumots as $malumot):?>
                <tr>
                    <th scope="row"><?=++$id?></th>
                    <td><?=$malumot->surname?></td>
                    <td><?=$malumot->name?></td>
                    <td><?=$malumot->p_number?></td>
                    <td><?= date('d.m.Y',strtotime($malumot->d_birth)) ?></td>
                    <td><?= date('d.m.Y',strtotime($malumot->is_date)) ?></td>
                    <td><?= date('d.m.Y',strtotime($malumot->ex_date)) ?></td>
                    <td><?= (file_exists("img/inch/{$malumot->p_number}.jpg"))?Html::img("/img/inch/{$malumot->p_number}.jpg",['class'=>'img-table',]):Html::img("/img/dump/nophoto.png",['class'=>'img-table']);?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php else:?>
            <h1 class="text-center">Guruhda ziyoratchilar yo'q</h1>
        <?php endif;?>
    </div>
</div>
