<?php

namespace app\components;
use yii\helpers\Html;
use yii\bootstrap4\Widget;

Class QuesWidget extends Widget
{

    public function asNtext($value)
{
    if ($value === null) {
        return $this->nullDisplay;
    }
    return nl2br(Html::encode($value));
}

    public $qid;
    public $question='';
    public $answer='';

    public function run()
    {   
        return '<div class="container text-dark" >
          <p class="text-dark"> '.QuesWidget::asNtext($this->question).'</p>
          <input type="text" class="form-control answ" id="answ" qid="'.$this->qid.'" answ='.$this->answer.' placeholder="Ответ"></input>
          </br>
        </div>';
    }

    
}

?>