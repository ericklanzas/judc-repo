<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluacion-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'IdTrabajo')->textInput() ?>

<!--    --><?//= $form->field($model, 'IdParametro')->textInput() ?>

<!--    --><?//= $form->field($model, 'IdJurado')->textInput() ?>

    <?= $form->field($model, 'Calificacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
