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
?>
<div class="evaluacion-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?php echo " "?>// Html::a('Create Evaluacion', ['create'], ['class' => 'btn btn-success'])
<!--    </p>-->

<!--    --><?php echo " "// GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'IdTrabajo',
//            'IdParametro',
//            'IdJurado',
//            'Calificacion',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>

    <div class="box box-solid box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">¡PRECAUCIÓN!</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="label label-primary">Información Importante</span>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            Una vez que califique el trabajo, no podrá realizar modificaciones. Tenga mucho cuidado.
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <?= GridView::widget([
        'dataProvider' => $dataTrabajo,
        'filterModel' => $searchTrabajo,
        'autoXlFormat'=>true, //Aqui se configura la exportacion a excel
        'columns' => [//inician las columnas
            ['class'=>'kartik\grid\SerialColumn'],
            //'Id',
            //'codigoSala',
//            [
//                'class' => 'kartik\grid\ExpandRowColumn',
//                'value'=>function ($model,$key,$index,$column){
//                    return GridView::ROW_COLLAPSED;
//                },
//                 'detail'=>function($model,$key,$index,$column){return '<div class="alert alert-danger">No hay datos</div>';}
////                'detail'=>function($model,$key,$index,$column) {
////                    $searchModel = new \app\models\EvaluacionSearch();
////                    $searchModel->IdCategoria=$model->IdCategoria;
////                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
////
////                    return Yii::$app->controller->renderPartial('_detail', [
////                        'searchModel' => $searchModel,
////                        'dataProvider'   => $dataProvider,
////                    ]);
////                },
//            ],
            [
                'attribute' => 'codigoSala',
                'value'=>'codigoSala',
            ],
            'Titulo',
            [
                'attribute' => 'IdCategoria',
                'value'=>'categoria.Definicion',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'header'=>'<label>Documento</label>',
                'headerOptions'=>['class'=>'kartik-sheet-style'],
//                'template' => '{view} {update} {delete} {evaluar}',
                'template' => '{escrito}',
//                'urlCreator' => function($action, $model, $key, $index) { return '#'; },
                'buttons' => [
                    'escrito' => function ($url, $model, $key) {
                       // return Html::a('<i class="glyphicon glyphicon-ok"></i>', ['create'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Corregir trabajo')]);
                        return Html::a('<i class="glyphicon glyphicon-ok"></i>', ['califica',
                            'IdTrabajo'=>$model->Id,
                            'IdTipoParametro'=>1,
                        ]);
                    },
                ],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{expuesto}',
                'header'=>'<label>Exposicion</label>',
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'buttons' => [
                    'expuesto' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-ok"></i>', ['califica',
                            'IdTrabajo'=>$model->Id,
                            'IdTipoParametro'=>2,
                        ]);
                    },
                ],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
            // 'IdOrigen',
            // 'Observaciones',
            // 'FechaExposicion',
            // 'DocumentoEntregado:boolean',
            // 'IdCategoria',
            // 'IdAsesor',
            // 'IdArea',
            // 'IdAnio',
        ],
        'headerRowOptions' => ['class' => 'kartik-sheet-style'], //Opciones de cabecera
        'filterRowOptions' => ['class' => 'kartik-sheet-style'], //Opciones de busqueda
        'pjax' => true, // pjax se activa aqui, luego configuraciones de pjax
        'pjaxSettings'=>[
            'neverTimeout'=>true,
//            'beforeGrid'=>'My fancy content before.',
//            'afterGrid'=>'My fancy content after.',
        ],
        'panel' => [ //aqui va el panel bonito...
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-open-file"></i> Trabajos</h3>',
            'type'=>'success',
//            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Trabajo', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Recargar tabla', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],
        'toolbar' =>  [//herramientas
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('kvgrid', 'Nuevo Trabajo'), 'class' => 'btn btn-success', 'onclick' => 'alert("Se agregara un nuevo trabajo");']) . ' '.
//                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => Yii::t('kvgrid', 'Nuevo trabajo')]). ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Actualizar')])
            ],
            '{toggleData}',
        ],
        'responsive'=>true,
        'hover'=>true,
        'resizableColumns'=>true,
    ]); ?>

    <?php Pjax::end(); ?>
</div>
