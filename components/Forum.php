<?php

namespace app\components;

use yii\bootstrap4\Widget;

Class Forum extends Widget
{
    public $username='';
    public $text='';
    public $date;

    public function run()
    {    $color='';
      if ($this->username=='Admin') $color.="background-color:beige;";
        return '<div class="card text-left" style="'.$color.'">
        <div class="card-header">
        '.$this->username.'
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p class="h6">'.$this->text.'</p>
            <footer class="blockquote-footer">'.$this->date.'</footer>
          </blockquote>
        </div>
      </div>
        ';
    }

    
}

?>