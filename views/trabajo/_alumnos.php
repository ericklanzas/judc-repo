<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listaalumnos;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="alumno-index">

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdPersona',
            'persona.Carnet',
            'IdPersona' => [
                'attribute' => 'IdPersona',
                'label'=> 'Alumno',
                'value' => function ($value) {
                    return Listaalumnos::find()
                        ->where(['IdPersona' => $value->IdPersona])
                        ->one()['NombreCompleto'];
                }
            ],
            //'IdTurno',
//            'IdTurno' => [
//                'attribute' => 'IdTurno',
//                'label'=> 'Turno',
//                'value' => 'idTurno.Definicion'
//            ],
//            'persona.IdCarrera',
            'persona.IdCarrera' => [
                'attribute' => 'persona.IdCarrera',
                'label'=> 'Carrera',
                'value' => function ($value) {
                    return Listaalumnos::find()
                        ->where(['IdPersona' => $value->IdPersona])
                        ->one()['Carrera'];
                }
            ],
            //'IdPersona
//            'Carnet',
            'persona.AnioAcademico',
//            'Actual:boolean',
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>