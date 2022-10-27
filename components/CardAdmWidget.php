<?php

namespace app\components;

use yii\bootstrap4\Widget;

Class CardAdmWidget extends Widget
{
    public $name='';
    public $chapter='';

    public function run()
    {   
        return '<div class="card" style="width: 18rem; display:inline-block;">
        <img class="card-img-top" src="https://www.shkolazhizni.ru/img/content/i132/132724_or.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">'.$this->name.'</h5>
          <p class="card-text">'.$this->chapter.'</p>
          <a href="#" class="btn btn-danger">Удалить</a>
        </div>
      </div>';
    }

    
}

?>