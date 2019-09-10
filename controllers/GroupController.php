<?php
/**
 * Created by PhpStorm.
 * User: Doston
 * Date: 12.10.2017
 * Time: 14:29
 */

namespace app\controllers;

use app\models\Group;
use app\models\Malumot;
use app\models\Reys;
use Yii;

class GroupController extends AppController
{

    public function actionIndex(){
        $groups = Group::find()->all();
        $reys = Reys::find()->all();
        $this->setMeta('Reyslar','reys','reys');
        return $this->render('index',[
            'groups' => $groups,
            'reys' => $reys,
        ]);
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');
        $group = Group::findOne($id);
        if (empty($group)){
            throw new \yii\web\HttpException(404, 'Bunday ID dagi guruh yo\'q.');
        }
        $this->setMeta($group->name,$group->name.' guruhi haqida ma`lumot',$group->name.' guruhida '.$group->count_people.' ta ziyoratchi bor');
        $malumots = Malumot::find()->where(['group_id'=>$id])->all();
        return $this->render('view',[
            'group' => $group,
            'malumots' => $malumots,
        ]);
    }
}