<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'jejeje';
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor completa los siguientes campos para loguearte:</p>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= Html::submitButton('Login') ?>
<?php ActiveForm::end(); ?>