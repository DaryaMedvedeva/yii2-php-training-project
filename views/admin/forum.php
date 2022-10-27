<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

use app\components\Forum;



$this->title = 'Форум';
?>
<div class="site-index">

        <div class="area">
            <div id="headof"><p>Форум</p>

            </div>
            <div id="messages">
                <?php 
        foreach ($comm as $c)
        {
            echo Forum::Widget(['username'=>$c->username,
            'text'=>$c->comment,
            'date'=>$c->commdate]);
        }
        ?>
            </div>
            <div сlass="enter">
                <?php  $form=ActiveForm::begin()?>
                <?= $form->field($newcomm, 'comment')->textarea()->label('') ?>
                <?= Html::submitButton('Отправить')?>
                <?php  $form=ActiveForm::end()?>
            </div>
        </div>
        
<style>
    #messages
{
    background-color: rgb(248, 254, 254);
    height: 400px;
    width: 96%;
    margin-left: 2%;
    overflow-y:scroll;
}

    </style>
<script>
    let messarea = document.getElementById("messages");
messarea.scrollTop = messarea.scrollHeight;
</script>


</div>


<style>


    .area
{
    background-color: oldlace;
    height: auto;
    align-items: center;
   align-content: center;
   text-align: center;
}

textarea
{
    resize: none;
}

#messages
{
    background-color: rgb(248, 254, 254);
    height: 400px;
    width: 96%;
    margin-left: 2%;
    overflow-y:scroll;
}

.commentcard
{
    padding: 2% 2%;
}

button {
    color: #fff;
    border: none;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 4px 2px;
    border-radius: 8px;
    background-color: #256953;
  }
    button:hover {
    background-color: #10453d;
  }

  .mess
  {
      background-color: rgb(189, 246, 223);
      text-align: left;
      padding: 7px;
      border-radius: 20px;
      margin: 1%;
  }
</style>