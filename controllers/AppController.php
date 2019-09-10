<?php
/**
 * Created by PhpStorm.
 * User: Doston
 * Date: 19.09.2017
 * Time: 15:38
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $description = null, $keywords = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>"$description"]);
    }
}