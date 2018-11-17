<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tipoparametro;
use yii\helpers\ArrayHelper;
use  kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */
/* @var $form yii\widgets\ActiveForm */

$tipopara = ArrayHelper::map(Tipoparametro::find()->all(), 'Id', 'Definicion');
?>

<div class="parametro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdTipoParametro')
        ->widget(Select2::classname(), [
            'data' => $tipopara,
            'options' => ['placeholder' => 'Seleccione el tipo de parametro'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Definicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
