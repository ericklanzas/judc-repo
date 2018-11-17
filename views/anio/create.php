<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anio */

$this->title = Yii::t('app', 'Nuevo Año');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Años'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
