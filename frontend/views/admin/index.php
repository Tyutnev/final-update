<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($img, 'src')->textInput(['placeholder' => 'Путь до обложки шаблона'])->label(false) ?>
    <?= $form->field($img, 'id_category')->textInput(['placeholder' => 'Категория'])->label(false) ?>
    <?= $form->field($html, 'content')->textInput(['placeholder' => 'HTML'])->label(false) ?>
    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
 <div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <?php echo Yii::$app->session->getFlash('success'); ?>
 </div>
<?php endif;?>
<?php ActiveForm::end() ?>