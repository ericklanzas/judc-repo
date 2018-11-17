<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipoparametro */

$this->title = Yii::t('app', 'Crear Tipo de Parametro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos de Parametros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoparametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
