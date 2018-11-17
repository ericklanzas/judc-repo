<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Listadocentes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JuradoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jurados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jurado'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            //'IdDocente',
            'IdDocente' => [
                'attribute' => 'IdDocente',
                'label'=> 'Docente',
                'value' => function ($value) {
                    return Listadocentes::find()
                        ->where(['IdPersona' => $value->IdDocente])
                        ->one()['NombreCompleto'];
                }
            ],
            //'IdTipoParametro',
            [
                'attribute' => 'IdTipoParametro',
                'value'=>'idTipoParametro.Definicion',
            ],
            //'IdSala',
            [
                'attribute' => 'IdSala',
                'value'=>'idSala.Definicion',
            ],
            //'IdAnio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
