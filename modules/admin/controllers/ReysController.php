<?php

namespace app\modules\admin\controllers;

use app\models\Region;
use Yii;
use app\models\Reys;
use app\models\search\ReysSearch;
use app\models\Group;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\web\Response;
//use yii\base\Response;
use yii\console\Exception;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * ReysController implements the CRUD actions for Reys model.
 */
class ReysController extends AppAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reys models.
     * @return mixed
     */
    public function actionIndex()
    {
        $groups = Group::find()->with('reys')->all();
        $reys = Reys::find()->all();
        return $this->render('index',[
            'groups' => $groups,
            'reys' => $reys,
        ]);
    }

    /**
     * Creates a new Reys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reys();
        $modelGroups = [new Group];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $modelGroups = Model::createMultiple(Group::classname());
            Model::loadMultiple($modelGroups, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelGroups) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelGroups as $modelGroup) {
                            $modelGroup->reys_id = $model->id;
                            if (! ($flag = $modelGroup->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
//                        return $this->redirect(['view', 'id' => $model->id]);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }else{
            return $this->render('create', [
                'model' => $model,
                'modelGroups' => (empty($modelGroups)) ? [new Group] : $modelGroups
            ]);
        }

    }

    /**
     * Updates an existing Reys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelGroups = [new Group];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelGroups, 'id', 'id');
            $modelGroups = Model::createMultiple(Group::classname(), $modelGroups);
            Model::loadMultiple($modelGroups, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelGroups, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelGroups),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelGroups) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Group::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelGroups as $modelGroup) {
                            $modelGroup->reys_id = $model->id;
                            if (! ($flag = $modelGroup->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelGroups' => $modelGroups,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Reys::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
