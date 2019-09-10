<?php
/**
 * Created by PhpStorm.
 * User: Doston
 * Date: 10.11.2017
 * Time: 1:31
 */

namespace app\controllers;

use app\models\Group;
use app\models\Region;

class RegionController extends AppController
{

    public function actionIndex()
    {
        $regions = Region::find()->all();
        $this->setMeta('Viloyatlar', 'Qoraqalpog`iston Respublikasi, Toshkent shahri va viloyatlar');
        return $this->render('index',[
            'regions' => $regions,
        ]);
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $groups = Group::find()->where(['region_id'=>$id])->all();
        if (empty($groups)){
            throw new \yii\web\HttpException(404, 'The requested groups could not be found.');
        }
        return $this->render('view',[
            'groups' => $groups,
        ]);
    }
}