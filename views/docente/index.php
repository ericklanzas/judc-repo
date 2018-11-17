<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listadocentes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Docentes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nuevo Docente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdTitulo',
            'IdTitulo' => [
                'attribute' => 'IdTitulo',
                'label'=> 'Titulo',
                'value' => function ($value) {
                    return Listadocentes::find()
                        ->where(['IdPersona' => $value->IdPersona])
                        ->one()['Acronimo'];
                }
            ],
            //'IdPersona',
            'IdPersona' => [
                'attribute' => 'IdPersona',
                'label'=> 'Docente',
                'value' => function ($value) {
                    return Listadocentes::find()
                        ->where(['IdPersona' => $value->IdPersona])
                        ->one()['NombreCompleto'];
                }
            ],
            //'IdArea',
            'IdArea' => [
                'attribute' => 'IdArea',
                'label'=> 'Area',
                'value' => 'idArea.Definicion'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
