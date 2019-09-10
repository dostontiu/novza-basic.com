<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nomi</th>
            <th>Ziyoratchilar soni</th>
            <th>Viloyat</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($groups as $group):?>
        <tr>
            <th scope="row"><?=++$id?></th>
            <td><a href="<?=\yii\helpers\Url::to(['group/view','id'=>$group->id])?>"><?=$group->name?></a></td>
            <td><?=$group->count_people?></td>
            <td><?=$region = $group->region->name?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<hr>
Guruhdagi progress
<?=$region?>