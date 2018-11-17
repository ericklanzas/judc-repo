<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Listapersonas;
use app\models\Listatitulos;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = $model->IdPersona;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->IdPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Esta seguro de eliminar este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'IdPersona',
            'IdPersona' => [
                'attribute' => 'IdPersona',
                'label'=> 'Carrera',
                'value' => function ($value) {
                    return Listapersonas::find()
                        ->where(['id' => $value->IdPersona])
                        ->one()['NombreCompleto'];
                }
            ],
            //'IdTurno',
            'idTurno.Definicion:Text:Turno',
            //'IdCarrera',
            'IdCarrera' => [
                'attribute' => 'IdCarrera',
                'label'=> 'Carrera',
                'value' => function ($value) {
                    return Listatitulos::find()
                        ->where(['id' => $value->IdCarrera])
                        ->one()['Carrera'];
                }
            ],
            'Carnet',
            'AnioAcademico',
            'Actual:boolean',
        ],
    ]) ?>

</div>
