<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use unclead\multipleinput\MultipleInput;
use app\models\Evaluacion;
/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="evaluacion-calificar">

<!--    --><?php //$form = ActiveForm::begin(); ?>

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation'      => true,
        'enableClientValidation'    => false,
        'validateOnChange'          => false,
        'validateOnSubmit'          => true,
        'validateOnBlur'            => false,
    ]);?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Evaluacion de Trabajo</h3>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr style="backgroud-color: #2D335B">
                <th>#</th>
                <th>Parametro</th>
                <th>Puntaje maximo</th>
                <th>Calificacion</th>
            </tr>
            </thead>
            <?php
            if (!$dataProvider)
            {
                ?>
                <tr>
                    <td colspan="6">Nada que mostrar</td>
                </tr>
            <?php
            }else {
                    $i = 0;

                    foreach ($dataProvider->getmodels() as $m) {
                        $i = $i + 1;
                        echo '<tr>';
                        //                    echo '<td>'.$m->Id.'</td>';
                        echo '<td style="width: 10%">' . $i . '</td>';
                        echo '<td style="width: 30%">' . $m->idParametro->Definicion . '</td>';
                        echo '<td style="width: 30%">' . number_format($m->Valor, 2) . '</td>';
                        $cali = $m->Valor;//asignando valor maximo de la calificacion
//                        $evaluacion->Calificacion = 0; // Seteando en cero la calificacion por defecto
                        ?>
                        <!--                    <td><input id="calificacion" onkeypress="return numeros(event)" class="span12" type="text" name="tecnico" value=""  /></td>-->
                        <?php
//                        $form->field($evaluacion, 'IdParametro')->hiddenInput()->label(false);
//                        $form->field($evaluacion, 'IdTrabajo')->hiddenInput()->label(false);
//                        $form->field($evaluacion, 'IdJurado')->hiddenInput()->label(false);
                        ?>
<!--                        <td style="width: 30%">--><?//= $form->field($evaluacion, "Calificacion")->input('number', ['min' => 0, 'max' => $cali])->label(false) ?><!--</td>-->
                        <td>
                            <input type="text">
                        </td>

<!--
<!---->
                        <?php echo '</tr>';
                    }
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>

    <div class="form-group">
        <div class="form-group">
            <?= Html::submitButton($evaluacion->isNewRecord ? Yii::t('app', 'Calificar') : Yii::t('app', 'Actualizar'), ['class' => $evaluacion->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>