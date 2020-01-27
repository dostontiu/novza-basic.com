<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Malumot;
use app\models\search\MalumotSearch;
use yii\console\Exception;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Reader;


/**
 * MalumotController implements the CRUD actions for Malumot model.
 */
class MalumotController extends AppAdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Malumot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MalumotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Malumot model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Malumot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionAdd()
    {
        $session = Yii::$app->session;
        $session->open();
        $group_id = (!empty($session->get('group'))) ? $session->get('group') : NULL;
        $user_id = Yii::$app->user->identity["id"];
        $panel = Malumot::find()->where(['group_id'=>$group_id]);

        $model = new Reader();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $matn = $this->CheckAttr($model->read);
            $model->group($malumot->group_id);

            $malumot = new Malumot();
            $malumot->surname = $matn['surname'];
            $malumot->name = $matn['name'];
            $malumot->p_number = $matn['p_number'];
            $malumot->d_birth = $matn['d_birth'];
            $malumot->gender = $matn['gender'];
            $malumot->ex_date = $matn['ex_date'];
            $malumot->is_date = $matn['is_date'];
            $malumot->group_id = $group_id;
            $malumot->user_id = $user_id;
//            $malumot->sent = 0;
            $malumot->today = date('Y-m-d H:i:s');
            foreach ($matn['msg'] as $val){$check .= $val;}

            if (!empty($check)) {
                return $this->render('add', [
                    'model' => $model,
                    'panel' => $panel,
                    'messages' => $matn['msg'],
                ]);
            } else {
                $malumot->save();
                if (!$malumot->save()) {
                    return $this->render('add', [
                        'model' => $model,
                        'panel' => $panel,
                        'messages' => $malumot->errors,
                    ]);
                } else {
                    $this->refresh();
                    return $this->render('add',[
                        'model' => $model,
                        'panel' => $panel,
                        'messages' => 'Successfully!',
                        //return $this->redirect('add'); ko'ramiz|
                    ]);
                }
            }
        } else {
            return $this->render('add', [
                'model' => $model,
                'panel' => $panel,
            ]);
        }
    }

    public function CheckAttr($str){

        $matn = array();
        $msg = array();
        $msg[] = !empty($this->strallpos($str,'_')) ? 'Satrda "_" simvoli bor' : FALSE;
        $msg[] = (substr($str, 0, 1) != "P") ? 'Pasportda "P" bo\'lishi kerak' : FALSE;
        $msg[] = is_numeric(substr($str, 0,60)) ? 'Birinchi qatorda raqam topildi' : FALSE; // Bunda satrdan raqam yoki simvolni topishi kerak;
        $msg[] = is_numeric(substr($str, 46, 1)) ? 'Seriyadagi birinchisi raqam' : FALSE;
        $msg[] = is_numeric(substr($str, 47, 1)) ? 'Seriyadagi ikkinchisi raqam' : FALSE;
        $msg[] = !is_numeric(substr($str, 48, 8)) ? 'AA dan keyingi 7(+1) ta satrda raqam bo\'lishi kerak' : FALSE;
        $msg[] = (substr($str, 56, 3) != "UZB" || substr($str, 2, 3) != "UZB") ? 'Satrda "UZB" dan boshqa so\'z topildi' : FALSE;
        $msg[] = !is_numeric(substr($str, 59, 7)) ? 'Tug\'ilgan yili (+1) da raqamdan boshqa simvol bor' : FALSE;
        $msg[] = (substr($str, 66, 1)!='M' && substr($str, 66, 1)!='F') ? 'Femail yoki Mail da xatolik bor' : FALSE;
        $msg[] = !is_numeric(substr($str, 67, 23)) ? 'F yoki M dan keyin raqam bo\'lishi kerak' : FALSE;
        $msg[] = empty(Yii::$app->session->get('group')) ? 'Guruhni tanlang' : FALSE;
//        $msg[] = is_numeric('0125<') ? 'raqam' : substr($str, 67, 23);

        $str1 	   = substr($str, 5, 39);
        $strpos    = explode('<', $str1);
        $matn['surname']  = $strpos[0];//***
        $matn['name']	   = $strpos[2];//***
        $matn['p_number']  = substr($str, 46, 9);//***
        $t_yil	   = substr($str, 59, 2);
        $t_oy	   = substr($str, 61, 2);
        $t_kun	   = substr($str, 63, 2);
        $matn['d_birth']   = date('Y-m-d',strtotime($t_yil."-".$t_oy."-".$t_kun));//***
        $matn['gender']  = (substr($str, 66, 1)=='M') ? 1 : 0;
        $p_t_yil   = substr($str, 67, 2);
        $p_t_oy    = substr($str, 69, 2);
        $p_t_kun   = substr($str, 71, 2);
        $matn['ex_date'] = date('Y-m-d' ,strtotime($p_t_yil."-".$p_t_oy."-".$p_t_kun));//***
        $p_b_v     = "20".$p_t_yil."-".$p_t_oy."-".$p_t_kun;
        $matn['is_date']= date('Y-m-d' ,strtotime( "$p_b_v -10 years +1 day" ));//***
        $matn['msg'] = $msg;

        return $matn;
    }
    
    public function strallpos($haystack,$needle,$offset = 0){ 
        $result = array(); 
        for($i = $offset; $i<strlen($haystack); $i++){ 
            $pos = strpos($haystack,$needle,$i); 
            if($pos !== FALSE){ 
                $offset =  $pos; 
                if($offset >= $i){ 
                    $i = $offset; 
                    $result[] = $offset; 
                } 
            } 
        } 
        return $result; 
    }
    
    public function actionChangeGroup(){
        $group = Yii::$app->request->post('id');
        if (isset($group)) {
            $session = Yii::$app->session;
            $session->open();
            $session->set('group', $group);
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    /**
     * Updates an existing Malumot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save() && ((empty($model->mahram_name_id)&&empty($model->mahram_id)) || (!empty($model->mahram_name_id)&&!empty($model->mahram_id)) )) {
            Yii::$app->session->setFlash('success', "$model->surname $model->name <b>{$model->group->name}</b> guruhiga o'tkazildi.");
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionLast(){
        $mahram_name_id = Yii::$app->request->post('mahram_name_id');
        $mahram_id = Yii::$app->request->post('mahram_id');
        $model = $this->findModel(Yii::$app->request->post('id'));
        if (($mahram_name_id && $mahram_id) || (!$mahram_name_id && !$mahram_id)){
            $model->address = Yii::$app->request->get('address');
            $model->tel_number = Yii::$app->request->get('tel_number');
            $model->function_id = Yii::$app->request->get('function_id');
            $model->mahram_name_id = $mahram_name_id;
            $model->mahram_id = $mahram_id;
            $model->update();
            if ($model->update() !== false) {
                Yii::$app->session->setFlash('success', "Tahrirlash muvaffaqiyatli amalga oshirildi");
            } else {
                Yii::$app->session->setFlash('error', "Tahrirlashda xatolik sodir bo'ldi. Yana qayta urirnib ko'ring");
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing Malumot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImportExcel(){
        $inputFile = 'uploads/file.xlsx';

        try{
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);
        }catch (Exception $e)
        {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row=1; $row<=$highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null,true,false);
            if ($row == 1){
                continue;
            }

            $malumot = new Malumot();
            $malumot->id = $rowData[0][0];
            $malumot->name = $rowData[0][1];
            $malumot->surname = $rowData[0][2];
            $malumot->p_number = $rowData[0][3];
//            $malumot->save();

            print_r($malumot);
        }
        print_r($rowData);
//        die('Okay');
    }

    public function actionExportFile()
    {
        $searchModel = new MalumotSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Malumot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Malumot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Malumot::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
