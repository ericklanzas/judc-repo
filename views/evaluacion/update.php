<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */

$this->title = 'Update Evaluacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTrabajo, 'url' => ['view', 'IdTrabajo' => $model->IdTrabajo, 'IdParametro' => $model->IdParametro, 'IdJurado' => $model->IdJurado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evaluacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
