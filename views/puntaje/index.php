<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PuntajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Puntajes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntaje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Puntaje'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            [
                'attribute' => 'IdParametro',
                'value'=>'idParametro.IdTipoParametro',
            ],
            [
                'attribute' => 'IdCategoria',
                'value'=>'idCategoria.Definicion',
            ],
            [
                'attribute' => 'IdParametro',
                'value'=>'idParametro.Definicion',
            ],
            //'Valor',
            [
                'label' => 'Valor',
                'attribute' =>'Valor',
                'contentOptions' => ['class' => 'col-lg-1'],
                'format'=>['decimal',2]
            ],
            //'IdAnio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
