<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\search\MalumotSearch */
/* @var $form yii\widgets\ActiveForm */
$reys = ArrayHelper::map(\app\models\Reys::find()->all(), 'id', 'name');
$reys[0]='Umumiy';
//echo '<pre>';
//print_r($reys);
//echo '</pre>';
//for ($i=0; $i<count($reys); $i++){
//    for ($j=0; $j<$i; $j++){
//        if ($reys[$i]<$reys[$j]){
//            $vaqtincha = $reys[$i];
//            $reys[$i] = $reys[$j];
//            $reys[$j] = $vaqtincha;
//        }
//    }
//}
//echo '<pre>';
//print_r($reys);
//echo '</pre>';
?>

<div class="malumot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]);
    ?>
    <div class="row">
        <div class="col-md-1">
            <?php  echo $form->field($model, 'id')->dropDownList($reys)->label('Reys') ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'gender')->dropDownList(['1'=>'Erkak', '0'=>'Ayol'], ['prompt' => '']) ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'sent')->dropDownList(['1'=>'Jo\'natilgan', '0'=>'Jo\'natilmagan'], ['prompt' => ''])->label('Jo\'natilganligi') ?>
        </div>
        <!--<div class="col-md-2">
            <?php /* echo $form->field($model, 'user_id')->dropDownList($users)->label('Kiritilgan sana') */?>
        </div>-->
        <div class="col-md-2">
            <?php  echo $form->field($model, 'today')->label('Kiritilgan vaqti') ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'tel_number')->label('Telefon raqami') ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'address')->label('Manzil') ?>
        </div>
        <h1></h1>
        <div class="col-md-1">
            <?= Html::submitButton('Qidiruv', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
