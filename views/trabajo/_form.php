<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Origen;
use app\models\Ubicacion;
use app\models\Sala;
use app\models\Area;
use app\models\Listadocentes;
use app\models\Categoria;
use app\models\Listaalumnos;
use kartik\datetime\DateTimePicker;
use app\models\Anio;


/* @var $this yii\web\View */
/* @var $model app\models\Trabajo */
/* @var $form yii\widgets\ActiveForm */

$alumnos = ArrayHelper::map(Listaalumnos::find()->where(['Actual'=>true])->all(), 'IdPersona', 'NombreCompleto');
$docente = ArrayHelper::map(Listadocentes::find()->all(), 'IdPersona', 'NombreCompleto');
$categoria = ArrayHelper::map(Categoria::find()->all(), 'Id', 'Definicion');
$origen = ArrayHelper::map(Origen::find()->all(), 'Id', 'Definicion');
$idanio =  Anio::findOne(['Valor'=>date('Y')])->Id;

?>

    <span ng-init='Trabajoalumno = <?= Json::encode($model->trabajoalumnos)?>'></span>
    <div class="trabajo-form" ng-controller="TrabajoController">

        <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Información general</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'IdOrigen')
                            ->widget(Select2::classname(), [
                                'data' => $origen,
                                'options' => ['placeholder' => 'Origen del Trabajo'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'IdCategoria')
                            ->widget(Select2::classname(), [
                                'data' => $categoria,
                                'options' => ['placeholder' => 'Categoria de Trabajo'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del Trabajo</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'FechaExposicion')
                            ->widget(DateTimePicker::className(), [
                            'options' => ['placeholder' => 'Introduzca Fecha de Exposicion ...'],
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'DocumentoEntregado')->checkbox() ?>
                        <div >
                            <?= $form->field($model, 'PrimerVez')->checkbox() ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'IdSala')->dropDownList(
                            ArrayHelper::map(Sala::find()->all(),'Id', 'Definicion'),
                            ['prompt'=>'Seleccione Sala a la que pertenece','required'=>true]
                        );?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'IdArea')->dropDownList(
                            ArrayHelper::map(Area::find()->all(),'Id', 'Definicion'),
                            ['prompt'=>'Seleccione el Area de Estudio','required'=>true]
                        );?>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Docentes</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'IdTutor')
                            ->widget(Select2::classname(), [
                                'data' => $docente,
                                'options' => ['placeholder' => 'Tutor del Trabajo'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'IdAsesor')
                            ->widget(Select2::classname(), [
                                'data' => $docente,
                                'options' => ['placeholder' => 'Asesor del Trabajo'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Autores [Seleccione el/los integrantes y agregue a la lista]</h3>
            </div>
            <table class="table table-fixed" width="100%">
                <thead>
                <th width="15%">Alumno</th>
                <th width="25%">Nombre Completo</th>
                <th width="10%">Carnet</th>
                <th width="10%">Sexo</th>
                <th width="25%">Carrera</th>
                <th width="5%">Agregar</th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <?= Select2::widget([
                            'name' => 'IdPersona',
                            'id'=>'IdPersona',
                            'data' => $alumnos,
                            'options' => [
                                'multiple' => false,
                                'placeholder' => 'Seleccione Alumno',
                                'ng-model'=>'IdPersona',
                                'ng-change'=>'SetAlumno()'
                            ]
                        ]);
                        ?>
                    </td>

                    <input type="hidden" name="IdTrabajo" value="<?= $model->Id?>">
                    <input type="hidden" ng-model="IdPersona">
                    <td><input type="text" class="form-control" ng-model="NombreCompleto" readonly required></td>
                    <td><input type="text" class="form-control" ng-model="Carnet" readonly required></td>
                    <td><input type="text" class="form-control" ng-model="Sexo" readonly required></td>
                    <td><input type="text" class="form-control" ng-model="Carrera" readonly required></td>
                    <td><button type="button" ng-click="add()" class='btn btn-success'><i class="glyphicon glyphicon-plus"></i></button></td>
                    <input type="hidden" name="Trabajoalumno" ng-model="Trabajoalumno" value="{{Trabajoalumno}}">
                </tr>
                </tbody>
            </table>
        </div>

        <div class="panel panel-primary">
            <table class="table table-bordered table-condensed table-striped">
                <tbody>
                <thead>
                <tr>
                    <th width="10%">Id - Alumno</th>
                    <th width="25%">Nombre Completo</th>
                    <th width="10%">Carnet</th>
                    <th width="10%">Sexo</th>
                    <th width="25%">Carrera</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tr ng-repeat="alumno in Trabajoalumno track by $index">
                    <td hidden ng-model="alumno.IdPersona">{{alumno.IdPersona}}</td>
                    <td ng-model="alumno.IdPersona">{{alumno.IdPersona}}</td>
                    <td ng-model="alumno.NombreCompleto">{{alumno.NombreCompleto}}</td>
                    <td ng-model="alumno.Carnet">{{alumno.Carnet}}</td>
                    <td ng-model="alumno.Sexo">{{alumno.Sexo}}</td>
                    <td ng-model="alumno.Carrera">{{alumno.Carrera}}</td>
                    <td>
                        <button type="button" ng-click="del($index)" title='Borrar' class='btn btn-danger'><i class="glyphicon glyphicon-minus"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <?= $form->field($model, 'Observaciones')->textInput(['maxlength' => true]) ?>

        <?= Html::hiddenInput('IdAnio', $idanio); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Trabajo') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
