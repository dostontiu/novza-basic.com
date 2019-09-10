<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use phpnt\exportFile\ExportFile;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MalumotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Umumiy ro\'yhat';
$this->params['breadcrumbs'][] = $this->title;
$dataGroup = \yii\helpers\ArrayHelper::map(\app\models\Group::find()->all(), 'id', 'name');
?>
<?php if(Yii::$app->session->hasFlash('success')): ?>
    <h2 class="alert alert-success alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=Yii::$app->session->getFlash('success'); ?>
    </h2>
<?php endif ?>
<div class="malumot-index">
    <div class="row">
        <div class="col-md-11">
            <h3 class="text-center text-info">Umumiy ro'yhatdan qidirish</h3>
        </div>
        <div class="col-md-1">
            <br>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="download" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service <span class="caret"></span></button>
                <ul class="dropdown-menu" aria-labelledby="download">
                    <?= ExportFile::widget([
                        'model'             => 'app\models\search\MalumotSearch',   // путь к модели
                        'title'             => 'Document',
                        'queryParams'       => Yii::$app->request->queryParams,

                        'getAll'            => true,                               // все записи - true, учитывать пагинацию - false
                        'csvCharset'        => 'Windows-1251',                      // кодировка csv файла: 'UTF-8' (по умолчанию) или 'Windows-1251'

                        'buttonClass'       => 'btn btn-success btn-block',                   // класс кнопки
                        'blockClass'        => 'btn-block',                         // класс блока в котором кнопка
                        'blockStyle'        => 'padding: 5px;',                     // стиль блока в котором кнопка

                        // экспорт в следующие файлы (true - разрешить, false - запретить)
                        'xls'               => true,
                        'csv'               => true,
                        'word'              => true,
                        'html'              => true,
                        'pdf'               => true,

                        // шаблоны кнопок
                        'xlsButtonName'     => Yii::t('app', 'MS Excel'),
                        'csvButtonName'     => Yii::t('app', 'CSV'),
                        'wordButtonName'    => Yii::t('app', 'MS Word'),
                        'htmlButtonName'    => Yii::t('app', 'HTML'),
                        'pdfButtonName'     => Yii::t('app', 'PDF')
                    ]) ?>
                </ul>
            </div>
        </div>
    </div>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'surname',
            'name',
            'p_number',
            [
                'attribute' => 'd_birth',
                'format' => ['date', 'dd.MM.Y'],
                'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'd_birth',
                        'pluginOptions' => [
                            'format' => 'dd.mm.yyyy',
                            'language' => 'ru'
                        ]
                    ]
                ),
                'filterInputOptions' => ['anything you put here gets ignored']
            ],
            [
                'attribute' => 'is_date',
                'format' => ['date', 'dd.MM.Y'],
                'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'is_date',
                        'pluginOptions' => [
                            'format' => 'dd.mm.yyyy',
                            'language' => 'ru'
                        ]
                    ]
                ),
            ],
            [
                'attribute' => 'ex_date',
                'format' => ['date', 'dd.MM.Y'],
                'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'ex_date',
                        'pluginOptions' => [
                            'format' => 'dd.mm.yyyy',
                            'language' => 'ru'
                        ]
                    ]
                ),
            ],
            [
                'attribute' => 'group_id',
                'value' => function($data){
                    $val = $data->group->name;
                    if ($data->sent){
                        $val = "<span class='text-danger'>".$data->group->name."</span>";
                    }
                    $val = Html::a('<span class=\'glyphicon glyphicon-pencil text-success\'></span>', ["update?id={$data->id}"]).' '.$val;
                    return $val;
                },
                'format'=>'html',
                'filter'=>$dataGroup,
            ],
            [
                'attribute' => '',
                'value' => function($data){
                    $img = (file_exists("img/inch/{$data->p_number}.jpg"))?Html::img("/img/inch/{$data->p_number}.jpg",['class'=>'img-table']):Html::img("/img/dump/nophoto.png",['class'=>'img-table-add-nophoto']);
                    return $img;
                },
                'format' => 'html',
            ],
        ],
    ]); ?>

</div>
