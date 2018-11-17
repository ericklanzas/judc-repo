<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Origen */

$this->title = Yii::t('app', 'Crear Origen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Origenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="origen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
