<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\Category;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($img, 'file')->fileInput()->label(false) ?>
    <?php

        echo $form->field($img, 'id_category')->dropdownList(
            Category::find()->select(['title', 'id'])->indexBy('id')->column(),
            ['prompt'=>'Выбирите категорию']
        )->label(false);

    ?>
    <?= $form->field($html, 'content')->textInput(['placeholder' => 'HTML'])->label(false) ?>
    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
 <div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <?php echo Yii::$app->session->getFlash('success'); ?>
 </div>
<?php endif;?>
<?php ActiveForm::end() ?>