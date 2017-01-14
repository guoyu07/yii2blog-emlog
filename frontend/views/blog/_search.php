<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'excerpt') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'sortid') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'comnum') ?>

    <?php // echo $form->field($model, 'attnum') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'sortop') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <?php // echo $form->field($model, 'checked') ?>

    <?php // echo $form->field($model, 'allow_remark') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
