<?php

namespace app\models;
/** @var app\models\Lessons $model */
use yii\db\ActiveRecord;

class LessAdd extends ActiveRecord
{
    public $lessid;
    public $lessname;
    public $chapid;
    
    public function rules()
    {
        return [
            [['lessid','lessname', 'chapid'], 'required'],
            [[
                'lessname'
            ],
                'string', 'min' => 1, 'max' => 50]
        ];
    }

    public function getAttributeLabels(){
        return ['lessid'=> 'lessid',
        'lessname'=>'lessname',
    'chapid'=>'chapid'];
    }

    public function new()
    {
      $less=new Lessons();
          $less->lessname = $this->lessname;
          $less->lessid = $this->lessid;
          $less->chapid = $this->chapid;
          if ($less->save()) {
              return true;
          }
      Yii::error('lesson was not saved! '. VarDumper::dumpAsString($ch->errors));
      return false;
    }
}
