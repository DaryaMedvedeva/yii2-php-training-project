<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Lessons $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\CardAdmWidget;
use app\models\Chapter;
use app\models\Lessons;
use app\models\Questions;

$this->title = 'Уроки';
?>

    <div class="offset-lg-1" class="flex-nowrap" style="color:#999;">
    <?php 
    $chcount=Chapter::find()->all();
    ?>
    <div class=" container mt-2 ml-3 display-block " style="" >
        <div class="collapse show d-md-flexmt-5 pt-0 pl-0 min-vh-100" id="sidebar">
        <a href="<?= yii\helpers\Url::to(["admin/addchapter"]); ?>" class="btn btn-primary">Добавить раздел</a>
        <br><br>
            <?php 
    $ch=Chapter::find()->all();
    $i=0;
    foreach ($ch as $c):?>
            <h2> <?=$c->chapname?></h2> 
            <a href="<?= yii\helpers\Url::to(["admin/chapdrop", 'chapid'=>$c->chapid]); ?>" class="btn btn-warning">Удалить раздел</a>
            <a href="<?= yii\helpers\Url::to(["admin/addlesson", 'chapid'=>$c->chapid]); ?>" class="btn btn-primary">Добавить урок</a>
        </br>
                  <span> </br>
            <?php $less=Lessons::find()->where(['chapid'=>$c->chapid])->all();
            foreach ($less as $l): ?>
                 <span>
                 <div class="card" style="width: 18rem; display:inline-block;">
        <img class="card-img-top" src="https://www.shkolazhizni.ru/img/content/i132/132724_or.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?=$l->lessname?></h5>
          <p class="card-text"><?=$chapter->chapname?></p>
          <a href="<?= yii\helpers\Url::to(["admin/lessdrop", 'lessid'=>$l->lessid]); ?>" class="btn btn-danger">Удалить урок</a>
          <br>
          <p>Кол-во вопросов: <?=Questions::find()->where(['lessid'=>$l->lessid])->count()?></p> 
          <a href="<?= yii\helpers\Url::to(["admin/addquestion", 'lessid'=>$l->lessid]); ?>" class="btn btn-primary">+</a>
        </div>
      </div>
                 </span></a></li>
                
        <?php endforeach;?>
            </span>
     
        
        <?php $i+=1;?>
        
        <?php endforeach;?>
    

        </div>
    </div>
    </div>

    
<style>
    main
{
    z-index: 1;
}
.navbar
{
    z-index: 9999;
}
footer
{
}
.nav-link[data-toggle].collapsed:before {
    content: " ▾";
}
.nav-link[data-toggle]:not(.collapsed):before {
    content: " ▴";
}
</style>
