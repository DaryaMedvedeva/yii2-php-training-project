<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardWidget;
use app\models\Chapter;

$this->title = 'Уроки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <?php 
    
    $i=0; foreach ($lsns as $l): 
        $chapter=Chapter::find()->where(['chapid'=>$l->chapid])->one(); ?>
        <div class="card" style="width: 18rem; display:inline-block;">
        <img class="card-img-top" src="https://www.shkolazhizni.ru/img/content/i132/132724_or.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?=$l->lessname?></h5>
          <p class="card-text"><?=$chapter->chapname?></p>
          <a href="<?= yii\helpers\Url::to(["usersite/lesson", 'lessid'=>$l->lessid]); ?>" class="btn btn-primary">Начать</a>
        </div>
      </div>
        <?php endforeach; ?>
    </div>
</div>
