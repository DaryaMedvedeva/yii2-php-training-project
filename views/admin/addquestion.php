<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Questions;
use app\models\Lessons;

$this->title = 'Вопрос';
?>
<div class="site-login">
    <?php function asNtext($value)
{
    if ($value === null) {
        return $this->nullDisplay;
    }
    return nl2br(Html::encode($value));
}?>
<?php $lessid=Yii::$app->request->get('lessid'); ?>
    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <h2>Введите вопрос</h2>
    <?php  $form=ActiveForm::begin()?>
                <?= $form->field($new, 'question')->textArea(['autofocus' => true])->label('') ?>
                <?= $form->field($new, 'answer')->textInput(['autofocus' => true])->label('Ответ') ?>
    <?= $form->field($new, 'lessid')->hiddenInput(['value' => $lessid])->label(''); ?>
                <a href="<?= yii\helpers\Url::to(["admin/lessons"]); ?>" class="btn btn-secondary">Вернуться к урокам</a>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?php  $form=ActiveForm::end()?>
    </br>

    <?php 
    $qq= Questions::find()->where(['lessid'=>$lessid])->all();
    $i=1;
    foreach ($qq as $q):?>
            <h2><?=$i?></h2>
            <h5> <?=asNtext($q->question)?></h5> 
            <h4>Ответ: <?=$q->answer?></h4>
            <a href="<?= yii\helpers\Url::to(["admin/qdrop", 'qid'=>$q->qid]); ?>" class="btn btn-warning">Удалить</a>
            <?php $i+=1;?>
        
        <?php endforeach;?>
    
        </br>
    </div>
</div>
