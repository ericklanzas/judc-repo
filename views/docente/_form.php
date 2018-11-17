<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Listatitulos;
use app\models\Area;
use app\models\Listapersonas;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */
/* @var $form yii\widgets\ActiveForm */

$titulo = ArrayHelper::map(Listatitulos::find()->all(), 'Id',
    function($model) {
        return $model['Acronimo'].' '.$model['Definicion'];
    });

$area = ArrayHelper::map(Area::find()->all(), 'Id', 'Definicion');

$persona = ArrayHelper::map(Listapersonas::find()->all(), 'Id', 'NombreCompleto');
?>

<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdPersona')
        ->widget(Select2::classname(), [
            'data' => $persona,
            'options' => ['placeholder' => 'Seleccione la persona'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdTitulo')
        ->widget(Select2::classname(), [
            'data' => $titulo,
            'options' => ['placeholder' => 'Seleccione el Titulo'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'IdArea')
        ->widget(Select2::classname(), [
            'data' => $area,
            'options' => ['placeholder' => 'Seleccione el area de especializacion'],
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
