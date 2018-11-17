<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Titulo */

$this->title = Yii::t('app', 'Crear Titulo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Titulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
