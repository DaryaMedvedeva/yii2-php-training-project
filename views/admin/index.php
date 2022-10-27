<?php


/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Здравствуйте!</h1>

        <p class="lead">Вы находитесь в панели администратора.</p></br>

        <? echo Html::a('К урокам', ['admin/lessons'], ['class'=>'btn btn-lg btn-success']); ?>
        
    </div>

    <div class="body-content">

        <div class="row">
            
        </div>

    </div>
</div>
