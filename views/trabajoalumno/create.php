<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trabajoalumno */

$this->title = 'Create Trabajoalumno';
$this->params['breadcrumbs'][] = ['label' => 'Trabajoalumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajoalumno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
