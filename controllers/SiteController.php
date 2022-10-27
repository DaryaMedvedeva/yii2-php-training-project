<?php

namespace app\controllers;

use app\models\SignupForm;
use Yii;
use app\models\LoginForm;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{

    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 1) {
            return $this->redirect(Url::to(['../admin/index']));
        }
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        if(!Controller::forSite())
        $this->redirect(Url::to(['site/login']));
    }

    public function actionLogin() {
        Controller::forSite();
        if (!$this->isGuest()) {
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) { //получаем и загружаем в модель
            if (Yii::$app->user->identity->role === 1) {
                return $this->redirect(Url::to(['admin/index']));
            }
            if (Yii::$app->user->identity->role === 2) {
                return $this->redirect(Url::to(['usersite/index']));
            }
            return $this->goHome();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup() {
        Controller::forSite();
        if (!$this->isGuest()) {
            return $this->goBack();
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(Url::to(['usersite/index']));
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    private function isGuest() {
        return Yii::$app->user->isGuest;
    }
}