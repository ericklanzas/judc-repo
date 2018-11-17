<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nivelacademico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nivelacademico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Definicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Acronimo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear nivel') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
