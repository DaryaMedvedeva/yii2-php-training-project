<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Lessres;

class TestForm extends Model
{

    public $resid;
    public $userid;
    public $lessid;
    public $mark;
    public $testdate;

    public function rules()
    {
        return [
            [['resid','userid', 'lessid', 'mark', 'testdate' ], 'required'],
        ];
    }

    public function getAttributeLabels(){
        return ['resid'=> 'resid',
        'userid'=>'userid',
    'lessid'=>'lessid',
    'mark'=>'mark',
    'testdate'=>'testdate'];
    }

    public function new() {
        $new = new Results();
        $new->resid = $this->resid;
        $new->userid = $this->userid;
        $new->lessid = $this->lessid;
        $new->mark = $this->mark;
        $new->testdate = $this->testdate;

        if ($new->save()) {
            return true;
        }

        Yii::error('error'. VarDumper::dumpAsString($mess->errors));
        return false;
    }


}
