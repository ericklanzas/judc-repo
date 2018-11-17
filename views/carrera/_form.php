<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Listatitulos;
use app\models\Departamento;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
$titulo = ArrayHelper::map(Listatitulos::find()->all(), 'Id',
    function($model) {
        return $model['Acronimo'].' '.$model['Definicion'];
    });
$depto = ArrayHelper::map(Departamento::find()->all(), 'Id', 'Definicion');
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdTitulo')
        ->widget(Select2::classname(), [
            'data' => $titulo,
            'options' => ['placeholder' => 'Seleccione el Titulo'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdDepartamento')
        ->widget(Select2::classname(), [
            'data' => $depto,
            'options' => ['placeholder' => 'Seleccione el Departamento'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Carrera') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
