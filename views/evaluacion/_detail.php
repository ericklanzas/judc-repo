<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\TrabajoSearch;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EvaluacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evaluaciones';
$this->params['breadcrumbs'][] = $this->title;

// CONSULTANDO LA VISTA DE ANIOACTUAL PARA OBTENER EL VALOR DEL ANIO ACTUAL
$EstadoAnio=(new \yii\db\Query())
    ->select(['EstadoAnio'])
    ->from('Listaanioactual')
    ->scalar();

?>
<div class="evaluacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],
                'IdParametro',
                'IdParametro',
                'Calificacion',
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'header'=>'Calificacion',
                    'attribute'=>'Calificacion',
                    'value'=>function($model){
                        return 'Su calificacion es'.$model->Calificacion;
                    }
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?></div>