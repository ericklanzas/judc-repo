<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurado */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jurado',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jurados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jurado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
