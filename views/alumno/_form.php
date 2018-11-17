<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Turno;
use app\models\Listapersonas;
use app\models\Listatitulos;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */

$titulo = ArrayHelper::map(Listatitulos::find()->all(), 'Id',
    function($model) {
        return $model['Acronimo'].' '.$model['Definicion'];
    });

$turno = ArrayHelper::map(Turno::find()->all(), 'Id', 'Definicion');

$persona = ArrayHelper::map(Listapersonas::find()->all(), 'Id', 'NombreCompleto');
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true,'validationUrl'=>Url::toRoute('alumno/validacion')]); ?>

    <?= $form->field($model, 'IdPersona')
        ->widget(Select2::classname(), [
            'data' => $persona,
            'options' => ['placeholder' => 'Seleccione la persona'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdTurno')
        ->widget(Select2::classname(), [
            'data' => $turno,
            'options' => ['placeholder' => 'Seleccione el Turno'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdCarrera')
        ->widget(Select2::classname(), [
            'data' => $titulo,
            'options' => ['placeholder' => 'Seleccione la Carrera'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Carnet')->textInput(['maxlength' => 8]) ?>

    <?= $form->field($model, 'AnioAcademico')->textInput() ?>

    <?= $form->field($model, 'Actual')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
