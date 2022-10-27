<?php

namespace app\models;
/** @var app\models\Lessons $model */
use yii\db\ActiveRecord;

class QAdd extends ActiveRecord
{
    public $qid;
    public $lessid;
    public $question;
    public $answer;
    
    public function rules()
    {
        return [
            [['qid','lessid','question', 'answer'], 'required'],
            [[
                'question'
            ],
                'string', 'min' => 1, 'max' => 300],
                [[
                'answer'
            ],
                'string', 'min' => 1, 'max' => 6]
        ];
    }

    public function getAttributeLabels(){
        return ['qid'=> 'qid',
        'lessid'=> 'lessid',
        'question'=>'question',
    'answer'=>'answer'];
    }

    public function new()
    {
      $qstns=new Questions();
          $qstns->question = $this->question;
          $qstns->qid = $this->qid;
          $qstns->lessid = $this->lessid;
          $qstns->answer = $this->answer;
          if ($qstns->save()) {
              return true;
          }
      Yii::error('lesson was not saved! '. VarDumper::dumpAsString($ch->errors));
      return false;
    }
}
