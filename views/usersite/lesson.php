<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\QuesWidget;
use app\models\Lessons;
use app\models\Questions;
use app\models\Chapter;
use app\models\Results;
use yii\helpers\Url;



$this->title = '';
$lessid=Yii::$app->request->get('lessid');

$questions=Questions::find()->where(['lessid' => $lessid])->orderBy('RAND()')->limit(5)->all();

?>

<div class="site-login">
<?php if(!Results::find()->where(['userid' => Yii::$app->user->identity->id,
'lessid' => $lessid,
'testdate' => date('Y-m-d')])->one()): ?>
    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <?php 
    $l=Lessons::find()->where(['lessid'=>$lessid])->one();
    $ch=Chapter::find()->where(['chapid'=>$l->chapid])->one();
    echo '<h2 class="text-dark">'.$ch->chapname.'</h2>';
    
        echo '<h2 class="text-dark">'.$l->lessname.'</h2>';
    ?>
<h5 class="text-danger">Вводите номера последовательно без пробелов (пример: 134)</h5>
    <?php 
    foreach($questions as $q)
    {
        echo QuesWidget::Widget(['qid'=>$q->qid,
            'question'=>$q->question,
            'answer'=>$q->answer]);
    }
    ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Завершить', ['class' => 'btn btn-primary', 'name' => 'login-button',
    'onclick' => 'check()']) ?>

            <?php  $form=ActiveForm::begin()?>
                <?= $form->field($test, 'lessid')->textInput(['class' => 'd-none', 'id'=>'forlessid'])->label('') ?>
                <?= $form->field($test, 'mark')->textInput(['class' => 'd-none', 'id'=>'formark'])->label('') ?>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary d-none test'])?>
                <?php  $form=ActiveForm::end()?>
            </div>
        </div>
    </div>

    <?php else: ?>

        <h1 class='text-danger'>Вы уже проходили этот тест сегодня, попробуйте завтра.</h1>
        <?php endif;?>
</div>

<script>
function check()
{
    var answ = document.getElementsByClassName('answ');
    let val=10/answ.length;
    let mark=0;
    for (let item of answ) {
        if(item.getAttribute('answ')==item.value) 
        mark+=val;
    }

    var m = document.getElementById('formark');
    m.value=mark;

    var l = document.getElementById('forlessid');
    l.value=<?=$lessid?>;

    document.querySelector('.test').click()
}

</script>
