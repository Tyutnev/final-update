<table class="table">
  <thead>
    <tr>
      <th scope="col">Идентификатор</th>
      <th scope="col">Обложка</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($imgs as $img): ?>
    <tr>
      <th><?= $img->id ?></th>
      <td><img src="<?= $img->src ?>" width="200"></td>
      <td><a class="btn btn-primary" href="/admin/detail/<?= $img->id ?>">Изменить</a></td>
      <td>
            <div>
                <a class="btn btn-danger delete-template" style="cursor:pointer;">Удалить</a>
                <div class="alert-delete" style="display: none;">
                    <span>Вы действительно хотите удалить шаблон?</span>
                    <button class="btn btn-danger delete-true" data-id="<?= $img->id ?>">Да</button>
                    <button class="btn btn-success delete-false">Нет</button>
                </div>
            </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>