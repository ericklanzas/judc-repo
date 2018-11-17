<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listapersonas;



/* @var $this yii\web\View */
/* @var $searchModel app\models\TrabajoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trabajos');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="trabajo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--     Html::a(Yii::t('app', 'Nuevo Trabajo'), ['create'], ['class' => 'btn btn-success'])-->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true, //Aqui se configura la exportacion a excel
        'columns' => [//inician las columnas
            ['class'=>'kartik\grid\SerialColumn'],
            //'Id',
            'codigoSala',
//            [
//                'attribute' => 'codigoSala',
//                'value'=>'codigoSala',
//            ],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value'=>function ($model,$key,$index,$column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model,$key,$index,$column) {
                    $searchModel = new \app\models\TrabajoalumnoSearch();
                    $searchModel->IdTrabajo=$model->Id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_alumnos', [
                        'searchModel' => $searchModel,
                        'dataProvider'   => $dataProvider,
                    ]);
                },
            ],
            'Titulo',
            'IdTutor' => [
                'attribute' => 'IdTutor',
                'label'=> 'Tutor',
                'value' => function ($value) {
                    return Listapersonas::find()
                        ->where(['id' => $value->IdTutor])
                        ->one()['NombreCompleto'];
                }
            ],
            [
                'attribute' => 'IdSala',
                'value'=>'sala.Definicion',
            ],
            [
                'attribute' => 'IdCategoria',
                'value'=>'categoria.Definicion',
            ],
            'FechaExposicion',
            [
                'class' => 'kartik\grid\BooleanColumn',//Formato de booleano
                'attribute' => 'PrimerVez',
                'vAlign' => 'middle'
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',//Formato de booleano
                'attribute' => 'DocumentoEntregado',
                'vAlign' => 'middle'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
//                'urlCreator' => function($action, $model, $key, $index) { return '#'; },
                'viewOptions' => ['title' => 'Haga clic aqui si desea ver los detalles del trabajo.', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'Haga clic aqui si desea actualizar la informacion del trabajo.', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'Haga clic aqui si desea eliminar esta entrada.', 'data-toggle' => 'tooltip'],
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
                'beforeGrid'=>'My fancy content before.',
                'afterGrid'=>'My fancy content after.',
             ],
        'panel' => [ //aqui va el panel bonito...
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-open-file"></i> Trabajos</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Trabajo', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Recargar tabla', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],
        'toolbar' =>  [//herramientas
            ['content' =>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('kvgrid', 'Nuevo Trabajo'), 'class' => 'btn btn-success', 'onclick' => 'alert("Se agregara un nuevo trabajo");']) . ' '.
                 Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => Yii::t('kvgrid', 'Nuevo trabajo')]). ' '.
                 Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Actualizar')])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK,
        ],
        'exportConfig' => [
            GridView::CSV => ['label' => 'Exportar CSV'],
            GridView::EXCEL => ['label' => 'Exportar EXCEL'],
            GridView::TEXT => ['label' => 'Exportar TEXTO'],
            GridView::PDF => ['label' => 'Exportar PDF'],
        ],
        'responsive'=>true,
        'hover'=>true,
        'resizableColumns'=>true,
    ]); ?>
   </div>