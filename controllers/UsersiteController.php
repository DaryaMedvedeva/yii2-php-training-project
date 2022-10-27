<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Results;
use app\models\Lessons;
use app\models\Forum;
use app\models\NewcommentForm;
use app\models\Questions;
use app\models\TestForm;
use yii\helpers\Url;

class UsersiteController extends Controller
{
    public $layout = 'userlay.php';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        Controller::forUser();
        $lsns=Lessons::find()->all();
        return $this->render('index', compact('lsns'));
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionResults()
    {
        Controller::forUser();
        $res=Results::find()->where(['userid' => Yii::$app->user->identity->id])->orderBy(['testdate'=>SORT_DESC])->all();
        return $this->render('results', compact('res'));
    }

    public function actionLesson()
    {
                Controller::forUser();
                $test=new TestForm();
                $test->resid=Results::find()->all()[Results::find()->count()-1]->resid+1;;
                $test->userid=Yii::$app->user->identity->id;
                $test->testdate=date('Y-m-d');
                if($test->load(Yii::$app->request->post()) && $test->new()){
                    Yii::$app->session->setFlash('success','Отправлено');
                    return  $this->redirect(Url::to(['usersite/results']));}
                else {
                    Yii::$app->session->setFlash('error','Ошибка');
                };
            return $this->render('lesson', ['test'=>$test]);
    }

    public function actionForum()
    {
        Controller::forUser();
        $comm=Forum::find()->all();
        $newcomm=new NewcommentForm();
        if($newcomm->load(Yii::$app->request->post()) && $newcomm->send()){
                Yii::$app->session->setFlash('success','Отправлено');
                return $this->refresh();}
            else {
                Yii::$app->session->setFlash('error','Ошибка');
            };
        return $this->render('forum', ['comm'=>$comm,'newcomm'=>$newcomm]);
    }
}
