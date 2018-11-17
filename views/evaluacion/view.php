<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */

$this->title = $model->IdTrabajo;
$this->params['breadcrumbs'][] = ['label' => 'Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdTrabajo' => $model->IdTrabajo, 'IdParametro' => $model->IdParametro, 'IdJurado' => $model->IdJurado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdTrabajo' => $model->IdTrabajo, 'IdParametro' => $model->IdParametro, 'IdJurado' => $model->IdJurado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdTrabajo',
            'IdParametro',
            'IdJurado',
            'Calificacion',
        ],
    ]) ?>

</div>
