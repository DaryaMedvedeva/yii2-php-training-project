<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Results;
use app\models\Lessons;
use app\models\Forum;
use app\models\NewlessForm;
use app\models\Chapter;
use app\models\NewcommentForm;
use app\models\ChapAdd;
use app\models\LessAdd;
use app\models\QAdd;
use app\models\Questions;

class AdminController extends Controller
{
    public $layout = 'adminlay.php';
    
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
                        'actions' => ['logout'],
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
        Controller::forAdmin();
        return $this->render('index');
    }

    public function actionForum()
    {
        
        Controller::forAdmin();
        $comm=Forum::find()->all();
        $newcomm=new NewcommentForm();
        if($newcomm->load(Yii::$app->request->post()) && $newcomm->send()){
               // Yii::$app->session->setFlash('success','Отправлено');
                return $this->refresh();}
            else {
                //Yii::$app->session->setFlash('error','Ошибка');
            };
        return $this->render('forum', ['comm'=>$comm,'newcomm'=>$newcomm]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLessons()
    {
        Controller::forAdmin();
        $lsns=Lessons::find()->all();
        return $this->render('lessons', ['lsns'=>$lsns, 'ldrop'=>$ldrop,'chdrop'=>$chdrop]);
    }

   
    public function actionNewless()
    {
        Controller::forAdmin();
        $model =new Lessons();
        $modell =new Chapter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) { //получаем и загружаем в модель
            return $this->redirect(Url::to(['admin/index']));
        }
        
         return $this->render('newless', ['model'=>$model, 'modell'=>$modell]);

    }

    public function actionChapdrop()
    {
        Controller::forAdmin();
        return $this->render('chapdrop');
    }

    public function actionLessdrop()
    {
        Controller::forAdmin();
        return $this->render('lessdrop');
    }

    public function actionQdrop()
    {
        Controller::forAdmin();
        return $this->render('qdrop');
    }


    public function actionAddchapter()
    {
        Controller::forAdmin();
        $new=new ChapAdd();
        $new->chapid=Chapter::find()->all()[Chapter::find()->count()]->chapid+1;
        if($new->load(Yii::$app->request->post()) && $new->newchap())
            return $this->redirect(Url::to(['admin/lessons']));
        return $this->render('addchapter', ['new'=>$new]);
    }

    public function actionAddlesson()
    {
        Controller::forAdmin();
        $new=new LessAdd();
        $new->lessid=Lessons::find()->all()[Lessons::find()->count()-1]->chapid+1;
        if($new->load(Yii::$app->request->post()) && $new->new())
            return $this->redirect(Url::to(['admin/lessons']));
        return $this->render('addlesson', ['new'=>$new]);
    }

    public function actionAddquestion()
    {
        Controller::forAdmin();
        $new=new QAdd();
        $new->qid=Questions::find()->all()[Questions::find()->count()-1]->qid+1;
        if($new->load(Yii::$app->request->post()) && $new->new())
            return $this->refresh();
        return $this->render('addquestion', ['new'=>$new]);
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
        Controller::forAdmin();
        $res=Results::find()->orderBy(['testdate'=>SORT_DESC])->all();
        return $this->render('results', compact('res'));
    }
}
