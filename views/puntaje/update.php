<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Puntaje */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Puntaje',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Puntajes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="puntaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
