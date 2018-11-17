<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Anio;
use app\models\Parametro;
use app\models\Categoria;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


$parametro = ArrayHelper::map(Parametro::find()->all(), 'Id', 'Definicion');
$categoria = ArrayHelper::map(Categoria::find()->all(), 'Id', 'Definicion');

/* @var $this yii\web\View */
/* @var $model app\models\Puntaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puntaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdParametro')
        ->widget(Select2::classname(), [
            'data' => $parametro,
            'options' => ['placeholder' => 'Seleccione el Parametro'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdCategoria')
        ->widget(Select2::classname(), [
            'data' => $categoria,
            'options' => ['placeholder' => 'Seleccione la categoria'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Valor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
