<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $id=1;
    public $name;
    public $surname;
    public $login;
    public $password;
    public $password_repeat;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['name','surname', 'login', 'password', 'password_repeat'], 'required'],
            [[
                'name',
                'surname',
                'login',
                'password',
                'password_repeat'
            ],
                'string', 'min' => 3, 'max' => 16],
            ['rememberMe', 'boolean'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        if ($this->validate() && $this->createUser()) {
            $user = User::findByLogin($this->login);
            Yii::debug($user);
            return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }

    private function createUser() {
        $user=new User();
        $user->id=(User::find()->count()+1);
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->login = $this->login;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        if ($user->save()) {
            return true;
        }

        Yii::error('User was not saved! '. VarDumper::dumpAsString($user->errors));
        return false;
    }
}