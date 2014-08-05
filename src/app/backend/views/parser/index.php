<a class="btn btn-primary" href="/add_user">Добавить</a>
<table class="table table-hover" data-url="/sort_user">
    <thead>
    <tr>
        <th id="id">#</th>
        <th id="name" class="sortable"><p>Название</p></th>
        <th id="email" class="sortable"><p>Дата</p></th>
        <th id="status" class="sortable"><p>Статус</p></th>
        <th id="status" class="sortable"><p>Состояне</p></th>
        <th class="table-buttons"></th>
    </tr>
    </thead>
    <tbody id="result">
    <?php foreach ($data as $item):?>
        <tr>
            <td><?=$item->id; ?></td>
            <td ><input value="<?= $item->name; ?>" type="text" name="name"</td>
            <td><?= $item->date; ?></td>
            <td><?= $item->status; ?></td>
            <?php if($item->state):?>
                <td><a href="" data-id="<?=$item->id; ?>" class="btn btn-success state-check" data-state="<?=$item->state?>">Активный</td>
            <?php else:?>
                <td><a href="" data-id="<?=$item->id; ?>" class="btn btn-primary state-check" data-state="<?=$item->state?>">Отключен</td>
            <?php endif?>
            <td>
                <a href="" data-id="<?=$item->id; ?>" class="action-img delete-state"><img src="/images/del.png" title="удалить"></a>
                <a href="" data-id="<?=$item->id; ?>" class="action-img update-state"><img src="/images/save.jpg" title="редактировать"></a>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-primary add-state" href="/add_user">Добавить</a>