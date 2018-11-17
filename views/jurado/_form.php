<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Listadocentes;
use app\models\Tipoparametro;
use app\models\Sala;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Jurado */
/* @var $form yii\widgets\ActiveForm */
$param = ArrayHelper::map(Tipoparametro::find()->all(), 'Id', 'Definicion');
$sala = ArrayHelper::map(Sala::find()->all(), 'Id', 'Definicion');
$docente = ArrayHelper::map(Listadocentes::find()->all(), 'IdPersona', 'NombreCompleto');
?>

<div class="jurado-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true,'validationUrl'=>Url::toRoute('jurado/validacion')]); ?>

    <?= $form->field($model, 'IdSala')
        ->widget(Select2::classname(), [
            'data' => $sala,
            'options' => ['placeholder' => 'Seleccione la Sala'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdDocente')
        ->widget(Select2::classname(), [
            'data' => $docente,
            'options' => ['placeholder' => 'Seleccione el Docente'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdTipoParametro')
        ->widget(Select2::classname(), [
            'data' => $param,
            'options' => ['placeholder' => 'Seleccione el parametro'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
