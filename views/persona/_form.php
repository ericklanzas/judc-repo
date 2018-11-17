<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Sexo')->dropDownList(['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'N/A' => 'No Aplica']) ?>

    <?= $form->field($model, 'Nombre1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Persona') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
