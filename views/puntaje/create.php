<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Puntaje */

$this->title = Yii::t('app', 'Establecer Puntaje');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Puntajes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
