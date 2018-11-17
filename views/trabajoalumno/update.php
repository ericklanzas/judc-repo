<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajoalumno */

$this->title = 'Update Trabajoalumno: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Trabajoalumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPersona, 'url' => ['view', 'IdPersona' => $model->IdPersona, 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trabajoalumno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
