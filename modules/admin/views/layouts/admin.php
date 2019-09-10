<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Admin | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/img/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>
<section id="container" >
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?=Url::home()?>" class="logo"><b>Application</b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <?php if (!Yii::$app->user->isGuest):?>
                <li><a data-method="post" class="logout" href="<?= Url::to(['/site/logout'])?>">Logout</a></li>
                <?php endif;?>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile">
                        <?=Html::img('@web/admin/assets/img/ui-sam.jpg',['class'=>'img-circle', 'style'=>'width:60px'])?>
                    </a></p>
                <h5 class="centered"><?=Yii::$app->user->identity["name"]?></h5>
                <?php $ctrl = Yii::$app->controller->id?>

                <li class="mt">
                    <a <?=($ctrl=='malumot/add')?'class=active':''?> class="" href="<?=Url::to(['/admin/malumot/add'])?>">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Qo'shish</span>
                    </a>
                </li>
                
                <li class="mt">
                    <a <?=($ctrl=='reys')?'class=active':''?> href="<?=Url::to(['/admin/reys'])?>">
                        <i class="fa fa-group"></i>
                        <span>Reyslar</span>
                    </a>
                </li>

                <li class="mt">
                    <a <?=($ctrl=='group')?'class=active':''?> href="<?=Url::to(['/admin/group'])?>">
                        <i class="fa fa-group"></i>
                        <span>Guruhlar</span>
                    </a>
                </li>

                <li class="mt">
                    <a <?=($ctrl=='region')?'class=active':''?> class="" href="<?=Url::to(['/admin/region'])?>">
                        <i class="fa fa-calendar-o"></i>
                        <span>Viloyatlar</span>
                    </a>
                </li>

                <li class="mt">
                    <a <?=($ctrl=='malumot')?'class=active':''?> class="" href="<?=Url::to(['/admin/malumot'])?>">
                        <i class="fa fa-info-circle"></i>
                        <span>Umumiy ro'yhat</span>
                    </a>
                </li>

                <li class="sub-menu <?=($ctrl=='function')?'active':''?>">
                    <a href="javascript:;" <?=($ctrl=='function' || $ctrl=='mahram-name')?'class=active':''?> >
                        <i class="fa fa-desktop"></i>
                        <span>Qo'shimcha</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?=Url::to(['/admin/function'])?>">Vazifasi</a></li>
                        <li><a href="<?=Url::to(['/admin/mahram-name'])?>">Mahram</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="container">
                    <?= $content ?>
                </div>
            </div><! --/row -->
        </section>
    </section>
    <!--main content end-->
<section>
    <h1 class="bg-danger text-center">Application</h1>
</section>
</section>


<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        var unique_id = $.gritter.add({-->
<!--            // (string | mandatory) the heading of the notification-->
<!--            title: 'Welcome to Dashgum!',-->
<!--            // (string | mandatory) the text inside the notification-->
<!--            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',-->
<!--            // (string | optional) the image to display on the left-->
<!--            image: 'assets/img/ui-sam.jpg',-->
<!--            // (bool | optional) if you want it to fade out on its own or just sit there-->
<!--            sticky: true,-->
<!--            // (int | optional) the time you want it to be alive for before fading out-->
<!--            time: '',-->
<!--            // (string | optional) the class name you want to apply to that specific message-->
<!--            class_name: 'my-sticky-class'-->
<!--        });-->
<!---->
<!--        return false;-->
<!--    });-->
<!--</script>-->
<!---->
<!--<script type="application/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $("#date-popover").popover({html: true, trigger: "manual"});-->
<!--        $("#date-popover").hide();-->
<!--        $("#date-popover").click(function (e) {-->
<!--            $(this).hide();-->
<!--        });-->
<!---->
<!--        $("#my-calendar").zabuto_calendar({-->
<!--            action: function () {-->
<!--                return myDateFunction(this.id, false);-->
<!--            },-->
<!--            action_nav: function () {-->
<!--                return myNavFunction(this.id);-->
<!--            },-->
<!--            ajax: {-->
<!--                url: "show_data.php?action=1",-->
<!--                modal: true-->
<!--            },-->
<!--            legend: [-->
<!--                {type: "text", label: "Special event", badge: "00"},-->
<!--                {type: "block", label: "Regular event", }-->
<!--            ]-->
<!--        });-->
<!--    });-->
<!---->
<!--    function myNavFunction(id) {-->
<!--        $("#date-popover").hide();-->
<!--        var nav = $("#" + id).data("navigation");-->
<!--        var to = $("#" + id).data("to");-->
<!--        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);-->
<!--    }-->
<!--</script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
