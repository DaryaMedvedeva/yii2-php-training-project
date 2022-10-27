<?php

namespace app\components;

use yii\bootstrap4\Widget;

use app\models\User;
use app\models\Lessons;

Class ResultsWidget extends Widget
{
  
    public $userid;
    public $lessid;
    public $mark;
    public $testdate;

    public function run()
    {   

      $us=User::find()->where(['id'=> $this->id])->one();
      $less=Lessons::find()->where(['lessid'=> $this->lessid])->one();

      
        return '<tr>
            <th scope="row">'.$us->surname.'</th>
            <td>'.$us->name.'</td>
            <td>'.$less->lessname.'</td>
            <td>'.$this->mark.'</td>
            <td>'.$this->testdate.'</td>
          </tr>';
    }

    
}

?>