<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'css/style.css',
        'admin/assets/font-awesome/css/font-awesome.css',
        'admin/assets/css/zabuto_calendar.css',
        'admin/assets/js/gritter/css/jquery.gritter.css',
        'admin/assets/lineicons/style.css',
        'admin/assets/css/style.css',
        'admin/assets/css/style-responsive.css',
        'admin/assets/css/circle.css',
    ];
    public $js = [
//        'admin/assets/js/chart-master/Chart.js',
//        'admin/assets/js/jquery.js',
//        'admin/assets/js/jquery-1.8.3.min.js',
        'admin/assets/js/bootstrap.min.js',
        'admin/assets/js/jquery.dcjqaccordion.2.7.js',
        'admin/assets/js/jquery.scrollTo.min.js',
        'admin/assets/js/jquery.nicescroll.js',
        'admin/assets/js/jquery.sparkline.js',
        'admin/assets/js/common-scripts.js',
//        'admin/assets/js/yii2-dynamic-form.js', // yii2-dynamic-form;
        'admin/assets/js/gritter/js/jquery.gritter.js',
        'admin/assets/js/gritter-conf.js',
        'admin/assets/js/sparkline-chart.js',
        'admin/assets/js/zabuto_calendar.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
