<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajoalumno */

$this->title = $model->IdPersona;
$this->params['breadcrumbs'][] = ['label' => 'Trabajoalumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajoalumno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdPersona' => $model->IdPersona, 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdPersona' => $model->IdPersona, 'Id' => $model->Id], [
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
            'IdPersona',
            'Id',
        ],
    ]) ?>

</div>
