<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nivelacademico */

$this->title = Yii::t('app', 'Nuevo Nivel Academico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Niveles Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivelacademico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
