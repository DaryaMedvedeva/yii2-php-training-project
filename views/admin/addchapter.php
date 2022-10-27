<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Questions;
use app\models\Lessons;

$this->title = 'Глава';
?>
<div class="site-login">

    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <h2>Введите название раздела</h2>
    <?php  $form=ActiveForm::begin()?>
                <?= $form->field($new, 'chapname')->textInput(['autofocus' => true])->label('') ?>
                <a href="<?= yii\helpers\Url::to(["admin/lessons"]); ?>" class="btn btn-secondary">Вернуться к урокам</a>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?php  $form=ActiveForm::end()?>
    </br>
    </div>
</div>
