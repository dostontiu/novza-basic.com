<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="slider">
    <div id="about-slider">
        <div id="carousel-slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators visible-xs">
                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-slider" data-slide-to="1"></li>
                <li data-target="#carousel-slider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <?php for ($i=0; $i<3; $i++):?>
                    <div class="item <?= ($i%3==0) ? 'active' : ''?>">
                        <?= \yii\helpers\Html::img('@web/img/slide.jpg', ['alt'=>'SLIDE', 'class'=>'img-responsive'])?>
                        <div class="carousel-caption">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                                <!--<h2>Modern Design</h2>-->
                                <h2>Haj and Umra<br>Application</h2>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                                    <p>Welcome!</p>
                                </div>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required">Ro'yhatdan o'tish</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="getnow" class="btn btn-primary btn-lg" required="required">Kirish <span class="fa fa-sign-in"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>

            <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
        <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
</div>
