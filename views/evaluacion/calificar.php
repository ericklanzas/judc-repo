<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluacion-calificar">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-6 col-md-6 col-lg-6" >

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'IdParametro',
                    'value'=>'idParametro.Definicion',
                ],
                [
                    'label' => 'Valor',
                    'attribute' =>'Valor',
                    'contentOptions' => ['class' => 'col-lg-1'],
                    'format'=>['decimal',2]
                ],
                [
                    'attribute' => 'IdParametro',
                    'value'=>'idParametro.Definicion',
                ],
//                [
//                    'class' => 'kartik\grid\EditableColumn',
//                    'attribute' => 'Calificacion',
//                    'pageSummary' => 'Total',
//                    'vAlign' => 'middle',
//                    'width' => '210px',
//                    'readonly' => function($evaluacion, $key, $index, $widget) {
//                        return (!$evaluacion->status); // do not allow editing of inactive records
//                    },
//                    'editableOptions' =>  function ($evaluacion, $key, $index) use ($colorPluginOptions) {
//                        return [
//                            'header' => 'Name',
//                            'size' => 'md',
//                            'afterInput' => function ($form, $widget) use ($evaluacion, $index, $colorPluginOptions) {
//                                return $form->field($evaluacion, "color")->widget(\kartik\widgets\ColorInput::classname(), [
//                                    'showDefaultPalette' => false,
//                                    'options' => ['id' => "color-{$index}"],
//                                    'pluginOptions' => $colorPluginOptions,
//                                ]);
//                            }
//                        ];
//                    }
//                ],
            ],
        ]); ?>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6" >
<!---->
        <?php
        for($i = 0; $i < $filas; $i++) {?>
            <?=  $form->field($evaluacion, "[$i]Calificacion")->label($evaluacion->Calificacion);      ?>
            <?php }

        ?>

    </div>


    <div class="form-group">
        <div class="form-group">
            <?= Html::submitButton($evaluacion->isNewRecord ? Yii::t('app', 'Calificar') : Yii::t('app', 'Actualizar'), ['class' => $evaluacion->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>