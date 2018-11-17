<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Configuracion',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuracions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="configuracion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
