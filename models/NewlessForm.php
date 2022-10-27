<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewlessForm extends Model
{
    public $lessname;
    public $chapname;

    public static function tableName(){
        return 'lessons';
    }

    public function getAttributeLabels(){
        return ['lessname'=> 'lessname',
        'chapname'=>'В главе'];
    }

    // public function rules(){
    //     return [['lessname', 'text', 'required'],
    //     ['chapname','selection']];
    // }

}
