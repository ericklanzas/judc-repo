<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Listadocentes;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Sala */
/* @var $form yii\widgets\ActiveForm */

$jefesala = ArrayHelper::map(Listadocentes::find()->all(), 'IdPersona', 'NombreCompleto');
?>

<div class="sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdJefeSala')
        ->widget(Select2::classname(), [
            'data' => $jefesala,
            'options' => ['placeholder' => 'Seleccione el Jefe de la sala'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Definicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <label for="">Inicio de Exposicion</label>
    <?= DatePicker::widget(['model' => $model, 'attribute' => 'InicioExposicion', 'options' => [
        'class'=>'form-control', 'required'=>false
    ],
        'language' => 'es',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Sala') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
