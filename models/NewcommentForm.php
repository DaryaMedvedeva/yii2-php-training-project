<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Forum;

class NewcommentForm extends Model
{

    public $username;
    public $comment;
    public $commdate;

    public function rules()
    {
        return [
            [['username','comment', 'commdate'], 'required'],
            [[
                'comment'
            ],
                'string', 'min' => 1, 'max' => 500]
        ];
    }

    public function getAttributeLabels(){
        return ['username'=> 'username',
        'comment'=>'comment',
    'commdate'=>'commdate'];
    }

    public function send() {
        $mess = new Forum();
        if(Yii::$app->user->identity->role==1)
        $mess->username = Yii::$app->user->identity->name;
        else
        $mess->username = Yii::$app->user->identity->name.' '.Yii::$app->user->identity->surname;
        $mess->comment = $this->comment;
        $mess->commdate = date('Y-m-d');

        if ($mess->save()) {
            return true;
        }

        Yii::error('error'. VarDumper::dumpAsString($mess->errors));
        return false;
    }


}
