<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carrera */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Carrera',
]) . $model->IdTitulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carreras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTitulo, 'url' => ['view', 'id' => $model->IdTitulo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="carrera-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
