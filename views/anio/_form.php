<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Valor')->textInput() ?>

    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Abierto', '2' => 'Horarios', '3' => 'Evaluacion', '4' => 'Finalizado']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Año') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
