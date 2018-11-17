<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Docente',
]) . $model->IdPersona;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Docentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPersona, 'url' => ['view', 'id' => $model->IdPersona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="docente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
