<?php echo $group->name?> guruhidagi progress
<hr>
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Familiya</th>
            <th>Ism</th>
            <th>Pasport raqam</th>
            <th>Tugilgan kun</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($malumots as $malumot):?>
        <tr>
            <th scope="row"><?=++$id?></th>
            <td><?=$malumot->surname?></td>
            <td><?=$malumot->name?></td>
            <td><?=$malumot->p_number?></td>
            <td><?= date('d.m.Y',strtotime($malumot->d_birth)) ?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
