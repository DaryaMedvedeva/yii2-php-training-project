<?php

namespace app\models;
/** @var app\models\Lessons $model */
use yii\db\ActiveRecord;

class ChapAdd extends ActiveRecord
{
    public $chapid;
    public $chapname;
    
    public function rules()
    {
        return [
            [['chapid','chapname'], 'required'],
            [[
                'chapname'
            ],
                'string', 'min' => 1, 'max' => 50]
        ];
    }

    public function getAttributeLabels(){
        return ['chapid'=> 'chapid',
        'chapname'=>'chapname'];
    }

  public function newchap()
  {
    $ch=new Chapter();
        $ch->chapname = $this->chapname;
        if ($ch->save()) {
            return true;
        }
    Yii::error('Chapter was not saved! '. VarDumper::dumpAsString($ch->errors));
    return false;
  }
}
