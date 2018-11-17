<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Nivelacademico;

/* @var $this yii\web\View */
/* @var $model app\models\Titulo */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(Nivelacademico::find()->all(), 'Id', 'Acronimo');
?>

<div class="titulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdNivelAcademico')
        ->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Seleccione el nivel academico'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'Definicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Titulo') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
