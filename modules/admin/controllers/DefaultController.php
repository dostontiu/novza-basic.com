<?php

namespace app\modules\admin\controllers;


class DefaultController extends AppAdminController
{
    public function actionIndex()
    {
        //$this->setMeta('Admin');
        return $this->render('index');
    }
}
