<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/img/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>
<header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="<?=\yii\helpers\Url::home()?>"><h1>Bosh sahifa</h1></a>
                </div>
            </div>
            <?php $controller = Yii::$app->controller->id; ?>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a class="<?= ($controller=='site')?'active' : ''?>" href="<?= Url::to(['/site'])?>">Bosh sahifa</a></li>
                        <li role="presentation"><a class="<?= ($controller=='group')?'active':''?>" href="<?= Url::to(['/group'])?>">Guruhlar</a></li>
                        <li role="presentation"><a class="<?= ($controller=='region')?'active':''?>" href="<?= Url::to(['/region'])?>">Viloyatlar</a></li>
                        <li role="presentation"><a class="<?= ($controller=='admin')?'active' : ''?>" href="<?= Url::to(['/admin'])?>">Biz bilan Aloqa</a></li>
                        <?php if (!Yii::$app->user->isGuest):?>
                            <li role="presentation"><a data-method="post" class="<?= ($controller=='admin')?'active' : ''?> bg-primary text-success" href="<?= Url::to(['/site/logout'])?>">Chiqish</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header-->
<div class="container">
    <?= $content ?>
</div>

<footer>
    <div class="container">
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h4>About Us</h4>
            <p>Day is tellus ac cursus commodo, mauesris condime ntum nibh, ut fermentum mas justo sitters.</p>
            <div class="contact-info">
                <ul>
                    <li><i class="fa fa-home fa"></i>Suite 54 Elizebth Street, Victoria State Newyork, USA </li>
                    <li><i class="fa fa-phone fa"></i> +38 000 129900</li>
                    <li><i class="fa fa-envelope fa"></i> info@domain.net</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        </div>

        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <div class="">
                <h4>Newsletter Registration</h4>
                <p>Subscribe today to receive the latest Day news via email.</p>
                <div class="btn-gamp">
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter Email">
                </div>
                <div class="btn-gamp">
                    <a type="submit" class="btn btn-default">Subscribe</a>
                </div>

            </div>
        </div>

    </div>
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="social-icon">
            <div class="col-md-4">
                <ul class="social-network">
                    <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
            <div class="copyright">
                &copy; Day Theme. All Rights Reserved.
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Day
                    -->
                    <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<script>
    wow = new WOW({}).init();
</script>
</html>
<?php $this->endPage() ?>
