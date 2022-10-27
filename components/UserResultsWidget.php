<?php

namespace app\components;

use yii\bootstrap4\Widget;

use app\models\Users;
use app\models\Lessons;

Class UserResultsWidget extends Widget
{
    public $lessid;
    public $mark;
    public $testdate;

    public function run()
    {   

      $less=Lessons::find()->where(['lessid'=> $this->lessid])->one();

      
        return '<tr>
            <th scope="row">'.$less->lessname.'</th>
            <td>'.$this->mark.'</td>
            <td>'.$this->testdate.'</td>
          </tr>';
    }

    
}

?>