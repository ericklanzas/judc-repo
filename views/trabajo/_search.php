<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'IdTutor') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'IdSala') ?>

    <?= $form->field($model, 'PrimerVez')->checkbox() ?>

    <?php // echo $form->field($model, 'IdOrigen') ?>

    <?php // echo $form->field($model, 'Observaciones') ?>

    <?php // echo $form->field($model, 'FechaExposicion') ?>

    <?php // echo $form->field($model, 'DocumentoEntregado')->checkbox() ?>

    <?php // echo $form->field($model, 'IdCategoria') ?>

    <?php // echo $form->field($model, 'IdAsesor') ?>

    <?php // echo $form->field($model, 'IdArea') ?>

    <?php // echo $form->field($model, 'IdAnio') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
