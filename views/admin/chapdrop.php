<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Chapter;
use app\models\Lessons;
use app\models\Questions;
use app\models\Results;

$this->title = 'Уроки';
?>
<div class="site-login">

    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <?php 
    $chapid=Yii::$app->request->get('chapid');
    $less=Lessons::find()->where(['chapid'=>$c->chapid])->all();
     
    if( Chapter::deleteAll('chapid='.$chapid))
    {
        foreach ($less as $l) {
            Results::deleteAll('lessid='.$l->lessid);
            Questions::deleteAll('lessid='.$l->lessid);
        }
        Lessons::deleteAll('chapid='.$chapid);
     echo "<h2>Раздел удален успешно!</h2>";

    }
    ?>
    </br>
    <a href="<?= yii\helpers\Url::to(["admin/lessons"]); ?>" class="btn btn-secondary">Вернуться к урокам</a>
    <a href="<?= yii\helpers\Url::to(["admin/index"]); ?>" class="btn btn-primary">На главную</a>
    </div>
</div>
