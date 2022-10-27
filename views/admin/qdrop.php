<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Questions;
use app\models\Lessons;
use app\models\Results;

$this->title = 'Уроки';
?>
<div class="site-login">

    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <?php 
    $qid=Yii::$app->request->get('qid');
     
    if( Questions::deleteAll('qid='.$qid))
    {
     echo "<h2>Вопрос удален успешно!</h2>";

    }
    ?>
    </br>
    <a href="<?= yii\helpers\Url::to(["admin/lessons"]); ?>" class="btn btn-secondary">Вернуться к урокам</a>
    <a href="<?= yii\helpers\Url::to(["admin/index"]); ?>" class="btn btn-primary">На главную</a>
    </div>
</div>
