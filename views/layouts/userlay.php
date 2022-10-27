<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\Chapter;
use app\models\Lessons;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="fixed-top">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => 'site/?r=usersite',
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Мои результаты', 'url' => ['/usersite/results']],
            ['label' => 'Форум', 'url' => ['/usersite/forum']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/usersite/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->name .' '.Yii::$app->user->identity->surname.')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
      
</header>
<div class="row container mt-2 pl-5 pt-0 display-block fixed-top" style="width: 20%; height: 20%t;" >
        <div class="collapse show d-md-flex mt-5 pt-0 pl-0" id="sidebar">
            <ul class="nav flex-column overflow-hidden">
            <?php 
            $res='';
    $ch=Chapter::find()->all();
    $i=0;
    foreach ($ch as $c):?>
            <li class="nav-item">
            <a class="nav-link collapsed" href="#submenu<?=$i?>" data-toggle="collapse" data-target="#submenu<?=$i?>"><i class="fa fa-table"></i> <span class="d-sm-inline"><?=$c->chapname?></span></a>
            <div class="collapse" id="submenu<?=$i?>" aria-expanded="false">
                <ul class="flex-column nav">
                  
            <?php $less=Lessons::find()->where(['chapid'=>$c->chapid])->all();
            foreach ($less as $l): ?>
                 <li class="nav-item"><a class="nav-link py-0" href="<?= yii\helpers\Url::to(["usersite/lesson", 'lessid'=>$l->lessid]); ?>"><span><?=$l->lessname?></span></a></li>
                
        <?php endforeach;?>
                </ul>
        </div>
        </li>
        
        <?php $i+=1;?>
        
        <?php endforeach;?>
    

        </ul>
        </div>
    </div>

<main role="main" class="flex-shrink-0 pl-5 container mt-5 pt-0">

    <div class="container  pt-2 pl-5 ">
   

        <div class="col pt-2">
            <!--КОНТЕНТ-->
        <?= $content ?>
        </div>
    </div>

</main>

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


@media screen and (min-width: 900px) {
    .pl-5
    {
    padding: 0 0 ;
    }

}
</style>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
