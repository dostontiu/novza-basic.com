<div class="gallery">
    <div class="text-center">
        <h2>Viloyatlar bo'yicha</h2>
        <p>Viloyat linklarini bosib, Viloyatdagi guruglarni ko'rishingiz mumkin. Toshkent guruhlari Toshkent shahrining ichida</p>
    </div>
    <div class="container">
        <?php foreach ($regions as $region):?>
        <div class="col-md-4">
            <figure class="effect-marley">
                <?= \yii\helpers\Html::img("@web/img/region/{$region->id}.jpg",['alt'=>$region->name, 'class'=>'img-responsive']);?>
                    <figcaption>
                        <a href="<?= \yii\helpers\Url::to(['region/view', 'id'=>$region->id])?>">
                            <h4><?=$region->name?></h4>
                            <p class="fa fa-users"> ziyoratchilar <?=$region->count_people?> ta</p>
                        </a>
                    </figcaption>
            </figure>
        </div>
        <?php endforeach; ?>
    </div>
</div>