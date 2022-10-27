<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Questions;
use app\models\Lessons;

$this->title = 'Урок';
?>
<div class="site-login">
<?php $chapid=Yii::$app->request->get('chapid'); ?>
    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <h2>Введите название урока</h2>
    <?php  $form=ActiveForm::begin()?>
                <?= $form->field($new, 'lessname')->textInput(['autofocus' => true])->label('') ?>
                
    <?= $form->field($new, 'chapid')->hiddenInput(['value' => $chapid])->label(''); ?>
                <a href="<?= yii\helpers\Url::to(["admin/lessons"]); ?>" class="btn btn-secondary">Вернуться к урокам</a>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?php  $form=ActiveForm::end()?>
    </br>
    
    </div>
</div>
