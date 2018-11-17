<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listaalumnos;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Alumnos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nuevo Alumno'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdPersona',
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
            'IdTurno' => [
                'attribute' => 'IdTurno',
                'label'=> 'Turno',
                'value' => 'idTurno.Definicion'
            ],
            //'IdCarrera',
            'IdCarrera' => [
                'attribute' => 'IdCarrera',
                'label'=> 'Carrera',
                'value' => function ($value) {
                    return Listaalumnos::find()
                        ->where(['IdPersona' => $value->IdCarrera])
                        ->one()['Carrera'];
                }
            ],
            //'IdPersona
            'Carnet',
            'AnioAcademico',
            'Actual:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
