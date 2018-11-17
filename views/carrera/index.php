<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listatitulos;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Carreras');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nueva Carrera'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdTitulo',
            'IdTitulo' => [
                'attribute' => 'IdTitulo',
                'label'=> 'Acronimo',
                'value' => function ($value) {
                    return Listatitulos::find()
                        ->where(['id' => $value->IdTitulo])
                        ->one()['Acronimo'];
                }
            ],
            [
                'attribute' => 'IdTitulo',
                'value'=>'idTitulo.Definicion',
            ],
            // 'IdDepartamento',
            [
                'attribute' => 'IdDepartamento',
                'value'=>'idDepartamento.Definicion',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
