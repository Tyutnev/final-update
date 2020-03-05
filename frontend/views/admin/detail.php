<?php
$content = htmlspecialchars($html->content);
?>



<h3 class="logo">Обложка</h3>
<div>
    <img class="logo" src="/<?= $img->src ?>" width="500">
</div>

<h3>HTML id</h3>
<div class="logo html-id"><?= $html->id ?></div>

<h3 class="logo">HTML</h3>
<div contenteditable="true" class="html-content">
    <?= $content ?>
</div>

<div class="alert alert-success alert-update" role="alert" style="display: none;">
    Изменено
</div>

<button class="btn btn-success update-html">Изменить</button>

<style>
    .logo {
        margin-left: 10px;
    }

    .html-content {
        border: 1px solid #000;
        margin: 10px;
    }
</style>